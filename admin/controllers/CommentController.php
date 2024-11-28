<?php
require_once 'models/Comment.php';

class CommentController {
    public function listComments() {
        // Lấy danh sách bình luận từ database
        $comments = Comment::getAll();
        require 'views/binhluan/list_comments.php';
    }

    public function deleteComment($id_cmt) {
        // Xóa bình luận
        if ($id_cmt > 0) {
            Comment::delete($id_cmt);
        }
        header("Location: ?act=comments");
    }

    public function addComment($data) {
        // Thêm bình luận mới
<<<<<<< HEAD
        // if(!isset($_SESSION['id'])){
        //     header("location:?act=login");
        // }
=======
        if(!isset($_SESSION['id'])){
            header("location:?act=login");
        }
>>>>>>> f5e4475d97b27bb5c73ea060f5690b0425619492
        if (!empty($data['content']) && !empty($data['id_pro'])) {
            Comment:: add($data);
        }
        header("Location: ?act=comments");
    }
    
}
?>
