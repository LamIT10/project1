<?php
class CategoryController extends Controller
{
    private $category;
    public function __construct()
    {
        $this->loadModel('CategoryModel');
        $this->category = new CategoryModel();
    }
    public function index()
    {
        $listCategory = $this->category->getAllCategory();
        $content = 'admin/category/List';
        $this->view('admin_layout', $content, ['listCategory' => $listCategory]);
    }
    public function delete()
    {
        $id = $_GET['id'];
        if ($this->category->deleteCategory($id)) {
            header('location: ?role=admin&controller=category');
        }
        setFlashData('msg','Xóa danh mục thành công');
        setFlashData('color','green');
    }
    public function edit()
    {
        $id = $_GET['id'];
        $category = $this->category->getCategoryById($id);
        $content = 'admin/category/Edit';
        $this->view('admin_layout', $content, ['category' => $category, 'id' => $id]);
    }
    public function update()
    {
        $id = $_GET['id'];
        if (isset($_POST['btn-update'])) {
            $name = $_POST['category_name'];
            if ($this->category->updateCategory([$name, $id])) {
                setFlashData('msg', 'Cập nhật danh mục thành công');
                setFlashData('color', 'green');
                header('location: ?role=admin&controller=category');
            }
        }
    }
    public function create()
    {
        $content = 'admin/category/Add';
        $this->view('admin_layout', $content);
    }
    public function add()
    {
        if (isset($_POST['btn-add'])) {
            $name = $_POST['category_name'];
            if ($this->category->insertCategory([$name])) {
                setFlashData('msg', 'Thêm danh mục thành công');
                setFlashData('color', 'green');
                header('location: ?role=admin&controller=category');
            }
            
        }
    }
    public function deleteByCheckBox()
    {
       deleteByCheckBox($this->category, 'category');
    }
}
