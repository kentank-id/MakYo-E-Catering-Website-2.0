<?php
require "functions.php";
session_start();
session_destroy();
mysqli_query($conn, "DELETE FROM tempmakan");
mysqli_query($conn, "DELETE FROM tempminum");
mysqli_query($conn, "DELETE FROM pembeli");
mysqli_query($conn, "DELETE FROM transaksi");
header("Location: cart.php");
?>