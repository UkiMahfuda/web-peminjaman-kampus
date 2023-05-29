<?php
require_once __DIR__ . '/vendor/autoload.php';
require 'function.php';

$id = $_GET['id'];

$query = ambildata("SELECT * FROM tbl_peminjaman WHERE id = '$id'");
// var_dump($query);
// die;
$mpdf = new \Mpdf\Mpdf();

$html = '
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="d-flex justify-content-around">
            <img src="img/UNIVERSITAS TEKNOKRAT.png" alt="logouti" style="height: 80px;">
            <div class="text-center">
                <h1 class="mt-4">UNIVERSITAS TEKNOKRAT INDONESIA</h1>
                <p>
                    Jl. ZA. Pagar Alam No.9 -11, Labuhan Ratu, Kec. Kedaton, Kota Bandar Lampung, Lampung 35132
                </p>
            </div>
            <div>

            </div>
        </div>
        <div class="d-flex justify-content-center">

        </div>
        <hr>

        <center>
        <table cellpadding="5" border="1">
            <tr>
                <td>
                    No Registrasi
                </td>
                ';
foreach ($query as $row) {
    $html .= '
<td>: UTI-' . $row["id"] . '</td>  </tr>';
}
$html .= '
<tr>
                <td>
                    Nama
                </td>
';
foreach ($query as $row) {
    $html .= '
<td>: ' . $row["nama"] . '</td>  </tr>';
}
$html .= '
<tr>
                <td>
                    NPM
                </td>
';
foreach ($query as $row) {
    $html .= '
<td>: ' . $row["npm"] . '</td>  </tr>';
}
$html .= '
<tr>
                <td>
                    Program Studi
                </td>
';
foreach ($query as $row) {
    $html .= '
<td>: ' . $row["prodi"] . '</td>  </tr>';
}
$html .= '
<tr>
                <td>
                    No Telepon
                </td>
';
foreach ($query as $row) {
    $html .= '
<td>: ' . $row["no_tlp"] . '</td>  </tr>';
}
$html .= '
<tr>
                <td>
                    ID Ruangan Yang Di Pinjam
                </td>
';
foreach ($query as $row) {
    $html .= '
<td>: ' . $row["id_ruangan"] . '</td>  </tr>';
}
$html .= '
<tr>
                <td>
                ID Barang Yang Di Pinjam
                </td>
';
foreach ($query as $row) {
    $html .= '
<td>: ' . $row["id_brg"] . '</td>  </tr>';
}
$html .= '
<tr>
                <td>
                    Lama Pinjam
                </td>
';
foreach ($query as $row) {
    $html .= '
<td>: ' . $row["lama_pinjam"] . '</td>  </tr>';
}
$html .= '
<tr>
                <td>
                Alasan Pinjam
                </td>
';
foreach ($query as $row) {
    $html .= '
<td>: ' . $row["alasan"] . '</td>  </tr>';
}

$html .= '
           
            
        </table>
    </center>
 
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>';


$mpdf->WriteHTML($html);
$mpdf->Output('Laporan Peminjaman UTI', 'I');
