<?php
include_once '../Model/DBconnect.php';
include_once '../Model/CustomerDB.php';
include_once '../Model/Customer.php';
include_once '../Controller/CustomerController.php';

$customer = new CustomerController();
$data = $customer->index();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ứng Dụng Quản Lý Khách Hàng</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <style type="text/css">
        .example{
            margin: 20px;
        }
    </style>
</head>
<body>
<div class="example">
    <div class="container">
        <div class="row">
            <h2>Khách Hàng</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ Tên</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $key) {?>
                <tr>
                    <td><?php echo $key->getId() ?></td>
                    <td><?php echo $key->getName() ?></td>
                    <td><?php echo $key->getEmail() ?></td>
                    <td><?php echo $key->getAddress() ?></td>
                    <td><a href="update.php?id=<?php echo $key->getId()?>"><button>Update User</button></a></td>
                    <td><a href="delete.php?id=<?php echo $key->getId()?>"><button>Delete</button></a></td>
                </tr>
                <?php }?>
                </tbody>
                <tr>
                   <td>
                       <a href="add.php"><button type="button" class="btn btn-success">Add User</button></a>
                   </td>
                </tr>
            </table>
        </div>
    </div>

</div>
</body>
</html>