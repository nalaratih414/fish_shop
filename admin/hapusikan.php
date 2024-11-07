<?php
include "../config.php";
$id_ikan = $_GET['id_ikan'];
$sql = "DELETE FROM ikan WHERE id_ikan='$id_ikan'";
$hasil = mysqli_query($koneksi, $sql);
if ($hasil) 
{
	echo "<script>alert('Data berhasil dihapus'); document.location.href='index.php?halaman=ikan'; </script>";
} 
else 
{
	echo "<script>alert('Proses gagal'); document.location.href='index.php?halaman=ikan'; </script>";
}
mysqli_close($koneksi);
?>