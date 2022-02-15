<?php
include_once('fix_mysql.inc.php');
class DB_CONNECT
{
    function __construct()
    {
        $this->connect();
    }

    function __destruct(){
        $this->close();
    }
    function connect(){
        $filepath = realpath((dirname(__FILE__)));

        require_once($filepath."/database.php");

        $con = mysql_connect(DB_SERVER, DB_USER,DB_PASSWORD);

        $db = mysql_select_db(DB_DATABASE);
        return $con;
    }

    function close(){
    }
}
