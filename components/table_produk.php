<div class="col">
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>#ID Produk</th>
                <th>Nama Produk</th>
                <th>Warna</th>
                <th>Jumlah Produk</th>
                <th>Merk</th>
                <th>Kategori</th>
                <th colspan="2" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {

                $id_produk          = $row['id_produk'];
                $nama_produk        = $row['nama_produk'];
                $warna_produk       = $row['warna'];
                $jumlah_produk      = $row['jumlah'];
                $merk_produk        = $row['nama_merk'];
                $kategori_produk    = $row['nama_kategori'];

                echo "<tr>";
                echo "<td> $id_produk </td>";
                echo "<td> $nama_produk </td>";
                echo "<td> $warna_produk </td>";
                echo "<td> $jumlah_produk </td>";
                echo "<td> $merk_produk </td>";
                echo "<td> $kategori_produk </td>";
                echo "<td class='text-center'><a role='button' class='btn btn-outline-primary' href='edit.php?id_produk=$id_produk'>&#9998;</a></td>";
                echo "<td class='text-center'><a role='button' class='btn btn-outline-danger' href='delete.php?id_produk=$id_produk'>&#215;</a></td>";
                echo "<tr>";
            }
        } else {
            echo " <td colspan='7'><center> 0 results </center></td>";
        }
        ?>
        </tbody>
    </table>
</div>