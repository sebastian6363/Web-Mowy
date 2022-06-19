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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Style Web -->
    <link rel="stylesheet" href="css/produk.css">

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
            <li>
                <a href="bahanProduk.php">
                    <i class='bi bi-file-earmark-minus'></i>
                    <span class="nav_name">Bahan Produk</span>
                </a>
                <span class="tool_tip">Bahan Produk</span>
            </li>
            <li>
                <a href="ulasan.php">
                    <i class='bi bi-envelope-open'></i>
                    <span class="nav_name">Ulasan</span>
                </a>
                <span class="tool_tip">Ulasan</span>
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
    <div class="title">
        <h1>Data Produk</h1>
        <p>Produk akan disajikan disini!</p>
    </div>

    <div class="home-content">
        <!-- Tabel -->
        <table>
            <thead>
                <tr id="atas">
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Gambar</th>
                    <th>Rasa</th>
                    <th>Harga</th>
                    <th>Berat</th>
                    <th>Tanggal Kadaluarsa</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                require("../link/homepage/koneksi.php");
                $query = "SELECT * FROM data_produk";
                $result = $conn -> query($query);
                $i = 0;
                while ($row = $result -> fetch_assoc()) :
                    $i++;

                ?>

                <tr id="data">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['nama_produk']; ?></td>
                    <td><img style="width: 35px;" src="../images/product/<?php echo $row['gambar_produk']; ?>" alt="gambar" ></td>
                    <td><?php echo $row['rasa_produk']; ?></td>
                    <td>Rp. <?php echo $row['harga_produk']; ?></td>
                    <td><?php echo $row['berat_produk']; ?>ml</td>
                    <td><?php echo $row['tanggal_kedaluwarsa']; ?></td>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>
        <!-- Akhir tabel -->

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

    <script src="js/script.js"></script>
</body>
</html>