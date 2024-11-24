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
        $result = $stmt->fetch();  // Lấy kết quả
        return $result ? $result['role'] : null;
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

    //user
    function getIdUser($user_name){
        $sql="select id from account where name_user='$user_name'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();  // Lấy kết quả
        return $result;
    }
    function getAllInfoUser($id){
        $sql="select * from account where id='$id'";
        $stsm = $this->conn->prepare($sql);
        $stsm->execute();
        $result = $stsm->fetch();
        return $result;
    }

    function updateUser($id,$user_name,$email,$phone,$address,$update_at){
        $sql="update account set name_user='$user_name',email='$email',phone='$phone',address='$address',update_at='$update_at' where id='$id'";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }

    function getAllProduct(){
        $sql="select * from products order by id_pro desc";
        return $this->conn->query($sql);
    }

    function checkProQuantity($pro_id){
        $sql="select quantity from products where id_pro='$pro_id'";
        // var_dump($pro_id);
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();
        $products = $stmt->fetch();
        return $products['quantity'];
    }
    function addToCart($id_user,$pro_id,$pro_name,$quantity,$price){
        $stoke = $this->checkProQuantity($pro_id);
        if($stoke < $quantity){
            return "Số lượng trong kho không đủ";
        }
        $existingCart = $this->getCartProducts($id_user,$pro_id);
        if($existingCart){
            return $this->updateCartQuantity($id_user,$pro_id,$existingCart['quantity'] + $quantity);
        } else {
            return $this->insertProToCart($id_user,$pro_id,$pro_name,$quantity,$price);
        }

    }   

    function getCartProducts($id_user,$pro_id){
        $sql="select * from cart where id_user='$id_user' and pro_id='$pro_id'";
        $stmt = $this->conn->prepare($sql);
        $stmt ->execute();
        return $stmt->fetch();
    }

    function updateCartQuantity($id_user,$pro_id,$newQuantity,){
        $sql="update cart set quantity='$newQuantity',update_at=NOW() where id_user='$id_user' and pro_id='$pro_id'";
        $stmt = $this->conn->prepare($sql);
        $stmt -> execute();
        return true;
    }

    function insertProToCart($id_user,$pro_id,$pro_name,$quantity,$price){
        $sql="insert into cart(id_user,pro_id,pro_name,quantity,price,create_at) values('$id_user','$pro_id','$pro_name','$quantity','$price',NOW())";
        $stmt = $this->conn->prepare($sql);
        $stmt -> execute();
        return true;
    }

    function showCart($id){
        $sql="select cart.cart_id,cart.pro_id,cart.quantity,products.name,products.price from cart inner join products on products.id_pro = cart.pro_id where id_user='$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt -> execute();
        return $stmt->fetchAll();
    }
}
?>