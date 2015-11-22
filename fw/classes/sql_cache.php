<?php

/* * *******************cache sql result**************************************** */
/*
 * For while result
  $res =getResults(sql);
  if(is_array($res)) foreach ($res as  $row) {

  for get last record
  $res = @end(getResults(sql));

 */

function getResults($query, $cacheTime = 0) {
    if (!$cacheTime)
        $cacheTime = SQL_CACHE;
    if (SQL_CACHE != 0) {
        clear_sqlcache();
        // $query: mysql query word  $cacheTime: seconds
        $cachefile = CACHE_PATH . 'cacheSQLfile_' . $cacheTime . '_' . md5($query);
        if (file_exists($cachefile) && !is_root()) {
            if ((time() - $cacheTime) < filemtime($cachefile)) {
                return unserialize(decrypt_sfhti(file_get_contents($cachefile)));
            }
        }
    }
// execute query select sql
    global $_DB;
   // $_DB->properties();
    $rs = $_DB->query($query);
   // var_dump($rs->fetch(PDO::FETCH_OBJ));
    
    $D = 0;
    if(is_array($rs))
        foreach ($rs as $row) {
        $D++;
        foreach ($row as $k => $v) {
            $returntext[$D][$k] = $v;
        }
    }
    // if not cache use 
    if (SQL_CACHE == 0) {
        return $returntext;
    }

    // useing cache so create file with result sql query
    if (CRYPT_CACHE) {
        $returntextx1 = encrypt_sfhti(serialize($returntext));
    } else {
        $returntextx1 = serialize($returntext);
    }
    //("SELECT UPDATE_TIME FROM   information_schema.tables WHERE  TABLE_SCHEMA = 'dbname' AND TABLE_NAME = 'tabname'");

    $rs = null;
    filewrite($cachefile, $returntextx1);
    return $returntext;
}

function clear_sqlcache() {
    if ($dh = opendir(CACHE_PATH)) {
        while (($file = readdir($dh)) !== false) {
            if (strpos($file, 'SQLfile_')) {
                $time_cache = explode('_', $file);
                $time_cache = $time_cache[1];
                if ((time() - $time_cache) > filemtime(CACHE_PATH . $file)) {
                    @unlink(CACHE_PATH . $file);
                }
            }
        }
        closedir($dh);
    }
}
