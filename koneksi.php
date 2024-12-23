<?php 

$localhost = "localhost:3307";
$root = "root";
$pass = "";
$db_name = "todo-list";

try {
    $kon = new PDO("mysql:host=$localhost;dbname=$db_name",$root,$pass);
    $kon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Connection failed ". $e->getMessage();
}

?> 