<?php
session_start();
include 'config.php';

$id_ikan = $_GET['id_ikan'];
echo "$id_ikan";
$ambil=$koneksi->query("SELECT * FROM ikan WHERE id_ikan='$id_ikan'");
$perproduk = $ambil->fetch_assoc();
$Stok = $perproduk['stok'];

if($Stok>=1)
{
if (isset($_SESSION['keranjang'][$id_ikan]))
{
	$_SESSION['keranjang'][$id_ikan]+=1;
}

else
{
	$_SESSION['keranjang'][$id_ikan]=1;
}

echo "<script>alert('Produk telah masuk ke keranjang');</script>";
echo "<script>location='keranjang.php';</script>";
}
else
{
	echo "<script>alert('Stok habis');</script>";
	echo "<script>location='index.php';</script>";
}
?>