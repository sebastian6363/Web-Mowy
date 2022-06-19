<?php 
    
    session_start();

    $pembeli = $_SESSION['id'];
    $nama    = $_SESSION['nama'];

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
    <link rel="stylesheet" href="css/edit.css">

</head>
<body>  
    <div class="popup">
        <div class="wrap container">
            <div class="title-2">
                <h1>Form Tambah Ulasan Produk</h1>
                <p>Yuk, ceritain kepuasanmu tentang kualitas susu dan <br> pelayanan kami</p>
            </div>
            <form class="form" id="form-ulasan" action="#" method="POST" enctype="multipart/form-data">
                <div class="form-element">
                    <label for="ulasan">Ulasan:</label>
                    <input type="text" class="form-control" name="ulasan" id="ulasan" placeholder="Coba ceritakan" value="Tidak ada ulasan">
                </div>
                <div class="form-element"> 
                    <label for="rating">Rating:&emsp;</label>
                    <label class="radio-inline">
                        <input type="radio" name="rating" id="rating" value="1" required> 1&ensp;
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="rating" id="rating" value="2"> 2&ensp;
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="rating" id="rating" value="3"> 3&ensp;
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="rating" id="rating" value="4"> 4&ensp;
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="rating" id="rating" value="5"> 5&ensp;
                    </label>
                </div>
                <div class="form-element">
                        <label for="gambar">Upload foto ulasan:</label>
                        <input type="file" name="gambar" class="form-control" id="gambar" placeholder="Susu Mowy">
                    </div>
                <div class="btn">
                    <a href="ulasan.php"><button class="batal" type="button" id="batal">Batal</button></a>
                    <button class="submit" type="submit" name="submit" id="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <?php 
    
    include "../link/homepage/koneksi.php";
    if (isset($_POST['submit'])) {
        // Path menyimpan gambar
        $target = "../images/ulasan/".basename($_FILES['gambar']['name']);

        // Ambil semua data
        $id     = $_GET['id'];
        $produk  = $_GET['produk'];
        $gambar  = $_FILES['gambar']['name'];
        $ulasan  = $_POST['ulasan'];
        $rating  = $_POST['rating'];

        $add_data = "UPDATE data_ulasan_produk SET ulasan = '$ulasan', status = 'sudah', rating = '$rating', gambar = '$gambar' WHERE id_ulasan = '$id'";
    
    // Move gambar ke path
    move_uploaded_file($_FILES['gambar']['tmp_name'], $target);

    $cek = mysqli_query ($conn, $add_data);

    ?>
        <script type="text/javascript">
            alert("Tambah ulasan berhasil")
            window.location = 'ulasan-riwayat.php'
        </script>
        <?php 
    }
?>

</body>
</html>