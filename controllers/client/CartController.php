<?php
class CartController extends Controller
{
    private $cart;
    public function __construct()
    {
        $this->loadModel('CartModel');
        $this->cart = new CartModel;
    }
    public function index()
    {
        $content = 'client/Cart';
        $listCart = $this->cart->getCartOfCustomer(getSession('user')['customer_id']);
        $this->view('client_layout', $content, ['listCart' => $listCart]);
    }
    public function add()
    {
        $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : $_GET['id'];
        $cart_quantity = isset($_POST['cart_quantity']) ? $_POST['cart_quantity'] : 1;
        $customer_id = getSession('user')['customer_id'];
        $this->cart->addToCart([$product_id, $cart_quantity, $customer_id]);
        setFlashData('msg', 'Thêm vào giỏ hàng thành công');
        setFlashData('color', 'green');
        header("location:" . $_SERVER['HTTP_REFERER']);
    }
    public function delete()
    {
        $id = $_GET['id'];
        $this->cart->deleteCart($id);
        header('location: ?controller=cart');
    }
}
