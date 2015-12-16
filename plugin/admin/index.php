<?php
 $lezaz->router(array('/admin/@*','admin'), function() use ($lezaz){
            $lezaz->main_template = '{template}admin/index';
        });

 $lezaz->router('/admin/@str', function($b){
           
        });