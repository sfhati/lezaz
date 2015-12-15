<?php
 $lezaz->router('/admin/@*', function($b) use ($lezaz){
            $lezaz->main_template = '{template}admin/index';
        });

 $lezaz->router('/admin/@str', function($b){
            echo 'HI'.$b;
        });