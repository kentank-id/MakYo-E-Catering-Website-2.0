<?php
require('functions.php');
if (isset($_POST['submit'])) {
    $data = mysqli_query($conn, "INSERT INTO pemesan set nama='$_POST[nama]', nohp='$_POST[nohp]', alamat='$_POST[alamat]', email='$_POST[email]'");
    // mysqli_query($conn, "INSERT INTO pemesan VALUES('','$_POST[nama]','$_POST[nohp]',)");
    $result = mysqli_affected_rows($conn);
    echo "ini : ".$result;
    
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
    <h1>Biodata Pemesan</h1>
    <div class="container">
        <div class="biodata">
            <form action="" method="POST">
                <ul>
                    <li><label for="">Nama &nbsp;&nbsp;: </label><input type="text" name="nama" required></li>
                </ul>
                <ul>
                    <li><label for="">No. HP : </label><input type="text" name="nohp" id="" required></li>
                </ul>
                <ul>
                    <li><label for="">Alamat : </label><input type="text" name="alamat" id="" required></li>
                </ul>
                <ul>
                    <li><label for="">Email : </label><input type="text" name="email" id="" required></li>
                </ul>
                <ul>
                    <li><button type="submit" name="submit">INPUT BIODATA</button></li>
                </ul>
            </form>
        </div>
    </div>
</body>

</html>