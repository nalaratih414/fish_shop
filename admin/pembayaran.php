<div class="report-box">	
<hr><h2>Data Pembayaran</h2><hr>

<?php

$id_faktur=$_GET['id_faktur'];

//mengambildata pmbyrn brdsrkan idfaktur
$ambil=$koneksi->query("SELECT * FROM faktur 
JOIN pelanggan ON faktur.id_pelanggan=pelanggan.id_pelanggan
WHERE id_faktur='$id_faktur'");
$detail = $ambil->fetch_assoc();
?>


<div class="row">
	<div class="col-md-6">
		<table class="table table-bodered">
			<tr>
			<td></td>
			<td></td>
			</tr>
			<tr>
				<td><strong>Nama Pembeli        :</strong></td>
				<td><?php echo $detail['nama'];?></td>
			</tr>
			<tr>
				<td><strong>Total Harga Pembayaran   :</strong></td>
				<td><?php echo number_format($detail['total_harga']);?></td>
			</tr>
			<tr>
				<td><strong>Tanggal Pembayaran  :</strong></td>
				<td><?php echo date("d F Y", strtotime($detail['tanggal_pembayaran']));?></td>
			</tr>
		</table>
	</div>
	<div class="col-md-6">
		<td><img src="../buktipembayaran/<?php echo $detail['bukti_pembayaran'];?>" width="200" height="200" class="img-responsive"></td>
	</div>
</div>
<form method="post">
	<label class="control-label">
              Status Pemesanan :</label>
			  <div class="controls">
              <select class="form-control" name="id_status" required>
			  <option value=""> Pilih Status </option>
			  <?php $sql="SELECT * FROM status_pemesanan";
				$hasil=mysqli_query($koneksi, $sql);
				if (mysqli_num_rows($hasil) > 0) {
				while ($pecah = mysqli_fetch_array($hasil)){?>
					<option value="<?php echo $pecah['id_status'];?>">
					<?php echo $pecah['status'];?></option>
					<?php } } ?>
			</select>
			</div><br>
		<button class="btn-custom-primary" name="proses">Proses</button>
	<a href="index.php?halaman=faktur" class="btn-custom-warning"> Kembali </a>
</form>
</div>
<?php

if(isset($_POST["proses"]))
{
	$id_status=$_POST["id_status"];
	$koneksi->query(" UPDATE faktur SET id_status='$id_status' WHERE id_faktur='$id_faktur'");
	
	
	echo "<script>alert('Status Pembelian Diperbarui');</script>";
	echo "<script>location='index.php?halaman=faktur';</script>";
}

?>