<?php
    if ($_SESSION['member_permission'] != 'yes') {
        $lezaz->main_template = 'login';
    }
