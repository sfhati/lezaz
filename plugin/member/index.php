<?php

if (!defined('YOUCANINCLUDE'))
    exit('No direct script access allowed');



$lezaz->router('logout', function() use ($lezaz){
$_SESSION['member_permission'] = 'no';
    session_unset();
    session_destroy();
$lezaz->go(SITE_LINK);
        });
