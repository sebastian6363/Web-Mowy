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
    $query = "SELECT * FROM data_produk WHERE id_produk = '$id'";
    $result = $conn -> query($query);

    while ($row = $result -> fetch_assoc()) :

    ?>
    
    <div class="popup">
        <div class="wrap container">
            <div class="title-2">
                <h1>Form Tambah Data Produk</h1>
                <p>Isikan semua data yang dibutuhkan untuk menambahkan produk baru Anda!</p>
            </div>
            <form class="form" action="#" method="POST" enctype="multipart/form-data">
                <div class="form-element">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="hidden" name="id_produk" class="form-control" id="id_produk" value="<?php echo $row['id_produk'] ?>">
                    <input type="text" name="nama_produk" class="form-control" id="nama_produk" value="<?php echo $row['nama_produk'] ?>" required>
                </div>
                <div class="row form-element">
                    <div class="sprt col-md-6">
                        <label for="rasa_produk">Rasa Produk</label>
                        <input type="text" name="rasa_produk" class="form-control" id="rasa_produk" value="<?php echo $row['rasa_produk'] ?>" required>
                    </div>
                    <div class="sprt col-md-6">
                        <label for="harga_produk">Harga Produk</label>
                        <input type="text" name="harga_produk" class="form-control" id="harga_produk" value="<?php echo $row['harga_produk'] ?>" required>
                    </div>
                </div>
                <div class="form-element">
                    <label for="berat_produk">Berat Produk</label>
                    <input type="text" name="berat_produk" class="form-control" id="berat_produk" value="<?php echo $row['berat_produk'] ?>" required>
                </div>
                <div class="form-element">
                    <label for="tanggal_kedaluwarsa">Tanggal Kadaluarsa</label>
                    <input type="datetime-local" name="tanggal_kedaluwarsa" class="form-control" id="tanggal_kedaluwarsa" value="<?php echo $row['tanggal_kedaluwarsa'] ?>" required>
                </div>
                <div class="btn">
                    <a href="produk.php"><button class="batal" type="button" id="batal">Batal</button></a>
                    <button class="submit" type="submit" name="submit" id="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <?php endwhile ?>

    <?php 
    
    if (isset($_POST['submit'])) {
        // Ambil semua data
        $id_produk = $_GET['id'];
        $nama = $_POST['nama_produk'];
        $rasa = $_POST['rasa_produk'];
        $harga = $_POST['harga_produk'];
        $berat = $_POST['berat_produk'];
        $tanggal = $_POST['tanggal_kedaluwarsa'];

        $edit_data = "UPDATE data_produk set
                        nama_produk = '$nama',
                        rasa_produk = '$rasa',
                        harga_produk = '$harga',
                        berat_produk = '$berat',
                        tanggal_kedaluwarsa = '$tanggal'
                        WHERE id_produk = '$id_produk'";

        mysqli_query($conn, $edit_data);
        ?>
        <script type="text/javascript">
            alert("Edit data Successfull")
            window.location = 'produk.php'
        </script>
        <?php 
    }
?>

</body>
</html>