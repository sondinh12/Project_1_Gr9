<?
class DanhMuc
{
    public $conn;
    //ket noi csdl
    public function __construct(){
        $this->conn = connectDB();
    }
    //Danh sách dm csdl
    public function getAll(){
        try {
            $sql='SELECT * FROM category';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    //huy ket noi đến csdl
    public function __destruct()
    {
        $this->conn = null;
    }
}
?>