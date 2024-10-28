<?php
class CommentController extends Controller
{
    private $comment;
    public function __construct()
    {
        $this->loadModel('CommentModel');
        $this->comment = new CommentModel();
    }
    public function index()
    {
        if (isset($_POST['btn-comment'])) {
            $commentNew = $_POST['postComment'];
            $this->comment->addComment([$commentNew, date('Y-m-d H:i:s'), $_GET['product_id'], getSession('user')['customer_id'], $_POST['postStar']]);
            header('location: ?controller=product&action=detail&id=' . $_GET['product_id']);
        }
    }
    public function deleteComment()
    {
        $this->comment->deleteComment($_GET['idCmt']);
        header('location: ?controller=product&action=detail&id=' . $_GET['idPro']);
    }
}
