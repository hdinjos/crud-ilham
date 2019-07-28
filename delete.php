<?php
    require_once 'connection.php';

    $id_produk = $_GET['id_produk'];

    $sql = "DELETE FROM produk WHERE id_produk=$id_produk";
    $result = $connect->query($sql);

    if ($result) {
        //echo 'Data berhasil dihapus';
        header('Location: index.php');
    } else {
        echo 'Gagal menghapus data: ' . $connect->error;
    }

    $connect->close();

?>