<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selengkapnya</title>

    <!-- Style web -->
    <link rel="stylesheet" href="link/homepage/css/selengkapnya.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<body>
    <?php 
    include 'link/homepage/koneksi.php';
    $query = "SELECT * FROM data_informasi_website WHERE menu = 'Selengkapnya'";
    $result = $conn -> query($query);
    while ($row = $result -> fetch_assoc()) :
    ?>
    <section class="title-selengkapnya">
        <a href="index.php"><button class="bi bi-arrow-left-short"></button></a>
        <h1><?php echo $row['judul'] ?></h1>
    </section>
    <section class="content-selengkapnya">
        <img src="images/website/<?php echo $row['gambar'] ?>" alt="">
        <p><?php echo $row['konten'] ?></p>
    </section>
    <?php endwhile ?>
</body>
</html>