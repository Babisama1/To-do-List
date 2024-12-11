<?php
//koneksi ke database
$kon = mysqli_connect("localhost:3307", "root", "","todolist");
//mengambil data dari tabel todolist
$result = mysqli_query($kon, "SELECT * FROM todolistdb");

if ($result) {
    echo mysqli_error($kon);
    echo "Tidak ada masalah bung";
    echo "<br>";
}

//ambil data (fetch) todolistdb dari object result
// mysqli_fetch_row() //mengembalikan array numerik
// mysqli_fetch_assoc() //mengembalikan array associative
// mysqli_fetch_array() //mengembalikan keduanya
// mysqli_fetch_object() //mengembalikan dengan ->

// while ($todo = mysqli_fetch_assoc($result)){
//     var_dump($todo);
// }


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
        <?php while($todo = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <th><?= $i ?></th>
            <th><?= $todo["judul"]?></th>
            <th><?= $todo["deskripsi"] ?></th>
            <th><?= $todo["jatuh_tempo"] ?></th>
            <th><?= $todo["statuss"] ?></th>
        </tr>
        <?php $i++; ?>
        <?php endwhile; ?>

    </table>

    
</body>
</html>