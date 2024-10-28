<?php
class LoginController extends Controller
{
    public $user;
    public function __construct()
    {
        $this->loadModel('CustomerModel');
        $this->user = new CustomerModel();
    }
    public function index()
    {
        $content = 'client/Login';
        $this->view('client_layout', $content);
    }
    public function checkLogin()
    {
        if (isset($_POST['btn-login'])) {
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $customer = $this->user->findCustomer($email, $pass);
            if ($customer) {
                $user = $customer;
                setSession('user', $user);
                header('location: ./');
            } else {
                setFlashData('msg', 'Tài khoản hoặc mật khẩu không đúng');
                setFlashData('color', 'red');
                header('location: ?controller=login');
            }
        }
    }
    public function forget(){
        $content = 'client/ForgetPass';
        $this->view('client_layout', $content);
    }
    public function getpass(){
        if(isset($_POST['btn-forget'])){
            $email = $_POST['email'];
            $customer = $this->user->findPass($email);
            var_dump($customer);
            if($customer){
                $pass = $customer['customer_pass'];
                setFlashData('msg', "Mật khẩu của bạn là: $pass");
                setFlashData('color', 'green');
                header('location: ?controller=login&action=forget');
            }else{
                setFlashData('msg', "Không tìm thấy tài khoản của bạn");
                setFlashData('color', 'red');
                header('location: ?controller=login&action=forget');
            }
        }
    }
}
