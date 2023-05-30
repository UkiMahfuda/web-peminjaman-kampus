<?php
$conn = mysqli_connect("localhost", "id20835467_webpeminjamankampus", "?FUG?c95?/\k[%a$", "id20835467_db_ta_web");

// if (!$conn) {
//     die("Koneksi Gagal");
// } else {
//     echo ("Koneksi Oke");
// }

//fungsi signup
function signup_acc($datauser)
{
    global $conn;

    $username = strtolower(stripslashes($datauser["nama"]));
    $npm = mysqli_real_escape_string($conn, $datauser["npm"]);
    $password = mysqli_real_escape_string($conn, $datauser["password"]);
    $password2 = mysqli_real_escape_string($conn, $datauser["password2"]);

    //Cek Username dan NPM di database
    $result = mysqli_query($conn, "SELECT nama FROM tbl_user WHERE nama='$username' OR npm='$npm'");
    if (mysqli_fetch_row($result)) {
        // echo "<script> alert('Username/NPM Sudah Ada')</script>";
        $error3 = 'Username/NPM Sudah Ada';
        echo $error3;
        return false;
    };

    //Cek Konfirmasi Password
    if ($password !== $password2) {
        // echo "<script> alert('Password Berbeda Dengan Konfirmasi Password')</script>";
        $error4 = 'Password Berbeda Dengan Konfirmasi Password';
        echo $error4;
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    //Masukkan Data User Ke Db
    mysqli_query($conn, "INSERT INTO tbl_user VALUES 
('','$username','$password','$npm')");

    return mysqli_affected_rows($conn);
}


//ambil data
function ambildata($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $array = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $array[] = $row;
    }
    return $array;
}

//function searching
function searching($searching)
{
    $query = "SELECT *FROM tbl_ruangan 
    WHERE 
    nama_ruangan LIKE '%$searching%' 
    OR 
    kap_ruangan LIKE '%$searching%'
    ";

    return ambildata($query);
}
function searchingbrg($searching)
{
    $query = "SELECT *FROM tbl_brg 
    WHERE 
    nama_brg LIKE '%$searching%' 
    ";

    return ambildata($query);
}


//function delete
function hapus($noreg)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tbl_peminjaman WHERE id = '$noreg'");

    return mysqli_affected_rows($conn);
}

//function insert form
function tambahdata($tambahdata)
{
    global $conn;

    $nama = htmlspecialchars($tambahdata["nama"]);
    $npm =  htmlspecialchars($tambahdata["npm"]);
    $prodi =  htmlspecialchars($tambahdata["prodi"]);
    $no_tlp =  htmlspecialchars($tambahdata["no_tlp"]);
    $date =  htmlspecialchars($tambahdata["date"]);
    $lama_pinjam =  htmlspecialchars($tambahdata["lama_pinjam"]);
    $id_brg =  htmlspecialchars($tambahdata["id_brg"]);
    $id_ruangan =  htmlspecialchars($tambahdata["id_ruangan"]);
    $alasan =  htmlspecialchars($tambahdata["alasan"]);

    $insert = "INSERT INTO tbl_peminjaman VALUES 
('','$id_ruangan','$id_brg','$no_tlp','$lama_pinjam','$alasan','$date','$nama','$npm','$prodi','')";

    mysqli_query($conn, $insert);
    return mysqli_affected_rows($conn);
}


//Function Update
function updatedata($ubahdata)
{
    global $conn;

    $namaini = ($ubahdata["nama"]);
    $nama = htmlspecialchars($ubahdata["nama"]);
    $npm = htmlspecialchars($ubahdata["npm"]);
    $prodi =  htmlspecialchars($ubahdata["prodi"]);
    $alamat =  htmlspecialchars($ubahdata["alamat"]);
    $no_tlp =  htmlspecialchars($ubahdata["no_tlp"]);

    $updatedata = "UPDATE tbl_user SET 
    nama ='$nama','',
    npm = '$npm',
    prodi = '$prodi',
    no_tlp ='$no_tlp',
    alamat='$alamat'
    Where nama= $namaini";

    mysqli_query($conn, $updatedata);
    return mysqli_affected_rows($conn);
}


//pagination
// function paginationdata($data)
// {
//     global $conn;

//     $result = $data;
//     $jumlahdata = mysqli_num_rows($result);
//     // var_dump($data);
//     // die;
//     $jumlahdatapage = 5;
//     $jumlahdata = count(ambildata("SELECT*FROM tbl_ruangan"));
//     $jumlahhalaman = ceil($jumlahdata / $jumlahdatapage);
//     $halaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
//     $awaldata = ($jumlahdatapage * $halaktif) - $jumlahdatapage;

//     $query = ambildata("SELECT * FROM tbl_ruangan ORDER BY ged ASC
// LIMIT $awaldata, $jumlahdatapage ");
// }
