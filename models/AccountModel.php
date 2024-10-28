<?php
class AccountModel extends Model
{
    public function getAllInfor()
    {
        $sql = "SELECT * FROM customer where customer_id = ?";
        $param = [getSession('user')['customer_id']];
        $listInfor = $this->selectOneFunction($sql, $param);
        return $listInfor;
    }
    public function updateAccount($param = [])
    {
        if(isset($param['customer_img'])){
            $sql = "UPDATE customer SET customer_name = :customer_name, customer_img = :customer_img, customer_email = :customer_email, customer_phone = :customer_phone WHERE customer_id = :customer_id";
        }
        else{
            unset($param['customer_img']);
            $sql = "UPDATE customer SET customer_name = :customer_name, customer_email = :customer_email, customer_phone = :customer_phone WHERE customer_id = :customer_id";
        }
        return $this->execFunction($sql, $param);
    }
    public function updatePass($param=[]){
        $sql = "UPDATE customer SET customer_pass = ? WHERE customer_id = ?";
        $this->execFunction($sql,$param);
    }
   
}
