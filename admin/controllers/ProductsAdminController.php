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

        // Check required fields
        if (empty($data['name']) || empty($data['price']) || empty($data['quantity'])) {
            echo "Vui lòng nhập đầy đủ thông tin sản phẩm.";
            require_once __DIR__ . '/../views/products/add-product.php';
            return;
        }

        // Initialize poster field if empty
        $data['image'] = $data['image'] ?? "";

        // Check request method
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                // Validate file type and size
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                $maxSize = 2 * 1024 * 1024;

                if (in_array($_FILES['image']['type'], $allowedTypes) && $_FILES['image']['size'] <= $maxSize) {
                    $imageTmp = $_FILES['image']['tmp_name'];
                    $imageName = basename($_FILES['image']['name']);
                    $imagePath = __DIR__ . '/../assets/images/' . $imageName;

                    if (!is_dir(__DIR__ . '/../assets/images')) {
                        echo "Thư mục tải ảnh không tồn tại!";
                        return;
                    }
                    if (move_uploaded_file($imageTmp, $imagePath)) {
                        $data['image'] = 'assets/images/' . $imageName;
                        echo "Ảnh đã được tải lên: " . $data['image'];
                    } else {
                        echo "Lỗi khi tải ảnh lên!";
                    }
                }
            }

            // Insert data into database
            (new Product)->insert($data);

            // Redirect to product list page after successful insertion
            header("location: ?act=product");
            exit;
        }
    }
    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
            if (isset($_FILES['image'])) {
            $file_hinh = $_FILES['image'];
            } else { 
            $file_hinh = null;
            }
            if ($file_hinh['size'] > 0) {
                $imagePath = __DIR__ . '/../assets/images/' . $file_hinh['name'];
                move_uploaded_file($file_hinh['tmp_name'], $imagePath);
                $data['image'] = $imagePath;
            }
            (new Product)->update($data, $data['id_pro']);
            header("location: ?act=product");
        }
        $id = $_GET['id'];
        $product = (new Product)->find_one($id);
        require_once __DIR__ . '/../views/products/update-product.php';
    }
}
?>