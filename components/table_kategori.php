<div class="col">
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>#ID Kategori</th>
                <th>Nama Kategori</th>
                <th colspan="2" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result_kategori->num_rows > 0) {
            // output data of each row
            while($row = $result_kategori->fetch_assoc()) {

                $id_kategori         = $row['id_kategori'];
                $nama_kategori        = $row['nama_kategori'];

                echo "<tr>";
                echo "<td> $id_kategori </td>";
                echo "<td> $nama_kategori </td>";
                echo "<td class='text-center'><a role='button' class='btn btn-primary' href='edit_kategori.php?id_kategori=$id_kategori'>&#9998;</a></td>";
                echo "<td class='text-center'><a role='button' class='btn btn-danger' href='delete_kategori.php?id_kategori=$id_kategori'>&#215;</a></td>";
                echo "<tr>";
            }
        } else {
            echo " <td colspan='7'><center> 0 results </center></td>";
        }
        ?>
        </tbody>
    </table>
</div>