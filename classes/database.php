<?php

class Database
{
    //propaties
    private $surver_name = "localhost";
    private $username = "root";
    private $password = "root"; //for MAMP users, password is "root"
    private $db_name = "the_company";
    protected $conn;

    //constractor
    public function __construct()
    {
        $this->conn = new Mysqli($this->surver_name, $this->username, $this->password, $this->db_name);

        if($this->conn->connect_error)
        {
            die("Unable to connect to database" .$this->db_name .":" . $this->conn->connect_error);
        }
    }
}

//conn is decleared as protected so othe iheriting classes can use it
//$this->conn ----object
//$connect_error -----property. a member of class mysql. hold a String value of the connection error

?>
