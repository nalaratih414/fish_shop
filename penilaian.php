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
	echo "<script>alert('Tidak dapat diproses ');</script>";
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
    display: inline-block;
	padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #c3e8c4;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);}
	
	button {
            padding: 10px 15px;
            color: white;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
        }

        button:hover {
            background-color: #45a049;
        }
	</style>
</head>
<body>
	<?php include 'header.php'; ?>
	<main>
	<div class="report-box">
	<div class="container">
    <h2>Nota Pembelian</h2>
    <hr>
	<div class="alert alert-info"> <strong>Terimakasih telah berbelanja di toko buku kami! </strong></div>
	<form method="post" enctype="multipart/form-data">
		`   <div class="form-group">
			<select class="form-control" name="pk" required>
			  <option value="">-- Penilaian/Komplain --</option>
					<option>Penilaian</option>
					<option>Komplain</option>
			</select>
            </div>
		<div class="form-group">
			<label> Silahkan berikan komentar ! </label>
			<textarea class="form-control" name="komentar" placeholder="Berikan Penilaian Anda"></textarea>
		</div>
		<button class="btn btn-primary" name="kirim"> Kirim</button>
	<a href="riwayat.php" class="btn-custom-warning"> Kembali </a>
	</form>
	</div>
	</div>
	</main>
<?php
//jk tombol kirim diklik
if(isset($_POST["kirim"]))
{
	$pk=$_POST["pk"];
	$nilai =$_POST["komentar"];
	
	if ($pk=='Penilaian')
	{
		$koneksi->query("UPDATE faktur SET penilaian_produk='$nilai'WHERE id_faktur='$idpem'");			
	//update status pembayaran
	$koneksi->query("UPDATE faktur SET id_status='S005' WHERE id_faktur='$idpem'");
	
		echo "<script>alert('Terima kasih sudah memberi penilaian ');</script>";
	echo "<script>location='riwayat.php';</script>";
	}
	
	else
	{
		$koneksi->query("UPDATE faktur SET komplain='$nilai'WHERE id_faktur='$idpem'");
		$koneksi->query("UPDATE faktur SET id_status='S008' WHERE id_faktur='$idpem'");
		echo "<script>alert('Terima kasih sudah memberi komplain ');</script>";
	echo "<script>location='riwayat.php';</script>";
	}
}?>
</body>
</html>