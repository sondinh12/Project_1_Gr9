<?php
class ClientProductController{
    public function index(){
        //Lấy sản phẩm mới nhất
        $products = (new Product)->all();

        // //Sản phẩm có giá cao nhất
        // $productHighestPrice = (new Product)->();

        //Danh sách danh mục
        $categories = (new DanhMuc)->all();    
        require_once __DIR__ . '/../views/home.php';
 
    }
    public function list_product(){
        //Lấy sản phẩm mới nhất
        $products = (new Product)->all();

        // //Sản phẩm có giá cao nhất
        // $productHighestPrice = (new Product)->();

        //Danh sách danh mục
        $categories = (new DanhMuc)->all();
        require_once __DIR__ . '/../views/shop.php';
 
    }
    public function list()
{
    // Lấy mã danh mục từ URL
    $madm = $_GET['category_id'] ?? '';

    // Nếu không có mã danh mục, chuyển về trang chính
    if (empty($madm)) {
        header("Location: index.php");
        exit;
    }

    $productModel = new Product();
    $categoryModel = new DanhMuc();

    // Lấy danh sách sản phẩm trong danh mục
    $products = $productModel->productsInCategory($madm);

    // Lấy thông tin danh mục
    $category = $categoryModel->find_one($madm);

    // Hiển thị view
    $categories = (new DanhMuc)->all();
    require_once __DIR__ . '/../views/productInCategory.php';
}
public function detail()
{
    // Lấy id sản phẩm từ URL
    $id = $_GET['id'] ?? '';
    // Nếu không có id sản phẩm, chuyển hướng về trang chính
    if (empty($id)) {
        header("Location: index.php");
        exit;
    }

    // Lấy chi tiết sản phẩm
    $productModel = new Product();
    $product = $productModel->find_one($id);

     // Lấy các sản phẩm cùng danh mục
     $relatedProducts = $productModel->productsInCategory($product['id_cate']);

    // Nếu không tìm thấy sản phẩm, chuyển hướng về trang chính
    if (!$product) {
        header("Location: index.php");
        exit;
    }
    $categories = (new DanhMuc)->all();
    

    $comments = (new Comment)->getCommentByProduct($id);

    $comments = (new Comment())->getCommentByProduct($id);

    // Hiển thị view chi tiết sản phẩm
    require_once __DIR__ . '/../views/detail.php';
}
 public function searchProduct() {
    
        $keyword = $_GET['keyword'] ?? ''; // Lấy từ khóa từ URL

        // Sử dụng model để tìm kiếm sản phẩm
        $model = new clientModel();
        $products = $model->searchProductByName($keyword);
        $categories = (new DanhMuc)->all();

        // Gửi kết quả sang view
        require_once __DIR__ . '/../views/home.php';
    }


}

?>