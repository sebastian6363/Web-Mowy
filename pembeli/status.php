<?php 

session_start();
require "../link/homepage/koneksi.php";

$pembeli = $_SESSION['id'];
$update = "UPDATE data_transaksi SET status = 'Berlangsung' WHERE id_pembeli = '$pembeli";

mysqli_query($conn, $update);
header("location:index.php")
?>
<script type="text/javascript">
    alert("Berhasil menambahkan transaksi! Silahkan tunggu konfirmasi dari kami <3")
    window.location = 'index.php'
</script>