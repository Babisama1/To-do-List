<?php 
//memperingati user dibutukan sebuah nama
if (empty($_POST["nama"])) {
    die("Nama dibutuhkan!");
}
//memperingati user dibutuhkan email yang valid dengan menggunakan @
if (! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) ) {
    die("Valid email dibutuhkan!");
}
//memperingati user untuk mengisi password 5 karakter atau lebih
if (strlen($_POST["password"]) < 5) {
    die("Password harus berisikan 5 atau lebih karakter");
}
//memperingati user untuk mengisi password harus ada satu buah huruf 
if (! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password harus berisikan satu buah huruf");
}
//memperingati user untuk mengisi password harus ada satu buah angka
if (! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password harus berisikan satu buah angka");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Password harus sama");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__. "/koneksi.php";

// Cek apakah email sudah ada
$email = $_POST["email"];
$sql_check = "SELECT id FROM user WHERE email = ?";
$stmt_check = $mysqli->stmt_init();

if (! $stmt_check->prepare($sql_check)) {
    die("SQL error: " . $mysqli->error);
}

$stmt_check->bind_param("s", $email);
$stmt_check->execute();
$stmt_check->store_result();

if ($stmt_check->num_rows > 0) {
    die("Email sudah diambil");
}

// Jika email belum ada, masukkan data baru
$sql = "INSERT INTO user (nama, email, password) VALUES(?,?,?)";

$stmt = $mysqli->stmt_init();

if (! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss", $_POST["nama"], $_POST["email"], $password_hash);

if ($stmt->execute()) {
    header("Location: signup-sukses.html");
    exit;
} else {
    die("Terjadi kesalahan: " . $stmt->error);
}
