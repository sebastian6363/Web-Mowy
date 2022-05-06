<?php 
    
    session_start();

    if($_SESSION['level'] == '') {
        header("location:index.php?pesan=gagal");
    }
    
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

    <!-- Style Web -->
    <link rel="stylesheet" href="css/transaksi.css">

</head>
<body>

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
                    <span class="nav_name">Ragam Produk</span>
                </a>
                <span class="tool_tip">Ragam Produk</span>
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
            <li>
                <a href="keranjang.php">
                    <i class='bx bx-cart-alt'></i>
                    <span class="nav_name">Keranjang</span>
                </a>
                <span class="tool_tip">Keranjang</span>
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
        <div class="wrap-content">
            <div class="title">
                <h1>Sedang Berlangsung</h1>
                <p>Transaksi Anda berhasil diverifikasi, pastikan produk sampai pada Anda!</p>
            </div>
            <?php 

            require "../link/homepage/koneksi.php";

            $query = "SELECT * FROM data_transaksi JOIN data_produk ON data_transaksi.id_produk = data_produk.id_produk WHERE data_transaksi.status = 'Berlangsung'";
            $result = $conn -> query($query);

            while ($row = $result -> fetch_assoc()):
            
            ?>
            <div class="pesan row">
                <div class="img-product col-md-3">
                    <img src="../images/product/<?php echo $row['gambar_produk'] ?>" alt="gambar produk">
                </div>
                <div class="content-product col-md-6 text-left p-0">
                    <p class="mb-1" id="bold"><?php echo $row['nama_produk'] ?></p>
                    <p class="mb-1" style="font-style: italic;"><?php echo $row['jumlah_produk'] ?> pcs</p>
                    <p class="mb-1">Total Harga: Rp. <?php echo $row['total'] ?></p>
                </div>
                <div class="core-content col-md-3 text-right">
                    <button id="atas">Sedang dikirim</button>
                    <p></p>
                    <button id="bawah">Pesanan diterima</button>
                </div>
            </div>
            <?php endwhile ?>
            <div class="pindah">
                <div class="btn">
                    <a href="transaksi1.php"><button type="button" class="btn btn-primary center-block">Riwayat Transaksi</button></a>
                </div>
            </div>
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

    
    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
</body>
</html>