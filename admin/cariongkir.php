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

$query=mysqli_query($koneksi, "SELECT * FROM ongkir WHERE id_ongkir LIKE '%$keyword%'")
?>

<div class="report-box">	
	<form action="index.php?halaman=cariongkir" method="POST" class="search-box-data">
        <input type="text" name="keyword" placeholder="Cari di sini..." autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
			
	<div class="product-table-container">
    <h2>Data Harga Ongkir</h2>
    <a href="index.php?halaman=tambahongkir" class="btn-custom-primary">Tambah</a><br><br>
	<table class="product-table">
    <thead>
		<tr>
			<th>Nomor</th>
			<th>Harga Ongkir</th>
			<th>Kota Tujuan</th>
			<th>Aksi</th>
		</tr>
	</thead>
    <tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM ongkir 
		JOIN kota ON ongkir.id_kota=kota.id_kota WHERE 
		ongkir LIKE '%$keyword%' OR
		kota LIKE '%$keyword%' ");
		while($pecah = $ambil->fetch_assoc()){?>
		<tr>
			<td><center><?php echo $nomor; ?></td>
			<td><?php echo $pecah['ongkir']; ?></td>
			<td><?php echo $pecah['kota']; ?></td>
			<td>
				<a href="hapusongkir.php?id_ongkir=<?php echo $pecah['id_ongkir']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')" class="btn-custom-danger" name="hapus">Hapus</a>
				<a href="index.php?halaman=ubahongkir&id_ongkir=<?php echo $pecah['id_ongkir']?>" class="btn-custom-warning">Ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
    </table>
    </div>
</div>