<?php
    require_once 'connection.php';

    $id_kategori = $_GET['id_kategori'];

    $sql = "DELETE FROM kategori WHERE id_kategori=$id_kategori";
    $result = $connect->query($sql);

    if ($result) {
        //echo 'Data berhasil dihapus';
        header('Location: index.php');
    } else {
        echo 'Gagal menghapus data: ' . $connect->error;
    }

    $connect->close();

?>