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
        // $is_valid = $this->clientModel->checkAcc($user_name, $pass);
        // var_dump($is_valid);
        if(isset($_POST['btn_login'])){
            if($this->clientModel->checkAcc($_POST['user_name'],$_POST['pass'])>0){
                $_SESSION['user_name'] = $_POST['user_name'];
                header("location:?act=home");
            } else{
                echo "<script>alert('Không đăng nhập thành công.')</script>";
            }
        }
    }

    function logout(){
        unset($_SESSION['user']);
        header("location: ./");
    }
}
?>