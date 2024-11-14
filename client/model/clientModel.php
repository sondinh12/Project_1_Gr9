<?php
class clientModel {
    public $conn;
    function __construct(){
        $this -> conn = connectDB();
    }
    //Tài khoản
    function checkAcc($user_name,$pass){
        // $pass=sha1($pass);
        $sql="SELECT * from account where name_user='$user_name' and pass='$pass'";
        return $this->conn->query($sql)->fetch();
    }

    function insertAcc($user_name,$pass,$email,$phone,$address){
        $sql="insert into account(name_user,pass,email,phone,address) value('$user_name','$pass','$email','$phone','$address')";
        $isacc = $this->conn->prepare($sql);
        return $isacc->execute();
    }


    function checkOldPass($user_name,$oldPass){
        $sql="select pass from account where name_user='$user_name'";
        $checkPass = $this->conn->prepare($sql);
        $checkPass->execute();
        $result = $checkPass->fetch(PDO::FETCH_ASSOC);
        if ($result && $result['pass'] === $oldPass) {
            return true; // Nếu mật khẩu cũ đúng, trả về true
        } else {
            return false; // Nếu mật khẩu cũ không đúng, trả về false
        }
    }

    function updatePass($user_name,$newPass){
        $sql="update account set pass='$newPass' where name_user='$user_name'";
        $updatePass = $this->conn->prepare($sql);
        return $updatePass->execute();
    }
}
?>