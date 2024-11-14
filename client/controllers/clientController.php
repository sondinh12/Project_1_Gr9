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
            // $btn = $_POST['btn_login'];
            // var_dump($btn);
            if($this->clientModel->checkAcc($_POST['user_name'],$_POST['pass'])>0){
                $_SESSION['user_name'] = $_POST['user_name'];
                header("location:?act=/");
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