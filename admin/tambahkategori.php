<link rel="stylesheet" href="../css/styletambah.css">
<div class="report-box">
        <form method="POST" enctype="multipart/form-data">
			<h2>Tambah Data Kategori Ikan</h2><br>
		
			<label>Kategori Ikan:</label>
            <input type="text" name="kategori" required>

            <button class="btn-custom-primary" name="simpan">Simpan</button>
            <a href="index.php?halaman=kategori" class="btn-custom-danger">Batal</a>
        </form>
</div>

<?php
	include '../config.php';
	if(isset($_POST["simpan"]))
	{
		$kueri=mysqli_query($koneksi, "SELECT max(id_kategori) as kodeTerbesar FROM kategori");
		$data=mysqli_fetch_array($kueri);
		$id_kategori=$data['kodeTerbesar'];
		$urutan=(int) substr($id_kategori,3,3);
		$urutan++;
		$huruf="KA";
		$id_kategori = $huruf . sprintf("%03s", $urutan);
		$sql=$koneksi->query("INSERT INTO kategori(id_kategori,kategori) VALUES('$id_kategori','$_POST[kategori]')");
		if($sql)
		{
			echo "<script>alert('Data berhasil ditambahkan'); window.location = 'index.php?halaman=kategori'</script>";
		}
		else
		{
			echo "<script>alert('Proses gagal'); window.location = 'index.php?halaman=tambahkategori'</script>";
		}
	}
?>