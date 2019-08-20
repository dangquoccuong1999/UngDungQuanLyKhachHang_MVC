<?php
include_once "DBconnect.php";
include_once "Customer.php";

class CustomerDB
{
    public $connection;

    public function __construct()
    {
        $conn = new DBconnect();
        $this->connection = $conn->connect();
    }

    public function create($customer)
    {
        $sql = "INSERT INTO Customer(name, email, address) VALUES ('$customer->name','$customer->email','$customer->address')";
        $this->connection->query($sql);
    }

    public function getAll()
    {
        $sql = "select * from Customer";
        $mysql = $this->connection->query($sql);
        $result = $mysql->fetchAll();

        $arr = [];
        foreach ($result as $value) {
            $customer = new Customer($value['name'], $value['email'], $value['address']);
            $customer->id = $value['id'];
            array_push($arr, $customer);
        }
        return $arr;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM Customer where id = '$id'";
        $mysql = $this->connection->query($sql);
    }

    public function update($id,$name,$email,$address)
    {
        $sql = "UPDATE `Customer` SET `name`='$name',`email`='$email',`address`='$address' WHERE id = '$id'";
        $mysql = $this->connection->query($sql);
    }
}




