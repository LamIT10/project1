<?php
class ProductModel extends Model
{
    public $product;
    public function getAllProduct()
    {
        $sql = "SELECT * FROM product";
        $listProduct = $this->selectFunction($sql);
        return $listProduct;
    }
    public function getAllProductJoinCate()
    {
        $sql = "SELECT a.*,b.category_name FROM product a inner join category b on a.category_id = b.category_id";
        $listProduct = $this->selectFunction($sql);
        return $listProduct;
    }
    public function countProductOfCategory()
    {
        $sql = "SELECT count(*) as quantity, b.category_name FROM product a inner join category b on a.category_id = b.category_id group by b.category_id";
        $listCount = $this->selectFunction($sql);
        return $listCount;
    }
    public function search($key)
    {
        $sql = "SELECT a.*, b.category_name FROM product a inner join category b on a.category_id = b.category_id WHERE a.product_name LIKE '%" . $key . "%'";
        $listProductSearched = $this->selectFunction($sql);
        return $listProductSearched;
    }
    public function searchProductByCategory($key)
    {
        $sql = "SELECT a.*, b.category_name FROM product a inner join category b on a.category_id = b.category_id WHERE a.category_id = $key";
        $listProductSearched = $this->selectFunction($sql);
        return $listProductSearched;
    }
    public function getProductDetail($key)
    {
        $sql = "SELECT * FROM product WHERE product_id = $key";
        $productDetail = $this->selectOneFunction($sql);
        return $productDetail;
    }
    public function increaseView($id)
    {
        $sql = "UPDATE product SET product_view = product_view +1 where product_id= ?";
        $this->execFunction($sql, [$id]);
    }
    public function getStarOnProduct()
    {
        $sql = "SELECT AVG(comment_star) as star,product_id FROM comment group by product_id";
        $star = $this->selectFunction($sql);
        return $star;
    }
    public function insertProduct($param = [])
    {
        $sql = "INSERT INTO product (product_name, product_price, product_date, product_unique, product_discount, product_des, category_id, product_img) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $this->execFunction($sql, $param);
    }
    public function updateProduct($param = [])
    {
        if (isset($param['product_img'])) {
            $sql = "UPDATE product set product_name = :product_name, product_price = :product_price, product_date = :product_date, product_unique = :product_unique, product_discount = :product_discount, product_des = :product_des, category_id = :category_id, product_img = :product_img WHERE product_id = :product_id";
        } else {
            $sql = "UPDATE product set product_name = :product_name, product_price = :product_price, product_date = :product_date, product_unique = :product_unique, product_discount = :product_discount, product_des = :product_des, category_id = :category_id WHERE product_id = :product_id";
        }
        return $this->execFunction($sql, $param);
    }
    public function deleteProduct($id)
    {
        $sql = "DELETE FROM product WHERE product_id = ?";
        $param = [$id];
        return $this->execFunction($sql, $param);
    }
    public function deleteByCheckBox($bind, $param = [])
    {
        $sql = "DELETE FROM product WHERE product_id IN ($bind)";
        return $this->execFunction($sql, $param);
    }
    public function filterByView()
    {
        $sql = "SELECT * FROM product ORDER BY product_view DESC LIMIT 8";
        return $this->selectFunction($sql);
    }
    public function filterByStar()
    {
        $sql = "SELECT a.* FROM product a inner join comment b on a.product_id = b.product_id group by b.product_id ORDER BY AVG(comment_star) desc LIMIT 8";
        return $this->selectFunction($sql);
    }
    public function filterByDiscount()
    {
        $sql = "SELECT * FROM product ORDER BY product_discount DESC LIMIT 8";
        return $this->selectFunction($sql);
    }
}
