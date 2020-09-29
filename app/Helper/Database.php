<?php

# This class contains commoon database management functions

class Database extends Common {

    protected $db;

    function __construct(){
        $this->openDatabaseConnection();
    }

    function __destruct() {
        $this->closeDatabaseConnection();
    }

    private function openDatabaseConnection()
    {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->db->connect_errno) {
            echo "Failed to connect to MySQL: " . $this->db->connect_error;
            die();
        }

        //echo 'DB connected'; // You can uncomment to check whether you are connected or not when in Developer mode
        $this->db->set_charset(DB_CHARSET);     
    }

    private function closeDatabaseConnection()
    {
        $this->db->close();    
    }

    public function getDB()
    {
        return $this->db;
    }

}

