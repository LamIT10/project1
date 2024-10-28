<?php
class CommentController extends Controller{
    private $comment;
    public function __construct()
    {
        $this->loadModel('CommentModel');
        $this->comment = new CommentModel();
    }
    public function index(){
        $listComment = $this->comment->getAllComment();
        $list = $this->comment->countCommentByIdProduct();
        $content = 'admin/comment/List';
        $this->view('admin_layout', $content, ['listComment' => $listComment, 'list' => $list]);
    }
    public function detail(){
        $id = $_GET['id'];
        $commentDetail = $this->comment->getCommentById($id);
        $content = 'admin/comment/Detail';
        $this->view('admin_layout', $content, ['commentDetail' => $commentDetail]);
    }
    public function delete(){
        $comment_id = $_GET['comment_id'];
        $product_id = $_GET['product_id'];
        $this->comment->deleteComment($comment_id);
        header("location: ?role=admin&controller=comment&action=detail&id=$product_id");
    }
    public function deleteByCheckBox(){
        $id = $_GET['id'];
        deleteByCheckBox($this->comment, 'comment');
        header("location: ?role=admin&controller=comment&action=detail&id=$id");
    }

}
?>
