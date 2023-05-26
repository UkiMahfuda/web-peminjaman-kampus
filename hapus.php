<?php
require 'function.php';

$noreg = $_GET['id'];



if (hapus($noreg) > 0) {
    echo "
        <script>
        alert('Data Berhasil Dihapus');
        document.location.href='history.php';
        </script>
        ";
} else {
    echo "
        <script>
        alert('Data gagal Dihapus');
        document.location.href='history.php';
        </script>
        ";
}
