<?php
require 'functions.php';
$apk = query ("SELECT *FROM todolistdb");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tabel</title>
</head>
<body>
    <h1>Halaman Tabel</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Id</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Jatuh Tempo</th>
            <th>Status</th>
        </tr>   

        <?php $i = 1; ?>
        <?php foreach($apk as $todo) : ?>
        <tr>
            <th><?= $i ?></th>
            <th><?= $todo["judul"]?></th>
            <th><?= $todo["deskripsi"] ?></th>
            <th><?= $todo["jatuh_tempo"] ?></th>
            <th><?= $todo["statuss"] ?></th>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>

    </table>

    
</body>
</html>