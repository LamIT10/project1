<?php

class CategoryModel extends Model
{
    public $category;

    public function getAllCategory()
    {
        $sql = "SELECT * FROM category";
        $listCategory = $this->selectFunction($sql);
        return $listCategory;
    }
    public function getCategoryById($id)
    {
        $sql = "SELECT * FROM category WHERE category_id = ?";
        $param = [$id];
        return $this->selectOneFunction($sql, $param);
    }
    public function deleteCategory($id)
    {
        $sql = "DELETE FROM category WHERE category_id = ?";
        $param = [$id];
        return $this->execFunction($sql, $param);
    }
    public function updateCategory($param = [])
    {
        $sql = "UPDATE category SET category_name = ? WHERE category_id = ?";
        return $this->execFunction($sql, $param);
    }
    public function insertCategory($param = []){
        $sql = "INSERT INTO category (category_name) VALUES (?)";
        return $this->execFunction($sql, $param);
    }
    public function deleteByCheckBox($bind,$param=[]){
        $sql = "DELETE FROM category WHERE category_id IN ($bind)";
        return $this->execFunction($sql, $param);
    }
    
}
