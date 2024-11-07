<?php
include "../config.php";
$id_kota = $_GET['id_kota'];
$sql = "DELETE FROM kota WHERE id_kota='$id_kota'";
$hasil = mysqli_query($koneksi, $sql);
if ($hasil) 
{
	echo "<script>alert('Data berhasil dihapus'); document.location.href='index.php?halaman=kota'; </script>";
} 
else 
{
	echo "<script>alert('Proses gagal'); document.location.href='index.php?halaman=kota'; </script>";
}
mysqli_close($koneksi);
?>