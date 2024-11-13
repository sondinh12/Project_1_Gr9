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

    }
    // hàm xử lý them csdl
    public function store(){

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