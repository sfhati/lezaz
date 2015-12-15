<?php

echo $_SESSION['LEZAZ_start'];
$lezaz->listen('requset.start', function() use($lezaz) {
    //  echo "requset.start";
    //    $lezaz->go($lezaz->address(),'html:15');
});


$lezaz->listen('session.start', function() use($lezaz) {
    echo 'Please wait!';
    $lezaz->go($lezaz->address());
    exit();
});


$lezaz->listen('new.guset', function() use($lezaz) {

    $client_addr = filter_var((!empty($_SERVER['HTTP_CLIENT_IP'])) ? $_SERVER['HTTP_CLIENT_IP'] :
                    (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR'] :
                            (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : 'UNKNOWN', FILTER_SANITIZE_STRING);

    $fileVisitors = CACHE_PATH . 'Visitors' . date('d_m_Y', time()) . '.x';
    $country = file_get_contents(Main_Domain . '?checkip=' . $client_addr);
    $thisVisitor = time() . ';' . $client_addr . ';' . $country . "\n";
    //save a new visits
    $handle = fopen($fileVisitors, 'a');
    fwrite($handle, $thisVisitor);
    fclose($handle);
});

