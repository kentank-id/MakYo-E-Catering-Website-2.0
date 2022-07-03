<?php
session_start();
if (isset($_GET['beli']) && is_numeric($_GET['beli'])) {
    if (isset($_SESSION['chart'][$_GET['beli']])) {
        $_SESSION['chart'][$_GET['beli']]++;
    } else {
        $_SESSION['chart'][$_GET['beli']] = 1;
    }
}
echo "<pre>";
if(isset($_SESSION['chart'])){
    print_r($_SESSION['chart']);
    echo "<br>";
}
echo "</pre>";
// session_destroy();
?>

<a href="?beli=1">Beli Paket 1</a><br />
<a href="?beli=2">Beli Paket 2</a><br />
<a href="?beli=3">Beli Paket 3</a><br />
<a href="?beli=4">Beli Paket 4</a><br />
<a href="jajal2.php">Checkout</a>