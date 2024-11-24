<?php
// require_once 'commons/function.php';

class Comment {
    // Lấy toàn bộ bình luận từ bảng comment
    public static function getAll() {
        $db = connectDB(); 
        $stmt = $db->prepare("SELECT * FROM comment ORDER BY date DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Xóa bình luận theo id_cmt
    public static function delete($id_cmt) {
        $db = connectDB();
        $stmt = $db->prepare("DELETE FROM comment WHERE id_cmt = :id_cmt");
        $stmt->bindParam(':id_cmt', $id_cmt, PDO::PARAM_INT);
        $stmt->execute();
    }

    // // Thêm mới một bình luận
    // public static function add($data) {
    //     $db = connectDB(); 
    //     $stmt = $db->prepare("INSERT INTO comment (id, content, date, id_pro) VALUES (:id, :content, :date, :id_pro)");
    //     $stmt->bindParam(':id', $data['id']);
    //     $stmt->bindParam(':content', $data['content']);
    //     $stmt->bindParam(':date', $data['date']);
    //     $stmt->bindParam(':id_pro', $data['id_pro']);
    //     $stmt->execute();
    // }
}
?>
