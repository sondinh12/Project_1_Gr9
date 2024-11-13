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
    //thêm dữ liệu mới vào data
    public function postData( $ten_danh_muc, $trang_thai){
        try {
        
            $sql='INSERT INTO category($ten_danh_muc, $trang_thai)
            VALUES(:$ten_danh_muc, :$trang_thai)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':$ten_danh_muc',$ten_danh_muc);
            $stmt->bindParam(':$trang_thai',$trang_thai);
            $stmt->execute();
            return true;
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