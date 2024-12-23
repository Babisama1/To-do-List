<?php 

    if (isset($_POST['judul'])) {
        require '../koneksi.php';

        $judul = $_POST['judul'];

        if (empty($judul)){
            header("Location: ../index.php?mess=error");
        } else {
            $stmt = $kon->prepare("INSERT INTO todos(judul) VALUE(?)");
            $res = $stmt->execute([$judul]);

            if ($res) {
                header("Location: ../index.php?mess=success");
            }else {
                header("Location: ../index.php");
            }
            $kon = null;
            exit();
        }
    }else {
        header("Location: ../index.php?mess=error");
    }

?>