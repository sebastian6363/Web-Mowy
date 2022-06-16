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

    <style>
        body {
            background-image: url('../images/moww-2.png');
            background-size: cover;
        }
        button {
            transition: .5s ease;
        }
        button:hover {
            transform: scale(1.10);
        }
    </style>
</head>
<body>

<?php 

session_start();
require "../link/homepage/koneksi.php";

$id = $_GET['id'];
$query = "SELECT * FROM data_produk WHERE id_produk = '$id'";
$result = $conn -> query($query);

while ($row = $result -> fetch_assoc()):

?>

<div class="popup m-5 bg-white p-4" style="border-radius: 30px;">
        <form class="form" method="POST" action="#">
            <div class="row">
                <div class="col-md-4 product" style="margin: auto;">
                    <div class="row" style="height: 100%; border-radius: 30px;">
                        <img src="../images/product/<?php echo $row['gambar_produk']; ?>" style="
                            width: 80%; 
                            height: 80%;
                            margin: 0 auto;
                            border-top-left-radius: 35px;
                            border-top-right-radius: 35px;
                            " alt="Product">
                        <p style="
                            text-align: center; 
                            background: white; 
                            padding-top: 5px;
                            width: 73%; 
                            height: 35px; 
                            margin: auto; 
                            border-bottom-left-radius: 25px; 
                            border-bottom-right-radius: 25px;
                            box-shadow: 5px 10px 18px #888888;
                            color: #6F9DFF;
                            font-weight: 700;"
                            >Rp <?php echo $row['harga_produk']; ?></p>
                    </div>
                </div>
                <div class="col-md-8 desc row">
                    <div class="row">
                        <h1 style="
                            color: #6F9DFF;
                            font-weight: 800;
                            "><?php echo $row['nama_produk']; ?></h1>
                        <p style="font-size: 14px;">Susu cair segar berkualitas tinggi dengan rasa <?php echo $row['rasa_produk']; ?> yang mengandung keseimbangan nutrisi. Susu Mowy rasa <?php echo $row['rasa_produk']; ?> cocok untuk dikonsumsi sehari-hari dan juga diminum sehabis beraktivitas atau berolahraga untuk memenuhi kembali cairan tubuh dan membantu pembentukan tubuh.
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h6 style="font-weight: 700;">Sebelum dibuka:</h6>
                            <p style="font-size: 14px;"><?php echo $row['if_sebelum']; ?></p>
                        </div>
                        <div class="col-6">
                            <h6 style="font-weight: 700;">Sesudah dibuka:</h6>
                            <p style="font-size: 14px;"><?php echo $row['if_sesudah']; ?></p>
                        </div>
                    </div>
                    <div class="row btn d-flex">
                        <div class="col-md-4">
                            <span class="d-flex" style="
                                border: 3px solid #6F9DFF; 
                                border-radius: 15px;
                                color: #6F9DFF;
                                padding-left: 10px;"
                                >Jumlah: <input type="number" style="
                                border: none; 
                                border-radius: 15px; 
                                width: 100%; 
                                outline: none; 
                                padding-left: 5px;
                                padding-right: 10px;
                                color: #6F9DFF;" name="jumlah" id="jumlah" required>
                                <input type="hidden" value="<?php echo $row['harga_produk']; ?>" name="harga" id="harga">
                            </span>
                        </div>
                        <div class="col-md-4">
                            <button style="
                                width: 100%;
                                border: 3px solid #6F9DFF;
                                border-radius: 15px;
                                background-color: #6F9DFF;
                                color: white;" type="submit" name="submit" id="submit"
                                >Beli</button>
                        </div>
                        <div class="col-md-4">
                            <a href="produk.php">
                            <button style="
                                border: 3px solid #6F9DFF; 
                                border-radius: 15px;
                                color: #6F9DFF;
                                background-color: white;
                                width: 100%;
                                cursor: pointer;" id="balik" type="button"
                                >Kembali</button>
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php endwhile ?>

    <?php 
    
    if (isset($_POST['submit'])) {
        $jumlah = $_POST['jumlah'];
        $harga = $_POST['harga'];
        $total = $jumlah * $harga;
        $pelanggan = $_SESSION['id'];
        
        $add_data = "INSERT INTO keranjang (id_pembeli, id_produk, jumlah_produk, total, status) VALUES ('$pelanggan', '$id', '$jumlah', '$total', 'Ongoing')";

        mysqli_query($conn, $add_data);
        ?>

        <script type="text/javascript">
            window.location = 'keranjang.php'
        </script>
        <?php 
    }
    ?>
</body>
</html>