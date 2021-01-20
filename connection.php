<?php
require_once "/server/config.php";

class Connection
{
    /**
     * @var
     */
    private $host = HOST;
    /**
     * @var
     */
    private $user = USER;
    private $pass = PASSWORD;
    private $db = DATABASE;


    public function conn(){
        $db_conn = new mysqli($this->host,$this->user,$this->pass,$this->db);

        if($db_conn->connect_errno){
            error_log( "Network Error connect: ". $db_conn->connect_error);
            exit(0);
        }
        return $db_conn;
    }
}