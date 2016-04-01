<?php

/*
<lezaz:if/>
Attribute	Description        Default
--------------------------------------------
id           referance for this syntax use like lezaz#id             Null
condition    condition to send this email                                       null
from_email   this email send form email            null
from_name    this email send form name
subject      subject of email
to_email     send to email
to_name      send to name
reply_email  reply to email
reply_name   reply to name
cc_email  reply to email
cc_name   reply to name
bcc_email  reply to email
bcc_name   reply to name
attachment   attachment file
pass         msg show when pass sending 
fail         msg show when fail sending 
split        split sempol between words in search and replace     ;
 
innerHTML you can use :
<lezaz:email_option type="attachment" file='{{uploaded}}file.png' /> //attachment file with email
<lezaz:email_option type="image" src='{{uploaded}}file.png' />       // imped image inside email content
<lezaz:email_option type="send" email='email@site.com' name='email' />    // send same email as normal or use type= reply , cc , bcc like : 
  <lezaz:email_option type="reply" email='email@site.com' name='email' />
  <lezaz:email_option type="cc" email='email@site.com' name='email' />
  <lezaz:email_option type="bcc" email='email@site.com' name='email' />

Example
--------
<lezaz:email id='mail' condition='lezaz:set(sendmail)' from_email='bassam@lezaz.com' from_name='bassam alessawi' subject='test email' to_email='bassam.a.a.r@gmail.com' to_name='bassam' search="x1:x2:x3" replace="y1:y2:y3" split=":">
    <b> this is html msg </b><br>
    hi man 
    <lezaz:email_option type="attachment" file='{{uploaded}}file.png' />
    <lezaz:email_option type="html" file='{{uploaded}}file.png' />
    <lezaz:email_option type="image" src='{{uploaded}}file.png' />
    <lezaz:email_option type="send" email='email@site.com' name='email' />
    <lezaz:email_option type="send" email='email@site.com' name='email' />
    <lezaz:email_option type="send" email='email@site.com' name='email' />
    <lezaz:email_option type="send" email='email@site.com' name='email' />
    <lezaz:email_option type="reply" email='email@site.com' name='email' />
    <lezaz:email_option type="cc" email='email@site.com' name='email' />
    <lezaz:email_option type="bcc" email='email@site.com' name='email' />
    
</lezaz:email>

 */

function lezaz_email($vars, $html) {
    global $lezaz;
    if(!$vars['split']) $vars['split']=';';
    $declear =$lezaz->lezaz->declear['email_'.$vars['id']];
        
    if(is_array($declear))
        foreach ($declear as $attrs) {
           
              if($attrs['type']=='attachment') $phpcode.='$attachment[]=$lezaz->convert_path("'.$attrs['file'].'",1);'."\n";
              
              if($attrs['type']=='image') $phpcode.='$image["'.md5($attrs['src']).'"]=$lezaz->convert_path("'.$attrs['src'].'",1);'."\n";
              
              if($attrs['type']=='send'){ 
                  $phpcode.='$to_email[]="'.$attrs['email'].'";'."\n";
                  $phpcode.='$to_name[]=" '.$attrs['name' ].'";'."\n";
              }
              if($attrs['type']=='send'){ 
                  $phpcode.='$to_email[]="'.$attrs['email'].'";'."\n";
                  $phpcode.='$to_name[]=" '.$attrs['name' ].'";'."\n";
              }
              if($attrs['type']=='reply'){ 
                  $phpcode.='$replyto_email[]="'.$attrs['email'].'";'."\n";
                  $phpcode.='$replyto_name[]=" '.$attrs['name' ].'";'."\n";
              }
              if($attrs['type']=='cc'){ 
                  $phpcode.='$ccto_email[]="'.$attrs['email'].'";'."\n";
                  $phpcode.='$ccto_name[]=" '.$attrs['name' ].'";'."\n";
              }
              if($attrs['type']=='bcc'){ 
                  $phpcode.='$bccto_email[]="'.$attrs['email'].'";'."\n";
                  $phpcode.='$bccto_name[]=" '.$attrs['name' ].'";'."\n";
              }
              
            }
            if($vars['file']) $phpcode.='$email_html=file_get_contents($lezaz->convert_path("'.$vars['file'].'",1));'."\n";
else {
    $phpcode.='$email_html=<<<END
' . $html . '
END;
';
}
if($vars['search'] && $vars['replace']){
          $phpcode.='$replace="";'."\n".'$search="";'."\n"; 

   $search=  explode( $vars['split'],$vars['search']);
   $replace=  explode( $vars['split'],$vars['replace']);
   foreach($search as $searchs){
      $phpcode.='$search[]="'.$searchs.'";'."\n"; 
   }
   foreach($replace as $replaces){
      $phpcode.='$replace[]="'.$replaces.'";'."\n"; 
   }
    $phpcode.=' 
       $email_html = str_replace($search, $replace, $email_html); 
             ';
}
  if(!$vars['condition'])$vars['condition']='1=1';
      return "<?php \n".$phpcode.' if('.$vars['condition'].'){
$lezaz->mailer->sendmail("'.$vars['from_email'].'", "'.$vars['from_name'].'", $to_email, $to_name, $replyto_email, $replyto_name,$ccto_email,$ccto_name,$bccto_email,$bccto_name, "'.$vars['subject'].'", $email_html, $image ,$attachment, "'.$vars['pass'].'", "'.$vars['fail'].'")  ;       
  
              }'."\n?>";
}


function lezaz_mail_option($vars, $html) {
    if($vars['type']=='image'){
        $cid=md5($vars['src']);
        return '<img src="cid:'.$cid.'" />';
    }
    return 'x';
}