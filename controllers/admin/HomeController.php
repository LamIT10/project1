<?php
class HomeController extends Controller
{
    public $category;
    public function __construct()
    {
        $this->loadModel('ProductModel');
        $this->category = new ProductModel();
    }
    public function index()
    {
        $listCategory = $this->category->countProductOfCategory();
        $listViewTop = $this->category->filterByView();
        $content = 'admin/home';
        $this->view('admin_layout', $content, ['listCategory' => $listCategory, 'listViewTop' => $listViewTop]);
    }
}
