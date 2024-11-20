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
            $pass=$_POST['pass'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $address=$_POST['address'];
            $created_at = date('Y-m-d H:i:s');
            $updated_at = $created_at;

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
}
?>