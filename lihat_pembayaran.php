<?php
session_start();
include "config.php";

$id_faktur=$_GET['id_faktur'];

//mengambildata pmbyrn brdsrkan idfaktur
$ambil=$koneksi->query("SELECT * FROM faktur 
JOIN pelanggan ON faktur.id_pelanggan=pelanggan.id_pelanggan
WHERE id_faktur='$id_faktur'");
$detail = $ambil->fetch_assoc();
?>

<html>
<head>
	<?php include 'head.php'; ?>
	<link rel="stylesheet" href="css/styletambah.css">
	<link rel="stylesheet" href="css/stylekeranjang.css">
<style>
.product-detail {
    display: flex;
    background-color: white;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.product-image {
    width: 300px;
    height: auto;
}

.product-info {
    padding: 20px;
    flex: 1;
}

.product-info h2 {
    margin: 0 0 10px;
}

.product-info p {
    margin: 5px 0;
}

main {
    padding: 20px;
    text-align: justify;
}

.add-to-cart {
    padding: 10px 15px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.add-to-cart:hover {
    background-color: #45a049;
}

.search-box-data {
    display: flex;
	margin-left: 0px;
    margin-bottom: 5px;
}

.search-box-data input {
    padding: 50px;
    width: 200px; 
}

.search-box-data button {
    padding: 10px;
}
</style>
</head>
<body>
	<?php include 'header.php'; ?>
	<main>
	<?php $sql=$koneksi->query("SELECT * FROM faktur 
	INNER JOIN pelanggan ON pelanggan.id_pelanggan=faktur.id_pelanggan 
	WHERE faktur.id_faktur='$_GET[id_faktur]'");
	$detail=$sql->fetch_assoc();
	$yangbeli=$detail["id_pelanggan"];
	$yanglogin=$_SESSION["Pelanggan"]["id_pelanggan"];
	if ($yangbeli!==$yanglogin){
		echo "<script>alert('Bukan data pembayaran anda');</script>";
		echo "<script>location='riwayat.php';</script>";
		exit();}
	$sql=$koneksi->query("SELECT * FROM faktur WHERE id_faktur='$_GET[id_faktur]'");
	$detbay=$sql->fetch_assoc();
	if (empty($detbay['bukti_pembayaran'])){
		echo "<script>alert('Belum ada data pembayaran');</script>";
		echo "<script>location='riwayat.php';</script>";
		exit();}?>
	<div class="product-detail">
        <img src="buktipembayaran/<?php echo $detail['bukti_pembayaran'];?>" class="product-image">
        <div class="product-info">
            <p><strong>Nama Pembeli:</strong> <?php echo $detail['nama'];?></p><br>
            <p><strong>Total Harga Pembayaran:</strong> Rp.<?php echo number_format($detail['total_harga']);?></p><br>
            <p><strong>Tanggal Pembayaran:</strong> <?php echo date("d F Y", strtotime($detail['tanggal_pembayaran']));?></p><br>
            <a href="riwayat.php" class="btn-custom-save">Riwayat Belanja</a>
        </div>
    </div>
	</main>
</body>
</html>