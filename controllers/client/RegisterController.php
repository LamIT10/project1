<?php
class RegisterController extends Controller
{
    public $user;
    public function __construct()
    {
        $this->loadModel('CustomerModel');
        $this->user = new CustomerModel();
    }
    public function index(){
        $content = 'client/Register';
        $this->view('client_layout',$content);
    }
    public function checkRegister()
    {
        if (isset($_POST['btn-register'])) {
            $name = $_POST['customer_name'];
            $email = $_POST['customer_email'];
            $phone = $_POST['customer_phone'];
            $password = $_POST['customer_pass'];
            $img = $_FILES['customer_img']['name'];
            move_uploaded_file($_FILES['customer_img']['tmp_name'], 'uploads/img/' . $img);
            $ss = $this->user->addCustomer([$name, $email, $phone, $password,$img]);
            var_dump($ss);
            if($ss){
                echo "aaaa";
                $customer = $this->user->findCustomer($email, $password);
                setSession('user', $customer);
                header('location:index.php');
            }

        }
    }
}
