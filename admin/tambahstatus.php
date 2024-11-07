<link rel="stylesheet" href="../css/styletambah.css">
<div class="report-box">
        <form method="POST" enctype="multipart/form-data">
			<h2>Tambah Data Status Pemesanan</h2><br>
		
			<label>Status Pemesanan:</label>
            <input type="text" name="status" required>

            <button class="btn-custom-primary" name="simpan">Simpan</button>
            <a href="index.php?halaman=status" class="btn-custom-danger">Batal</a>
        </form>
</div>

<?php
	include '../config.php';
	if(isset($_POST["simpan"]))
	{
		$kueri=mysqli_query($koneksi, "SELECT max(id_status) as kodeTerbesar FROM status_pemesanan");
		$data=mysqli_fetch_array($kueri);
		$id_status=$data['kodeTerbesar'];
		$urutan=(int) substr($id_status,3,3);
		$urutan++;
		$huruf="S";
		$id_status = $huruf . sprintf("%03s", $urutan);
		$sql=$koneksi->query("INSERT INTO status_pemesanan(id_status,status) VALUES('$id_status','$_POST[status]')");
		if($sql)
		{
			echo "<script>alert('Data berhasil ditambahkan'); window.location = 'index.php?halaman=status'</script>";
		}
		else
		{
			echo "<script>alert('Proses gagal'); window.location = 'index.php?halaman=tambahstatus'</script>";
		}
	}
?>