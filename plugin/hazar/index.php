<?php

function conv_date($d) {
    $dd = explode('-', $d);
    return "$dd[1] $dd[0] $dd[2]";
}

$lezaz->listen('insert.planning', function($id, $data) use ($lezaz) {
    foreach ($data[id_objective] as $k => $v) {
        $obj.="$k=>$v";
    }
    //insert alert 
    //insert msg
    //update objective
    $lezaz->set_msg("planning $id insert this data <br>" . $obj, 'info');
});


if ($lezaz->get('id_hazar_level1'))
    $lezaz->set("_VAL_id_hazar_level1", $lezaz->get('id_hazar_level1'));
if ($lezaz->get('id_hazar_level2'))
    $lezaz->set("_VAL_id_hazar_level2", $lezaz->get('id_hazar_level2'));
if ($lezaz->get('id_objective'))
    $lezaz->set("_VAL_id_objective", $lezaz->get('id_objective'));


if ($_POST['bassam1'] == 'essa1') {
    $lezaz->db->execute('TRUNCATE `measures`;');
    foreach ($_POST['potential'] as $k => $v) {
        $where = $k;
        $data_inserto['responsibillity'] = $v[0];
        $data_inserto['l_responsibillity'] = $_POST['fieldl'][$k][0];
        $data_inserto['c_responsibillity'] = $_POST['fieldc'][$k][0];
        $nid = $lezaz->db->save('potential', $data_inserto, "id=$k", 1);
        $potential = &$_POST['sort'][$k];
        if (is_array($potential))
            foreach ($potential as $k1 => $v1) {
                $data_insertox1['id_potential'] = $k;
                $data_insertox1['measures'] = $_POST['measures'][$k][$k1];
                $data_insertox1['sort'] = trim(preg_replace('/\s\s+/', '', $v1));
                $lezaz->db->save('measures', $data_insertox1);
            }
    }
}

if ($_POST['bassam'] == 'essa') {
    $lezaz->db->execute('TRUNCATE `jobs`;TRUNCATE `potential`;');

    foreach ($_POST['jobs'] as $k => $v) {
        if ($v) {
            $data_inserto[job] = $v;
            $data_inserto[sort] = $_POST['sort'][$k];

            $nid = $lezaz->db->save('jobs', $data_inserto);
            $potential = &$_POST['potential'][$k];
            if (is_array($potential))
                foreach ($potential as $k1 => $v1) {
                    if ($v1 && $nid) {
                        $data_insertox1['id_job'] = $nid;
                        $data_insertox1['potential'] = $v1;
                        $data_insertox1['l'] = $_POST['fieldl'][$k][$k1];
                        $data_insertox1['c'] = $_POST['fieldc'][$k][$k1];

                        $data_insertox1['sort'] = trim(preg_replace('/\s\s+/', '', $_POST['sortx'][$k][$k1]));
                        $lezaz->db->save('potential', $data_insertox1);
                    }
                }
        }
    }
    $lezaz->set_msg("[your Table1 add successfully]", 'success');
}