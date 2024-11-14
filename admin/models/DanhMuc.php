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
        echo $ten_danh_muc;
        echo $trang_thai;
        try {
        
            $sql="INSERT INTO category(ten, trang_thai)
            VALUES(:ten,:trang_thai)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ten',$ten_danh_muc);
            $stmt->bindParam(':trang_thai',$trang_thai);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }

    }
//cap nhat du lieu
    public function updateData ($id, $ten_danh_muc, $trang_thai){
        echo $ten_danh_muc;
        echo $trang_thai;
        try {
        
            $sql="UPDATE category SET ten_danh_muc=:ten, trang_thai=:trang_thai WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
             $stmt->bindParam(':id',$id);
            $stmt->bindParam(':ten',$ten_danh_muc);
            $stmt->bindParam(':trang_thai',$trang_thai);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }

    }
// xóa dữ liệu người dùng
    public function deleteData($id){
        try {
            $sql='DELETE FROM category WHERE category_id= :id ';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
//lấy thông tin chi tiết
    public function getDetailData($id){
        try {
            $sql='SELECT * FROM category WHERE category_id= :id ';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return $stmt->fetch();
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