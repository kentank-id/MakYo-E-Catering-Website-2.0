<?php
session_start();
echo "<pre>";
if(isset($_SESSION['chart'])){
    print_r($_SESSION['chart']);
    echo "<br>";
}
echo "</pre>";
?>