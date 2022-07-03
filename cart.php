<?php
require "functions.php";
session_start();
$data = mysqli_query($conn, "SELECT nama, SUM(jumlah) as jumlah, SUM(harga) as harga FROM tempmakan GROUP BY nama");
$data5 = mysqli_query($conn, "SELECT nama, SUM(jumlah) as jumlah,SUM(harga) as harga FROM tempmakan GROUP BY nama");
// $data2 = mysqli_query($conn, "SELECT nama,jumlah,SUM(harga) as harga FROM tempminum GROUP BY nama");
$data2 = mysqli_query($conn, "SELECT nama, SUM(jumlah) as jumlah, SUM(harga) as harga FROM tempminum GROUP BY nama");
$data6 = mysqli_query($conn, "SELECT nama, SUM(jumlah) as jumlah, SUM(harga) as harga FROM tempminum GROUP BY nama");
$datamakan = array();
$dataminum = array();

//get total harga
$data4 = mysqli_query($conn, "SELECT SUM(tempmakan.harga)+SUM(tempminum.harga) as totalharga FROM tempmakan, tempminum");
$row4 = mysqli_fetch_assoc($data4);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];

    mysqli_query($conn, "INSERT INTO pembeli SET nama='" . $nama . "', nohp='" . $nohp . "', alamat='" . $alamat . "', email='" . $email . "'");
    $data3 = mysqli_query($conn, "SELECT MAX(id) as id FROM pembeli");
    $row3 = mysqli_fetch_assoc($data3);

    addTransaksi($row3['id'], $row4['totalharga']);
    echo '<script>
    alert("Terimakasih Telah Melakukan Transaksi");    
        </script>';
}

function addTransaksi($id, $total)
{
    global $conn;
    mysqli_query($conn, "INSERT INTO transaksi SET pembeli_id='" . $id . "', makanan='" . json_encode($_SESSION['datamakan']) . "', minuman='" . json_encode($_SESSION['dataminum']) . "', totalharga='" . $total . "'");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
    <style>
        <?php include "style4.css" ?>
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
    <header>
        <div class="judul">
            <h1>KERANJANG</h1>
        </div>
    </header>
    <div class="container">
        <div class="container-dua">
            <a href="destro.php"><button>Clear Cart</button></a>
            <div id="tablelive" class="tabel-data">
                <table>
                    <tr>
                        <th class="id">NAMA MENU</th>
                        <th class="matkul">JUMLAH</th>
                        <th class="deadline">HARGA</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($data5)) : ?>
                        <tr>
                            <td><?php echo $row['nama'] ?? ''; ?></td>
                            <td><?php echo $row['jumlah'] ?? ''; ?></td>
                            <td><?php echo $row['harga'] ?? ''; ?></td>
                            <?php array_push($datamakan, $row['nama']);
                            $_SESSION['datamakan'] = $datamakan; ?>
                        </tr>
                    <?php endwhile; ?>
                    <?php while ($row = mysqli_fetch_assoc($data6)) : ?>
                        <tr>
                            <td><?php echo $row['nama'] ?? ''; ?></td>
                            <td><?php echo $row['jumlah'] ?? ''; ?></td>
                            <td><?php echo $row['harga'] ?? ''; ?></td>
                            <?php array_push($dataminum, $row['nama']);
                            $_SESSION['dataminum'] = $dataminum; ?>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
            <h3><?= "TOTAL HARGA : " . $row4['totalharga']; ?></h3>
        </div>
        <div class="form">
            <form action="" method="POST">
                <ul>
                    <li><label for="">Nama</label></li>
                    <li><input type="text" name="nama"></li>
                </ul>
                <ul>
                    <li><label for="">No. HP</label></li>
                    <li><input type="text" name="nohp"></li>
                </ul>
                <ul>
                    <li><label for="">Email</label></li>
                    <li><input type="text" name="email"></li>
                </ul>
                <ul>
                    <li><label for="">Alamat</label></li>
                    <li><input type="text" name="alamat"></li>
                </ul>
                <ul>
                    <li><button name="submit">CHECKOUT</button></li>
                </ul>
            </form>
        </div>

    </div>
    <script>
        function konfirmasi() {
            alert("Terimakasih Telah Melakukan Transaksi");
        }
    </script>
</body>

</html>