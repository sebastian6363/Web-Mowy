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
    $query = "SELECT * FROM data_user WHERE id = '$id'";
    $result = $conn -> query($query);

    while ($row = $result -> fetch_assoc()) :

    ?>
    
    <div class="popup">
        <div class="wrap container">
            <div class="title-2">
                <h1>Form Ubah Data Pegawai</h1>
                <p>Ubah data pegawai yang ingin Anda perbarui!</p>
            </div>
            <form class="form" action="#" method="POST" enctype="multipart/form-data">
                <div class="form-element">
                    <label for="alamat">Alamat</label>
                    <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $row['id'] ?>">
                    <input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $row['alamat'] ?>" required>
                </div>
                <div class="row form-element">
                    <div class="sprt col-md-6">
                        <label for="nama">Nama Pegawai</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $row['nama'] ?>" required>
                    </div>
                    <div class="sprt col-md-6">
                        <label for="no_hp">No HP</label>
                        <input type="text" name="no_hp" class="form-control" id="no_hp" value="<?php echo $row['no_hp'] ?>" required>
                    </div>
                </div>
                <div class="form-element">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email" value="<?php echo $row['email'] ?>" required>
                </div>
                <div class="form-element">
                    <label for="password">Password</label>
                    <input type="text" name="password" class="form-control" id="password" value="<?php echo $row['password'] ?>" required>
                </div>
                <div class="btn">
                    <a href="data_pegawai.php"><button class="batal" type="button" id="batal">Batal</button></a>
                    <button class="submit" type="submit" name="submit" id="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <?php endwhile ?>

    <?php 
    
    if (isset($_POST['submit'])) {
        // Ambil semua data
        $id = $_GET['id'];
        $alamat = $_POST['alamat'];
        $nama = $_POST['nama'];
        $no_hp = $_POST['no_hp'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $edit_data = "UPDATE data_user set
                        nama = '$nama',
                        alamat = '$alamat',
                        no_hp = '$no_hp',
                        email = '$email',
                        password = '$password'
                        WHERE id = '$id'";

        mysqli_query($conn, $edit_data);
        ?>
        <script type="text/javascript">
            alert("Edit data Successfull")
            window.location = 'data_pegawai.php'
        </script>
        <?php 
    }
?>

</body>
</html>