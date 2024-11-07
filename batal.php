<?php
include "config.php";
$id_faktur = $_GET['id_faktur'];
$koneksi->query("UPDATE faktur SET id_status='S006' WHERE id_faktur='$id_faktur'");
	echo "<script>alert('Pembelian berhasil dibatalkan'); document.location.href='riwayat.php'; </script>";
?>