<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of __db
 *
 * @author bassam
 */
class __db {

    function query($query, $cacheTime = 0) {
        global $lezaz;
        global $_DB;
        
        if (!$cacheTime)
            $cacheTime = SQL_CACHE;
        if (SQL_CACHE != 0) {
            $this->clear_cache();
            // $query: mysql query word  $cacheTime: seconds
            $cachefile = CACHE_PATH . 'cacheSQLfile_' . $cacheTime . '_' . md5($query);
            if (file_exists($cachefile)) {
                if ((time() - $cacheTime) < filemtime($cachefile)) {
                    return unserialize($lezaz->decrypt(file_get_contents($cachefile)));
                }
            }
        }
// execute query select sql
        
        // $_DB->properties();
        $rs = $_DB->query($query);
        // var_dump($rs->fetch(PDO::FETCH_OBJ));

        $D = 0;
        if (is_array($rs))
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

        $returntextx1 = $lezaz->encrypt(serialize($returntext));
        //("SELECT UPDATE_TIME FROM   information_schema.tables WHERE  TABLE_SCHEMA = 'dbname' AND TABLE_NAME = 'tabname'");

        $rs = null;
        $lezaz->file->write($cachefile, $returntextx1);
        return $returntext;
    }

    function clear_cache() {
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

    function check_db($table, $condetion = '1=1', $f = '') {
        $sql = getResults("select * from `$table` where $condetion limit 1 ");
        $sql = &$sql[1];
        if (!$sql[id])
            return false;
        if ($f)
            return $sql[$f];
        return $sql;
    }

    function get_row($table, $id, $row) {
        $sql = getResults("select $row from `$table` where id=$id limit 1 ");
        $sql = &$sql[1];
        return $sql[$row];
    }

    function save_db($table, $feilds, $condetion = '', $type = 0) {
        global $_DB;
        $syntax_sql = '';

        foreach ($feilds as $key => $val) {
            $val = addslashes($val);
            if ($syntax_sql)
                $syntax_sql.=' , ';
            $syntax_sql.= "`$key` = '$val' ";
        }

        /*  $column_array = $_DB->columns($table);

          if ($column_array != false) {
          foreach ($feilds as $key => $val) {
          if (in_array($key, $column_array)) {
          if ($syntax_sql)
          $syntax_sql.=' , ';
          $syntax_sql.= "`$key` = '$val' ";
          }
          }
          }else {
          return $_DB->getError();
          } */

        if ($type)
            return $_DB->update($table, $syntax_sql, $condetion);
        return $_DB->insert($table, $syntax_sql);
    }

    function delete_db($table, $condetion) {
        global $_DB;
        return $_DB->delete($table, $condetion);
    }

    function delete_id($table, $id) {
        global $_DB;
        if (is_numeric($id)) {
            $condetion = 'id=' . $id;
            return $_DB->delete($table, $condetion);
        }
        return '';
    }

}
