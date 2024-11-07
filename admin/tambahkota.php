<link rel="stylesheet" href="../css/styletambah.css">
<div class="report-box">
        <form method="POST" enctype="multipart/form-data">
			<h2>Tambah Data Kota</h2><br>
		
			<label>Kota Tujuan:</label>
            <input type="text" name="kota" required>

            <button class="btn-custom-primary" name="simpan">Simpan</button>
            <a href="index.php?halaman=kategori" class="btn-custom-danger">Batal</a>
        </form>
</div>

<?php
	include '../config.php';
	if(isset($_POST["simpan"]))
	{
		$kueri=mysqli_query($koneksi, "SELECT max(id_kota) as kodeTerbesar FROM kota");
		$data=mysqli_fetch_array($kueri);
		$id_kota=$data['kodeTerbesar'];
		$urutan=(int) substr($id_kota,3,3);
		$urutan++;
		$huruf="KO";
		$id_kota = $huruf . sprintf("%03s", $urutan);
		$sql=$koneksi->query("INSERT INTO kota(id_kota,kota) VALUES('$id_kota','$_POST[kota]')");
		if($sql)
		{
			echo "<script>alert('Data berhasil ditambahkan'); window.location = 'index.php?halaman=kota'</script>";
		}
		else
		{
			echo "<script>alert('Proses gagal'); window.location = 'index.php?halaman=tambahkota'</script>";
		}
	}
?>