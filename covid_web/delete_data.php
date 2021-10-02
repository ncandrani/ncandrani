<?php

include_once('functions.php');

$func = new functions();

$id = $_GET["id"];

if ($func->deletePatient($id) > 0){
    echo "
        <script>
            alert('Data Berhasil dihapus');
            document.location.href = 'list_data.php';
        </script>
        ";
}
else{
    echo "
        <script>
            alert('Data gagal dihapus');
            document.location.href = 'list_data.php';
        </script>
        ";
}

?>