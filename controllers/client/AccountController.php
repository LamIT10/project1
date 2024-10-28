<?php
class AccountController extends Controller
{
    private $account;
    public function __construct()
    {
        $this->loadModel('AccountModel');
        $this->account = new AccountModel();
    }
    public function index()
    {
        $content = 'client/Account';
        $account = $this->account->getAllInfor();
        $this->view('client_layout', $content, ['account' => $account]);
    }
    public function edit()
    {
        $account = $this->account->getAllInfor();
        $content = 'client/FormEditAccount';
        $this->view('client_layout', $content, ['account' => $account]);
    }
    public function update()
    {
        $id = $_GET['id'];
        if (isset($_POST['btn-update-account'])) {
            $name = $_POST['customer_name'];
            $email = $_POST['customer_email'];
            $phone = $_POST['customer_phone'];
            $img = $_FILES['customer_img']['name'];
            if (empty($img)) {
                $img = null;;
            }
            move_uploaded_file($_FILES['customer_img']['tmp_name'], 'uploads/img/' . $img);
            $ss = $this->account->updateAccount(['customer_name' => $name, 'customer_img' => $img, 'customer_email' => $email, 'customer_phone' => $phone, 'customer_id' => $id]);
            if ($ss) {
                header('location:?controller=account');
                setFlashData('msg', 'Cập nhật thành công');
                setFlashData('color', 'green');
            }
        }
    }
    public function formChangePass()
    {
        $account = $this->account->getAllInfor();
        $content = 'client/FormChangePass';
        $this->view('client_layout', $content, ['account' => $account]);
    }
    public function changePass()
    {
        $account = $this->account->getAllInfor();
        $pass = $account['customer_pass'];
        $id = $account['customer_id'];
        if (isset($_POST['btn-change-pass'])) {
            $currentPass = $_POST['currentPass'];
            $newPass = $_POST['newPass'];
            $confirmPass = $_POST['confirmPass'];
            if ($currentPass == $pass && $newPass == $confirmPass) {
                $this->account->updatePass([$newPass, $id]);
                setFlashData('msg', 'Đổi mật khẩu thành công');
                setFlashData('color', 'green');
                header('location: ?controller=account&action=formChangePass');
            } else {
                setFlashData('msg', 'Đổi mật khẩu không thành công');
                setFlashData('color', 'red');
                header('location: ?controller=account&action=formChangePass');
            };
        }
    }
}
