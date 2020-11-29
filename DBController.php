<?php 

class DBController{
    protected $host = "localhost";
    protected $user = "root";
    protected $password = "";
    protected $database = "Cellshope";

public $con = null;
    public function __construct(){
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);

        if($this->con){
            //echo "connected successfully";
        }
    }
}

?>