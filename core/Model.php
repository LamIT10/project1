<?php
class Model extends Database
{
    public $conn;
    public function __construct()
    {
        $this->conn = $this->getConnect();
    }
    public function execFunction($sql, $param = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($param);
        } catch (PDOException $PDOException) {
            echo $PDOException->getMessage();
            die;
        }
    }
    public function selectFunction($sql, $param = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($param);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $PDOException) {
            echo $PDOException->getMessage();
            die;
        }
    }
    public function selectOneFunction($sql, $param = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($param);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $PDOException) {
            echo $PDOException->getMessage();
            die;
        }
    }
}
