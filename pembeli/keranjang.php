<?php 
    
    session_start();

    $pembeli = $_SESSION['id'];

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
    <link rel="stylesheet" href="css/keranjang.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

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
        <div class="title">
            <h1>Check Out</h1>
            <p>Isi data Anda di bawah ini dengan benar untuk 
            menyelesaikan proses pembelian!</p>
        </div>
        <form action="#" method="POST" class="wrap-content" enctype="multipart/form-data">
            <?php 
        
            require "../link/homepage/koneksi.php";

            $query = "SELECT * FROM data_produk JOIN keranjang ON data_produk.id_produk = keranjang.id_produk WHERE keranjang.id_pembeli = '$pembeli' AND keranjang.status = 'Ongoing' ";
            $result = $conn -> query($query);

            while ($row = $result -> fetch_assoc()):
            ?>
            <div class="pesan row">
                <div class="img-product col-md-3">
                    <img src="../images/product/<?php echo $row['gambar_produk'] ?>" alt="gambar produk">
                </div>
                <div class="content-product col-md-6 text-left p-0">
                    <p class="mb-1" id="bold"><?php echo $row['nama_produk'] ?></p>
                    <input type="hidden" name="id_produk" id="id_produk" value="<?php echo $row['id_produk'] ?>">
                    <p class="mb-1">Jumlah produk</p>
                    <p class="mb-1">Total Harga</p>
                </div>
                <div class="core-content col-md-3 text-right">
                    <p class="mb-1" id="bold">Rp. <?php echo $row['harga_produk'] ?></p>
                    <p class="mb-1" id="italic"><?php echo $row['jumlah_produk'] ?> pcs</p>
                    <input type="hidden" name="jumlah" id="jumlah" value="<?php echo $row['jumlah_produk'] ?>">
                    <p class="mb-1" id="bold-">Rp. <?php echo $row['total'] ?></p>
                    <div class="link">
                        <a href="hapus.php?id=<?php echo $row['id_transaksi'] ?>">Hapus</a>
                    </div>
                </div>
            </div>
            <?php endwhile ?>

            <?php 
            
            $total_harga = "SELECT SUM(total) AS total FROM keranjang WHERE id_pembeli = '$pembeli' AND status = 'Ongoing'";
            $hasil = $conn -> query($total_harga);
            while ($data = $hasil -> fetch_assoc()):
            ?>

            <div class="form-group row d-flex">
                <label for="total_harga" style="color: red; text-align: right;">Total harga: Rp. <span id="hasil"></span> </label>
                <input type="hidden" name="total_harga" id="total_harga" onchange="math()" value="<?php echo $data['total'] ?>">
                <input type="hidden" name="tot_harga" id="tot_harga" value="<?php echo $data['total'] ?>">
            </div>

            <?php endwhile ?>

            <div class="form-group get">
                <input type="hidden" name="pelanggan" id="pelanggan" value="<?php echo $pembeli ?>">
            </div>

            <div class="form-group row">
                <label for="metode">Metode Pembayaran</label>
                <select name="metode" id="metode" class="form-select" required>
                    <option value="" selected>-</option>
                    <option value="BRI">Bank Republik Indonesia</option>
                    <option value="BCA">Bank Central Asia</option>
                    <option value="DANA">DANA</option>
                </select>
            </div>
            <div class="form-group row">
                <label for="pengiriman">Informasi Pengiriman</label>
                <select name="pengiriman" id="pengiriman" class="form-select" onchange="math()" required>
                    <option value="0" selected>-</option>
                    <option value="8000">JNE (Rp. 8.000,00)</option>
                    <option value="10000">Si Cepat (Rp. 10.000,00)</option>
                </select>
            </div>
            <div class="form-group row">
                <label for="image">Upload bukti pembayaran</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
            <div class="form-group submit">
                <button name="submit" type="submit" id="submit">Buat Transaksi</button>
            </div>
        </form>
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

    <!-- Penjumlahan -->
    <script type="text/javascript">
        function math() {
            var a = parseInt(document.getElementById('total_harga').value);
            var b = parseInt(document.getElementById('pengiriman').value);
            if (a&&b);
            document.getElementById('hasil').innerHTML = a + b;

        }
    </script>

    <!-- Memasukkan bukti transfer -->
    <?php 
    
    include "../link/homepage/koneksi.php";

    if (isset($_POST['submit'])) {
        date_default_timezone_set("Asia/Jakarta");
        $target = "../images/transaction/".basename($_FILES['image']['name']);

        $waktu = date("Y-m-d h:i:s");
        $bukti = $_FILES['image']['name'];

        $produk = $_POST['id_produk'];
        $jumlah = $_POST['jumlah'];
        $total = $_POST['tot_harga'];
        $pelanggan = $_POST['pelanggan'];
        $status = 'Ongoing';

        $add_data = "INSERT INTO data_transaksi 
        (waktu_transaksi, bukti_transaksi, id_pembeli, id_produk, jumlah_produk, total, status)
                VALUES ('$waktu', '$bukti', '$pelanggan', '$produk', '$jumlah', '$total', '$status') ";
        
        mysqli_query($conn, $add_data);

        move_uploaded_file($_FILES['image']['tmp_name'], $target);

        ?>
        <script type="text/javascript">
            alert("Berhasil menambahkan transaksi! Silahkan tunggu konfirmasi dari kami <3")
            window.location = 'index.php'
        </script>
        <?php  
    }
    ?>

</body>
</html>