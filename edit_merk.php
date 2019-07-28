<?php
    session_start();

    require_once 'connection.php';
    require_once 'template/header.php';

    $id_merk    = $_GET['id_merk'];
    $sql_merk = "SELECT * FROM merk where id_merk = $id_merk";


    $res_get_merk = $connect->query($sql_merk);

    foreach($res_get_merk as $data){
        $nama_merk = $data['nama_merk'];
    }

    if ( isset($_POST['ubah-data']) ) {

        $id_merk    = $_POST['id_merk'];
        $nama_merk = $_POST['nama_merk'];

        $sql = "UPDATE merk SET nama_merk='$nama_merk' WHERE id_merk=$id_merk";
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
        <form action="edit_merk.php" method="POST" class="form">
            <input type="number" class="form-control" name="id_merk" hidden value="<?=$id_merk?>">
            <div class="form-group">
                <label>Nama merk</label>
                <input type="text" class="form-control" name="nama_merk" required  value="<?=$nama_merk?>">
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