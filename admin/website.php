<?php 
    
    session_start();

    $pegawai = $_SESSION['id'];
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
    <link rel="stylesheet" href="css/bahanProduk.css">

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
                <a href="data_pegawai.php">
                    <i class="bi bi-person-badge-fill"></i>
                    <span class="nav_name">Data Pegawai</span>
                </a>
                <span class="tool_tip">Data Pegawai</span>
            </li>
            <li>
                <a href="website.php">
                    <i class="bi bi-diagram-2"></i>
                    <span class="nav_name">Informasi Website</span>
                </a>
                <span class="tool_tip">Informasi Website</span>
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
                    <i class="bi bi-envelope-open"></i>
                    <span class="nav_name">Ulasan</span>
                </a>
                <span class="tool_tip">Ulasan</span>
            </li>
            <li>
                <a href="rekapitulasi.php">
                    <i class="bi bi-cash"></i>
                    <span class="nav_name">Rekapitulasi</span>
                </a>
                <span class="tool_tip">Rekapitulasi</span>
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
        <div class="data-produk">
            <div class="title">
                <h1>Informasi Website</h1>
                <p>Menampilkan informasi yang akan ditampilkan <br> 
pada dashboard Mowy</p>
            </div>
            <div class="data-tabel">
                <table>
                    <thead>
                        <tr id="table-title">
                            <th>Menu</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Isi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                        require("../link/homepage/koneksi.php");
                        $query = "SELECT * FROM data_informasi_website";
                        $result = $conn -> query($query);
                        while ($row = $result -> fetch_assoc()) :

                        ?>

                        <tr id="data-table">
                            <td><?php echo $row['menu']; ?></td>
                            <td><?php echo $row['gambar']; ?></td>
                            <td><?php echo $row['judul'] ?></td>
                            <td><?php echo $row['konten']; ?> liter</td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
                <div class="button-action">
                    <button class="btn btn-tambah" type="button" id="tambah">Buat Informasi Web</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir main content -->
    
        <div class="popup-tambah" id="add">
            <div class="wrap container">
                <div class="title-2">
                    <h1>Form Membuat Informasi Web</h1>
                    <p>Buat informasi website Anda!</p>
                </div>
 
                <form class="form" action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-element">
                        <label for="menu">Menu</label>
                        <input type="text" name="menu" class="form-control" id="menu" required>
                    </div>
                    <div class="form-element">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" class="form-control" id="judul" required>
                    </div>
                    <div class="form-element">
                        <label for="konten">Isi</label>
                        <input type="text" name="konten" class="form-control" id="konten" required>
                    </div>
                    <div class="form-element">
                        <label for="gambar">Upload Gambar</label>
                        <input type="file" name="gambar" class="form-control" id="gambar">
                    </div>
                    <div class="btn">
                        <button class="batal" type="button" id="batal">Batal</button>
                        <button class="submit" type="submit" name="submit" id="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>


        <?php 
    
    if (isset($_POST['submit'])) {
        $target = "../images/website/".basename($_FILES['image']['name']);

        // Ambil semua data
        $menu       = $_POST['menu'];
        $judul      = $_POST['judul'];
        $konten     = $_POST['konten'];
        $gambar     = $_FILES['image']['name'];

        $add_data = "UPDATE data_informasi_website SET
                            menu    = '$menu',
                            judul   = '$judul',
                            konten  = '$konten',
                            gambar  = '$gambar'
                    WHERE menu = '$menu'
                            ";
    
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    mysqli_query($conn, $add_data);

    ?>
    <script type="text/javascript">
        alert("Add data Successfull")
        window.location = 'website.php'
    </script>
    <?php  
    }
?>

    
        
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