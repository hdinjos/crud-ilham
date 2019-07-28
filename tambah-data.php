<?php

require_once 'connection.php';

$nama_produk = $_POST['nama_produk'];
$warna_produk = $_POST['warna_produk'];
$jumlah_produk = $_POST['jumlah_produk'];
$id_merk = $_POST['id_merk'];
$id_kategori = $_POST['id_kategori'];
$nama_kategori = $_POST['nama_kategori'];
$nama_merk = $_POST['nama_merk'];

$sql = "INSERT INTO produk (nama_produk,warna,jumlah,id_merk,id_kategori) VALUES('$nama_produk','$warna_produk',$jumlah_produk,$id_merk,$id_kategori)";
$result = $connect->query($sql);


if ($result) {
    //echo 'Data berhasil ditambahkan';
    header('Location: index.php');
} else {
    echo 'Gagal menghapus data: ' . $connect->error;
}

$connect->close();