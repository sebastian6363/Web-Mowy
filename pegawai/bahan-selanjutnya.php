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

    <div class="home-content">
        <div class="data-produk">
            <div class="title">
                <h1>Data Bahan Produk</h1>
                <p>Menampilkan bahan produksi yang dibutuhkan untuk <br> pembuatan susu sapi Mowy</p>
            </div>
            <div class="data-tabel">
                <table>
                    <thead>
                        <tr id="table-title">
                            <th>Waktu</th>
                            <th>Nama Produk</th>
                            <th>Harga perisa</th>
                            <th>Harga botol</th>
                            <th>Total stok</th>
                            <th>Total biaya prod</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                        require("../link/homepage/koneksi.php");
                        $query = "SELECT * FROM data_bahan_produksi";
                        $result = $conn -> query($query);
                        while ($row = $result -> fetch_assoc()) :  
                        ?>
                        <tr id="data-table">
                            <td><?php echo $row['waktu_bahan']; ?></td>
                            <td><?php echo $row['nama_produksi'] ?></td>
                            <td>Rp. <?php echo $row['jumlah_perisa'] * 250 ?></td>
                            <td>Rp. <?php echo $row['jumlah_susu'] * 750?></td>
                            <td><?php echo $row['jumlah_botol']; ?> </td>
                            <td>Rp. <?php echo $row['total'] ?></td>
                            <td>
                                <a href="editbahan.php?id=<?= $row["id_bahan"]; ?>">
                                    <button type="button" class="bi bi-pencil-square" id="edit"></button>
                                </a>
                            </td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
                <div class="button-action">
                    <button class="btn btn-tambah" type="button" id="tambah">Tambah data produk</button>
                    <button onclick="window.location.href='bahanProduk.php'" class="btn btn-sebelumnya">sebelumnya</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir main content -->
    
        <div class="popup-tambah" id="add">
            <div class="wrap container">
                <div class="title-2">
                    <h1>Form Tambah Data Produksi</h1>
                    <p>Isikan data yang dibutuhkan untuk menambahkan <br> data produksi baru Anda!</p>
                </div>
                <form class="form" action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-element">
                        <label for="nama_produksi">Nama Produk</label>
                        <input type="text" name="nama_produksi" class="form-control" id="nama_produksi" placeholder="Susu Mowy" required>
                    </div>

                    <div class="form-element">
                        <label for="perisa">Perisa</label>
                        <input type="text" name="perisa" class="form-control" id="perisa" placeholder="Coklat" required>
                    </div>
                    <div class="form-element">
                        <label for="jumlah_perisa">Jumlah Perisa</label>
                        <input type="number" name="jumlah_perisa" class="form-control" id="jumlah_perisa" placeholder="10 gram" required>
                    </div>
                    <div class="form-element">
                        <label for="jumlah_susu">Jumlah Susu</label>
                        <input type="number" name="jumlah_susu" class="form-control" id="jumlah_susu" placeholder="2.5 liter" step="0.1" required>
                    </div>
                    <div class="form-element">
                        <label for="jumlah_botol">Jumlah Botol</label>
                        <input type="number" name="jumlah_botol" class="form-control" id="jumlah_botol" placeholder="10 biji" required>
                    </div>
                    <div class="form-element">
                        <label for="ukuran">Ukuran Botol</label>
                        <input type="number" name="ukuran" class="form-control" id="ukuran" placeholder="250 ml" required>
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

        // Ambil semua data
        $id_pegawai = $pegawai;
        $nama       = $_POST['nama_produksi'];
        $perisa     = $_POST['perisa'];
        $jml_perisa = $_POST['jumlah_perisa'];
        $jml_susu   = $_POST['jumlah_susu'];
        $jml_botol  = $_POST['jumlah_botol'];
        $ukuran     = $_POST['ukuran'];

        $add_data = "INSERT INTO data_bahan_produksi
    (id_pegawai, nama_produksi, perisa, jumlah_perisa, jumlah_susu, jumlah_botol, ukuran)
                        VALUES
    ('$id_pegawai', '$nama', '$perisa', '$jml_perisa', '$jml_susu', '$jml_botol', '$ukuran')";
    
    mysqli_query($conn, $add_data);

    ?>
    <script type="text/javascript">
        alert("Add data Successfull")
        window.location = 'bahanProduk.php'
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