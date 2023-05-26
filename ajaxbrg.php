<?php
require 'function.php';

$searchbrg = $_GET['searchbrg'];
$query = "SELECT *FROM tbl_brg 
WHERE 
nama_brg LIKE '%$searchbrg%' 
";
$querybrg = ambildata($query);



?>

<table cellspacing="0" class="statistics-card">
    <tr class="tr-style">
        <th colspan="4">
            <br>
        </th>
    </tr>
    <tr class="tr-style fw-bold">
        <td>
            ID Barang
        </td>
        <td>
            Barang
        </td>
        <td>
            Ketersediaan
        </td>
    </tr>

    <?php $no = 1; ?>
    <?php foreach ($querybrg as $row1) : ?>
        <tr>
            <td>
                B-<?php echo $row1['id_brg'] ?>
            </td>
            <td>
                <?php echo $row1['nama_brg'] ?>
            </td>
            <td>
                <?php echo $row1['jum_ketersediaan'] ?>
            </td>
        </tr>
        <?php $no++; ?>
    <?php endforeach; ?>
</table>