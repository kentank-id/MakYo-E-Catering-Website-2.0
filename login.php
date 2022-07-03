<?php
require('functions.php');
if (isset($_POST['submit'])) {
    $data = mysqli_query($conn, "SELECT * FROM pelanggan WHERE nama LIKE '%$_POST[nama]%' and notelp LIKE '$_POST[nohp]'");

    while ($temp = mysqli_fetch_assoc($data)) {
        $_SESSION['id'] = $temp['id'];
        $_SESSION['nama'] = $temp['nama'];
        $_SESSION['alamat'] = $temp['alamat'];
        $_SESSION['notelp'] = $temp['notelp'];
        $_SESSION['email'] = $temp['email'];
    }
    $result = mysqli_affected_rows($conn);
    // echo "ini : ".$result;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php include "style2.css" ?>
    </style>
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <ul>
                <li><label for="">Nama &nbsp;&nbsp;: </label><input type="text" name="nama" required></li>
            </ul>
            <ul>
                <li><label for="">No. HP : </label><input type="text" name="nohp" id="" required></li>
            </ul>
            <ul>
                <li><button type="submit" name="submit">CEK DATA</button></li>
            </ul>
        </form>
        <div class="biodata">

            <?php if (isset($_POST['submit'])) {
                if ($result == 1) {
                    echo "Data Ditemukan" . "<br/>";
                    echo "<h2>" . $_SESSION['nama'] . "<br/>";
                    echo $_SESSION['alamat'] . "<br/>";
                    echo $_SESSION['notelp'] . "<br/>";
                    echo $_SESSION['email'] . "</h2><br/>";
                } else {
                    echo "Data Tidak Ditemukan";
                }
            } ?>
        </div>
    </div>
</body>

</html>