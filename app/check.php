<?php 
    if (isset($_POST['id'])) {
        require '../koneksi.php';

        $id = $_POST['id'];

        if (empty($id)) {
            echo 'error';
        } else {
            // Use a prepared statement to fetch the todo item
            $todos = $kon->prepare("SELECT id, cek FROM todos WHERE id = ?");
            $todos->execute([$id]);

            $todo = $todos->fetch();

            if ($todo) {
                $uId = $todo['id'];
                $checked = $todo['cek'];

                // Toggle the checked value (0 <-> 1)
                $uChecked = $checked ? 0 : 1;

                // Update the status with prepared statements to prevent SQL injection
                $update = $kon->prepare("UPDATE todos SET cek = ? WHERE id = ?");
                $update->execute([$uChecked, $uId]);

                if ($update) {
                    echo $uChecked; // Output the new "checked" value (0 or 1)
                } else {
                    echo "error";
                }
            } else {
                echo "error"; // Handle case when the todo item isn't found
            }

            $kon = null;
            exit();
        }
    } else {
        header("Location: ../index.php?mess=error");
    }
?>
