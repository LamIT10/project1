<?php
class CustomerModel extends Model
{
    public function findCustomer($email, $password)
    {
        $sql = "SELECT * FROM customer WHERE customer_email = ? AND customer_pass = ?";
        $param = [$email, $password];
        $customer = $this->selectOneFunction($sql, $param);
        return $customer;
    }
    public function findPass($email = "")
    {
        $sql = "SELECT customer_pass FROM customer WHERE customer_email = ?";
        $param = [$email];
        return $this->selectOneFunction($sql, $param);
    }
    public function addCustomer($data = [])
    {
        $sql = "INSERT INTO customer (customer_name, customer_email, customer_phone, customer_pass,customer_img) VALUES (?, ?, ?, ?, ?)";
        return $this->execFunction($sql, $data);
    }
    public function addCustomerByAdmin($data = [])
    {
        $sql = "INSERT INTO customer (customer_name, customer_pass,customer_email, customer_phone,customer_img,customer_role) VALUES (?, ?, ?, ?, ?, ?)";
        return $this->execFunction($sql, $data);
    }
    public function getAllAdmin()
    {
        $sql = "SELECT * FROM customer where customer_role IN (1,2)";
        return $this->selectFunction($sql);
    }
    public function getAllCustomer()
    {
        $sql = "SELECT * FROM customer where customer_role = 0";
        return $this->selectFunction($sql);
    }
    public function deleteCustomer($id)
    {
        $sql = "DELETE FROM customer WHERE customer_id = ?";
        return $this->execFunction($sql, [$id]);
    }
    public function getCustomerById($id)
    {
        $sql = "SELECT * FROM customer WHERE customer_id = ?";
        $param = [$id];
        return $this->selectOneFunction($sql, $param);
    }
    public function updateCustomer($data = [])
    {
        if (isset($data['customer_img'])) {

            $sql = "UPDATE customer SET customer_name = :customer_name, customer_email = :customer_email,customer_phone = :customer_phone,  customer_img = :customer_img, customer_role = :customer_role WHERE customer_id = :customer_id";
        } else {
            unset($data['customer_img']);
            $sql = "UPDATE customer SET customer_name = :customer_name, customer_email = :customer_email,customer_phone = :customer_phone, customer_role = :customer_role WHERE customer_id = :customer_id";
        }
        return $this->execFunction($sql, $data);
    }
}
