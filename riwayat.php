<?php
session_start();
include "config.php";

if (!isset($_SESSION['Pelanggan']))
{
	echo "<script>alert('Anda harus login');</script>";
	echo "<script>location='login.php';</script>";
	header('location=login.php');
	exit();
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
	</style>
</head>
<body>
	<?php include 'header.php'; ?>
	<main>
		<div class="report-box">
		<h2>Nota Pembelian</h2>
		<hr>
		<p><strong>Nama pembeli:</strong> <?php echo $_SESSION["Pelanggan"]["nama"]?></p>
		<p><strong>Email:</strong> <?php echo $_SESSION["Pelanggan"]["email"]?></p>
		<p><strong>Nomor Telepon:</strong> <?php echo $_SESSION["Pelanggan"]["telepon"]?></p>
		<hr>
		<table>
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Tanggal Pembelian</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
				<?php $nomor=1;
				$id_pelanggan= $_SESSION["Pelanggan"]['id_pelanggan'];
				$ambil=$koneksi->query("SELECT * FROM faktur 
				JOIN status_pemesanan ON faktur.id_status=status_pemesanan.id_status
				WHERE id_pelanggan='$id_pelanggan'");
				while($pecah=$ambil->fetch_assoc()){?>
                <tr>
                    <td><?php echo $nomor;?></td>
                    <td><?php echo date("d F Y", strtotime($pecah["tanggal_pembelian"]))?></td>
                    <td><?php echo $pecah["status"]?></td>
                    <td>Rp.<?php echo number_format($pecah["total_harga"]);?></td>
                    <td>
						<?php if($pecah['id_status']=="S001"):?>
						<a href="nota.php?id_faktur=<?php echo $pecah["id_faktur"]?>" class="btn-custom-danger">Nota</a>
						<a href="pembayaran.php?id_faktur=<?php echo $pecah['id_faktur']?>" class="btn-custom-save">Input Pembayaran</a>
						<a href="batal.php?id_faktur=<?php echo $pecah['id_faktur']?>" onclick="return confirm('Apakah anda yakin ingin membatalkan pembelian?')" class="btn-custom-danger" name="batal">Batalkan Pembelian</a>
						<?php endif?>
				
						<?php if($pecah['id_status']=="S003" OR $pecah['id_status']=="S008"):?>
						<a href="nota.php?id_faktur=<?php echo $pecah["id_faktur"]?>" class="btn-custom-save">Nota</a>
						<a href="penilaian.php?id_faktur=<?php echo $pecah['id_faktur']?>" class="btn-custom-warning">Pesanan Diterima</a>
						<?php endif?>
					
						<?php if($pecah['id_status']=="S005"):?>
						<a href="nota.php?id_faktur=<?php echo $pecah["id_faktur"]?>" class="btn-custom-save">Nota</a>
						<?php endif?>
					
						<?php if($pecah['id_status']=="S006"):?>
						<?php endif?>
					
						<?php if($pecah['id_status']=="S002" OR $pecah['id_status']=="S004" OR $pecah['id_status']=="S007"):?>
						<a href="nota.php?id_faktur=<?php echo $pecah["id_faktur"]?>" class="btn-custom-save">Nota</a>
						<a href="lihat_pembayaran.php?id_faktur=<?php echo $pecah['id_faktur']?>" class="btn-custom-warning">Lihat Pembayaran</a>
						<?php endif?>
					</td>
						<?php $nomor++;?>
						<?php } ?>
                </tr>
            </tbody>
        </table>
	</div>
	</main>
</body>
</html>