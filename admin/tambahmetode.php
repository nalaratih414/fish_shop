<link rel="stylesheet" href="../css/styletambah.css">
<div class="report-box">
        <form method="POST" enctype="multipart/form-data">
			<h2>Tambah Data Metode Pembayaran</h2><br>
		
			<label>Metode Pembayaran:</label>
            <input type="text" name="metode" required>
			
			<label>Keterangan:</label>
            <input type="text" name="keterangan" required>

            <button class="btn-custom-primary" name="simpan">Simpan</button>
            <a href="index.php?halaman=metode" class="btn-custom-danger">Batal</a>
        </form>
</div>

<?php
	include '../config.php';
	if(isset($_POST["simpan"]))
	{
		$kueri=mysqli_query($koneksi, "SELECT max(id_metode) as kodeTerbesar FROM metode_pembayaran");
		$data=mysqli_fetch_array($kueri);
		$id_metode=$data['kodeTerbesar'];
		$urutan=(int) substr($id_metode,3,3);
		$urutan++;
		$huruf="M";
		$id_metode = $huruf . sprintf("%03s", $urutan);
		$sql=$koneksi->query("INSERT INTO metode_pembayaran(id_metode,metode,keterangan) VALUES('$id_metode','$_POST[metode]','$_POST[keterangan]')");
		if($sql)
		{
			echo "<script>alert('Data berhasil ditambahkan'); window.location = 'index.php?halaman=metode'</script>";
		}
		else
		{
			echo "<script>alert('Proses gagal'); window.location = 'index.php?halaman=tambahmetode'</script>";
		}
	}
?>