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
    $query = "SELECT * FROM data_rekapitulasi WHERE id_rekapitulasi = '$id'";
    $result = $conn -> query($query);

    while ($row = $result -> fetch_assoc()) :

    ?>
    
    <div class="popup " id="add">
            <div class="wrap container">
                <div class="title-2">
                    <h1>Form Mengubah <br> Rekapitulasi Keuangan </h1>
                    <p>Tambahkan data rekapitulasi bulanan Anda dengan <br> mengisi form berikut ini!</p>
                </div>
 
                <form class="form" action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-element">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?php echo $row['tanggal'] ?>" required>
                    </div>
                    <div class="form-element">
                        <label for="transaksi">Jumlah Transaksi</label>
                        <input type="number" name="transaksi" class="form-control" id="transaksi" value="<?php echo $row['transaksi'] ?>" required>
                    </div>
                    <div class="form-element">
                        <label for="biaya">Jumlah Biaya Produksi</label>
                        <input type="number" name="biaya" class="form-control" id="biaya" value="<?php echo $row['biaya'] ?>" required>
                    </div>
                    <div class="btn">
                        <button class="batal" type="button" id="batal">Batal</button>
                        <button class="submit" type="submit" name="submit" id="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    <?php endwhile ?>

    <?php 
    
    if (isset($_POST['submit'])) {
        // Ambil semua data
        $tanggal       = $_POST['tanggal'];
        $transaksi      = $_POST['transaksi'];
        $biaya     = $_POST['biaya'];
        $total     = $transaksi - $biaya;

        $edit_data = "UPDATE data_rekapitulasi set
                        tanggal = '$tanggal',
                        transaksi = '$transaksi',
                        biaya = '$biaya',
                        hasil = '$total'
                        WHERE id_rekapitulasi = '$id'";

        mysqli_query($conn, $edit_data);
        ?>
        <script type="text/javascript">
            alert("Edit data Successfull")
            window.location = 'rekapitulasi.php'
        </script>
        <?php 
    }
?>

</body>
</html>