<?
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
    //  var_dump($category);

     //Đua dữ liệu ra view
    require_once 'views/danhmuc/list_danh_muc.php';
    }
    //hamhien thi form 
    public function create(){

     require_once 'views/danhmuc/create_danh_muc.php';
    }
    // hàm xử lý them csdl
    public function store(){
     if($_SERVER['REQUEST_METHOD']=='POST'){
        $ten_danh_muc= $_POST['ten_danh_muc'];
        $trang_thai= $_POST['trang_thai'];
      
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
        $this->modelDanhMuc->postData( $ten_danh_muc, $trang_thai);
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

    }
    //hàm cập nhật
    public function update(){

    }
    public function destroy(){

    }
    
}
?>