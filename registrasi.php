<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="link/homepage/css/regist.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="popup-tambah" id="add">
    <div class="wrap container">
        <div class="title-2">
            <h1>Registrasi</h1>
            <p>Isikan semua data yang dibutuhkan!</p>
        </div>
        <form class="form" action="#" method="POST" enctype="multipart/form-data">
            <div class="form-element">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan alamat pegawai" required>
            </div>
            <div class="form-element">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Adit" required>
            </div>
            <div class="form-element">
                <label for="no_hp">No HP</label>
                <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="08XXXXXXXXX" required>
            </div>
            <div class="form-element">
                <label for="gender">Gender</label>
                <input type="text" name="gender" class="form-control" id="gender" placeholder="Laki - laki / Perempuan" required>
            </div>
            <div class="form-element">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="xxxxx@gmail.com" required>
            </div>
            <div class="form-element">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Asep123" required>
            </div>
            <div class="row form-element">
                <div class="sprt col-md-6">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="qwerty123" required>
                </div>
                <div class="sprt col-md-6">
                    <label for="confirmation">Confirm Password</label>
                    <input type="password" name="confirmation" class="form-control" id="confirmation" placeholder="qwerty123" required>
                </div>
            </div>
            <div class="btn">
                <a href="index.php"><button class="batal" type="button" id="batal">Batal</button></a>
                <button class="submit" type="submit" name="submit" id="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?php 

require "link/homepage/koneksi.php";

if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        $level = 'Pembeli';

        if ($password =! $confirm) {
            $add_data = "INSERT INTO data_user
            (nama, alamat, no_hp, gender, email, username, password, level)
                                VALUES
            ('$nama', '$alamat', '$no_hp', '$gender', '$email', '$username', '$password', '$level')
                                ";

            mysqli_query($conn, $add_data);
            ?>
            <script type="text/javascript">
                alert("Add data Successfull")
                window.location = 'index.php'
            </script>
            <?php
        }
    }
?>
</body>
</html>