<?php
include "../config.php";
$id_pelanggan = $_GET['id_pelanggan'];
$sql = "DELETE FROM pelanggan WHERE id_pelanggan='$id_pelanggan'";
$hasil = mysqli_query($koneksi, $sql);
if ($hasil) 
{
	echo "<script>alert('Data berhasil dihapus'); document.location.href='index.php?halaman=pelanggan'; </script>";
} 
else 
{
	echo "<script>alert('Proses gagal'); document.location.href='index.php?halaman=pelanggan'; </script>";
}
mysqli_close($koneksi);
?>