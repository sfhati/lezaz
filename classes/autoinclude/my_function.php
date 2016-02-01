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

function alert($description,$type,$url,$date,$user){
    global $lezaz;
    $data_insertox1['description'] = $description;
    $data_insertox1['type'] = $type;
    $data_insertox1['status'] = 0;
    $data_insertox1['url'] = $url;
    $data_insertox1['date'] = $date;
    $data_insertox1['user'] = $user;
    $lezaz->db->save('alert', $data_insertox1);    
}