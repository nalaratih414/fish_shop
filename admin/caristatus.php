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

$query=mysqli_query($koneksi, "SELECT * FROM status_pemesanan WHERE id_status LIKE '%$keyword%'")
?>

<div class="report-box">	
	<form action="index.php?halaman=caristatus" method="POST" class="search-box-data">
        <input type="text" name="keyword" placeholder="Cari di sini..." autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
			
	<div class="product-table-container">
    <h2>Data Status Pemesanan</h2>
    <a href="index.php?halaman=tambahstatus" class="btn-custom-primary">Tambah</a><br><br>
	<table class="product-table">
    <thead>
		<tr>
			<th>Nomor</th>
			<th>Status Pemesanan</th>
			<th>Aksi</th>
		</tr>
	</thead>
    <tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM status_pemesanan WHERE 
		status LIKE '%$keyword%' ");
		while($pecah = $ambil->fetch_assoc()){?>
		<tr>
			<td><center><?php echo $nomor; ?></td>
			<td><?php echo $pecah['status']; ?></td>
			<td>
				<a href="hapusstatus.php?id_status=<?php echo $pecah['id_status']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')" class="btn-custom-danger" name="hapus">Hapus</a>
				<a href="index.php?halaman=ubahstatus&id_status=<?php echo $pecah['id_status']?>" class="btn-custom-warning">Ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
    </table>
    </div>
</div>