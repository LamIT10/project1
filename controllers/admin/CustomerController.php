<?php
class CustomerController extends Controller
{
    private $customer;
    public function __construct()
    {
        $this->loadModel('CustomerModel');
        $this->customer = new CustomerModel();
    }
    public function admin()
    {
        $listAdmin = $this->customer->getAllAdmin();
        $content = 'admin/customer/ListAdmin';
        $this->view('admin_layout', $content, ['listAdmin' => $listAdmin]);
    }
    public function index()
    {
        $listCustomer = $this->customer->getAllCustomer();
        $content = 'admin/customer/ListCustomer';
        $this->view('admin_layout', $content, ['listCustomer' => $listCustomer]);
    }
    public function create()
    {
        $content = 'admin/customer/Add';
        $this->view('admin_layout', $content);
    }
    public function add($param = [])
    {
        if (isset($_POST['btn-add'])) {
            $customer_name = $_POST['customer_name'];
            $customer_pass = $_POST['customer_pass'];
            $customer_email = $_POST['customer_email'];
            $customer_role = isset($_POST['customer_role']) ? $_POST['customer_role'] : 0;
            $customer_phone = $_POST['customer_phone'];
            $customer_img = $_FILES['customer_img']['name'];
            move_uploaded_file($_FILES['customer_img']['tmp_name'], 'uploads/img/' . $customer_img);
            $this->customer->addCustomerByAdmin([$customer_name, $customer_pass, $customer_email, $customer_phone, $customer_img, $customer_role]);
            if ($customer_role == 0) {
                header('location: ?role=admin&controller=customer');
            } else {
                header('location: ?role=admin&controller=customer&action=admin');
            }
        }
    }
    public function delete()
    {
        $id = $_GET['id'];
        $this->customer->deleteCustomer($id);
        isset($_GET['check']) ? header('location: ?role=admin&controller=customer&action=admin') : header('location: ?role=admin&controller=customer');
    }
    public function edit(){
        $id = $_GET['id'];
        $customer = $this->customer->getCustomerById($id);
        $content = 'admin/customer/Edit';
        $this->view('admin_layout', $content, ['customer' => $customer]);
    }
    public function update(){
        $id = $_GET['id'];
        if(isset($_POST['btn-update'])){
            $customer_name = $_POST['customer_name'];
            $customer_email = $_POST['customer_email'];
            $customer_role = isset($_POST['customer_role']) ? $_POST['customer_role'] : 0;
            $customer_phone = $_POST['customer_phone'];
            $customer_img = $_FILES['customer_img']['name'];
            if(empty($customer_img)){
                $customer_img = null;
            }
            else{
                move_uploaded_file($_FILES['customer_img']['tmp_name'], 'uploads/img/' . $customer_img);
            }
            $success = $this->customer->updateCustomer(['customer_name'=>$customer_name, 'customer_email'=> $customer_email,'customer_phone'=> $customer_phone,'customer_img'=> $customer_img,'customer_role'=> $customer_role,'customer_id'=> $id]);
            if($success){
                ($customer_role !== 0) ? header('location: ?role=admin&controller=customer&action=admin') : header('location: ?role=admin&controller=customer');
            }
        }
    }
}
