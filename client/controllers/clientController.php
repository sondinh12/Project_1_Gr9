
<?php
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class clientController {
    public $clientModel;
    function __construct(){
        $this->clientModel=new clientModel();
    }

    function home(){
        $product = $this->clientModel->getAllProduct();
        require_once 'views/home.php';
    }

    function checkoutShow(){
        require_once 'views/checkout.php';
    }

    function contactShow(){
        require_once 'views/contact.php';
    }

    function detailShow(){
        require_once 'views/detail.php';
    }

    function shopShow(){
        require_once 'views/shop.php';
    }

    function login(){
        require_once 'views/login.php';
        if(isset($_POST['btn_login'])){
            $user_name = trim($_POST['user_name']);
            $pass = trim($_POST['pass']);
            // $btn = $_POST['btn_login'];
            // var_dump($btn);
            if($this->clientModel->checkAcc($user_name,$pass)>0){
                $role = $this->clientModel->getRoleByUsername($user_name);
                $idUs = $this->clientModel->getIdUser($user_name);
                // var_dump($idUs);
                $_SESSION['user_name'] = $user_name;
                $_SESSION['role'] = $role;
                $id=$idUs['id'];
                $_SESSION['id'] = $id;
                // var_dump($_SESSION['id']);
                header("location:./");
            } 
            else{
                echo "Không đăng nhập thành công, vui lòng kiểm tra lại!";
            }
        }
    }

    function logout(){
        unset($_SESSION['user_name']);
        header("location:./");
    }

    function register(){
        require_once 'views/register.php';
        if(isset($_POST['btn_register'])){
            $user_name=$_POST['user_name'];
            $pass=trim($_POST['pass']);
            $email=trim($_POST['email']);
            $phone=trim($_POST['phone']);
            $address=trim($_POST['address']);
            $created_at = date('Y-m-d H:i:s');
            $updated_at = $created_at;

            if($this->clientModel->checkUsername($user_name)){
                echo "Tài khoản đã tồn tại";
                return;
            }

            if($this->clientModel->checkEmail($email)){
                echo "Email đã tồn tại";
                return;
            }

            if($this->clientModel->checkPhone($phone)){
                echo "Số điện thoại đã tồn tại";
                return;
            }

            if (empty($user_name) || empty($pass) || empty($email) || empty($phone) || empty($address)) {
                echo "Vui lòng điền đầy đủ thông tin.";
                return;
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Email không hợp lệ. Vui lòng nhập đúng định dạng email";
                return;
            }
    
            if (!preg_match("/^0[0-9]{7,10}$/", $phone)) {
                echo "Số điện thoại không hợp lệ. Vui lòng nhập số bắt đầu bằng 0 và từ 8-11 số";
                return;
            }
            if($this->clientModel->insertAcc($user_name,$pass,$email,$phone,$address,$created_at,$updated_at)){      
                header("location:?act=login");
            } else {
                echo "Không đăng ký thành công";
            }
        }
    }

    function updatePass(){
        require_once 'views/editpass.php';
        if(isset($_SESSION['user_name'])){
            $user_name = $_SESSION['user_name'];         
            if(isset($_POST['btn_editpass'])){
                $newPass = $_POST['new_pass'];
                $oldPass = $_POST['old_pass'];
                $rePass = $_POST['re_pass'];
                $update_at = date('Y-m-d H:i:s');
                if($this->clientModel->checkOldPass($user_name,$oldPass)){
                    if($rePass === $newPass){
                        if($this->clientModel->updatePass($user_name,$newPass,$update_at)){
                            echo "Đổi mật khẩu thành công";                             
                        } else {
                            echo "Đổi mật khẩu thất bại";
                        }
                    } else{
                        echo "Mật khẩu mới không đồng nhất";
                    }
                } else {
                    echo "Mật khẩu cũ không chính xác";
                }
            }
        }
    }



    function forgotPass(){
        require_once 'views/forgotpass.php';
        // echo date("Y-m-d H:i:s");
        if(isset($_POST['btn_forgot'])){
            $email = $_POST['email'];
            $user = $this->clientModel->findByEmail($email);
            if($user){
                $token = bin2hex(random_bytes(32));
                $expixy = date("Y-m-d H:i:s", strtotime("+1 hour"));
                // var_dump($expixy);
                $this->clientModel->storeResetToken($email,$token,$expixy);

                // Chỉnh sửa lại
                $resetLink = "$token";
                $subject = "Khôi phục mật khẩu";
                $message = "Mã khôi phục mật khẩu của bạn: $resetLink";
                try {
                    $mail = new PHPMailer(true); 
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'nguyendinhson92005@gmail.com';
                    $mail->Password = 'ibmf izuh rvlc mpyv';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;
                    $mail->setFrom('no-reply@yourwebsite.com', 'Your Website');
                    $mail->addAddress($email);
    
                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    $mail->Body    = $message;
                    $mail->AltBody = strip_tags($message);
                    $mail->send();
                    echo "Email khôi phục đã được gửi!";
                    header("location:?act=resetform");
                } catch (Exception $e) {
                    echo "Gửi email thất bại. Lỗi: {$mail->ErrorInfo}";
                }
            } else{
                echo "Email không tồn tại trong hệ thống";
            }
        }
    }

    function resetForm(){
            require_once 'views/resetPass.php';
    }

    function resetPass(){
        require_once 'views/resetPass.php';
        if(isset($_POST['btn_reset'])){
            $token = $_POST['token'];
            $newPassForgot = $_POST['new_pass'];
            $rePassForgot = $_POST['re_pass'];
            $update_at = date('Y-m-d H:i:s');
            // var_dump($token);
            if($newPassForgot === $rePassForgot){
                $user = $this->clientModel->findByToken( $token);
                // var_dump($user);
                if($user){
                    $this->clientModel->updatePassForgot($user['id'], $newPassForgot,$update_at);
                    echo "Mật khẩu đã được đặt lại thành công";
                } else {
                    echo "Token không hợp lệ hoặc đã hết hạn";
                }
            } else {
                echo "Mật khẩu mới không khớp";
            }
            // var_dump($_POST);
            // die();
        } 
        // else {
        //     echo "Form chưa được submit";
        // }
    }

    function profileUser(){ 
            if(isset($_SESSION['id'])){       
            $id = $_SESSION['id'];
            // var_dump($id);
            $info = $this->clientModel->getAllInfoUser($id);
            require_once 'views/profile.php';
            }
    }

    function updateUser(){
        if(isset($_POST['btn_updateUs'])){
            $id = $_SESSION['id'];
            $user_name = $_POST['user_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $update_at = date('Y-m-d H:i:s');
            if($this->clientModel->updateUser($id,$user_name,$email,$phone,$address,$update_at)){
                header("location:?act=profile");
            }
        }
    }

    //cart

    function showCart(){
        if(!isset($_SESSION['id'])){
            header("location:?act=login");
        }
        $id=$_SESSION['id'];
        $cartShow = $this->clientModel->showCart($id);
        $totalPrice = $this->clientModel->totalCartPrice($id);
        require_once 'views/cart.php';
    }

    function addToCart(){
        if(!isset($_SESSION['id'])){
            header("location:?act=login");
        } else{
            $id_user = $_SESSION['id'];
            if(isset($_POST['btn_addcart'])){
                $pro_id=$_POST['pro_id'];
                $quantity=$_POST['quantity']; 
                $price = $_POST['price'];
                $pro_name=$_POST['pro_name'];
                $addProToCart = $this->clientModel->addToCart($id_user,$pro_id,$pro_name,$quantity,$price);
                if($addProToCart === true){
                    header("location:./");
                } else{
                    echo $addProToCart;
                }
            }
        }
    }

    function deleteToCart(){
        if(isset($_SESSION['id'])){
            $id_user = $_SESSION['id'];
            if(isset($_POST['btn_deletecart'])){
                $pro_id = $_POST['btn_deletecart'];
                if($this->clientModel->deleteToCart($id_user, $pro_id)){
                    // echo "<script>confirm('Bạn muốn xóa sản phẩm khỏi giỏ hàng chứ!');</script>";
                    header("location:?act=cart");
                }
            }
        }
    }
    
    function handleCartAction(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Kiểm tra nút xóa sản phẩm
            if (isset($_POST['btn_deletecart'])) {
                $this->deleteToCart();
                
            } elseif(isset($_POST['btn_updatecart'])) {
                $this->updateToCart();              
            } elseif(isset($_POST['btn_checkout'])){
                $this->checkoutPro();
            } 

        }
    }
    function updateToCart(){
        if(isset($_SESSION['id'])){
            $id_user = $_SESSION['id'];
            if(isset($_POST['btn_updatecart'])){
                $pro_id = $_POST['btn_updatecart'];
                // $newQuantity = $_POST['quantity'];
                $quantityField = 'quantity-' . $pro_id;
                $newQuantity = isset($_POST[$quantityField]) ? $_POST[$quantityField] : 1;
                if(empty($newQuantity) || $newQuantity <= 0){
                    $newQuantity = 1;
                }
                if($newQuantity > 0){
                    $this->clientModel->updateCartQuantity($id_user,$pro_id,$newQuantity);
                    header("location:?act=cart");
                }
            }
        }
    }

    //selected product
    function checkoutPro(){
        if(isset($_POST['btn_checkout'])){
            if(isset($_SESSION['id'])){
                $id_user = $_SESSION['id'];
                $id = $_SESSION['id'];
                $info = $this->clientModel->getAllInfoUser( id: $id);
                // var_dump($info);
            }
            $selectedPro = isset($_POST['selected_pro']) ? $_POST['selected_pro'] : [];
            
            if(empty($selectedPro)){
                echo "Vui lòng chọn sản phẩm để thanh toán";
                return;
            }
            $productsSelect = $this->clientModel->getSelectedPro($id_user, $selectedPro);

            $totalCheckout = 0;
            foreach ($productsSelect as $products){
                $totalCheckout += $products['price'] * $products['quantity'];
            }
            // var_dump($productsSelect);
            // header("location: ?act=checkout");
            require_once 'views/checkout.php';
        }
    }

    function placeOrder(){
        if(isset($_SESSION['id'])){
            $id_user = $_SESSION['id'];
            if(isset($_POST['btn_placeorder'])){
                $name_us = $_POST['name_user'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $payment= $_POST['payment'];
                $total = $_POST['total'];
                $en_argen = $total;
                // $prices = isset($_POST['price']) ? $_POST['price'] : [];
                // $total_checkout = 0;
                // foreach ($prices as $price){
                //     $total_checkout += $price;
                // }
                $id_orders = $this->clientModel->createOrders($id_user,$name_us,$total,  $payment);

                $cart_item = $this->clientModel->getCartByIdUser($id_user);
                $selectedPro = isset($_POST['selected_pro']) ? $_POST['selected_pro'] : [];
                if(empty($selectedPro)){
                    echo "Vui lòng chọn sản phẩm để thanh toán";
                    return;
                }
                foreach($cart_item as $item){
                    $product_price = $item['price'];
                    $product_quantity = isset($selectedPro[$item['pro_id']]) ? $selectedPro[$item['pro_id']] : 0;;
                    $en_argen = $product_price * $product_quantity;
                    if ($product_quantity <= 0) {
                        echo "Sản phẩm không hợp lệ hoặc số lượng không đủ.";
                        return;
                    }
                    // $product_quantity = $item['quantity'];
                    // $product_price = isset($prices[$index]) ? $prices[$index] : 0;
                    $this->clientModel->addOrdersDetail($id_orders,$item['pro_id'],$product_price,$product_quantity,$en_argen,$phone,$address);
                    $this->clientModel->reduceStock($$item['pro_id'],$product_quantity);
                }

                $this->clientModel->clearCart($id_user);
                // echo "sơn";
                header("location: ?act=/");
            } 
        }
    }
}
?>

