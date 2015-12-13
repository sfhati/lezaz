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

    /** Variable $con, object connection to database. */
    private $con;

    /** Variable $err_msg, always empty if not have errors. */
    private $err_msg = "";

    public function __construct() {
        try {
            switch (db_type) {
                case "mssql":
                    $this->con = new PDO("mssql:host=" . db_host . ";dbname=" . db_name, db_user, db_pass);
                    break;
                case "sqlsrv":
                    $this->con = new PDO("sqlsrv:server=" . db_host . ";database=" . db_name, db_user, db_pass);
                    break;
                case "ibm": //default port = ?
                    $this->con = new PDO("ibm:DRIVER={IBM DB2 ODBC DRIVER};DATABASE=" . db_name . "; HOSTNAME=" . db_host . ";PORT=" . db_port . ";PROTOCOL=TCPIP;", db_user, db_pass);
                    break;
                case "dblib": //default port = 10060
                    $this->con = new PDO("dblib:host=" . db_host . ":" . db_port . ";dbname=" . db_name, db_user, db_pass);
                    break;
                case "odbc":
                    $this->con = new PDO("odbc:Driver={Microsoft Access Driver (*.mdb)};Dbq=C:\accounts.mdb;Uid=" . db_user);
                    break;
                case "oracle":
                    $this->con = new PDO("OCI:dbname=" . db_name . ";charset=UTF-8", db_user, db_pass);
                    break;
                case "ifmx":
                    $this->con = new PDO("informix:DSN=InformixDB", db_user, db_pass);
                    break;
                case "fbd":
                    $this->con = new PDO("firebird:dbname=" . db_host . ":" . db_name, db_user, db_pass);
                    break;
                case "mysql":
                    $this->con = (is_numeric(db_port)) ? new PDO("mysql:host=" . db_host . ";port=" . db_port . ";dbname=" . db_name, db_user, db_pass) : new PDO("mysql:host=" . db_host . ";dbname=" . db_name, db_user, db_pass);
                    break;
                case "sqlite2": //ej: "sqlite:/path/to/database.sdb"
                    $this->con = new PDO("sqlite:" . db_host);
                    break;
                case "sqlite3":
                    $this->con = new PDO("sqlite::memory");
                    break;
                case "pg":
                    $this->con = (is_numeric(db_port)) ? new PDO("pgsql:dbname=" . db_name . ";port=" . db_port . ";host=" . db_host, db_user, db_pass) : new PDO("pgsql:dbname=" . db_name . ";host=" . db_host, db_user, db_pass);
                    break;
                default:
                    $this->con = null;
                    break;
            }

            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // $this->err_msg = "Error: " . $e->getMessage();
            die("Error: " . $e->getMessage());
        }
        return false;
    }

    /**
     * @brief transaction, execute the transactional operations.
     * @param string $type shortcut for trasaction to execute. i.e: B=begin, C=commit & R=rollback. */
    public function transaction($type) {
        if ($type == "B")
            $this->con->beginTransaction();
        elseif ($type == "C")
            $this->con->commit();
        elseif ($type == "R")
            $this->con->rollBack();
        else
            return false;
    }

    private function insert($table, $data) {
        $this->con->exec("INSERT INTO " . $table . " SET $data;");
        return $this->con->lastInsertId();
    }

    private function update($table, $data, $condition = "") {
        return (trim($condition) != "") ? $this->con->exec("UPDATE " . $table . " SET " . $data . " WHERE " . $condition . ";") : $this->con->exec("UPDATE " . $table . " SET " . $data . ";");
    }

    private function _delete($table, $condition = "") {
        return (trim($condition) != "") ? $this->con->exec("DELETE FROM " . $table . " WHERE " . $condition . ";") : $this->con->exec("DELETE FROM " . $table . ";");
    }

    /**
     * @brief execute, this method is special for execute store procedures.
     * @param string $sp_query is the sp to execute. */
    public function execute($sp_query) {
        return $this->con->exec($sp_query);
    }

    /**
     * @brief ShowTables, for retrieve all tables in the database.
     * @param string $database must specify database for get tables.
     * @return object with the result set with table names in the database. */
    public function ShowTables() {
        $dbtype = db_name_type;

        if ($dbtype == "sqlsrv" || $dbtype == "mssql" || $dbtype == "ibm" || $dbtype == "dblib" || $dbtype == "odbc" || $dbtype == "sqlite2" || $dbtype == "sqlite3") {
            $sql_statement = "SELECT name FROM sysobjects WHERE xtype='U';";
        } elseif ($dbtype == "oracle") {
            //If the query statement fail, try with uncomment the next line:
            //$sql_statement = "SELECT table_name FROM tabs;";
            $sql_statement = "SELECT table_name FROM cat;";
        } elseif ($dbtype == "ifmx" || $dbtype == "fbd") {
            $sql_statement = 'SELECT RDB$RELATION_NAME FROM RDB$RELATIONS WHERE RDB$SYSTEM_FLAG = 0 AND RDB$VIEW_BLR IS NULL ORDER BY RDB$RELATION_NAME;';
        } elseif ($dbtype == "mysql") {
            $sql_statement = "SHOW tables;";
        } elseif ($dbtype == "pg") {
            $sql_statement = "SELECT relname AS name FROM pg_stat_user_tables ORDER BY relname;";
        }
        return $this->con->query($sql_statement);
    }

    /**
     * @brief disconnect, ends your connection, never forget this method for server performance. */
    public function disconnect() {
        $this->con = null;
    }

    function query($query, $cacheTime = 0) {
        global $lezaz;
        if (!$query)
            return '';
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
        $D = 0;
        $dd = $this->con->query($query);
        while ($row = $dd->fetch(PDO::FETCH_ASSOC)) {
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

    function num_row($query) {
        if (!$query)
            return 0;
        $result = $this->con->query($query);
        if ($result->rowCount() > 0 && !empty($result))
            return $result->rowCount();
        return 0;
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

    function row($table, $condetion, $row = '*') {
        if (is_numeric($condetion))
            $condetion = 'id=' . $id;
        $sql = $this->query("select $row from `$table` where $condetion limit 1 ");
        $sql = &$sql[1];
        if ($row != '*')
            return $sql[$row];
        return $sql;
    }

    function save($table, $feilds, $condetion = '', $type = 0) {
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
            return $this->update($table, $syntax_sql, $condetion);
        return $this->insert($table, $syntax_sql);
    }

    function delete($table, $condetion) {
        if (is_numeric($condetion))
            $condetion = 'id=' . $id;
        $return = $this->query("select * from $table1 where $condetion");
        $this->_delete($table, $condetion);
        return $return;
    }

}
