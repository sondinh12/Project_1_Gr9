<?php
class clientModel {
    public $conn;
    function __construct(){
        $this -> conn = connectDB();
    }
    //Tài khoản
    function checkAcc($user_name,$pass){
        // $pass=sha1($pass);
        $sql="select * from account where name_user='$user_name' and pass='$pass'";
        return $this->conn->query($sql)->fetch();
    }

    function checkUsername($user_name){
        $sql="select name_user from account where name_user='$user_name'";
        $stsm = $this->conn->prepare($sql);
        $stsm ->execute();
        return $stsm->fetch();
    }

    function checkEmail($email){
        $sql="select email from account where email='$email'";
        $stsm = $this->conn->prepare($sql);
        $stsm ->execute();
        return $stsm->fetch();
    }

    function checkPhone($phone){
        $sql="select phone from account where phone='$phone'";
        $stsm = $this->conn->prepare($sql);
        $stsm ->execute();
        return $stsm->fetch();
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

    // function getAllProduct(){
    //     $sql="select * from products order by id_pro desc";
    //     return $this->conn->query($sql);
    // }

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
        $sql="insert into cart(id_user,pro_id,pro_name,quantity,price,create_at,update_at) values('$id_user','$pro_id','$pro_name','$quantity','$price',NOW(),NOW())";
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

    function deleteToCart($id_user,$pro_id){
        $sql="delete from cart where id_user='$id_user' and pro_id='$pro_id'";
        $stmt = $this->conn->prepare($sql);
        $stmt -> execute();
        return true;
    }

    function totalCartPrice($id): mixed{
        $sql="select sum(price*quantity) as total_price from cart where id_user='$id'";
        $stsm = $this->conn->prepare($sql);
        $stsm->execute();
        $result = $stsm->fetch();
        return $result['total_price'] ?? 0;
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


    //select checkbox
    function getSelectedPro($id_user,$pro_id){
        $placeholders = implode(',', array_fill(0, count($pro_id), '?'));
        $sql="select products.id_pro,products.name,products.price,cart.quantity,cart.pro_id from products inner join cart on products.id_pro = cart.pro_id where  cart.id_user = ? and cart.pro_id IN ($placeholders)";
        $stsm = $this->conn->prepare($sql);
        $stsm -> execute(array_merge([$id_user],$pro_id));
        return $stsm->fetchAll();
    }

    // Order
    function createOrders($id_user,$name_us,$total,$payment){
        $sql="insert into orders (id_us,name_us,total,payment,status,create_at,update_at) values('$id_user','$name_us','$total','$payment',1,NOw(),NOW())";
        $stmt = $this->conn->prepare($sql);
        $stmt -> execute();
        return $this->conn->lastInsertId();
    }

    function getCartByIdUser($id_user){
        $sql="select * from cart where id_user='$id_user'";
        $stmt = $this->conn->prepare($sql);
        $stmt -> execute();
        return $stmt -> fetchAll();
    }

    function addOrdersDetail($id_orders,$id_pro,$price,$quantity,$en_argen,$phone,$address){   
        $sql="insert into orders_detail (id_orders,id_pro,quantity,price,en_argen,phone,address,create_at,update_at) values('$id_orders','$id_pro','$quantity','$price','$en_argen','$phone','$address',NOW(),NOW())";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return true;
    }

    function reduceStock($pro_id,$quantity){
        $sql="update products set quantity = quantity - $quantity where id_pro='$pro_id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return true;
    }

    function clearCart($id_user,$pro_id){
        $sql="delete from cart where id_user='$id_user' and pro_id='$pro_id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return true;
    }
}
   
?>