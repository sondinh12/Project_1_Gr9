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

    function getRoleByUsername($user_name){
        $sql="select role from account where name_user='$user_name'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);  // Lấy kết quả
        return $result ? $result['role'] : null;
        // return $stsm->execute();
    }

    function insertAcc($user_name,$pass,$email,$phone,$address,$create_at,$update_at){
        $sql="insert into account(name_user,pass,email,phone,address,reset_token,token_expixy,create_at,update_at) value('$user_name','$pass','$email','$phone','$address',null,null,'$create_at','$update_at')";
        $isacc = $this->conn->prepare($sql);
        return $isacc->execute();
    }


    function checkOldPass($user_name,$oldPass){
        $sql="select pass from account where name_user='$user_name'";
        $checkPass = $this->conn->prepare($sql);
        $checkPass->execute();
        $result = $checkPass->fetch();
        if ($result && $result['pass'] === $oldPass) {
            return true;
        } else {
            return false;
        }
    }

    function updatePass($user_name,$newPass,$update_at){
        $sql="update account set pass='$newPass',update_at='$update_at' where name_user='$user_name'";
        $updatePass = $this->conn->prepare($sql);
        return $updatePass->execute();
    }
    // Quên mật khẩu
    function findByEmail($email){
        $sql="select * from account where email='$email'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }

    function storeResetToken($email,$token,$expixy){
        $sql="update account set reset_token='$token',token_expixy='$expixy' where email='$email'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    function findByToken($token){
        $sql="select * from account where reset_token='$token' and token_expixy > UTC_TIMESTAMP()";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }

    function updatePassForgot($id,$newPassForgot,$update_at){
        $sql="update account set pass='$newPassForgot', reset_token=NULL, token_expixy=NULL,update_at='$update_at' where id='$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
      // Hàm tìm kiếm sản phẩm theo tên
      function searchProductByName($keyword) {
        $sql = "SELECT id_pro, name, price, image, description, quantity, id_cate, create_at, update_at 
                FROM products 
                WHERE name LIKE :keyword";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':keyword' => '%' . $keyword . '%']); // Sử dụng bind để tránh SQL Injection
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về danh sách sản phẩm tìm được
    }
}


    

?>