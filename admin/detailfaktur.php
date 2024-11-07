<div class="report-box">	
<hr><h2>Detail Pembelian</h2><hr>

<?php $sql=$koneksi->query("SELECT * FROM faktur JOIN pelanggan ON pelanggan.id_pelanggan=faktur.id_pelanggan WHERE faktur.id_faktur='$_GET[id_faktur]'");
$detail=$sql->fetch_assoc();?>
				
<P> <strong>Nama Pembeli : </strong><?php echo $detail['nama'];?><br>
	<strong>Email : </strong><?php echo $detail['id_pelanggan'];?><br>
	<strong>Nomor Telepon : </strong><?php echo $detail['telepon'];?>
</p>
 <p>
	<strong>Alamat Pengiriman : </strong><?php echo $detail['alamat_pengiriman'];?><br>
	<strong>Tanggal Pembelian : </strong><?php echo date("d F Y",strtotime($detail['tanggal_pembelian']));?><br>
	<strong>Total Harga Pembayaran : </strong><?php echo number_format($detail['total_harga']);?>
</p>

<table border="1" class="product-table">
	<thead>
		<tr>
			<th>Nomor</th>
			<th>Nama Ikan</th>
			<th>Harga</th>
			<th>Jumlah Pesanan</th>
			<th>Subharga</th>
		</tr>
	</thead>
	<tbody>
		<?php include "../config.php";
		$nomor=1;
		$sql=$koneksi->query("SELECT * FROM transaksi 
		JOIN ikan ON transaksi.id_ikan=ikan.id_ikan 
		JOIN faktur ON transaksi.id_faktur=faktur.id_faktur 
		WHERE transaksi.id_faktur='$_GET[id_faktur]'");
		while ($pecah=$sql->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor++; ?></td>
			<td><?php echo $pecah['nama_ikan'];?></td>
			<td><?php echo number_format($pecah['harga']);?></td>
			<td><?php echo $pecah['jumlah_pesanan'];?></td>
			<td><?php echo number_format($pecah['subharga']);?></td>
		</tr>
		<?php } 
		mysqli_close($koneksi); ?>
	</tbody>
</table>
<br>
<a href="index.php?halaman=faktur" class="btn-custom-warning">Kembali</a>
</div>