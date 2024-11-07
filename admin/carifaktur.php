<?php

if(isset($_POST['cari']))
{
	$_SESSION['session_pencarian']=$_POST["keyword"];
	$keyword=$_SESSION['session_pencarian'];
}
else
{
	$keyword=$_SESSION['session_pencarian'];
}

$query=mysqli_query($koneksi, "SELECT * FROM faktur WHERE id_faktur LIKE '%$keyword%'")
?>

<div class="report-box">	
	<form action="index.php?halaman=carifaktur" method="POST" class="search-box-data">
        <input type="text" name="keyword" placeholder="Cari Nama Pembeli..." autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
			
	<div class="product-table-container">
    <h2>Data Faktur</h2><br><br>
	<table class="product-table">
    <thead>
		<tr>
			<th>Nomor</th>
			<th>Nama Pembeli</th>
			<th>Tanggal Pembelian</th>
			<th>Tanggal Pembayaran</th>
			<th>Total Harga</th>
			<th>Ongkir</th>
			<th>Alamat</th>
			<th>Metode Pembayaran</th>
			<th>Status Pemesanan</th>
			<th>Aksi</th>
		</tr>
	</thead>
    <tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM faktur 
		JOIN pelanggan ON faktur.id_pelanggan=pelanggan.id_pelanggan 
		JOIN status_pemesanan ON faktur.id_status=status_pemesanan.id_status
		JOIN metode_pembayaran ON faktur.id_metode=metode_pembayaran.id_metode 
		JOIN ongkir ON faktur.id_ongkir=ongkir.id_ongkir WHERE 
		nama LIKE '%$keyword%' ");
		while($pecah = $ambil->fetch_assoc()){?>
		<tr>
			<td><center><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td><?php echo $pecah['tanggal_pembelian']; ?></td>
			<td><?php echo $pecah['tanggal_pembayaran']; ?></td>
			<td><?php echo $pecah['total_harga']; ?></td>
			<td><?php echo $pecah['ongkir']; ?></td>
			<td><?php echo $pecah['alamat']; ?></td>
			<td><?php echo $pecah['metode']; ?></td>
			<td><?php echo $pecah['status']; ?></td>
			<td>
				<a href="index.php?halaman=detailfaktur&id_faktur=<?php echo $pecah['id_faktur']; ?>" class="btn-custom-info">detail</a>
				
				<?php if($pecah['id_status']=="S005"):?>
				<a href="index.php?halaman=penilaian&id_faktur=<?php echo $pecah['id_faktur']?>" class="btn-custom-warning">Penilaian</a>
				<?php endif?>
				
				<?php if($pecah['id_status']=="S008"):?>
				<a href="index.php?halaman=komplain&id_faktur=<?php echo $pecah['id_faktur']?>" class="btn-custom-danger">Komplain</a>
				<?php endif?>
				
				<?php if($pecah['id_status']!=="S001" AND $pecah['id_status']!=="S006"):?>
				<a href="index.php?halaman=pembayaran&id_faktur=<?php echo $pecah['id_faktur']?>" class="btn-custom-save">Pembayaran</a>
				<?php endif?>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
    </table>
    </div>
</div>