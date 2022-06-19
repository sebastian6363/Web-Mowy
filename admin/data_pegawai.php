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
    <div class="title">
        <h1>Data Pegawai</h1>
        <p>Data pegawai bersifat rahasia dan tidak untuk disebarkan</p>
    </div>

    <div class="home-content">
        <!-- Tabel -->
        
        <table>
            <thead>
                <tr id="atas">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th colspan="3">Email</th>
                    <th>Password</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                require("../link/homepage/koneksi.php");
                $query = "SELECT * FROM data_user WHERE level = 'Pegawai'";
                $result = $conn -> query($query);
                $i = 0;
                while ($row = $result -> fetch_assoc()) :
                    $i++;
                ?>

                <tr id="data">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['no_hp']; ?></td>
                    <td colspan="3"><?php echo $row['email']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td>
                        <a href="edit_pegawai.php?id=<?= $row["id"]; ?>">
                            <button type="button" class="bi bi-pencil-square" id="edit"></button>
                        </a>
                    </td>
                </tr> 
                <?php endwhile ?>
            </tbody>
            <tfoot>
                <tr style="margin-bottom: 100px;">
                    <td colspan="9"><button type="button" id="tambah" style="cursor: pointer;">Tambah data pegawai</button></td>
                </tr>
            </tfoot>
        </table>
        
        <!-- Akhir tabel -->

        <!-- Popup tambah data -->
        <div class="popup-tambah" id="add">
            <div class="wrap container">
                <div class="title-2">
                    <h1>Form Tambah Data Pegawai</h1>
                    <p>Isikan semua data yang dibutuhkan untuk menambahkan pegawai baru Anda!</p>
                </div>
                <form class="form" action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-element">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan alamat pegawai" required>
                    </div>
                    <div class="form-element">
                        <label for="nama">Nama Pegawai</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Adit" required>
                    </div>
                    <div class="form-element">
                        <label for="no_hp">No HP</label>
                        <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="08XXXXXXXXX" required>
                    </div>
                    <div class="form-element">
                        <label for="gender">Gender</label>
                        <input type="text" name="gender" class="form-control" id="gender" placeholder="Laki - laki / Perempuan" required>
                    </div>
                    <div class="form-element">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="xxxxx@gmail.com" required>
                    </div>
                    <div class="form-element">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Asep123" required>
                    </div>
                    <div class="row form-element">
                        <div class="sprt col-md-6">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="qwerty123" required>
                        </div>
                        <div class="sprt col-md-6">
                            <label for="confirmation">Confirm Password</label>
                            <input type="password" name="confirmation" class="form-control" id="confirmation" placeholder="qwerty123" required>
                        </div>
                    </div>
                    <div class="btn">
                        <button class="batal" type="button" id="batal">Batal</button>
                        <button class="submit" type="submit" name="submit" id="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Akhir Popup -->


    </div>
    <!-- Akhir main content -->

    <!-- Tambah php data produk -->
    <?php 
    
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        $level = 'Pegawai';

        if ($password =! $confirm) {
            $add_data = "INSERT INTO data_user
            (nama, alamat, no_hp, gender, email, username, password, level)
                                VALUES
            ('$nama', '$alamat', '$no_hp', '$gender', '$email', '$username', '$password', '$level')
                                ";

            mysqli_query($conn, $add_data);
            ?>
            <script type="text/javascript">
                alert("Add data Successfull")
                window.location = 'data_pegawai.php'
            </script>
            <?php
        }
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