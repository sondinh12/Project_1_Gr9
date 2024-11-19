<?php
class Product
{
    public $conn = null;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function all()
    {
        $sql = "SELECT * FROM  products";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function delete($id)
    {
        $sql = "DELETE FROM products WHERE id_pro=$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
    public function insert($data)
    {

        $sql = "INSERT INTO products(name, image, price, description, quantity, color, view, id_cate) VALUES(:name, :image, :price, :description, :quantity, :color, :view, :id_cate)";
        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ':name' => $data['name'],
            ':image' => $data['image'] ?? '',
            ':price' => $data['price'],
            ':description' => $data['description'] ?? '',
            ':quantity' => $data['quantity'],
            ':color' => $data['color'] ?? '',
            ':view' => $data['view'] ?? 0,
            ':id_cate' => $data['id_cate'] ?? 1
        ]);
    }



    public function update($data,$id){
            // Câu lệnh SQL cập nhật
            $sql = "UPDATE products SET name = :name, image = :image, price = :price, description = :description, quantity = :quantity, color = :color WHERE id_pro = :id_pro";
            $stmt = $this->conn->prepare($sql);
            $data['id_pro'] = $id;
            $stmt->execute($data);
        }
    public function find_one($id)
    {
        $sql = "SELECT * FROM products WHERE id_pro = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
