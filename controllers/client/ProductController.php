<?php
class ProductController extends Controller
{
    public $pro;
    public $cate;
    public $comment;
    public $star;
    public function __construct()
    {
        $this->loadModel('ProductModel');
        $this->pro = new ProductModel();
        $this->loadModel('CategoryModel');
        $this->cate = new CategoryModel();
        $this->loadModel('CommentModel');
        $this->comment = new CommentModel();
        $this->star = $this->pro->getStarOnProduct();
    }
    public function index(){
        $listSearch = $this->pro->getAllProduct();
        $listCategory = $this->cate->getAllCategory();
        $content = 'client/Product';
        $this->view('client_layout', $content, ['listSearch' => $listSearch, 'listCategory' => $listCategory,'star' => $this->star]);
    }
    public function search(){
        $key = isset($_GET['key']) ? $_GET['key'] : '';
        $listSearch = $this->pro->search($key);
        $listCategory = $this->cate->getAllCategory();
        $content = 'client/Product';
        $this->view('client_layout', $content, ['listSearch' => $listSearch, 'listCategory' =>$listCategory, 'star' => $this->star]);
    }
    public function searchByCategory()
    {
        $key = isset($_GET['key']) ? $_GET['key'] : '';
        $listSearch = $this->pro->searchProductByCategory($key);
        $listCategory = $this->cate->getAllCategory();
        $content = 'client/Product';
        $this->view('client_layout', $content, ['listSearch' => $listSearch, 'listCategory' =>$listCategory, 'star' => $this->star]);
    }
    public function detail(){
        $this->pro->increaseView($_GET['id']);
        $content = 'client/Productdetail';
        $category = $this->cate->getAllCategory();
        $product = $this->pro->getProductDetail($_GET['id']);
        $comment = $this->comment->getCommentOfProduct($_GET['id']);
        $this->view('client_layout', $content, ['product' =>$product, 'comment' =>$comment, 'star' => $this->star, 'category' => $category]);
    }
}
?>