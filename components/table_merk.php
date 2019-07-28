
<div class="col">
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>#ID merk</th>
                <th>Nama merk</th>
                <th colspan="2" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result_merk->num_rows > 0) {
            // output data of each row
            while($row = $result_merk->fetch_assoc()) {

                $id_merk        = $row['id_merk'];
                $nama_merk       = $row['nama_merk'];

                echo "<tr>";
                echo "<td> $id_merk</td>";
                echo "<td> $nama_merk</td>";
                echo "<td class='text-center'><a role='button' class='btn btn-primary' href='edit_merk.php?id_merk=$id_merk'>&#9998;</a></td>";
                echo "<td class='text-center'><a role='button' class='btn btn-danger' href='delete_merk.php?id_merk=$id_merk'>&#215;</a></td>";
                echo "<tr>";
            }
        } else {
            echo " <td colspan='7'><center> 0 results </center></td>";
        }
        ?>
        </tbody>
    </table>
</div>