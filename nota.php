<?php
session_start();
include 'config.php';

	$sql=$koneksi->query("SELECT * FROM faktur INNER JOIN pelanggan ON pelanggan.id_pelanggan=faktur.id_pelanggan WHERE faktur.id_faktur='$_GET[id_faktur]'");
	$detail=$sql->fetch_assoc();
	$yangbeli=$detail["id_pelanggan"];
	$yanglogin=$_SESSION["Pelanggan"]["id_pelanggan"];
	if ($yangbeli!==$yanglogin)
	{
		echo "<script>alert('Bukan nota anda');</script>";
		echo "<script>location='riwayat.php';</script>";
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
	<div class="container">
    <h2>Nota Pembelian</h2>
    <hr>
	<p><strong>Nama pembeli:</strong> <?php echo $detail['nama'];?></p>
    <p><strong>Email:</strong> <?php echo $detail['email'];?></p>
	<p><strong>Nomor Telepon:</strong> <?php echo $detail['telepon'];?></p>
    <p><strong>Tanggal Pembelian:</strong> <?php echo date("d F Y", strtotime($detail["tanggal_pembelian"]))?></p>
    <p><strong>Alamat Pengiriman:</strong> <?php echo $detail['alamat_pengiriman'];?></p>
    <hr>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nomor</th>
				<th>Judul Ikan</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor=1;
			$sql=$koneksi->query("SELECT * FROM transaksi 
			JOIN ikan ON transaksi.id_ikan=ikan.id_ikan 
			JOIN faktur ON transaksi.id_faktur=faktur.id_faktur 
			WHERE transaksi.id_faktur='$_GET[id_faktur]'");
			while ($pecah=$sql->fetch_assoc()){?>
			<tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $pecah['nama_ikan'];?></td>
                <td>Rp. <?php echo number_format($pecah['harga']);?></td>
				<td><?php echo $pecah['jumlah_pesanan'];?></td>
				<td>Rp. <?php echo number_format($pecah['subharga']);?></td>
            </tr>
			<?php } ?>
        </tbody>
		<!--<tfoot>
			<tr>
				<?php$ambilfaktur=$koneksi->query("SELECT * FROM faktur");
				$row=$ambilfaktur->fetch_assoc();?>
				<th colspan="4">Total Harga Pembayaran</th>
				<th>Rp. <?php echo number_format($row['total_harga'])?></th>
			</tr>
		</tfoot>-->
    </table>
	
	<?php 
	$idpem= $_GET["id_faktur"];
	$ambil=$koneksi->query("SELECT *FROM faktur WHERE id_faktur='$idpem'");
	$detpem=$ambil->fetch_assoc();
					
	$ambil=$koneksi->query("SELECT * FROM faktur 
	JOIN status_pemesanan ON faktur.id_status=status_pemesanan.id_status
	WHERE id_faktur='$_GET[id_faktur]'");
	while($pecah=$ambil->fetch_assoc()){?>
						
	<div class="report-box-nota">
	<?php if($pecah['id_status']!=="S001"){?>
	<p> Terima kasih sudah melakukan pembayaran Rp. <?php echo number_format($detail['total_harga']);?> ke: <br>
	<?php $ambil=$koneksi->query("SELECT * FROM metode_pembayaran 
	JOIN faktur ON metode_pembayaran.id_metode=faktur.id_metode 
	WHERE faktur.id_faktur='$_GET[id_faktur]'");
	while ($permetode = $ambil->fetch_assoc()){ ?>
	<p><strong><?php echo $permetode['metode'];?></strong> : <strong><?php echo $permetode['keterangan'];?></strong></p>
	<?php } ?>		
	<br/>
	<a href="riwayat.php" class="btn-custom-save">Riwayat Belanja</a>
	<?php } ?>
	
	<?php if($pecah['id_status']=="S001") { ?>
	<p>Silakan melakukan pembayaran Rp. <?php echo number_format($detail['total_harga']);?> ke: <br>
	<?php $ambil=$koneksi->query("SELECT * FROM metode_pembayaran 
	JOIN faktur ON metode_pembayaran.id_metode=faktur.id_metode 
	WHERE faktur.id_faktur='$_GET[id_faktur]'");
	while ($permetode = $ambil->fetch_assoc()){ ?>
	<p><strong><?php echo $permetode['metode'];?></strong> : <strong><?php echo $permetode['keterangan'];?></strong></p>
	<?php } ?>
	<br/>
	<a href="riwayat.php" class="btn-custom-save">Riwayat Belanja</a>
	<?php } ?>
	<?php } ?>
	</div>
	</div>
	</div>
	</main>
</body>
</html>