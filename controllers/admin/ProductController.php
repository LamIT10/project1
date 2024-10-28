<?php
class ProductController extends Controller
{
    private $product;
    private $category;
    public function __construct()
    {
        $this->loadModel('ProductModel');
        $this->product = new ProductModel;
        $this->loadModel('CategoryModel');
        $this->category = new CategoryModel;
    }
    public function index()
    {
        $listCategory = $this->category->getAllCategory();
        $listProduct = $this->product->getAllProductJoinCate();
        $content = 'admin/product/List';
        $this->view('admin_layout', $content, ['listProduct' => $listProduct, 'listCategory' => $listCategory]);
    }
    public function create()
    {
        $listCategory = $this->category->getAllCategory();
        $content = 'admin/product/Add';
        $this->view('admin_layout', $content, ['listCategory' => $listCategory]);
    }
    public function add()
    {
        if (isset($_POST['btn-add'])) {
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_date = $_POST['product_date'];
            $product_unique = $_POST['product_unique'];
            $product_discount = $_POST['product_discount'];
            $product_des = $_POST['product_des'];
            $category_id = $_POST['category_id'];
            $product_img = $_FILES['product_img']['name'];
            move_uploaded_file($_FILES['product_img']['tmp_name'], 'uploads/img/' . $product_img);
            $this->product->insertProduct([$product_name, $product_price, $product_date, $product_unique, $product_discount, $product_des, $category_id, $product_img]);
            header('location:?role=admin&controller=product');
        }
    }
    public function update()
    {
        if (isset($_POST['btn-update'])) {
            $id = $_GET['id'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_date = $_POST['product_date'];
            $product_unique = $_POST['product_unique'];
            $product_discount = $_POST['product_discount'];
            $product_des = $_POST['product_des'];
            $category_id = $_POST['category_id'];
            $product_img = $_FILES['product_img']['name'];
            if (empty($product_img)) {
                $product_img = null;
                $success = $this->product->updateProduct(['product_name' => $product_name, 'product_price' => $product_price, 'product_date' => $product_date, 'product_unique' => $product_unique, 'product_discount' => $product_discount, 'product_des' => $product_des, 'category_id' => $category_id, 'product_id' => $id]);
            } else {
                move_uploaded_file($_FILES['product_img']['tmp_name'], 'uploads/img/' . $product_img);
                $success = $this->product->updateProduct(['product_name' => $product_name, 'product_price' => $product_price, 'product_date' => $product_date, 'product_unique' => $product_unique, 'product_discount' => $product_discount, 'product_des' => $product_des, 'category_id' => $category_id, 'product_img' => $product_img, 'product_id' => $id]);
            }
            if ($success) {
                header('location:?role=admin&controller=product');
            }
        }
    }
    public function edit()
    {
        $id = $_GET['id'];
        $product = $this->product->getProductDetail($id);
        $category = $this->category->getAllCategory();
        $content = 'admin/product/Edit';
        $this->view('admin_layout', $content, ['product' => $product, 'category' => $category, 'id' => $id]);
    }
    public function delete()
    {
        $id = $_GET['id'];
        if ($this->product->deleteProduct($id)) {
            header('location: ?role=admin&controller=product');
        }
    }
    public function deleteByCheckBox()
    {
        deleteByCheckBox($this->product, 'product');
    }
    public function searchProductByName()
    {

        $key = $_GET['product_name'];
        $listCategory = $this->category->getAllCategory();
        $listProduct = $this->product->search($key);
        $content = 'admin/product/List';
        $this->view('admin_layout', $content, ['listProduct' => $listProduct, 'listCategory' => $listCategory]);
    }
    public function searchProductByCategory()
    {
        $key = $_GET['category_id'];
        $listCategory = $this->category->getAllCategory();
        $listProduct = $this->product->searchProductByCategory($key);
        $content = 'admin/product/List';
        $this->view('admin_layout', $content, ['listProduct' => $listProduct, 'listCategory' => $listCategory]);
    }
}
