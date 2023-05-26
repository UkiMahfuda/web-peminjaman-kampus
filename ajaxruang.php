<?php
require 'function.php';

$searchruang = $_GET["searchruang"];
$query = "SELECT *FROM tbl_ruangan 
WHERE 
nama_ruangan LIKE '%$searchruang%' 
OR 
kap_ruangan LIKE '%$searchruang%'
";
$queryrng = ambildata($query);
?>

<table cellspacing="0" class="statistics-card ">
    <tr class="tr-style">
        <th colspan="4">
            <br>
        </th>
    </tr>
    <tr class="tr-style fw-bold ">
        <td>
            ID Ruangan
        </td>
        <td>
            Gedung
        </td>
        <td>
            Ruangan
        </td>
        <td>
            Kapasitas
        </td>
    </tr>

    <?php $no = 1; ?>
    <?php foreach ($queryrng as $row) : ?>
        <tr>
            <td>
                R-<?php echo $row['id'] ?>
            </td>
            <td>
                <?php echo $row['ged'] ?>
            </td>
            <td>
                <?php echo $row['nama_ruangan'] ?>
            </td>
            <td>
                <?php echo $row['kap_ruangan'] ?>
            </td>
        </tr>
        <?php $no++; ?>
    <?php endforeach; ?>
</table>