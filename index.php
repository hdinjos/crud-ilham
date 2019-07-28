<?php
    session_start();
    
    require_once 'connection.php';
    require_once 'template/header.php';

    $sql = "SELECT produk.id_produk, produk.nama_produk, produk.warna, produk.jumlah, kategori.nama_kategori, merk.nama_merk 
            FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori 
            JOIN merk ON produk.id_merk=merk.id_merk";
    $result = $connect->query($sql);


    $sql_merk = "SELECT * FROM merk";
    $result_merk = $connect->query($sql_merk);

    $sql_kategori = "SELECT * FROM kategori";
    $result_kategori = $connect->query($sql_kategori);


    $connect->close();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm">
    <div class="container">
        <a href="index.php" class="navbar-brand">E-commerce</a>
        <ul class="nav justify-content-end">
            <li class="nav-item mr-2">
                <button type="button" class="btn btn-primary btn-sm nav-link" data-toggle="modal" data-target="#modalTambahData">Tambah Data</button>
            </li>
            <li class="nav-item mr-2">
                <button type="button" class="btn btn-primary btn-sm nav-link" data-toggle="modal" data-target="#modalTambahkategori">Tambah Kategori</button>
            </li>
            <li class="nav-item mr-2">
                <button type="button" class="btn btn-primary btn-sm nav-link" data-toggle="modal" data-target="#modalTambahmerk">Tambah Merk</button>
            </li>
        </ul>
    </div>
</nav>

<main class="mt-5">
    <div class="container">
        <div class="row">
            <?php require_once 'components/table_produk.php' ?>
        </div>
    </div>
</main>

<main class="mt-5">
    <div class="container">

        
    </div>
</main>

<main class="mt-5">
    <div class="container">
        <div class="row">
            <?php
                require_once 'components/table_kategori.php';
                require_once 'components/table_merk.php';
            ?>
        </div>
    </div>
</main>

<div class="modal fade" tabindex="-1" role="dialog" id="modalTambahData" aria-hidden="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
            </div>
            <div class="modal-body">
                <form action="tambah-data.php" method="POST" class="form">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" required>
                    </div>
                    <div class="form-group">
                        <label>Warna Produk</label>
                        <input type="text" class="form-control" name="warna_produk" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Produk</label>
                        <input type="number" class="form-control" name="jumlah_produk" required>
                    </div>
                    <div class="form-group">
                        <label>Merk</label>
                        <select name="id_merk" class="form-control" required>
                        <?php foreach($result_merk as $merk) {?>
                            <option value="<?php echo $merk['id_merk']; ?>"><?php echo $merk['nama_merk']; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="id_kategori" class="form-control" required>
                        <?php foreach($result_kategori as $kategori) {?>
                            <option value="<?php echo $kategori['id_kategori']; ?>"><?php echo $kategori['nama_kategori']; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                        <button class="btn btn-primary" type="submit" name="tambah_data">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalTambahkategori" aria-hidden="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kategori</h5>
            </div>
            <div class="modal-body">
                <form action="tambah-kategori.php" method="POST" class="form">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" name="nama_kategori" required>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                        <button class="btn btn-primary" type="submit" name="tambah_data">Tambah Kategori</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalTambahmerk" aria-hidden="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Merk</h5>
            </div>
            <div class="modal-body">
                <form action="tambah-merk.php" method="POST" class="form">
                    <div class="form-group">
                        <label>Nama Merk</label>
                        <input type="text" class="form-control" name="nama_merk" required>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                        <button class="btn btn-primary" type="submit" name="tambah_data">Tambah Merk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'template/footer.php'
?>
    
