<?php
class clientController {
    public $clientModel;
    function __construct(){
        $this->clientModel=new clientModel();
    }

    function home(){
        require_once 'views/home.php';
    }

    function login(){
        require_once 'views/login.php';
        if(isset($_POST['btn_login'])){
            $user_name = $_POST['user_name'];
            $pass = $_POST['pass'];
            // $btn = $_POST['btn_login'];
            // var_dump($btn);
            if($this->clientModel->checkAcc($user_name,$pass)>0){
                $role = $this->clientModel->getRoleByUsername($user_name);
                $_SESSION['user_name'] = $user_name;
                $_SESSION['role'] = $role;
                header("location:./");
            } else{
                echo "<script>alert('Không đăng nhập thành công.')</script>";
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
            $pass=$_POST['pass'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            // var_dump($address);
            if($this->clientModel->insertAcc($user_name,$pass,$email,$phone,$address)){      
                header("location:?act=login");
            } else {
                echo "<script>alert('Không đăng ký thành công.')</script>";
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
                if($this->clientModel->checkOldPass($user_name,$oldPass)){
                    if($rePass === $newPass){
                        if($this->clientModel->updatePass($user_name,$newPass)){
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
        if(isset($_POST['btn_forgot'])){
            $email = $_POST['email'];
            $user = $this->clientModel->findByEmail($email);
            if($user){
                $token = bin2hex(random_bytes(32));
                $expixy = date("Y-m-d H:i:s", strtotime("+1 hour"));
                $this->clientModel->storeResetToken($email,$token,$expixy);

                // Chỉnh sửa lại
                $resetLink = "http://yourwebsite.com/index.php?act=resetForm&token=$token";
                $subject = "Khôi phục mật khẩu";
                $message = "Nhấn vào liên kết sau để đặt lại mật khẩu: $resetLink";
                //Thay mail() bằng thư viện
                if(mail($email,$subject,$message,$headers)){
                    echo "Email khôi phục đã được gửi";
                } else {
                    echo "Gửi email thất bại";
                }
            } else{
                echo "Email không tồn tại trong hệ thống";
            }
        }
    }

    function resetForm(){
        $token = $_GET['token'];
        $user = $this->clientModel->findByToken($token);

        if($user){
            require_once 'views/resetPass.php';
        } else{
            echo "Token không hợp lệ hoặc hết hạn";
        }
    }

    function resetPass(){
        if(isset($_POST['btn_reset'])){
            $token = $_POST['token'];
            $newPass = $_POST['new_pass'];
            $rePass = $_POST['re_pass'];
            if($newPass === $rePass){
                $user = $this->clientModel->findByToken($token);
                if($user){
                    $this->clientModel->updatePassForgot($user['id'], $newPass);
                    echo "Mật khẩu đã được đặt lại thành công";
                } else {
                    echo "Token không hợp lệ hoặc đã hết hạn";
                }
            } else {
                echo "Mật khẩu mới không khớp";
            }
        }
    }
}
?>