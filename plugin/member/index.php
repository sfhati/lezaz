<?php

if (!defined('YOUCANINCLUDE'))
    exit('No direct script access allowed');

$lezaz->router('/admin/logout', function() use ($lezaz){
$_SESSION['member_permission'] = 'no';
    session_unset();
    session_destroy();
$lezaz->go(SITE_LINK);
        });

if($editmember && is_root()){
  $memp = check_db('members', " `id`='$editmember'");
    if ($memp[id] == $editmember) {   
        $_VAL_username = $memp[name];
        $_VAL_userpassword = $memp[pass];
        $_VAL_useremail = $memp[email];
        $_VAL_editmemberid = $memp[id];

    }else{
         echo CHNG_LANGUAGE( "<script>window.top.window.msgerror('user not found!');window.top.window.locationset('managment_members')</script>" );
       exit();
    }
}
if ($submit_register) {
   if($editmemberid){
      $options=" and id != $editmemberid "; 
      $cond="id = $editmemberid";
      $ty=1;
   }else{
      $options='';
      $cond='';
      $ty=0;       
   }
    
    if (validation_check('username', $username, $options)) {
        $_SUBMIT_username = '1';
        $_VAL_username = $username;
        $xsuccess = 1;
        $notsuccess = "window.top.window.$('#input-username').addClass('has-error').removeClass('has-success');";
    } else {
        $notsuccess = "window.top.window.$('#input-username').addClass('has-success').removeClass('has-error');";
    }
    if (validation_check('userpassword', $userpassword)) {
        $_SUBMIT_userpassword = '1';
        $_VAL_userpassword = $userpassword;
        $xsuccess = 1;
        $notsuccess.="window.top.window.$('#input-userpassword').addClass('has-error').removeClass('has-success');";
    } else {
        $notsuccess.="window.top.window.$('#input-userpassword').addClass('has-success').removeClass('has-error');";
    }

    if (validation_check('useremail', $useremail , $options)) {
        $_SUBMIT_useremail = '1';
        $_VAL_useremail = $useremail;
        $xsuccess = 1;
        $notsuccess.="window.top.window.$('#input-useremail').addClass('has-error').removeClass('has-success');";
    } else {
        $notsuccess.="window.top.window.$('#input-useremail').addClass('has-success').removeClass('has-error');";
    }

    if ($xsuccess){
        echo CHNG_LANGUAGE( "<script>" . get_msg(1) . $notsuccess . "</script>");
    }else{
        $data_insert['name']=$username;
        $data_insert['pass']=$userpassword;
        $data_insert['email']=$useremail;
        $data_insert['type']='1';
        $data_insert['active']='1';
        $data_insert['date1']=time();
        $data_insert['last_update']=time();
        
        save_db('members',$data_insert,$cond,$ty);
        echo CHNG_LANGUAGE( "<script>window.top.window.msgsuccess('its work bassam');$notsuccess;window.top.window.locationset('managment_members')</script>" );
    }
    exit();
}

if($delete_member && is_root()){
    if($delete_member!=1)
        delete_id ('members', $delete_member);
        exit();
}

if ($lezaz->post( 'submit_lgn')) {
    $_SESSION['seassion_start'] = '';
    $_SESSION['MEMBER'] = '';
    $_SESSION['member_permission'] = '';
    $memp = $lezaz->db->row('members', " (`name`='".$lezaz->post('userxx')."' or email='".$lezaz->post('userxx')."') and `pass`='".$lezaz->post('passxx')."'");
    if ($memp[name] == $lezaz->post('userxx')) {

        if (!$memp[active]) {
            $lezaz->set_msg('This user is not active','info');
        } else {
            $_SESSION['seassion_start'] = time();
            $_SESSION['MEMBER'] = &$memp;
            $lezaz->db->save('members', array('date1' => $_SESSION['seassion_start']), 'id=' . $_SESSION['MEMBER']['id'], 1);
           // $_SESSION['member_permission'] = getResults("select * from `memb_perm` where user_id=$memp[id]");
           $_SESSION['member_permission'] = 'yes';
            $lezaz->go(SITE_LINK . 'admin/');
        }
    } else {
            $lezaz->set_msg('Login information Error','danger');
    }
}

