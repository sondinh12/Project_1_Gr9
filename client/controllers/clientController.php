<?php
class clientController {
    public $clientModel;
    function __construct(){
        $this->clientModel=new clientModel();
    }

    function home(){
        require_once 'views/home.html';
    }

    function login(){
        require_once 'views/login.php';
        if(isset($_POST['btn_login'])){
            $user_name = $_POST['user_name'];
            $pass = $_POST['pass'];
            // $btn = $_POST['btn_login'];
            // var_dump($btn);
            if($this->clientModel->checkAcc($user_name,$pass)>0){
                $_SESSION['user_name'] = $user_name;
                header("location:./");
            } else{
                echo "<script>alert('Không đăng nhập thành công.')</script>";
            }
        }
    }

    function logout(){
        unset($_SESSION['user']);
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
}
?>