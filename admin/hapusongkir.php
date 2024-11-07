<?php
include "../config.php";
$id_ongkir = $_GET['id_ongkir'];
$sql = "DELETE FROM ongkir WHERE id_ongkir='$id_ongkir'";
$hasil = mysqli_query($koneksi, $sql);
if ($hasil) 
{
	echo "<script>alert('Data berhasil dihapus'); document.location.href='index.php?halaman=ongkir'; </script>";
} 
else 
{
	echo "<script>alert('Proses gagal'); document.location.href='index.php?halaman=ongkir'; </script>";
}
mysqli_close($koneksi);
?>