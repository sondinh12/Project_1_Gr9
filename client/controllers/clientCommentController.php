<?php
class ClientCommentController
{
    public function addComment()
    {
        $data = [
            ...$_POST,
            'date' => date('Y-m-d H:i:s'),
            'id'   => $_POST['id'] ?? 1
        ];
        Comment::add($data);
        header("Location: ?act=detail_product&id={$data['id_pro']}");
    }


}

?>