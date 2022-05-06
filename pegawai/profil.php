<?php 

session_start();
//koneksi database
include '../link/homepage/koneksi.php';

//ambil data user dari database
$id = $_SESSION['id'];
$query = mysqli_query($conn, "SELECT * FROM data_user WHERE id = '$id'");
$row = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap Core -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Style Web -->
    <link rel="stylesheet" href="css/profil.css">
</head>
<body>
    <?php 
    
    if($_SESSION['level'] == '') {
        header("location:index.php?pesan=gagal");
    }
    
    ?>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Logo -->
        <div class="logo-content">
            <div class="logo">
                <img src="../images/Logo Mowy.png" alt="logo" id="logo">
            </div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <!-- Akhir logo -->

        <!-- Welcome User -->
        <div class="welcome">
            <div id="greet-username">Halo, <?php echo $_SESSION['username']; ?>!</div>
            <div id="greet-email"><?php echo $_SESSION['email']; ?></div>
        </div>
        <!-- Akhir welcome user -->

        <!-- Pembatas -->
        <hr id="devider">
        <!-- Pembatas -->

        <!-- Nav Content -->
        <ul class="nav">
            <li>
                <a href="index.php">
                    <i class='bx bx-bar-chart-square'></i>
                    <span class="nav_name">Dashboard</span>
                </a>
                <span class="tool_tip">Dashboard</span>
            </li>
            <li>
                <a href="produk.php">
                    <i class='bx bx-collection'></i>
                    <span class="nav_name">Data Produk</span>
                </a>
                <span class="tool_tip">Data Produk</span>
            </li>
            <li>
                <a href="data_pembeli.php">
                    <i class="bi bi-people"></i>
                    <span class="nav_name">Data Pembeli</span>
                </a>
                <span class="tool_tip">Data Pembeli</span>
            </li>
            <li>
                <a href="transaksi.php">
                    <i class='bx bx-plug'></i>
                    <span class="nav_name">Transaksi</span>
                </a>
                <span class="tool_tip">Transaksi</span>
            </li>
            <li>
                <a href="profil.php">
                    <i class='bx bx-user-pin'></i>
                    <span class="nav_name">Profil</span>
                </a>
                <span class="tool_tip">Profil</span>
            </li>

            <!-- Sosial media -->
            <div class="sosial-media">
                <i class='sosial bx bxl-gmail' id="gmail"></i>

                <a href="https://www.instagram.com/__deenda/">
                    <i class='sosial bx bxl-instagram-alt' id="instagram"></i>
                </a>
                <a href="http://wa.me/+628813430521">
                    <i class='sosial bx bxl-whatsapp' id="whatsapp"></i>
                </a>
            </div>
            <!-- Akhir sosial media -->
        </ul>
        <!-- Akhir nav content -->
    </div>
    <!-- Akhir sidebar -->

    <!-- Main content -->
    <div class="home-content">
        <div class="wrap container">
            <div class="title">
                <h1>Profil Saya</h1>
                <p>Profil Anda dikelola oleh pemilik usaha. Apabila ada perubahan segera hubungi Pemilik Usaha.</p>
            </div>
            <form action="#" method="POST">
                <div class="form row">
                    <div class="photo-profile col-md-6">
                        <img src="../images/user-rectangle-solid-96.png" alt="photo" id="photo">
                    </div>
                    <div class="profile col-md-6">
                        <div class="row">
                            <div class="top col-md-3">
                                <h6>ID Pegawai</h6>
                                <input type="text" disabled value="<?php echo $row['id'] ?>">
                            </div>
                            <div class="bot col-md-5">
                                <h6>Gender</h6>
                                <input type="text" id="gender" name="gender" value="<?php echo $row['gender'] ?>"disabled>
                            </div>
                        </div>
                        <div class="col">
                            <h6>Nama</h6>
                            <input type="text" id="nama" name="nama" value="<?php echo $row['nama'] ?>"disabled>
                        </div>
                        <div class="col">
                            <h6>Alamat</h6>
                            <input type="text" id="alamat" name="alamat" value="<?php echo $row['alamat'] ?>"disabled>
                        </div>
                        <div class="col">
                            <h6>No. HP</h6>
                            <input type="text" id="no_hp" name="no_hp" value="<?php echo $row['no_hp'] ?>"disabled>
                        </div>
                        <div class="col">
                            <h6>Email</h6>
                            <input type="text" id="email" name="email" value="<?php echo $row['email'] ?>"disabled>
                        </div>
                        <div class="col">
                            <h6>Password</h6>
                            <input type="text" id="password" name="password" value="<?php echo $row['password'] ?>"disabled>
                        </div>
                        <div class="col button">
                            <a href="../link/logout.php" id="ref"><button class="btn btn-danger" id="logout" type="button">Logout</button></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Akhir main content -->
    
    <!-- Scrip sidebar active -->
    <script>
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');
        
        btn.onclick = function() {
            sidebar.classList.toggle('active');
        }
    </script> 
    <!-- Akhir sidebar -->
    
    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
</body>
</html>