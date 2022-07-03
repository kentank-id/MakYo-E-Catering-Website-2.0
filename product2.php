<?php
require('functions.php');

// $data = mysqli_query($conn, "INSERT INTO pemesan set nama='$_POST[nama]', nohp='$_POST[nohp]', alamat='$_POST[alamat]', email='$_POST[email]'");
// $menumakan = query("SELECT * FROM tempmakan SET menu='$_GET'");

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM menuminuman WHERE id=$id");
$row = mysqli_fetch_assoc($data);
// echo ($row);


if (isset($_POST["submit2"])) {
    if (!isset($_POST["jumlah"])) {
        echo "<script>alert(' Jumlah Wajib diisi ')</script>";
    } else {

        $nama = $_POST['nama']; // id
        $jumlah = $_POST['jumlah'];
        $harga = $_POST['harga'] * $jumlah;

        mysqli_query($conn, "INSERT INTO tempminum SET nama='" . $nama . "', jumlah='" . $jumlah . "', harga='" . $harga . "'");
        $alert = mysqli_affected_rows($conn);
        if ($alert >= 1) {
            echo "<script>alert('Berhasil')</script>";
        } else {
            echo "<script>alert('Gagal')</script>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product 1</title>
    <script src="https://kit.fontawesome.com/054e937303.js" crossorigin="anonymous"></script>
    <style>
        <?php include "style2.css" ?>
    </style>
</head>

<body>
    <div class="container">
        <a href="minuman.php">
            <button class="button-82-pushable" role="button">
                <span class="button-82-shadow"></span>
                <span class="button-82-edge"></span>
                <span class="button-82-front text">
                    Kembali
                </span>
            </button>
        </a>
        <div class="card">
            <div class="head-card">
                <img src="<?= $row['gambar'] ?>">
            </div>
            <div class="body-card">
                <p class="kategori">MINUMAN</p>
                <h1><?= $row['nama'] ?></h1>
                <p></p>
                <p><?= $row['rincian'] ?></p>
                <h3><?= $row['harga'] ?> / porsi</h3>
                <div class="rating">
                    <?php
                    for ($i = 1; $i <= $row['rating']; $i++) {
                    ?>
                        <i class="fa fa-star"></i>
                    <?php }; ?>
                </div>
                <div class="buy">
                    <form action=" <?php $_SERVER['PHP_SELF'] ?> " method="POST">
                        <h3>Jumlah Pesan</h3>
                        <input type="number" name="jumlah" size="1">
                        <input type="hidden" name="nama" value="<?= $row['nama'] ?>">
                        <input type="hidden" name="harga" value="<?= $row['harga'] ?>">
                        <button type="submit" name="submit2">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>