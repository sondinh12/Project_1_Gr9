<?php
class ClientCommentController
{
    public function addComment()
    {
        if(!isset($_SESSION['id'])){
            header("location:?act=login");
            return;
        }
        $data = [
            ...$_POST,
            'date' => date('Y-m-d H:i:s'),
            'id'   => $_SESSION['id'] ?? 1
        ];
        Comment::add($data);
        header("Location: ?act=detail_product&id={$data['id_pro']}");
    }


}

?>