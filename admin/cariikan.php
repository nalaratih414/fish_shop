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

$query=mysqli_query($koneksi, "SELECT * FROM ikan WHERE id_ikan LIKE '%$keyword%'")
?>

<div class="report-box">	

	<form action="index.php?halaman=cariikan" method="POST" class="search-box">
        <input type="text" name="keyword" placeholder="Cari di sini..." autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
			
	<div class="product-table-container">
    <h2>Data Ikan</h2>
    <a href="index.php?halaman=tambahikan" class="btn-custom-primary">Tambah</a><br><br>
	<table class="product-table">
    <thead>
		<tr>
			<th>Nomor</th>
			<th>Nama Ikan</th>
			<th>Harga</th>
			<th>Foto</th>
			<th>Stok</th>
			<th>Aksi</th>
		</tr>
	</thead>
    <tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM ikan WHERE 
		nama_ikan LIKE '%$keyword%' OR
		harga LIKE '%$keyword%' OR
		stok LIKE '%$keyword%' ");
		while($pecah = $ambil->fetch_assoc()){?>
		<tr>
			<td><center><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_ikan']; ?></td>
			<td><?php echo number_format($pecah['harga']); ?></td>
			<td>
				<img src="../img/<?php echo $pecah['foto']; ?>" width="100" height="150">
			</td>
			<td><?php echo $pecah['stok']; ?></td>
			<td>
				<a href="hapusikan.php?id_ikan=<?php echo $pecah['id_ikan']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')" class="btn-custom-danger" name="hapus">Hapus</a>
				<a href="index.php?halaman=ubahikan&id_ikan=<?php echo $pecah['id_ikan']?>" class="btn-custom-warning">Ubah</a>
				<a href="index.php?halaman=detailikan&id_ikan=<?php echo $pecah['id_ikan']?>" class="btn-custom-info">Detail</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
    </table>
    </div>
</div>