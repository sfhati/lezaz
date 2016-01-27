<?php

function is_root(){
    if($_SESSION['member_information']['user_type']==1) return true;
    return false;
}

function is_editor(){
    if($_SESSION['member_information']['user_type']==2) return true;
    return false;
}

function is_department(){
    if($_SESSION['member_information']['user_type']==3) return true;
    return false;
}
