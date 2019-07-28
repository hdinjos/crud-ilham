<?php

require_once 'connection.php';

$nama_merk = $_POST['nama_merk'];


$sql = "INSERT INTO merk (nama_merk) VALUES('$nama_merk')";
$result = $connect->query($sql);


if ($result) {
    //echo 'Data berhasil ditambahkan';
    header('Location: index.php');
} else {
    echo 'Gagal menghapus data: ' . $connect->error;
}

$connect->close();