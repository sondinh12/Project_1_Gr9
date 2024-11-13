<?php
class clientModel {
    public $conn;
    function __construct(){
        $this -> conn = connectDB();
    }

    function checkAcc($user_name,$pass){
        // var_dump($pass);
        $pass=sha1($pass);
        $sql="select * from account where name_user='$user_name' and pass='$pass'";
        return $this->conn->query($sql)->rowCount();
    }
}
?>