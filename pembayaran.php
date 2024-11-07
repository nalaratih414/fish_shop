<?php
session_start();
include "config.php";

$idpem= $_GET["id_faktur"];
$ambil=$koneksi->query("SELECT *FROM faktur WHERE id_faktur='$idpem'");
$detpem=$ambil->fetch_assoc();

$idpemygbeli=$detpem["id_pelanggan"];
$idpemyglogin=$_SESSION["Pelanggan"]["id_pelanggan"];
if ($idpemyglogin!==$idpemygbeli)
{
	echo "<script>alert('Tidak dapat diproses');</script>";
	echo "<script>location='riwayat.php';</script>";
}
?>

<html>
<head>
	<?php include 'head.php'; ?>
	<link rel="stylesheet" href="css/styletambah.css">
	<link rel="stylesheet" href="css/stylekeranjang.css">
	<style>
	main {
    padding: 20px;
    text-align: justify;}
	
	.report-box-nota {
    width: 1475px;
	padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #c3e8c4;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);}
	</style>
</head>
<body>
	<?php include 'header.php'; ?>
	<main>
	<div class="report-box">
	
	<label>Kirim bukti pembayaran anda disini</label>
	<div class="report-box-nota">
	<div> Silakan melakukan pembayaran Rp. <?php echo number_format($detpem['total_harga']);?> ke: <br><br>
		<?php $ambil=$koneksi->query("SELECT * FROM metode_pembayaran 
		JOIN faktur ON metode_pembayaran.id_metode=faktur.id_metode 
		WHERE faktur.id_faktur='$_GET[id_faktur]'");
		while ($permetode = $ambil->fetch_assoc()){ ?>
		<strong><?php echo $permetode['metode'];?></strong> : <strong><?php echo $permetode['keterangan'];?></strong>
		<?php } ?>
	</div>
	</div>
	
	<br><br>
	<form method="post" enctype="multipart/form-data">
		<div>
			<label> Bukti Pembayaran </label>
			<input type="file" name="bukti">
			<p class="text-danger"> Foto bukti harus .JPG maks.2MB </p>
		</div>
		<button class="btn-custom-save" name="kirim">Kirim</button>
		<a href="riwayat.php" class="btn-custom-warning">Kembali </a>
	</form>
	</div>
	
	<?php if(isset($_POST["kirim"])){
	//uploadfotobukti
	$namabukti=$_FILES["bukti"]["name"];
	$lokasibukti=$_FILES["bukti"]["tmp_name"];
	$namafiks=date("YmdHis").$namabukti;
	move_uploaded_file($lokasibukti,"../buktipembayaran/$namafiks");

	$tanggal=date("Y-m-d");
	
	$koneksi->query("UPDATE faktur SET bukti_pembayaran='$namafiks',tanggal_pembayaran='$tanggal'
	WHERE id_faktur='$idpem'");			
	//update status pembayaran
	$koneksi->query("UPDATE faktur SET id_status='S007' WHERE id_faktur='$idpem'");
	
	echo "<script>alert('Terima kasih sudah melakukan pembayaran');</script>";
	echo "<script>location='riwayat.php';</script>";}?>
	
	</main>
</body>
</html>
