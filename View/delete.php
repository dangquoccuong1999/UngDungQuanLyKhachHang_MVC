<?php
include_once '../Controller/CustomerController.php';
$deleteUser = new CustomerController();
$deleteUser->delete();