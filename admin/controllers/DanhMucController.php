<?php
class DanhMucController
{
    //ket noi den model
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelDanhMuc = new DanhMuc();
    }
    //hàm hiển thi dsach
    public function index(){
     //lấy ra dữ liệu danhmuc
     $danhMucs = $this->modelDanhMuc->getAll();
   

     //Đua dữ liệu ra view
    require_once 'views/danhmuc/list_danh_muc.php';
    }
    //hamhien thi form 
    public function create(){

     require_once 'views/danhmuc/create_danh_muc.php';
    }
    //xử lý them csdl
    public function store(){
     if($_SERVER['REQUEST_METHOD']=='POST'){
        $ten_danh_muc= $_POST['ten_danh_muc'];
        $trang_thai= $_POST['trang_thai'];
        $create_at=date('Y-m-d H:i:s');
        $update_at=$create_at;
       //validateD
       $errors =[];
       if(empty($ten_danh_muc)){
        $errors['ten_danh_muc'] = 'Tên danh mục là bắt buộc';
       }
       if(empty($trang_thai)){
        $errors['trang_thai'] = 'Tên trạng thái là bắt buộc';
       }
       //thêm dữ liệu
       if(empty($errors)){
        $this->modelDanhMuc->postData( $ten_danh_muc, $trang_thai, $create_at,$update_at);
        unset($_SESSION['errors']);
        header('Location: ?act=danh-mucs');
        exit();
       }else{
        $_SESSION['errors']=$errors;
        header('Location: ?act=form-them-danh-muc');
        exit();
       }
      
     }
    }
    //hàm hiển thị form sua
    public function edit(){
    $id = $_GET['danh_muc_id'];
// lấy thông tin danhmuc
    $danhMuc =$this->modelDanhMuc->getDetailData($id);
    // echo '<pre>';
    // print_r($danhMuc);
    // echo '<pre>';
    require_once 'views/danhmuc/edit_danh_muc.php';
   // đổ dữ liệu ra form
    }
    //hàm cập nhật
    public function update(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id=$_GET['danh_muc_id'];
            $ten_danh_muc= $_POST['ten_danh_muc'];
            $trang_thai= $_POST['trang_thai'];
            $update_at=date('Y-m-d H:i:s');

           
          
          
           //validate
           $errors =[];
           if(empty($ten_danh_muc)){
            $errors['ten_danh_muc'] = 'Tên danh mục là bắt buộc';
           }
           if(empty($trang_thai)){
            $errors['trang_thai'] = 'Tên trạng thái là bắt buộc';
           }
           //thêm dữ liệu
           if(empty($errors)){
            $this->modelDanhMuc->updateData($id, $ten_danh_muc, $trang_thai);
            unset($_SESSION['errors']);
            header('Location: ?act=danh-mucs');
            exit();
           }else{
            $_SESSION['errors']=$errors;
            header('Location:'.$_SERVER['HTTP_REFERER']);
            exit();
           }
          
         }
    }
    public function destroy(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id=$_POST['danh_muc_id'];
            // var_dump( $id);
            //xóa danh mục
            $this->modelDanhMuc->deleteData($id);

            header('Location: ?act=danh-mucs');
        exit();
        }
    }
    
}
?>