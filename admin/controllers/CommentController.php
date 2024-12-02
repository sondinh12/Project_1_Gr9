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
        if(!isset($_SESSION['id'])){
            header("location:?act=login");
        }
        if (!empty($data['content']) && !empty($data['id_pro'])) {
            Comment:: add($data);
        }
        header("Location: ?act=comments");
    }
    
}
?>
