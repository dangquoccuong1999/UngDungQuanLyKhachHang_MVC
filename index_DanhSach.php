<?php
include_once 'Model/DBconnect.php';
include_once 'Model/CustomerDB.php';
include_once 'Model/Customer.php';
include_once 'Controller/CustomerController.php';

$user = new CustomerController();
$user->index();