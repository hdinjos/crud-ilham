<?php
    require_once 'connection.php';

    $id_merk = $_GET['id_merk'];

    $sql = "DELETE FROM merk WHERE id_merk=$id_merk";
    $result = $connect->query($sql);

    if ($result) {
        //echo 'Data berhasil dihapus';
        header('Location: index.php');
    } else {
        echo 'Gagal menghapus data: ' . $connect->error;
    }

    $connect->close();

?>