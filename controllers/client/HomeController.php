<?php
class HomeController extends Controller
{
    private $product;
    private $cmt;
    public function __construct()
    {
        $this->loadModel('ProductModel');
        $this->product = new ProductModel();
    }
    public function index()
    {
        $content = 'client/Home';
        $star = $this->product->getStarOnProduct();
        $listProduct = $this->product->filterByView();
        $list = $this->product->filterByDiscount();
        $listFavourite = $this->product->filterByStar();
        $this->view('client_layout', $content, ['listProduct' => $listProduct,'list' => $list, 'star' => $star, 'listFavourite' => $listFavourite]);
    }
    
}
