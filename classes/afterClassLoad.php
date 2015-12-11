<?php
print_r($_SERVER); exit();

/* * ********************************filter request vars****************************************** */
foreach ($_REQUEST as $KEy => $VAl) {
    if (is_array($_REQUEST[$KEy])) {
        foreach ($_REQUEST[$KEy] as $KEy1 => $VAl1) {
            if (is_array($$KEy)) {
                if (IS_ADMIN)
                    $$KEy = array_merge($$KEy, array($KEy1 => ($VAl1)));
                else
                    $$KEy = array_merge($$KEy, array($KEy1 => filter_vars($VAl1)));
            } else {
                if (IS_ADMIN)
                    $$KEy = array($KEy1 => ($VAl1));
                else
                    $$KEy = array($KEy1 => filter_vars($VAl1));
            }
        }
    } else {
        if (IS_ADMIN)
            $$KEy = ($VAl);
        else
            $$KEy = filter_vars($VAl);
    }
}

/* * *************Visitors Number****************************** */
$client_addr = filter_var((!empty($_SERVER['HTTP_CLIENT_IP'])) ? $_SERVER['HTTP_CLIENT_IP'] :
                (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR'] :
                        (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : 'UNKNOWN', FILTER_SANITIZE_STRING);

if (!$_SESSION['yesyouareanewvisitor']) {
    $_SESSION['yesyouareanewvisitor'] = 1;
    $fileVisitors = CACHE_PATH . 'Visitors' . date('d_m_Y', time()) . '.x';
    $country = file_get_contents(Main_Domain . '?checkip=' . $client_addr);
    $thisVisitor = time() . ';' . $client_addr . ';' . $country . "\n";
    //save a new visits
    $handle = fopen($fileVisitors, 'a');
    fwrite($handle, $thisVisitor);
    fclose($handle);
}








/* * ********Connebt to mysql database************************ */

$_DB = new wArLeY_DBMS(db_type, db_host, db_name, db_user, db_pass, "");
$dbCN = $_DB->Cnxn(); //This step is really neccesary for create connection to database, and getting the errors in methods. 
if ($dbCN == false)
    die("Error: Cant connect to database.");
echo $_DB->getError(); //Show error description if exist, else is empty. 

  
/* complete conf language, site title and site email */
$_SESSION['lng_CH'] = get_cache('language');
if(!$_SESSION['lng_CH']) $_SESSION['lng_CH']='en';


define('SITE_NAME', get_cache('title'));
if (get_cache('site_email'))
    define('SITE_EMAIL', get_cache('site_email'));

if (!$_GET[id]) {
    $_REQUEST[id] = get_cache('home_page');
    $_GET[id] = get_cache('home_page');
    $id = get_cache('home_page');
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    define('IS_POST', 1);
} else {
    define('IS_POST', 0);
}


// for cache files

