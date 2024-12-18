<?php 
//koneksi ke database
$kon = mysqli_connect("localhost:3307", "root", "","todolist");


function query($query){
    global $kon;
    $result = mysqli_query($kon, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

?>