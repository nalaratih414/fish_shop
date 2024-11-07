<?php
include "../config.php";
$id_metode = $_GET['id_metode'];
$sql = "DELETE FROM metode_pembayaran WHERE id_metode='$id_metode'";
$hasil = mysqli_query($koneksi, $sql);
if ($hasil) 
{
	echo "<script>alert('Data berhasil dihapus'); document.location.href='index.php?halaman=metode'; </script>";
} 
else 
{
	echo "<script>alert('Proses gagal'); document.location.href='index.php?halaman=metode'; </script>";
}
mysqli_close($koneksi);
?>