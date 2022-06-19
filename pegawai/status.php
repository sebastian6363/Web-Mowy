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

session_start();
$id_pegawai = $_SESSION['id'];
require "../link/homepage/koneksi.php";

$id = $_GET['id'];
$query = "SELECT * FROM data_transaksi WHERE id_transaksi = '$id'";
$result = $conn -> query($query);
while ($row = $result -> fetch_assoc()) :

?>
<div class="popup">
        <div class="wrap container">
            <div class="title-2">
                <h1><?php echo $id_pegawai ?></h1>
                <p>Ubah status dengan cara memilih salah satu!</p>
            </div>
            <form class="form" action="#" method="POST" enctype="multipart/form-data">
                <div class="form-element">
                    <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $row['id'] ?>">
                    <input style="text-align: center;" type="text" class="form-control" value="<?php echo $row['status'] ?>" disabled>
                    <p style="text-align: center; margin: 15px">MENJADI</p>
                    <select name="status" id="status" style="width: 100%; border-radius: 20px; height: 35px; text-align: center;">
                        <option value="" selected disabled>-</option>
                        <option value="Berlangsung">Berlangsung</option>
                        <option value="Riwayat">Masuk Riwayat</option>
                    </select>
                </div>
                <div class="btn" style="margin-top: 20px;">
                    <a href="transaksi.php"><button class="batal" type="button" id="batal">Batal</button></a>
                    <button class="submit" type="submit" name="submit" id="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <?php endwhile ?>

    <?php 
    
    if (isset($_POST['submit'])) {
        // Ambil semua data
        $id_pegawai = $_SESSION['id'];
        $status = $_POST['status'];

        $edit_data = "UPDATE data_transaksi set
                        status = '$status', id_pegawai = '$id_pegawai'
                        WHERE id_transaksi = '$id';";

        if($_POST['status'] = 'Riwayat') {
            $edit_data .= "UPDATE data_ulasan_produk set status = 'berlangsung' WHERE id_ulasan = '$id'";
        }
        mysqli_multi_query($conn, $edit_data);
        ?>
        <script type="text/javascript">
            alert("Edit data Successfull")
            window.location = 'transaksi.php'
        </script>
        <?php 
    }
?>

</body>
</html>