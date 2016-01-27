<?php

if (!defined('YOUCANINCLUDE'))
    exit('No direct script access allowed');



$lezaz->router('logout', function() use ($lezaz) {
    $_SESSION['member_permission'] = 'no';
    session_unset();
    session_destroy();
    $lezaz->go(SITE_LINK);
});

if(isset($_POST['login'])){
    $user_information=$lezaz->db->row('members', 'username="'.$lezaz->post('usernamex').'" and userpassword="'.$lezaz->post('userpasswordx').'"'); 
    if(is_array($user_information)){
        if($user_information[username]==$lezaz->post('usernamex') && $user_information[userpassword]==$lezaz->post('userpasswordx') ){
            $_SESSION['member_permission'] = 'yes';
            $_SESSION['member_information'] =&$user_information;
            $lezaz->go();
        }
    }
    $lezaz->set_msg('[Error user name or password]','warning');
}