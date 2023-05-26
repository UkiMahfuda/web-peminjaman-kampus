<?php
session_start();
require "function.php";

if (isset($_SESSION['btnlogin'])) {
  header("Location: index.php");
  exit;
}

if (isset($_POST['btnlogin'])) {
  $username = $_POST['nama'];
  $password = $_POST['password'];


  //Cek Username di DB
  $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE nama='$username' ");

  if (mysqli_num_rows($result) === 1) {
    //Cek Password di DB
    $check = mysqli_fetch_assoc($result);
    if (password_verify($password, $check['password'])) {
      //Set Session
      $_SESSION['btnlogin'] = true;
      $_SESSION['nama']     = $username;
      header("Location: index.php");
      exit;
    } else {
      $error1 = true;
    }
  } else {
    $error2 = true;
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Website Peminjaman - Universitas Teknokrat Indonesia</title>
  <link rel="website icon" href="img/logo-uti.png">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
  <div>
    <div class="container text-white">
      <nav class="navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="img/UNIVERSITAS TEKNOKRAT.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top ">
            <span class="text-white logo">
              Universitas Teknokrat Indonesia
            </span>
          </a>
        </div>
      </nav>
      <div class="container text-center ">
        <img class="logo2" src="img/UNIVERSITAS TEKNOKRAT.png" alt="Logo">
        <div class="sign-in">
          <p>Sign In</p>
        </div>
        <p>Login to your account</p>
        <div class="d-flex justify-content-center">
          <form class=" col-12 col-sm-6 " action="" method="post">
            <div class="input-group mb-3">
              <input required type="text" class="form-control " placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="nama" for="username">
            </div>
            <div class="input-group mb-3 ">
              <input required type="password" class="form-control " placeholder="Password" aria-label="password" aria-describedby="basic-addon1" name="password" for="password">
            </div>

            <div class="d-flex flex-row-reverse mb-2">
              <p class="mb-3 ">
                <a class="link " href="signup.php">Sign Up</a>
              </p>
              <?php if (isset($error2)) : ?>
                <p class="mb-3 fst-italic fw-lighter fs-6" style="margin-right: 15px; color:red;">
                  Username Tidak Ada
                </p>
              <?php elseif (isset($error1)) : ?>
                <p class="mb-3 fst-italic fw-lighter fs-6" style="margin-right: 15px; color:red;">
                  Password Salah
                </p>
              <?php endif ?>
            </div>

            <div class="d-grid mb-3 col-6 mx-auto">
              <button class="btn btn-success" name="btnlogin">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#f3f4f5" fill-opacity=".8" d="M0,256L80,256C160,256,320,256,480,240C640,224,800,192,960,192C1120,192,1280,224,1360,240L1440,256L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
      </path>
    </svg>
  </div>


  <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"> </script>
</body>

</html>