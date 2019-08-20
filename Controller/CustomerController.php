<?php
include_once '../Model/DBconnect.php';
include_once '../Model/CustomerDB.php';
include_once '../Model/Customer.php';

class CustomerController
{
    public $customerDB;

    public function __construct()
    {
        $this->customerDB = new CustomerDB();
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include_once 'View/add.php';
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_REQUEST['name'];
            $email = $_REQUEST['email'];
            $address = $_REQUEST['address'];
            if (!empty($name) && !empty($email) && !empty($address)) {
                $customer = new Customer($name, $email, $address);
                $this->customerDB->create($customer);

            }
            header('location:index_DanhSach.php');
        }
    }

    public function index()
    {
        $customers = $this->customerDB->getAll();
        include 'View/display.php';

    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_REQUEST['id'];
            $this->customerDB->delete($id);
            header('location:index_DanhSach.php');
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include_once 'View/update.php';
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_REQUEST['id'];
            $name = $_REQUEST['name'];
            $email = $_REQUEST['email'];
            $address = $_REQUEST['address'];

            if (!empty($name) && !empty($email) && !empty($address)) {
                $this->customerDB->update($id, $name, $email, $address);
                header('location:index_DanhSach.php');
            }
        }
    }
}
