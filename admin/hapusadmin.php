<?php
include "../config.php";
$id_admin = $_GET['id_admin'];
$sql = "DELETE FROM admin WHERE id_admin='$id_admin'";
$hasil = mysqli_query($koneksi, $sql);
if ($hasil) 
{
	echo "<script>alert('Data berhasil dihapus'); document.location.href='index.php?halaman=admin'; </script>";
} 
else 
{
	echo "<script>alert('Proses gagal'); document.location.href='index.php?halaman=admin'; </script>";
}
mysqli_close($koneksi);
?>