<?php
class CommentModel extends Model
{
    public function getCommentOfProduct($id)
    {
        $sql = "SELECT comment_id,comment_content,comment_date,comment_star, b.customer_name, b.customer_id,b.customer_img FROM comment a inner join customer b on a.customer_id = b.customer_id where product_id = ?";
        $param = [$id];
        $listComment = $this->selectFunction($sql, $param);
        return $listComment;
    }
    public function addComment($data = [])
    {
        $sql = "INSERT INTO comment (comment_content, comment_date, product_id, customer_id, comment_star) VALUES (?, ?, ?, ?,?)";
        $product_id = $_GET['product_id'];
        $param = $data;
        $this->execFunction($sql, $param);
    }
    public function deleteComment($id)
    {
        $sql = "DELETE FROM comment WHERE comment_id =?";
        $param = [$id];
        $this->execFunction($sql, $param);
    }
    public function getAllComment()
    {
        $sql = "SELECT * FROM comment a inner join product b on a.product_id = b.product_id";
        return $this->selectFunction($sql);
    }
    public function countCommentByIdProduct()
    {
        $sql = "SELECT count(a.product_id) as count, a.product_id as product_id,MAX(a.comment_date) as day_max,MIN(a.comment_date) as day_min,b.product_name as product_name FROM comment a left join product b on a.product_id = b.product_id group by a.product_id";
        $list = $this->selectFunction($sql);
        return $list;
    }
    public function getCommentById($id){
        $sql = "SELECT a.*,b.product_name,c.customer_name from comment a inner join product b on a.product_id = b.product_id inner join customer c on a.customer_id = c.customer_id where a.product_id = ?";
        $param = [$id];
        return $this->selectFunction($sql, $param);
    }
    public function deleteByCheckBox($bind, $param = [])
    {
        $sql = "DELETE FROM comment WHERE comment_id IN ($bind)";
        return $this->execFunction($sql, $param);
    }

}
