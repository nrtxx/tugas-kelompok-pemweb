<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "farmer_market";

// koneksi ke data base
$con = mysqli_connect($servername, $username, $password,$db);

// cek koneksi
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>