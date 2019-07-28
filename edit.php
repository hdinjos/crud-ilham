<?php
    session_start();

    require_once 'connection.php';
    require_once 'template/header.php';

    $id_produk    = $_GET['id_produk'];
    $sql = "SELECT * FROM produk WHERE id_produk=$id_produk";
    $sql_kategori = "SELECT * FROM kategori";
    $sql_merk = "SELECT * FROM merk";


    $res_get_data = $connect->query($sql);
    $res_get_kategori = $connect->query($sql_kategori);
    $res_get_merk = $connect->query($sql_merk);

    foreach($res_get_data as $data){
        $nama_produk = $data['nama_produk'];
        $warna_produk = $data['warna'];
        $jumlah_produk = $data['jumlah'];
        $id_merk = $data['id_merk'];
        $id_kategori = $data['id_kategori'];
    }

    if ( isset($_POST['ubah-data']) ) {

        $id_produk    = $_POST['id_produk'];
        $nama_produk = $_POST['nama_produk'];
        $warna_produk = $_POST['warna_produk'];
        $jumlah_produk = $_POST['jumlah_produk'];
        $id_merk = $_POST['id_merk'];
        $id_kategori = $_POST['id_kategori'];


        $sql = "UPDATE produk SET nama_produk='$nama_produk', warna='$warna_produk', jumlah='$jumlah_produk', id_merk='$id_merk', id_kategori='$id_kategori' WHERE id_produk=$id_produk";
        $result = $connect->query($sql);

        if ($result) {
            $_SESSION['message'] = 'Data Berhasil di tambahkan!';
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
        <form action="edit.php" method="POST" class="form">
            <input type="number" class="form-control" name="id_produk" hidden value="<?=$id_produk?>">
            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" class="form-control" name="nama_produk" required  value="<?=$nama_produk?>">
            </div>
            <div class="form-group">
                <label>Warna Produk</label>
                <input type="text" class="form-control" name="warna_produk" value="<?=$warna_produk?>" required>
            </div>
            <div class="form-group">
                <label>Jumlah Produk</label>
                <input type="number" class="form-control" name="jumlah_produk" value="<?=$jumlah_produk?>" required>
            </div>
            <div class="form-group">
                <label>Merk</label>
                <select name="id_merk" class="form-control" required>
                    <?php foreach($res_get_merk as $merk) { ?>
                        <option <?php echo $merk['id_merk'] == $id_merk ? "selected" : "" ?> value="<?php echo $merk['id_merk']; ?>"><?php echo $merk['nama_merk']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="id_kategori" class="form-control" required>
                    <?php foreach($res_get_kategori as $kategori) { ?>
                        <option <?php echo $kategori['id_kategori'] == $id_kategori ? "selected" : "" ?> value="<?php echo $kategori['id_kategori']; ?>"><?php echo $kategori['nama_kategori']; ?></option>
                    <?php } ?>
                </select>
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