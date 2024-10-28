<?php
class CartModel extends Model{
    public function getCartOfCustomer($id){
        $sql = "SELECT a.*,b.product_name,b.product_price,b.product_img FROM cart a inner join product b on a.product_id = b.product_id inner join customer c on a.customer_id = c.customer_id WHERE a.customer_id = $id";
        $listCart = $this->selectFunction($sql);
        return $listCart;
    }
    public function addToCart($param=[]){
        $sql = "INSERT INTO cart(product_id,cart_quantity,customer_id) VALUES(?,?,?)";
        $this->execFunction($sql,$param);
    }
    public function deleteCart($id)
    {
        $sql = "DELETE FROM cart WHERE cart_id = ?";
        $param = [$id];
        $this->execFunction($sql, $param);
    }

}

?>