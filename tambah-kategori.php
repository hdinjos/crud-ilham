<?php

require_once 'connection.php';

$nama_kategori = $_POST['nama_kategori'];


$sql = "INSERT INTO kategori (nama_kategori) VALUES('$nama_kategori')";
$result = $connect->query($sql);


if ($result) {
    //echo 'Data berhasil ditambahkan';
    header('Location: index.php');
} else {
    echo 'Gagal menghapus data: ' . $connect->error;
}

$connect->close();