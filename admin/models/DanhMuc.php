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
    public function postData( $ten_danh_muc, $trang_thai,$create_at,$update_at){
        echo $ten_danh_muc;
        echo $trang_thai;
        try {
        
            $sql="INSERT INTO category(cate_name, trang_thai,create_at,update_at)
            VALUES(:cate_name,:trang_thai,:create_at,:update_at)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':cate_name',$ten_danh_muc);
            $stmt->bindParam(':trang_thai',$trang_thai);
            $stmt->bindParam(':create_at',$create_at);
            $stmt->bindParam(':update_at',$update_at);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }

    }
//cap nhat du lieu
    public function updateData ($id, $ten_danh_muc, $trang_thai, $update_at){
        echo $ten_danh_muc;
        echo $trang_thai;
        try {
        
            $sql="UPDATE category SET ten_danh_muc=:cate_name, trang_thai=:trang_thai WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':cate_name',$ten_danh_muc);
            $stmt->bindParam(':trang_thai',$trang_thai);
            $stmt->bindParam(':update_at',$update_at);
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