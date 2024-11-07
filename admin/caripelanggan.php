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

$query=mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan LIKE '%$keyword%'")
?>

<div class="report-box">	
	<form action="index.php?halaman=caripelanggan" method="POST" class="search-box-data">
        <input type="text" name="keyword" placeholder="Cari di sini..." autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
			
	<div class="product-table-container">
    <h2>Data Pelanggan</h2><br><br>
	<table class="product-table">
    <thead>
		<tr>
			<th>Nomor</th>
			<th>Nama Pelanggan</th>
			<th>Email</th>
			<th>Telepon</th>
			<th>Alamat</th>
			<th>Password</th>
			<th>Aksi</th>
		</tr>
	</thead>
    <tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pelanggan WHERE 
		nama LIKE '%$keyword%' OR
		email LIKE '%$keyword%' OR
		telepon LIKE '%$keyword%' OR
		alamat LIKE '%$keyword%' OR
		password LIKE '%$keyword%' ");
		while($pecah = $ambil->fetch_assoc()){?>
		<tr>
			<td><center><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td><?php echo $pecah['email']; ?></td>
			<td><?php echo $pecah['telepon']; ?></td>
			<td><?php echo $pecah['alamat']; ?></td>
			<td><?php echo $pecah['password']; ?></td>
			<td>
				<a href="hapuspelanggan.php?id_pelanggan=<?php echo $pecah['id_pelanggan']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')" class="btn-custom-danger" name="hapus">Hapus</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
    </table>
    </div>
</div>