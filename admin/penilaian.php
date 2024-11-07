<?php
$id_faktur=$_GET['id_faktur'];

//mengambildata pmbyrn brdsrkan idfaktur
$ambil=$koneksi->query("SELECT * FROM faktur 
JOIN pelanggan ON faktur.id_pelanggan=pelanggan.id_pelanggan
WHERE id_faktur='$id_faktur'");
$detail = $ambil->fetch_assoc();
?>

<div class="report-box">
<hr><h2>Penilaian</h2><hr><br>
<div class="container">
<table border="1" class="product-table">
	<tr>
		<td><strong>Nama Pembeli<strong></td>
		<td><?php echo $detail['nama'];?></td>
	</tr>
	<?php $no=1;
	$sql=$koneksi->query("SELECT * FROM transaksi 
	JOIN ikan ON transaksi.id_ikan=ikan.id_ikan
	WHERE id_faktur='$id_faktur'");?>
	<?php while($data = $sql->fetch_assoc()){;?>
	<tr>
		<td><strong>Nama Ikan <?php echo $no++;?><strong></td>
		<td><?php echo $data['nama_ikan'];?></td>
	<?php }?>
	</tr>
	<tr>
		<td><strong>Penilaian<strong></td>
		<td><?php echo $detail['penilaian_produk'];?></td>
	</tr>
</table>
</div>
<br><a href="index.php?halaman=faktur" class="btn-custom-warning">Kembali</a>
</div>