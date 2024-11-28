<?php

class ProductsController
{
    public function list()
    {
        $products = (new Product)->all();
        require_once __DIR__ . '/../views/products/products.php';
    }
    public function delete()
    {
        $id = $_GET['id'];
        (new Product)->delete($id);
        header("location: ?act=product");
        die;
    }
    public function add()
    {
        require_once __DIR__ . '/../views/products/add-product.php';
    }
    public function store()
    {
        $data = $_POST;

        // Kiểm tra các trường bắt buộc
        if (empty($data['name']) || empty($data['price']) || empty($data['quantity']) || empty($data['id_cate'])) {
            echo "Vui lòng nhập đầy đủ thông tin sản phẩm.";
            require_once __DIR__ . '/../views/products/add-product.php';
            return;
        }

        // Xử lý ảnh nếu có
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            // Validate loại file và kích thước
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            $maxSize = 2 * 1024 * 1024; // 2MB

            if (in_array($_FILES['image']['type'], $allowedTypes) && $_FILES['image']['size'] <= $maxSize) {
                $imageTmp = $_FILES['image']['tmp_name'];
                $imageName = basename($_FILES['image']['name']);
                $imagePath = __DIR__ . '/../assets/images/' . $imageName;

                // Kiểm tra thư mục tải ảnh
                if (!is_dir(__DIR__ . '/../assets/images')) {
                    echo "Thư mục tải ảnh không tồn tại!";
                    return;
                }
                // Di chuyển ảnh vào thư mục
                if (move_uploaded_file($imageTmp, $imagePath)) {
                    $data['image'] = $imageName;
                } else {
                    echo "Lỗi khi tải ảnh lên!";
                }
            } else {
                echo "Ảnh không hợp lệ hoặc vượt quá kích thước cho phép!";
                return;
            }
        }

        // Thêm sản phẩm vào cơ sở dữ liệu
        $data['create_at'] = date('Y-m-d H:i:s'); // Thời gian tạo
        $data['update_at'] = date('Y-m-d H:i:s'); // Thời gian cập nhật

        // Chạy phương thức insert
        (new Product)->insert($data);

        // Chuyển hướng đến trang danh sách sản phẩm
        header("location: ?act=product");
        exit;
    }
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
            $file_hinh = $_FILES['image'] ?? null;
    
            // Nếu có ảnh mới được tải lên
            if ($file_hinh && $file_hinh['size'] > 0) {
                $imagePath = __DIR__ . '/../assets/images/' . $file_hinh['name'];
                $data['image'] = $file_hinh['name']; // Cập nhật ảnh mới
                move_uploaded_file($file_hinh['tmp_name'], $imagePath);
            } else {
                // Nếu không có ảnh mới, giữ lại ảnh cũ từ cơ sở dữ liệu
                $product = (new Product)->find_one($data['id_pro']);
                $data['image'] = $product['image']; // Giữ lại ảnh cũ
            }
    
            if (!isset($data['id_pro'])) {
                die("Error: Product ID is missing.");
            }
    
            // Cập nhật sản phẩm
            (new Product)->update($data, $data['id_pro']);
            header("location: ?act=product");
            exit;
        }
    
        // Lấy id của sản phẩm cần chỉnh sửa
        $id = $_GET['id'] ?? null;
        if (!$id) {
            die("Error: No product ID provided.");
        }
    
        // Tìm sản phẩm cần chỉnh sửa
        $product = (new Product)->find_one($id);
    
        // Lấy tất cả danh mục để hiển thị trên form
        $categories = (new DanhMuc)->getAll();
    
        require_once __DIR__ . '/../views/products/update-product.php';
    }
    
}
