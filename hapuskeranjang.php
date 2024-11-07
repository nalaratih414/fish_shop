<?php
include "config.php";
session_start();
$id_ikan = $_GET['id_ikan'];
unset($_SESSION["keranjang"][$id_ikan]);
	echo "<script>alert('Produk berhasil dihapus dari keranjang'); document.location.href='keranjang.php'; </script>";
mysqli_close($koneksi);
?>