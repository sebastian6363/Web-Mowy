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
    <link rel="stylesheet" href="css/edit.css">

</head>
<body>
    <?php 

    require "../link/homepage/koneksi.php";

    $id = $_GET['id'];
    $query = "SELECT * FROM data_bahan_produksi WHERE id_bahan = '$id'";
    $result = $conn -> query($query);

    while ($row = $result -> fetch_assoc()) :

    ?>
    
    <div class="popup">
        <div class="wrap container">
            <div class="title-2">
                <h1>Form Ubah Data Produksi</h1>
                <p>Ubah data yang ingin Anda ubah untuk memperbarui data produksi!</p>
            </div>
            <form class="form" action="#" method="POST" enctype="multipart/form-data">
                <div class="form-element">
                    <label for="nama_produksi">Nama Produk</label>
                    <input type="text" name="nama_produksi" class="form-control" id="nama_produksi" value="<?php echo $row['nama_produksi'] ?>" required>
                </div>
                <div class="form-element">
                    <label for="perisa">Perisa</label>
                    <input type="text" name="perisa" class="form-control" id="perisa" value="<?php echo $row['perisa'] ?>" required>
                </div>
                <div class="form-element">
                    <label for="jumlah_perisa">Jumlah Perisa</label>
                    <input type="text" name="jumlah_perisa" class="form-control" id="jumlah_perisa" value="<?php echo $row['jumlah_perisa'] ?>" required>
                </div>
                <div class="form-element">
                    <label for="jumlah_susu">Jumlah Susu</label>
                    <input type="text" name="jumlah_susu" class="form-control" id="jumlah_susu" value="<?php echo $row['jumlah_susu'] ?>" required>
                </div>
                <div class="form-element">
                    <label for="jumlah_botol">Jumlah Botol</label>
                    <input type="text" name="jumlah_botol" class="form-control" id="jumlah_botol" value="<?php echo $row['jumlah_botol'] ?>" required>
                </div>
                <div class="form-element">
                    <label for="ukuran">Ukuran Botol</label>
                    <input type="text" name="ukuran" class="form-control" id="ukuran" value="<?php echo $row['ukuran'] ?>" required>
                </div>
                <div class="btn">
                    <a href="bahanProduk.php"><button class="batal" type="button" id="batal">Batal</button></a>
                    <button class="submit" type="submit" name="submit" id="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <?php endwhile ?>

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
        $total      = ($jml_perisa * 250) + ($jml_susu * 750);

        $edit_data = "UPDATE data_bahan_produksi set
                        nama_produksi = '$nama',
                        perisa = '$perisa',
                        jumlah_perisa = '$jml_perisa',
                        jumlah_susu = '$jml_susu',
                        jumlah_botol = '$jml_botol',
                        ukuran = '$ukuran',
                        total = '$total'
                        WHERE id_bahan = '$id'";

        mysqli_query($conn, $edit_data);
        ?>
        <script type="text/javascript">
            alert("Edit data Successfull")
            window.location = 'bahanProduk.php'
        </script>
        <?php 
    }
?>

</body>
</html>