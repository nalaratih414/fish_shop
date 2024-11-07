<?php
$localhost = "localhost";
$username = "root";
$password = "";
$db = "fish_shop";

$koneksi = new mysqli($localhost,$username,$password, $db);

if($koneksi->connect_error)
(
die ( "Connection failed : " . $koneksi->connect_error)
)
?>