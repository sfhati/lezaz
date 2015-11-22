<?php

/* * http://www.phpclasses.org/package/6809-PHP-Access-different-types-of-SQL-database-using-PDO.html
 * *****************************************************
 * @file pdo_database.class.php
 * @brief PDO Database Class: Use this class to connect easily to multiple databases types.
 * @author Evert Ulises German Soto
 * @version 2.2.1
 * @date July 2012
 * ***************************************************** */


/**
 * *****************************************************
 * @file pdo_database.class_manual.php
 * @brief PDO Database Class Manual: This is a guide for learn to use pdo for connect easily to multiple databases types.
 * INTRODUCTION:
 * Why you Should be using PHP's PDO for Database Access...
 * PDO – PHP Data Objects, is a database access layer providing a uniform method of access to multiple databases.
 * It doesn’t account for database-specific syntax, but can allow for the process of switching databases and platforms to be fairly painless, simply by switching the connection string in many instances.
 *
 * DATABASES SUPPORT:
 * You need use this shortcuts for the database type:
 * sqlite2	-> SQLite2 - TESTED
 * sqlite3	-> SQLite3
 * sqlsrv 	-> Microsoft SQL Server (Works under Windows, accept all SQL Server versions [max version 2008]) - TESTED
 * mssql 	-> Microsoft SQL Server (Works under Windows and Linux, but just work with SQL Server 2000) - TESTED
 * mysql 	-> MySQL - TESTED
 * pg 		-> PostgreSQL - TESTED
 * ibm		-> IBM
 * dblib		-> DBLIB
 * odbc		-> Microsoft Access
 * oracle	-> ORACLE
 * ifmx 		-> Informix
 * fbd		-> Firebird - TESTED
 *
 * CHANGELOG:
 * v2.2: Added doxygen documentation for friendly use in the class file.
 * v2.1: Added transactional method, now you can feel the power and care for the integrity of your database with transactions.
 * v2.0: Optimized all class code, added unnamed placeholder option in query_secure(), added method properties() for get information about server and connection. Manual updated for provide more clearly examples.
 * v1.9: Added method for secure querys and avoid SQL Injections.
 * v1.8: Optimized methods update, delete and getLatestId. Methods update and delete allow empty conditions for several changes.
 * v1.7: Optimized method rowcount(), now build automatic query for count(*).
 * v1.6: Fix the error handler in the connection database, modified the constructor of the class. (Critical)
 * v1.5: Added 2 methods: 1.- ShowDBS and 2.- ShowTables, return databases existing on host, return all tables of database relatively.
 * v1.4: Added method getError(), this return error description if exist.
 * v1.3: Fix the "insert" operation works in any database.
 * v1.2: Added method getLatestId(table, id), return the latest id (primary key autoincrement).
 * v1.1: After insert, delete or update operations, the result is the affected rows.
 * v1.0: First version working.
 * @author Evert Ulises German Soto
 * @version 2.2
 * @date July 2012
 * ***************************************************** */
/**
 * *****************************************************
 * @brief How To Connect To Database.
 * ******************************************************
  ///1.- You need include the class file.
  require("pdo_database.class.php");

  ///2.- Instantiate the class with the server parameters.
  # object = new wArLeY_DBMS(shortcut_database_type, server, database_name, user, password, port);
  $db = new wArLeY_DBMS("mysql", "127.0.0.1", "test", "root", "", "");

  ///3.- Connect to database.
  $dbCN = $db->Cnxn(); //This step is really neccesary for create connection to database, and getting the errors in methods.

  ///4.- Check if connection are succesful or return error.
  if($dbCN==false) die("Error: Cant connect to database.");

  ///5.- If connection fail you can print the error... Note: Every operation you execute can try print this line, for get the latest error ocurred.
  echo $db->getError(); //Show error description if exist, else is empty.

  ///Extras: Information about server and connection only execute this:
  $db->properties();

  /**
 * *****************************************************
 * @brief How To Create Tables.
 * ******************************************************
  $db->query('DROP TABLE IF EXISTS TB_USERS;'); //drop table if exist
  # Instruction SQL in variable
  $query_create_table = <<< EOD
  CREATE TABLE TB_USERS (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  NAME VARCHAR(100) NOT NULL,
  ADDRESS VARCHAR(100) NOT NULL,
  COMPANY VARCHAR(100) NOT NULL
  );
  EOD;
  ///Execute the create table statement
  $db->query($query_create_table);
  ///Execute alter table statement
  $db->query("ALTER TABLE TB_USERS ADD SEX CHAR(1);");

  /**
 * *****************************************************
 * @brief How To Insert Rows.
 * ******************************************************
  ///Option 1:
  $result = $db->query("INSERT INTO TB_USERS (NAME, ADDRESS, COMPANY) VALUES ('Evert Ulises German', 'Internet #996 Culiacan Sinaloa', 'Freelancer');");
  # $result false if operation fail.

  ///Option 2: Method insert(table_name, data_to_insert[field=data]);
  $result = $db->insert("TB_USERS", "NAME='Evert Ulises German',ADDRESS='Tetameche #3035 Culiacan Sin. Mexico',COMPANY='Freelancer'");
  # $result have the inserted id or false if operation fail. IMPORTANT: For getting the currently id inserted is neccessary define the id field how primary key autoincrement.

  /**
 * *****************************************************
 * @brief How To Update Rows.
 * ******************************************************
  ///Option 1:
  $db->query("UPDATE TB_USERS SET NAME='wArLeY996',COMPANY='Freelancer MX' WHERE ID=1;");
  ///Option 2: Method update(table_name, set_new_data[field=data], condition_if_need_but_not_required);
  $getAffectedRows = $db->update("TB_USERS", "NAME='wArLeY996',COMPANY='Freelancer MX'", "ID=1"); //With Condition
  $getAffectedRows = $db->update("TB_USERS", "NAME='wArLeY996',COMPANY='Freelancer MX'"); //Without Condition (must be careful!)

  /**
 * *****************************************************
 * @brief How To Delete Rows.
 * ******************************************************
  ///Option 1:
  $result = $db->query("DELETE FROM TB_USERS WHERE ID=1;");
  # $result false if operation fail.
  ///Option 2: Method delete(table_name, condition_if_need_but_not_required);
  $getAffectedRows = $db->delete("TB_USERS", "ID=1"); //With Condition
  $getAffectedRows = $db->delete("TB_USERS"); //Without Condition (must be careful!)

  /**
 * *****************************************************
 * @brief How To Retrieve Result Set.
 * ******************************************************
  $rs = $db->query("SELECT NAME,ADDRESS FROM TB_USERS");
  foreach($rs as $row){
  $tmp_name = $row["NAME"];
  $tmp_address = $row["ADDRESS"];
  echo "The user $tmp_name lives in: $tmp_address";
  }

  /**
 * *****************************************************
 * @brief How To Get The Total Rows.
 * ******************************************************
  # Once that you have execute any query, you can get total rows.
  echo "Total rows: " . $db->rowcount() .

  /**
 * *****************************************************
 * @brief How To Get The Latest Id.
 * ******************************************************
  # getLatestId(table_name, field_id);
  $latestInserted = $db->getLatestId("TB_USERS","ID");
  //IMPORTANT: For getting the latest id inserted is neccessary define the id column how autoincrement.

  /**
 * *****************************************************
 * @brief How To Disconnect Database.
 * ******************************************************
  $db->disconnect();

  /**
 * *****************************************************
 * @brief How To Implement Transactions.
 * ******************************************************
  $db->transaction("B"); //Begin the Transaction
  $db->delete("TB_USERS", "ID=1");
  $db->delete("TB_USERS", "ID=2");
  $db->transaction("C"); //Commit and apply changes
  $db->transaction("R"); //Or you can Rollback and undo changes like Ctrl+Z

  /**
 * ------------------------------------------ SECURE METHODS PREVENT AND AVOID SQL INJECTIONS ---------------------------------------------------
 * METHOD: query_secure, "first_param": query statement, "second_param": array with params, "third_param": if you specify true, you can get the recordset, else you get true, "fourth_param": unnamed or named placeholders is your choice, "fifth_param": for change your delimiter.
 * Note: the third_param, fourth_param and fifth_param not are required, have a default values: false, false, "|" relatively.
 * IMPORTANT: the delimiter default is "|" (pipe), is neccessary change this delimiter if exist in your data.
 * ---------------------------------------------------------------------------------------------------------------------------------------------- */
/**
 * *****************************************************
 * @brief How To Retrieve Result Set.
 * ******************************************************
  ///Option 1: SELECT Statement With "NAMED PLACEHOLDERS":
  $params = array(":id|2|INT");
  $rows = $db->query_secure("SELECT NAME FROM TB_USERS WHERE ID=:id;", $params, true, false);
  if($rows!=false){
  foreach($rows as $row){
  echo "User: ". $row["NAME"] ."";
  }
  }
  $rows = null;
  ///Option 2: SELECT Statement With "UNNAMED PLACEHOLDERS":
  $params = array(2);
  $rows = $db->query_secure("SELECT NAME FROM TB_USERS WHERE ID=?;", $params, true, true);
  if($rows!=false){
  foreach($rows as $row){
  echo "User: ". $row["NAME"] ."";
  }
  }
  $rows = null;

  /**
 * *****************************************************
 * @brief How To Insert Rows.
 * ******************************************************
  ///Option 1: INSERT Row With "NAMED PLACEHOLDERS":
  $params = array(":id|2|INT", ":name|Amy Julyssa German|STR", ":address|Internet #996 Culiacan Sinaloa|STR", ":company|Nothing|STR");
  $result = $db->query_secure("INSERT INTO TB_USERS (ID,NAME,ADDRESS,COMPANY) VALUES(:id,:name,:address,:company);", $params, false, false);
  ///Option 2: INSERT Row With "UNNAMED PLACEHOLDERS":
  $params = array(2, "Amy Julyssa German", "Internet #996 Culiacan Sinaloa", "Nothing");
  $result = $db->query_secure("INSERT INTO TB_USERS (ID,NAME,ADDRESS,COMPANY) VALUES(?,?,?,?);", $params, false, true);

  /**
 * *****************************************************
 * @brief How To Update Rows.
 * ******************************************************
  ///Option 1: UPDATE Rows With "NAMED PLACEHOLDERS":
  $params = array(":id|2|INT", ":address|Internet #996 Culiacan, Sinaloa, Mexico|STR", ":company|Nothing!|STR");
  $result = $db->query_secure("UPDATE TB_USERS SET ADDRESS=:address,COMPANY=:company WHERE ID=:id;", $params, false, false);
  ///Option 2: UPDATE Rows With "UNNAMED PLACEHOLDERS":
  $params = array("Internet #996 Culiacan, Sinaloa, Mexico", "Nothing!", 2);
  $result = $db->query_secure("UPDATE TB_USERS SET ADDRESS=?,COMPANY=? WHERE ID=?;", $params, false, true);

  /**
 * *****************************************************
 * @brief How To Delete Rows.
 * ******************************************************
  ///Option 1: DELETE Rows With "NAMED PLACEHOLDERS":
  $params = array(":id|2|INT");
  $result = $db->query_secure("DELETE FROM TB_USERS WHERE ID=:id;", $params, false, false);
  ///Option 2: DELETE Rows With "UNNAMED PLACEHOLDERS":
  $params = array(2);
  $result = $db->query_secure("DELETE FROM TB_USERS WHERE ID=?;", $params, false, true);

  ///IMPORTANT: UPDATE and DELETE works fine but not return the affected rows, just return false if fails.
  echo "AFFECTEDS -> " . (($result===false) ? "NO... ".$db->getError() : "YES") . "";

  /**
 * *****************************************************
 * @brief How To Get All Databases.
 * ******************************************************
  $rs = $db->ShowDBS();  //Depending of your database type you can get results
  foreach($rs as $row){
  $tmp_table = $row[0];
  echo "Database named: $tmp_table";
  }

  /**
 * *****************************************************
 * @brief How To Get All Tables From Database.
 * ******************************************************
  $rs = $db->ShowTables("test");  //Depending of your database type you can specify the database
  foreach($rs as $row){
  $tmp_table = $row[0];
  echo "The table from database is: $tmp_table";
  }

  /**
 * *****************************************************
 * @brief How To Get Columns Name From Table.
 * ******************************************************
  $column_array = $db->columns("TB_USERS");
  if($column_array!=false){
  foreach($column_array as $column){
  echo "$column";
  }
  }else{
  echo $db->getError();
  }

  /**
 * *****************************************************
 * @brief How To Install Library "mssql" In Windows.
 * ***************************************************** */
# If "php_pdo_mssql" not is running... 
# Open path: "C:/xampp/php/ext/"
# Rename the file: php_pdo_mssql.dll to php_pdo_mssql_new.dll 
# Open php.ini file, add extension:
# extension=php_pdo_mssql_new.dll
# Copy dll file "ntwdblib.dll" in the extensions path with the same name: "php/ext/" and too in path "C:/windows/system32/"
# Restart webserver and try your connection

/**
 * *****************************************************
 * @brief How To Install Library "sqlsrv" In Windows.
 * ***************************************************** */
# If "php_pdo_sqlsrv" not is running... 
# Open php.ini file, add extension:
# extension=php_pdo_sqlsrv_53_ts_vc6.dll
# Copy dll file with the same name in the path: "php/ext/"
# Restart webserver and try your connection

class wArLeY_DBMS {

    /** Variable array $database_types with all database supported. */
    private $database_types = array("sqlite2", "sqlite3", "sqlsrv", "mssql", "mysql", "pg", "ibm", "dblib", "odbc", "oracle", "ifmx", "fbd");

    /** Variable $host, database server address. */
    private $host;

    /** Variable $database, database name. */
    private $database;

    /** Variable $user, database user. */
    private $user;

    /** Variable $password, database password. */
    private $password;

    /** Variable $port, database port only if really necessary. */
    private $port;

    /** Variable $database_type, important explicit type. */
    private $database_type;

    /** Variable $root_mbd, path to mdb file for MS Access databases. */
    private $root_mdb;

    /** Variable $sql, query string to execute. */
    private $sql;

    /** Variable $con, object connection to database. */
    private $con;

    /** Variable $err_msg, always empty if not have errors. */
    private $err_msg = "";

    /**
     * @brief Constructor, Initialize and connect to the database.
     * @param string $database_type the name of the database type.
     * @param string $host the host of the database.
     * @param string $database the name of the database.
     * @param string $user the name of the user for the database.
     * @param string $password the passord of the user for the database.
     * @param string $port the port of the database not necessary get default ports. */
    public function __construct($database_type, $host, $database, $user, $password, $port) {
        $this->database_type = strtolower($database_type);
        $this->host = $host;
        $this->database = $database;
        $this->user = $user;
        $this->password = $password;
        $this->port = $port;
    }

    /**
     * @brief Cnxn, connect to the database.
     * @return object $con the conecttion required by sql statements. */
    public function Cnxn() {
        if (in_array($this->database_type, $this->database_types)) {
            try {
                switch ($this->database_type) {
                    case "mssql":
                        $this->con = new PDO("mssql:host=" . $this->host . ";dbname=" . $this->database, $this->user, $this->password);
                        break;
                    case "sqlsrv":
                        $this->con = new PDO("sqlsrv:server=" . $this->host . ";database=" . $this->database, $this->user, $this->password);
                        break;
                    case "ibm": //default port = ?
                        $this->con = new PDO("ibm:DRIVER={IBM DB2 ODBC DRIVER};DATABASE=" . $this->database . "; HOSTNAME=" . $this->host . ";PORT=" . $this->port . ";PROTOCOL=TCPIP;", $this->user, $this->password);
                        break;
                    case "dblib": //default port = 10060
                        $this->con = new PDO("dblib:host=" . $this->host . ":" . $this->port . ";dbname=" . $this->database, $this->user, $this->password);
                        break;
                    case "odbc":
                        $this->con = new PDO("odbc:Driver={Microsoft Access Driver (*.mdb)};Dbq=C:\accounts.mdb;Uid=" . $this->user);
                        break;
                    case "oracle":
                        $this->con = new PDO("OCI:dbname=" . $this->database . ";charset=UTF-8", $this->user, $this->password);
                        break;
                    case "ifmx":
                        $this->con = new PDO("informix:DSN=InformixDB", $this->user, $this->password);
                        break;
                    case "fbd":
                        $this->con = new PDO("firebird:dbname=" . $this->host . ":" . $this->database, $this->user, $this->password);
                        break;
                    case "mysql":
                        $this->con = (is_numeric($this->port)) ? new PDO("mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->database, $this->user, $this->password) : new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->user, $this->password);
                        break;
                    case "sqlite2": //ej: "sqlite:/path/to/database.sdb"
                        $this->con = new PDO("sqlite:" . $this->host);
                        break;
                    case "sqlite3":
                        $this->con = new PDO("sqlite::memory");
                        break;
                    case "pg":
                        $this->con = (is_numeric($this->port)) ? new PDO("pgsql:dbname=" . $this->database . ";port=" . $this->port . ";host=" . $this->host, $this->user, $this->password) : new PDO("pgsql:dbname=" . $this->database . ";host=" . $this->host, $this->user, $this->password);
                        break;
                    default:
                        $this->con = null;
                        break;
                }

                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                //$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
                //$this->con->setAttribute(PDO::SQLSRV_ATTR_DIRECT_QUERY => true);

                return $this->con;
            } catch (PDOException $e) {
                $this->err_msg = "Error: " . $e->getMessage();
                return false;
            }
        } else {
            $this->err_msg = "Error: Error establishing a database connection (error in params or database not supported).";
            return false;
        }
    }

    /**
     * @brief properties, print connection properties. */
    public function properties() {
        echo "<span style='display:block;color:#267F00;background:#F4FFEF;border:2px solid #267F00;padding:2px 4px 2px 4px;margin-bottom:5px;'>";
        print_r("<b>DATABASE:</b>&nbsp;" . $this->con->getAttribute(PDO::ATTR_DRIVER_NAME) . "&nbsp;" . $this->con->getAttribute(PDO::ATTR_SERVER_VERSION) . "<br/>");
        print_r("<b>STATUS:</b>&nbsp;" . $this->con->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "<br/>");
        print_r("<b>CLIENT:</b><br/>" . $this->con->getAttribute(PDO::ATTR_CLIENT_VERSION) . "<br/>");
        print_r("<b>INFORMATION:</b><br/>" . $this->con->getAttribute(PDO::ATTR_SERVER_INFO));
        echo "</span>";
    }

    /**
     * @brief properties, print all drivers capables for the server. */
    public function drivers() {
        print_r(PDO::getAvailableDrivers());
    }

    /**
     * @brief transaction, execute the transactional operations.
     * @param string $type shortcut for trasaction to execute. i.e: B=begin, C=commit & R=rollback. */
    public function transaction($type) {
        $this->err_msg = "";
        if ($this->con != null) {
            try {
                if ($type == "B")
                    $this->con->beginTransaction();
                elseif ($type == "C")
                    $this->con->commit();
                elseif ($type == "R")
                    $this->con->rollBack();
                else {
                    $this->err_msg = "Error: The passed param is wrong! just allow [B=begin, C=commit or R=rollback]";
                    return false;
                }
            } catch (PDOException $e) {
                $this->err_msg = "Error: " . $e->getMessage();
                return false;
            }
        } else {
            $this->err_msg = "Error: Connection to database lost.";
            return false;
        }
    }

    /**
     * @brief query, iterate over rows.
     * @param string $sql_statement query string to execute.
     * @return object $query contains result set. */
    public function query($sql_statement) {
        $this->err_msg = "";
        if ($this->con != null) {
            try {
                $this->sql = $sql_statement;
                $dd = $this->con->query($this->sql);
                while ($row = $dd->fetch(PDO::FETCH_ASSOC)) {
                    $_RES[] = $row;
                }

                return $_RES;
            } catch (PDOException $e) {
                $this->err_msg = "Error: " . $e->getMessage();
                return false;
            }
        } else {
            $this->err_msg = "Error: Connection to database lost.";
            return false;
        }
    }

    /**
     * @brief query_secure, prevent and avoid sql injections.
     * @param string $sql_statement query string to execute.
     * @param string $params are necessary for query execute.
     * @param string $fetch_rows true if you need the result set.
     * @param string $unnamed only if your params are annonymous.
     * @param string $delimiter you can specify another delimiter.
     * @return object $fetchAll contains result set. */
    public function query_secure($sql_statement, $params, $fetch_rows = false, $unnamed = false, $delimiter = "|") {
        $this->err_msg = "";
        if (!isset($unnamed))
            $unnamed = false;
        if (trim((string) $delimiter) == "") {
            $this->err_msg = "Error: Delimiter are required.";
            return false;
        }
        if ($this->con != null) {
            $obj = $this->con->prepare($sql_statement);
            if (!$unnamed) {
                for ($i = 0; $i < count($params); $i++) {
                    $params_split = explode($delimiter, $params[$i]);
                    (trim($params_split[2]) == "INT") ? $obj->bindParam($params_split[0], $params_split[1], PDO::PARAM_INT) : $obj->bindParam($params_split[0], $params_split[1], PDO::PARAM_STR);
                }
                try {
                    $obj->execute();
                } catch (PDOException $e) {
                    $this->err_msg = "Error: " . $e->getMessage();
                    return false;
                }
            } else {
                try {
                    $obj->execute($params);
                } catch (PDOException $e) {
                    $this->err_msg = "Error: " . $e->getMessage();
                    return false;
                }
            }
            if ($fetch_rows)
                return $obj->fetchAll(PDO::FETCH_ASSOC);
            if (is_numeric($this->con->lastInsertId()))
                return $this->con->lastInsertId();
            return true;
        }else {
            $this->err_msg = "Error: Connection to database lost.";
            return false;
        }
    }

    /**
     * @brief query_first, fetch the first row.
     * @param string $sql_statement query string to execute.
     * @return object $fetch contains result set. */
    public function query_first($sql_statement) {
        $this->err_msg = "";
        if ($this->con != null) {
            try {
                $sttmnt = $this->con->prepare($sql_statement);
                $sttmnt->execute();
                return $sttmnt->fetch();
            } catch (PDOException $e) {
                $this->err_msg = "Error: " . $e->getMessage();
                return false;
            }
        } else {
            $this->err_msg = "Error: Connection to database lost.";
            return false;
        }
    }

    /**
     * @brief query_single, select single table cell from first record.
     * @param string $sql_statement query string to execute.
     * @return object $fetchColumn contains result set. */
    public function query_single($sql_statement) {
        $this->err_msg = "";
        if ($this->con != null) {
            try {
                $sttmnt = $this->con->prepare($sql_statement);
                $sttmnt->execute();
                return $sttmnt->fetchColumn();
            } catch (PDOException $e) {
                $this->err_msg = "Error: " . $e->getMessage();
                return false;
            }
        } else {
            $this->err_msg = "Error: Connection to database lost.";
            return false;
        }
    }

    /**
     * @brief rowcount, total rows from latest query.
     * @return integer with the total rows. */
    public function rowcount() {
        $this->err_msg = "";
        if ($this->con != null) {
            try {
                $stmnt_tmp = $this->stmntCount($this->sql);
                if ($stmnt_tmp != false && $stmnt_tmp != "") {
                    return $this->query_single($stmnt_tmp);
                } else {
                    $this->err_msg = "Error: A few data required.";
                    return -1;
                }
            } catch (PDOException $e) {
                $this->err_msg = "Error: " . $e->getMessage();
                return -1;
            }
        } else {
            $this->err_msg = "Error: Connection to database lost.";
            return false;
        }
    }

    /**
     * @brief columns, name columns as vector.
     * @param string $table must specify table name for extract columns.
     * @return array $column with all columns name of table. */
    public function columns($table) {
        $this->err_msg = "";
        $this->sql = "SELECT * FROM $table";
        if ($this->con != null) {
            try {
                $q = $this->con->query($this->sql);
                $column = array();
                $xs=$q->fetch(PDO::FETCH_ASSOC);
                if(is_array($xs))
                foreach ($xs as $key => $val) {
                    $column[] = $key;
                }
                return $column;
            } catch (PDOException $e) {
                $this->err_msg = "Error: " . $e->getMessage();
                return false;
            }
        } else {
            $this->err_msg = "Error: Connection to database lost.";
            return false;
        }
    }

    /**
     * @brief insert, insert and get newest created id.
     * @param string $table must specify table name for insert into.
     * @param string $data required for execute insert with data.
     * @return integer with the newest id (must be autonumeric). */
    public function insert($table, $data) {
        $this->err_msg = "";
        if ($this->con != null) {
            try {

                $this->con->exec("INSERT INTO " . $table . " SET $data;");
                return $this->con->lastInsertId();
            } catch (PDOException $e) {
                $this->err_msg = "Error: " . $e->getMessage();
                return false;
            }
        } else {
            $this->err_msg = "Error: Connection to database lost.";
            return false;
        }
    }

    /**
     * @brief update, replace information in the table.
     * @param string $table must specify table name for update.
     * @param string $data required for execute update info.
     * @param string $condition only if is required for the statement. */
    public function update($table, $data, $condition = "") {
        $this->err_msg = "";
        if ($this->con != null) {
            try {
                return (trim($condition) != "") ? $this->con->exec("UPDATE " . $table . " SET " . $data . " WHERE " . $condition . ";") : $this->con->exec("UPDATE " . $table . " SET " . $data . ";");
            } catch (PDOException $e) {
                $this->err_msg = "Error: " . $e->getMessage();
                return false;
            }
        } else {
            $this->err_msg = "Error: Connection to database lost.";
            return false;
        }
    }

    /**
     * @brief delete, delete information in the table.
     * @param string $table must specify table name for delete rows.
     * @param string $condition only if is required for the statement. */
    public function delete($table, $condition = "") {
        $this->err_msg = "";
        if ($this->con != null) {
            try {
                return (trim($condition) != "") ? $this->con->exec("DELETE FROM " . $table . " WHERE " . $condition . ";") : $this->con->exec("DELETE FROM " . $table . ";");
            } catch (PDOException $e) {
                $this->err_msg = "Error: " . $e->getMessage();
                return false;
            }
        } else {
            $this->err_msg = "Error: Connection to database lost.";
            return false;
        }
    }

    /**
     * @brief execute, this method is special for execute store procedures.
     * @param string $sp_query is the sp to execute. */
    public function execute($sp_query) {
        $this->err_msg = "";
        if ($this->con != null) {
            try {
                $this->con->exec($sp_query);
                return true;
            } catch (PDOException $e) {
                $this->err_msg = "Error: " . $e->getMessage();
                return false;
            }
        } else {
            $this->err_msg = "Error: Connection to database lost.";
            return false;
        }
    }

    /**
     * @brief getLatestId, for retrieve the newest id in the table.
     * @param string $table must specify table name for this operation.
     * @param string $field is the column name that you need. 
     * @return integer with the latest id inserted. */
    public function getLatestId($table, $field) {
        $this->err_msg = "";
        $sql_statement = "";
        $dbtype = $this->database_type;

        if ($dbtype == "sqlsrv" || $dbtype == "mssql" || $dbtype == "ibm" || $dbtype == "dblib" || $dbtype == "odbc") {
            $sql_statement = "SELECT TOP 1 " . $field . " FROM " . $table . " ORDER BY " . $field . " DESC;";
        } elseif ($dbtype == "oracle") {
            $sql_statement = "SELECT " . $field . " FROM " . $table . " WHERE ROWNUM<=1 ORDER BY " . $field . " DESC;";
        } elseif ($dbtype == "ifmx" || $dbtype == "fbd") {
            $sql_statement = "SELECT FIRST 1 " . $field . " FROM " . $table . " ORDER BY " . $field . " DESC;";
        } elseif ($dbtype == "mysql" || $dbtype == "sqlite2" || $dbtype == "sqlite3") {
            $sql_statement = "SELECT " . $field . " FROM " . $table . " ORDER BY " . $field . " DESC LIMIT 1;";
        } elseif ($dbtype == "pg") {
            $sql_statement = "SELECT " . $field . " FROM " . $table . " ORDER BY " . $field . " DESC LIMIT 1 OFFSET 0;";
        }

        if ($this->con != null) {
            try {
                return $this->query_single($sql_statement);
            } catch (PDOException $e) {
                $this->err_msg = "Error: " . $e->getMessage();
                return false;
            }
        } else {
            $this->err_msg = "Error: Connection to database lost.";
            return false;
        }
    }

    /**
     * @brief ShowTables, for retrieve all tables in the database.
     * @param string $database must specify database for get tables.
     * @return object with the result set with table names in the database. */
    public function ShowTables($database) {
        $this->err_msg = "";
        $complete = "";
        $sql_statement = "";
        $dbtype = $this->database_type;

        if ($dbtype == "sqlsrv" || $dbtype == "mssql" || $dbtype == "ibm" || $dbtype == "dblib" || $dbtype == "odbc" || $dbtype == "sqlite2" || $dbtype == "sqlite3") {
            $sql_statement = "SELECT name FROM sysobjects WHERE xtype='U';";
        } elseif ($dbtype == "oracle") {
            //If the query statement fail, try with uncomment the next line:
            //$sql_statement = "SELECT table_name FROM tabs;";
            $sql_statement = "SELECT table_name FROM cat;";
        } elseif ($dbtype == "ifmx" || $dbtype == "fbd") {
            $sql_statement = 'SELECT RDB$RELATION_NAME FROM RDB$RELATIONS WHERE RDB$SYSTEM_FLAG = 0 AND RDB$VIEW_BLR IS NULL ORDER BY RDB$RELATION_NAME;';
        } elseif ($dbtype == "mysql") {
            if ($database != "")
                $complete = " FROM $database";
            $sql_statement = "SHOW tables " . $complete . ";";
        }elseif ($dbtype == "pg") {
            $sql_statement = "SELECT relname AS name FROM pg_stat_user_tables ORDER BY relname;";
        }

        if ($this->con != null) {
            try {
                $this->sql = $sql_statement;
                return $this->con->query($this->sql);
            } catch (PDOException $e) {
                $this->err_msg = "Error: " . $e->getMessage();
                return false;
            }
        } else {
            $this->err_msg = "Error: Connection to database lost.";
            return false;
        }
    }

    /**
     * @brief ShowDBS, for retrieve all databases in the server.
     * @return object with the result set with all databases in your server. */
    public function ShowDBS() {
        $this->err_msg = "";
        $sql_statement = "";
        $dbtype = $this->database_type;

        if ($dbtype == "sqlsrv" || $dbtype == "mssql" || $dbtype == "ibm" || $dbtype == "dblib" || $dbtype == "odbc" || $dbtype == "sqlite2" || $dbtype == "sqlite3") {
            $sql_statement = "SELECT name FROM sys.Databases;";
        } elseif ($dbtype == "oracle") {
            //If the query statement fail, try with uncomment the next line:
            //$sql_statement = "SELECT * FROM user_tablespaces";
            $sql_statement = 'SELECT * FROM v$database;';
        } elseif ($dbtype == "ifmx" || $dbtype == "fbd") {
            $sql_statement = "";
        } elseif ($dbtype == "mysql") {
            $sql_statement = "SHOW DATABASES;";
        } elseif ($dbtype == "pg") {
            $sql_statement = "SELECT datname AS name FROM pg_database;";
        }

        if ($this->con != null) {
            try {
                $this->sql = $sql_statement;
                return $this->con->query($this->sql);
            } catch (PDOException $e) {
                $this->err_msg = "Error: " . $e->getMessage();
                return false;
            }
        } else {
            $this->err_msg = "Error: Connection to database lost.";
            return false;
        }
    }

    /**
     * @brief getError, print the latest error ocurred in the connection. */
    public function getError() {
        return trim($this->err_msg) != "" ? $this->err_msg : "";
    }

    /**
     * @brief disconnect, ends your connection, never forget this method for server performance. */
    public function disconnect() {
        $this->err_msg = "";
        if ($this->con) {
            $this->con = null;
            return true;
        } else {
            $this->err_msg = "Error: Connection to database lost.";
            return false;
        }
    }

    /**
     * @brief stmntCount, build a query string with count structure. Is used by rowcount method
     * @param string sql_statement is a string with your query. IMPORTANT: sql_statement not works if contains: group by, having...
     * @return string is the new query with count(*) structure. */
    private function stmntCount($sql_statement) {
        if (trim($sql_statement) != "") {
            $sql_statement = trim($sql_statement);
            $query_split = explode(" ", $sql_statement);
            $query_flag = false;
            $query_final = "";

            for ($x = 0; $x < count($query_split); $x++) {
                //Checking "SELECT"
                if ($x == 0 && strtoupper(trim($query_split[$x])) == "SELECT")
                    $query_final = "SELECT count(*) ";
                if ($x == 0 && strtoupper(trim($query_split[$x])) != "SELECT")
                    return false;

                //Checking "FROM"
                if (strtoupper(trim($query_split[$x])) == "FROM") {
                    $query_final .= "FROM ";
                    $query_flag = true;
                    continue;
                }

                //Checking "ORDER"
                if (strtoupper(trim($query_split[$x])) == "ORDER" || strtoupper(trim($query_split[$x])) == "GROUP") {
                    break;
                }

                //Building the query
                if (trim($query_split[$x]) != "" && $query_flag)
                    $query_final .= " " . trim($query_split[$x]) . " ";
            }
            return trim($query_final);
        }
        return false;
    }

}
