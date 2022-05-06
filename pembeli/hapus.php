<?php 

require ('../link/homepage/koneksi.php');
$id = $_GET['id'];

$sql = "DELETE FROM keranjang WHERE id_transaksi = '$id'";

mysqli_query($conn, $sql);
header("location:keranjang.php");

?>