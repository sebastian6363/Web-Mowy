<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>MOWY | Welcome Page</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;0,800;1,400&display=swap');
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this web -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="link/homepage/css/style.css">
    <link rel="stylesheet" href="link/homepage/css/signin.css">

  </head>
  <body>

    <?php  
    if(isset($_GET['alert'])){
      if($_GET['alert']=="gagal"){
        echo "<div class='alert alert-danger' style='align-items: center;'>Maaf! Username & Password Salah.</div>";
      }else if($_GET['alert']=="belum_login"){
        echo "<div class='alert alert-danger'>Anda Harus Login Terlebih Dulu!</div>";
      }else if($_GET['alert']=="logout"){
        echo "<div class='alert alert-danger'>Anda Telah Logout!</div>";
      }
    }
    ?>

    <nav class="mt-4">
      <div class="logo">
        <span><img src="images/Logo Mowy.png" alt="logo" width="200" height="75"></span>
      </div>
      <ul class="mt-4" id="navigation ">
        <li class='active'><a href="index.php">Dashboard</a></li>
        <li ><a href="ragamProduct.php">Ragam Produk</a></li>
        <li ><a href="tentangKami.php">Tentang Kami</a></li>
      </ul>
      <div class="reg-log mt-2">
        <a href="registrasi_revisi.php"><button class="btn btn-primary btn-lg px-4 me-md-2" type="button" id="reg">Registrasi</button></a>
        <button class="btn btn-outline-secondary btn-lg px-4" id="log">Log in</button>
      </div>
    </nav>

    <main>
      <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-2">
          <div class="col-10 col-sm-8 col-lg-6">
            <img src="images/Sapi.png" class="d-block mx-lg-auto img-fluid" alt="sapi" width="1280" height="720" loading="lazy">
          </div>
          <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">Mengapa MOWY?</h1>
            <p class="lead" style="font-size: 400; color: #000000A6;">Kalau bisa menikmati susu dari sapi yang bahagia karena diberi kasih sayang, mengapa tidak?</p>
            <a href="selengkapnya.php"><button class="btn-selengkapnya" type="button">Selengkapnya</button></a>
          </div>
        </div>
        <div class="sosial-media">
          <a href="mowydairyfarm@gmail.com" target="_blank">
              <i class='sosial bx bxl-gmail' id="gmail"></i>
          </a>
          <a href="https://www.instagram.com/mowy_dairyfarm/" target="_blank">
              <i class='sosial bx bxl-instagram-alt' id="instagram"></i>
          </a>
          <a href="http://wa.me/+628813430521" target="_blank">
              <i class='sosial bx bxl-whatsapp' id="whatsapp"></i>
          </a>          
        </div>
    </main>

    <div class="popup p-login">
      <div class="close-btn">&times;</div>
      <form class="form" action="link/homepage/aksi.php" method="POST" autocomplete="off">
        <h1 class="h3 mb-4">Login</h1>
        <p>Selamat datang, silahkan isi username dan password dengan benar</p>
        <div class="form-element">
          <label for="username">Username</label>
          <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" required>
        </div>
        <div class="form-element">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" required>
        </div>
        <div class="form-element">
          <button class="tombol_login btn btn-lg btn-primary" value="login" type="submit">Login</button>
        </div>
        <div class="form-element">
          <p>Belum punya akun?<a href="registrasi_revisi.php"> Registrasi</a></p>
        </div>
      </form>
    </div>

    <!-- Script Tombol -->
    <script src="link/homepage/js/script.js"></script>

    <!-- JS Core -->
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>   
  </body>
</html>
