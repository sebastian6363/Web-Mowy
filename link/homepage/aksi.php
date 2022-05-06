<?php 

session_start();

include 'koneksi.php';

$user = $_POST['username'];
$pass = $_POST['password'];

$sql = mysqli_query($conn, "SELECT * FROM data_user WHERE username='$user' AND password='$pass'");
$cek = mysqli_num_rows($sql);

if ($cek > 0){
    $data = mysqli_fetch_assoc($sql);
    if ($data['level'] == "Admin"){
        $_SESSION['id'] = $data['id'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['alamat'] = $data['alamat'];
        $_SESSION['no_hp'] = $data['no_hp'];
        $_SESSION['gender'] = $data['gender'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['level'] = "Admin";
        header("location:../../admin/index.php");

    }elseif ($data['level'] == "Pegawai") {
        $_SESSION['id'] = $data['id'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['alamat'] = $data['alamat'];
        $_SESSION['no_hp'] = $data['no_hp'];
        $_SESSION['gender'] = $data['gender'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['level'] = "Pegawai";
        header("location:../../pegawai/index.php");

    }elseif ($data['level'] == "Pembeli") {
        $_SESSION['id'] = $data['id'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['alamat'] = $data['alamat'];
        $_SESSION['no_hp'] = $data['no_hp'];
        $_SESSION['gender'] = $data['gender'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['level'] = "Pembeli";
        header("location:../../pembeli/index.php");
        
    }else{
        header("location:../../index.php?alert=gagal");
    }
}else{
    header("location:../../index.php?alert=gagal");
}

?>