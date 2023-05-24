<?php
include 'connect.php';
$IDProduk = $_GET['IDProduk'];
$result = mysqli_query($conn, "DELETE FROM `produk` where IDProduk= '$IDProduk'");

header("location:index.php");
