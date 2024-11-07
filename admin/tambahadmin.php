<link rel="stylesheet" href="../css/styletambah.css">
<div class="report-box">
        <form method="POST" enctype="multipart/form-data">
			<h2>Tambah Data Admin</h2><br>
		
			<label>Nama:</label>
            <input type="text" name="nama" required>
			
			<label>Username:</label>
            <input type="text" name="username" required>
			
			<label>Password:</label>
            <input type="text" name="password" required>

            <button class="btn-custom-primary" name="simpan">Simpan</button>
            <a href="index.php?halaman=admin" class="btn-custom-danger">Batal</a>
        </form>
</div>

<?php
	include '../config.php';
	if(isset($_POST["simpan"]))
	{
		$kueri=mysqli_query($koneksi, "SELECT max(id_admin) as kodeTerbesar FROM admin");
		$data=mysqli_fetch_array($kueri);
		$id_admin=$data['kodeTerbesar'];
		$urutan=(int) substr($id_admin,3,3);
		$urutan++;
		$huruf="A";
		$id_admin = $huruf . sprintf("%03s", $urutan);
		$sql=$koneksi->query("INSERT INTO admin(id_admin,nama,username,password) VALUES('$id_admin','$_POST[nama]','$_POST[username]','$_POST[password]')");
		if($sql)
		{
			echo "<script>alert('Data berhasil ditambahkan'); window.location = 'index.php?halaman=admin'</script>";
		}
		else
		{
			echo "<script>alert('Proses gagal'); window.location = 'index.php?halaman=tambahadmin'</script>";
		}
	}
?>