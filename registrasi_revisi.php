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
            $confirm = $_POST['confirmation'];
            $level = 'Pembeli';

            if ($password != $confirm) {
                echo "<div class='alert alert-danger' style='align-items: center; display: block; text-align: center;'>Harap masukkan password yang sama!</div>";
            }
            else {
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOWY - Registrasi</title>

    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="link/homepage/css/regist_rev.css">
</head>
<body>
    <header>
        <nav>
            <div class="container mt-4">
                <a href="index.php">
                    <img src="images/Logo Mowy.png" alt="logo" width="200" height="75">
                </a>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <div class="judul mb-4" style="text-align: center;">
                <h1>Registrasi</h1>
                <p> Selamat datang, silahkan isi dan lengkapi <br> persyaratan di bawah ini!</p>
            </div>
            <div class="container content mb-4">
                <form class="form" action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-element">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan alamat anda. . ." required>
                    </div>
                    <div class="form-element">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama lengkap anda. . ." required>
                    </div>
                    <div class="form-element">
                        <label for="no_hp">No HP</label>
                        <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="Contoh: 08xxxxxxxxxx" required>
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
                        <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan username. . ." required>
                    </div>
                    <div class="form-element">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password anda. . ." required>
                    </div>
                    <div class="form-element">
                        <label for="confirmation">Confirm Password</label>
                        <input type="password" name="confirmation" class="form-control" id="confirmation" placeholder="Ketik ulang password anda. . ." required>
                    </div>
                    <div class="btn">
                        <button class="submit" type="submit" name="submit" id="submit">Simpan</button>
                        <p>Sudah punya akun? <a href="index.php"> Log in</a></p>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>