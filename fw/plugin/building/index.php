<?php

if (!defined('YOUCANINCLUDE'))
    exit('No direct script access allowed');
$contract_method_12='[annual]';
$contract_method_6='[midterm]';
$contract_method_4='[Quarterly]';
$contract_method_1='[monthly]';
$contract_method_3='[three months]';


// save map art for floor 
if(isset($sendmapart)){
if($sendmapart && $idfloor){
     $data_insert[map]=$sendmapart;
    save_db('floor', $data_insert," `id`='$idfloor'",1);
   $officespath=  explode('||', $officespath);
   foreach($officespath as $office){
       $office=explode('|', $office);
     $data_inserto[style]=$office[1];
    save_db('office', $data_inserto," `id`='$office[0]'",1);
       
       
       
   }
    echo CHNG_LANGUAGE("<script>window.top.window.msgsuccess('[your Table1 add successfully]');</script>");
   
} 

 exit();
}
if($changepaystatus){
    $status = check_db ('pyment', " `id`='$changepaystatus'",'status');
    if($status==1){
        $status=0;
    }else
    if($status==0 || $status==2) $status=1;
    $data_insert[status]=$status;
    save_db('pyment', $data_insert," `id`='$changepaystatus'",1);
    echo $status;
    exit();
}
function create_contract($id) {
    $contract = check_db('contract', " `id`='$id'");

    $payment_no = $contract['method'] / $contract['cycle'];
    $payment_no = number_format((float) $payment_no, 0, '.', '');
    $payment_value = ($contract['value'] - $contract['first_pymant']) / $contract['cycle'];
    $payment_value = number_format((float) $payment_value, 2, '.', '');
    $pay = $contract['cycle'] + 1;


//save first pymant    
    $data_insert['value'] = $contract['first_pymant'];
    $data_insert['date'] = $contract['stast_date'];
    $data_insert['pay_method'] = $contract['pay_method'];
    $data_insert['status'] = 1;
    $data_insert['comment'] = $contract['comment'];
    $data_insert['id_contract'] = $contract['id'];
    save_db('pyment', $data_insert);

// new value for other payment
    $data_insert['value'] = $payment_value;
    $data_insert['pay_method'] = '';
    $data_insert['status'] = 0;
    $data_insert['comment'] = '';

// create other payment
    for ($a = 1; $a < $pay; $a++) {
        $dc = $payment_no * $a;
        $data_insert['date'] = date('d-m-Y', strtotime("+$dc months", strtotime($contract[stast_date])));
        save_db('pyment', $data_insert);
    }
}

$activeecho_0 = 'Not Active';
$activeecho_1 = 'Active';

$rand = rand(100, 2999);

////////////////////////////////////////building ///////////////////////////////////////////////////////////////
if ($deletebuilding) {
    delete_id('building', $deletebuilding);
    delete_db('owner_building', "id_building=$deletebuilding");
    $floor = getResults("select * from `floor` where building_id=$deletebuilding");
    foreach ($floor as $k) {
        delete_db('office', "id_floor=$k[id]");
    }
    delete_db('floor', "building_id=$deletebuilding");
    exit();
}

// edit builing 
if ($editbuilding && is_root()) {
    $memp = check_db('building', " `id`='$editbuilding'");
    if ($memp[id] == $editbuilding) {
        $_VAL_building_type = $memp[type];
        $_VAL_building_elevators_no = $memp[elevators_no];
        $_VAL_building_city = $memp[city];
        $_VAL_building_area = $memp[area];
        $_VAL_building_street = $memp[street];
        $_VAL_building_no = $memp[no];
        $_VAL_building_basin_no = $memp[basin_no];
        $_VAL_building_land_no = $memp[land_no];
        $_VAL_building_nuilding_name = $memp[nuilding_name];
        $_VAL_editbuildingid = $editbuilding;
        $ownerdata = getResults('select id_owner from owner_building where id_building=' . $editbuilding);
        if (is_array($ownerdata))
            foreach ($ownerdata as $k)
                $_VAL_ownerdata[$k[id_owner]] = $k[id_owner];
    } else {
        echo CHNG_LANGUAGE("<script>window.top.window.msgerror('building not found!');window.top.window.locationset('managment_buildings')</script>");
        exit();
    }
}

// add new building or update exist !
if ($buidingsubmit) {
    if ($editbuildingid) { // update
        $cond = "id = $editbuildingid";
        $ty = 1;
        // delete all floors & offices and relation owner and add it agein!
        delete_db('owner_building', "id_building=$editbuildingid");
        $floor = getResults("select * from `floor` where building_id=$editbuildingid");
        foreach ($floor as $k) {
            delete_db('office', "id_floor=$k[id]");
        }
        delete_db('floor', "building_id=$editbuildingid");
    } else {
        $options = '';
        $cond = '';
        $ty = 0;
    }


    if ($_FILES[file2][name]) {
        $filename = save_file($_FILES[file2], 'buildings', array('type' => 'img', 'size' => '500'));
        if ($filename) {
            $data_insert['string10'] = $filename;
        } else {
            $xsuccess = 1;
        }
    }


    $data_insert['type'] = $building_type;
    $data_insert['elevators_no'] = $building_elevators_no;
    $data_insert['city'] = $building_city;
    $data_insert['area'] = $building_area;
    $data_insert['street'] = $building_street;
    $data_insert['no'] = $building_no;
    $data_insert['basin_no'] = $building_basin_no;
    $data_insert['land_no'] = $building_land_no;
    $data_insert['nuilding_name'] = $building_nuilding_name;
    $data_insert['update'] = time();
    $buildin_id = save_db('building', $data_insert, $cond, $ty);
    if ($editbuildingid)
        $buildin_id = $editbuildingid;
    //connect owner_building id_building id_owner from ownerdata
    foreach ($ownerdata as $owner) {
        $data_ob['id_owner'] = $owner;
        $data_ob['id_building'] = $buildin_id;
        save_db('owner_building', $data_ob);
    }
    // save floors and offices 
    // [floorsdata] => 1;id,1,|2,1,|3,2,101;13-|4,2,201;3-202;3-|5,2,301;4-302;5-303;3-|6,4,|
    $floors = explode('|', $floorsdata);
    foreach ($floors as $floor) {
        $floor = explode(',', $floor);
        $floorid = explode(';', $floor[0]);
        $floor[0] = $floorid[0];
        $floorid = $floorid[1];
        $data_floor = '';
        if ($floor[1]) { // save floor in data base
            $data_floor['sort'] = $floor[0];
            $data_floor['type'] = $floor[1];
            $data_floor['building_id'] = $buildin_id;
            if ($editbuildingid && is_numeric($floorid)) {
                $data_floor['id'] = $floorid;
            }


            $id_floor = save_db('floor', $data_floor);
            if ($editbuildingid && is_numeric($floorid))
                $id_floor = $floorid;
            if ($id_floor && $floor[2]) {
                $offices = explode('-', $floor[2]);
                foreach ($offices as $office) {
                    $data_office = '';
                    $office = explode(';', $office);
                    if ($office[0] && $office[1]) { // save office in database                                
                        $data_office['office_no'] = $office[0];
                        $data_office['office_room'] = $office[1];
                        $data_office['area'] = $office[2];
                        $data_office['id_floor'] = $id_floor;
                        $officeid = $office[3];
                        if ($editbuildingid && is_numeric($officeid)) {
                            $data_office['id'] = $officeid;
                        }

                        save_db('office', $data_office);
                    }
                }
            }
        }
    }
    echo CHNG_LANGUAGE("<script>window.top.window.msgsuccess('[your building add successfully]');$notsuccess;window.top.window.locationset('managment_buildings')</script>");

    exit();
}






////////////////// for any table ///////////////////////////////////

if ($editTable1 && $tablename && is_root()) {
    if ($use_language)
        $tablename_language = $tablename . '_' . $_SESSION['lng_CH'];
    else
        $tablename_language = $tablename;
    $memp = check_db($tablename_language, " `id`='$editTable1'");
    if ($memp[id] == $editTable1) {
        foreach ($memp as $k => $v) {
            $newv = '_VAL_' . $tablename . '_' . $k;
            $$newv = $v;
        }
    } else {
        echo CHNG_LANGUAGE("<script>window.top.window.msgerror('[record not found]!');window.top.window.locationset('" . $redirect_page . "')</script>");
        exit();
    }
}

if ($submit_Table1 && $tablename == 'contract') { // contract Validation!
    if ($contract_cycle > $contract_method) {
        $msgerr = '[max payment ERR]<br>';
    }
    if ($contract_first_pymant > $contract_value) {
        $msgerr.='[first pament ERR]<br>';
    }
    if(!$contract_stast_date)$msgerr.='[start contract date]: [ERR_required]<br>';
    if(!$contract_first_pymant)$msgerr.='[first_pymant]: [ERR_required]<br>';
    if(!is_numeric($contract_first_pymant))$msgerr.='[first_pymant]: [ERR_number]<br>';

    if ($msgerr) {
        echo CHNG_LANGUAGE("<script>window.top.window.msgerror('$msgerr');</script>");
        exit();
    }else{ // archives old contract
         $data_insert = check_db('contract', " `id_office`='$contract_id_office'");   
         unset($data_insert[id]);
         save_db('contract_archives', $data_insert);
         delete_db('contract', " `id_office`='$contract_id_office'");         
    }
    
}
if ($submit_Table1 && $tablename == 'maintenance') { // contract Validation!
    if(!$maintenance_date)$msgerr='[maintenance date]: [ERR_required]<br>';
    if(!$maintenance_company)$msgerr='[maintenance company]: [ERR_required]<br>';
    if(!$maintenance_value)$msgerr.='[maintenance value]: [ERR_required]<br>';
    if(!is_numeric($maintenance_value))$msgerr.='[maintenance value]: [ERR_number]<br>';

    if ($msgerr) {
        echo CHNG_LANGUAGE("<script>window.top.window.msgerror('$msgerr');</script>");
        exit();
    }    
}




if ($submit_Table1) {




    if ($use_language)
        $tablename_language = $tablename . '_' . $_SESSION['lng_CH'];
    else
        $tablename_language = $tablename;
    $editTable1id = $tablename . '_id';
    $editTable1id = $$editTable1id;
    if ($editTable1id) {
        $cond = "id = $editTable1id";
        $ty = 1;
    } else {
        $options = '';
        $cond = '';
        $ty = 0;
    }

    $COLUMN = getResults("select COLUMN_NAME from information_schema.COLUMNS where TABLE_NAME = '$tablename_language'");
    foreach ($COLUMN as $k) {
        $newfield1 = $tablename . '_' . $k[COLUMN_NAME];
        $newfield = $$newfield1;
        if (isset($_POST[$newfield1]))
            $data_insert[$k[COLUMN_NAME]] = $newfield;
    }
    if ($_FILES[image][name]) {
        $filename = save_file($_FILES[image], $tablename, array('type' => 'img', 'size' => '500'));
        if ($filename) {
            $data_insert['image'] = $filename;
        } else {
            $xsuccess = 1;
        }
    }



    $idimg = save_db($tablename_language, $data_insert, $cond, $ty);
    if ($editTable1id)
        $idimg = $editTable1id;
//Loop through each file
    $saveto = UPLOADED_PATH . $tablename . '/' . $idimg . '/';
    for ($i = 0; $i < count($_FILES['multiple_image']['name']); $i++) {
        $ext = end(explode('.', $_FILES['multiple_image'][name][$i]));
        make_path($saveto);
        $fn = time() . rand(1000, 10000) . '.' . $ext;
        copy($_FILES['multiple_image'][tmp_name][$i], $saveto . $fn);
    }

    if ($redirect_page)
        $redirect_page = "window.top.window.locationset('" . $redirect_page . "');";

    if ($tablename == 'contract' || $tablename == 'maintenance' ) { // create contract 
        create_contract($idimg);
        $redirect_page = "window.top.window.savecontractdone();";
    }



    echo CHNG_LANGUAGE("<script>window.top.window.msgsuccess('[your Table1 add successfully]$notsuccess');$redirect_page</script>");
    exit();
}

if ($delete_t && $delete_id && is_root()) {
    delete_id($delete_t, $delete_id);
    exit();
}

//deletefolder=projectSLASH[var:"editTable1-var"end var]&deletefile
if ($deletefolder && $deletefile && is_root()) {
    $deletefolder = str_replace('SLASH', '/', $deletefolder);
    unlink(UPLOADED_PATH . $deletefolder . '/' . $deletefile);
    exit();
}
///////////////////////////// send email ////////////////////////////////////////////
if ($subject && $name && $email && $message) {
    $toemail = get_cache('site_email');
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\n";
    $headers .= "To: $toemail <$toemail>\r\n";
    $headers .= "From: " . $name . " <" . $email . ">\r\n";

    mail($toemail, $subject, $message, $headers);

    $success_message = '1';
}