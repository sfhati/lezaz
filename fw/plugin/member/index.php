<?php

if (!defined('YOUCANINCLUDE'))
    exit('No direct script access allowed');


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
if ($submit_lgn) {
    $_SESSION['seassion_start'] = '';
    $_SESSION['MEMBER'] = '';
    $_SESSION['member_permission'] = '';
    $memp = check_db('members', " (`name`='$user' or email='$user') and `pass`='$pass'");
    if ($memp[name] == $user) {

        if (!$memp[active]) {
            set_msg('This user is not active');
        } else {
            $_SESSION['seassion_start'] = time();
            $_SESSION['MEMBER'] = &$memp;
            save_db('members', array('date1' => $_SESSION['seassion_start']), 'id=' . member_info('id'), 1);
            $_SESSION['member_permission'] = getResults("select * from `memb_perm` where user_id=$memp[id]");
            redirect(SITE_LINK . 'admin/');
        }
    } else {
            set_msg('Login information Error');
    }
}

if (member_info('id') && $out) {
    $_SESSION['seassion_start'] = '';
    $_SESSION['MEMBER'] = '';
    $_SESSION['member_permission'] = '';
    session_unset();
    session_destroy();
    redirect(SITE_LINK);
}