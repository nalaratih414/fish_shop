<div class="report-box">	
	<form action="index.php?halaman=carikota" method="POST" class="search-box-data">
        <input type="text" name="keyword" placeholder="Cari di sini..." autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
			
	<div class="product-table-container">
    <h2>Data Kota Tujuan</h2>
    <a href="index.php?halaman=tambahkota" class="btn-custom-primary">Tambah</a><br><br>
	<table class="product-table">
    <thead>
		<tr>
			<th>Nomor</th>
			<th>Kota Tujuan</th>
			<th>Aksi</th>
		</tr>
	</thead>
    <tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM kota");
		while($pecah = $ambil->fetch_assoc()){?>
		<tr>
			<td><center><?php echo $nomor; ?></td>
			<td><?php echo $pecah['kota']; ?></td>
			<td>
				<a href="hapuskota.php?id_kota=<?php echo $pecah['id_kota']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')" class="btn-custom-danger" name="hapus">Hapus</a>
				<a href="index.php?halaman=ubahkota&id_kota=<?php echo $pecah['id_kota']?>" class="btn-custom-warning">Ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
    </table>
    </div>
</div>