<?php
    session_start();

    require_once 'connection.php';
    require_once 'template/header.php';

    $id_kategori    = $_GET['id_kategori'];
    $sql_kategori = "SELECT * FROM kategori where id_kategori = $id_kategori";


    $res_get_kategori = $connect->query($sql_kategori);

    foreach($res_get_kategori as $data){
        $nama_kategori = $data['nama_kategori'];
    }

    if ( isset($_POST['ubah-data']) ) {

        $id_kategori    = $_POST['id_kategori'];
        $nama_kategori = $_POST['nama_kategori'];

        $sql = "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id_kategori=$id_kategori";
        $result = $connect->query($sql);

        if ($result) {
            $_SESSION['message'] = 'Data Berhasil di ubah!';
            header('Location: index.php');
        } else {
            echo 'Gagal mengubah data: ' . $connect->error;
        }
    }
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm">
    <div class="container">
        <a href="index.php" class="navbar-brand">Beranda</a>
    </div>
</nav>

<main class="mt-5">
    <div class="container">
        <form action="edit_kategori.php" method="POST" class="form">
            <input type="number" class="form-control" name="id_kategori" hidden value="<?=$id_kategori?>">
            <div class="form-group">
                <label>Nama kategori</label>
                <input type="text" class="form-control" name="nama_kategori" required  value="<?=$nama_kategori?>">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="ubah-data">Ubah Data</button>
            </div>
        </form>
    </div>
</main>

<?php
require_once 'template/footer.php';
?>