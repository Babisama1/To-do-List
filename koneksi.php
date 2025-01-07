<?php
$host = "localhost:3307";
$username = "root";
$password = "";
$db_name = "to_do_list";

$mysqli = new mysqli($host, $username, $password, $db_name);

if ($mysqli->connect_errno) {
    die("Koneksi error" . $mysqli->connect_error);
}

return $mysqli;