<?php
include "../config.php";
$id_status = $_GET['id_status'];
$sql = "DELETE FROM status_pemesanan WHERE id_status='$id_status'";
$hasil = mysqli_query($koneksi, $sql);
if ($hasil) 
{
	echo "<script>alert('Data berhasil dihapus'); document.location.href='index.php?halaman=status'; </script>";
} 
else 
{
	echo "<script>alert('Proses gagal'); document.location.href='index.php?halaman=status'; </script>";
}
mysqli_close($koneksi);
?>