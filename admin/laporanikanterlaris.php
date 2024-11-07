<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$semuadata[]=array();
$tgl_mulai="-";
$tgl_selesai="-";
$sql = "true";
if(isset($_POST["kirim"]))
{
	$tgl_mulai=isset($_POST['tgl_mulai']) ? $_POST['tgl_mulai']:'';
	$tgl_selesai=isset($_POST['tgl_selesai']) ? $_POST['tgl_selesai']:'';
}
?>

<div class="report-box">
<hr><h2>Laporan Penjualan Ikan Terlaris</h2><hr><br>
<form method="post" class="search-box-data">
    <table>
		<tr>
			<td><label>Tanggal Mulai :</label></td>
			<td><input type="date" class="form-control" name="tgl_mulai" value="<?php echo $tgl_mulai?>" required></td>
			<td width="10"><td>
			<td><label>Tanggal Selesai :</label></td>
			<td><input type="date" class="form-control" name="tgl_selesai" value="<?php echo $tgl_selesai?>" required></td>
			<td><button class="btn-custom-primary" name="kirim">Proses</button></td>
		<tr>
	</table>
<br/><br/>
</form>
</div>

<div class="report-box">
<font size="4">
	Penjualan ikan terlaris dari 
	<strong><?php echo date("d F Y", strtotime($tgl_mulai))?></strong> 
	sampai 
	<strong><?php echo date("d F Y", strtotime($tgl_selesai))?></strong>
</font>
<br><br>

<table class="product-table">
    <thead>
        <tr>
            <th>Nomor</th>
			<th>Nama Ikan</th>
			<th>Harga</th>
			<th>Jumlah Terjual</th>
			<th>Total Harga Terjual</th>
		</tr>
    </thead>
    <tbody>
		<?php $nomor=1;
		$total=0;
		$ambil= mysqli_query ($koneksi,"SELECT *, sum(jumlah_pesanan) AS total FROM transaksi 
		inner join ikan on transaksi.id_ikan = ikan.id_ikan 
		inner join faktur on transaksi.id_faktur=faktur.id_faktur
		where tanggal_pembelian BETWEEN '$tgl_mulai' AND'$tgl_selesai'  
		GROUP BY ikan.id_ikan order by total desc limit 5");
		while($pecah=mysqli_fetch_array($ambil)){?>
		<tr>
			<td><?php echo $nomor++; ?></td>
			<td><?php echo $pecah['nama_ikan']; ?> </td>
			<td>Rp. <?php echo number_format ($pecah['harga']); ?></td>
			<td><?php echo $pecah['total']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga']*$pecah['total']); ?> </td>
		</tr>
		<?php $total+=($pecah['harga']*$pecah['total']);?>
		<?php } ?>
    </tbody>
	<tfoot>
		<tr>
            <th colspan="4">Total</th>
			<th>Rp. <?php echo number_format($total)?></th>
            </tr>
	</tfoot>
</table>
</div>
              </div>
            </div>
<!--<a class="a" href="downloadlaporan.php">Download PDF</a>-->