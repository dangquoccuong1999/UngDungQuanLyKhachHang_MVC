<?php


class DBconnect
{
    public $user;
    public $password;
    public $link;
    public $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    public function __construct()
    {
        $this->user = 'root';
        $this->password = '123456@Abc';
        $this->link = "mysql:host=localhost;dbname=Customer";
    }

    public function connect()
    {
        try {
            $conn = new PDO($this->link, $this->user, $this->password, $this->options);
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }
        return $conn;
    }
}
