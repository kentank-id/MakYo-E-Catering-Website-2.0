<?php
require('functions.php');

$menumakan = query("SELECT * FROM menumakanan");

session_start();
if (isset($_GET['beli']) && is_numeric($_GET['beli'])) {
    if (isset($_SESSION['chart'][$_GET['beli']])) {
        $_SESSION['chart'][$_GET['beli']]++;
    } else {
        $_SESSION['chart'][$_GET['beli']] = 1;
    }
}

if (isset($_GET['delete'])) {
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/054e937303.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        <?php include "style.css" ?>
    </style>
</head>

<body>
    <a href="index.php">
        <button class="button-82-pushable" role="button">
            <span class="button-82-shadow"></span>
            <span class="button-82-edge"></span>
            <span class="button-82-front text">
                Kembali
            </span>
        </button>
    </a>
    <div class="container">
        <div class="container-makan">
            <?php foreach ($menumakan as $row) : ?>
                <a href="product.php?id=<?= $row['id']; ?>">
                    <div class="card">
                        <div class="head-card">
                            <img src="<?= $row['gambar']; ?>">
                        </div>
                        <div class="body-card">
                            <h1><?= $row['nama']; ?></h1>
                            <p><?= $row['rincian']; ?></p>
                            <h3>Rp. <?= $row['harga']; ?></h3>
                            <div class="rating">
                                <?php for ($i = 0; $i < $row['rating']; $i++) : ?>
                                    <i class="fa fa-star"></i>
                                <?php endfor; ?>
                            </div>
                            <br>

                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
        <div class="checkout">
            <a href="cart.php">
                <img src="svg/cart.svg" alt="">
                <button class="button-37" role="button">KERANJANG</button>
            </a>
        </div>

    </div>
</body>

</html>