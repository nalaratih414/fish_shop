<?php
include "../config.php";
$id_kategori = $_GET['id_kategori'];
$sql = "DELETE FROM kategori WHERE id_kategori='$id_kategori'";
$hasil = mysqli_query($koneksi, $sql);
if ($hasil) 
{
	echo "<script>alert('Data berhasil dihapus'); document.location.href='index.php?halaman=kategori'; </script>";
} 
else 
{
	echo "<script>alert('Proses gagal'); document.location.href='index.php?halaman=kategori'; </script>";
}
mysqli_close($koneksi);
?>