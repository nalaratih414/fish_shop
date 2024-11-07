<link rel="stylesheet" href="../css/styletambah.css">
<div class="report-box">
        <form method="POST" enctype="multipart/form-data">
			<h2>Tambah Data Ongkir</h2><br>
		
			<label>Harga Ongkir:</label>
            <input type="text" name="ongkir" required>
			
			<label>Kota:</label>
            <select name="id_kota" required>
				<option>Pilih Kota</option>
					<?php $sql="SELECT * FROM kota";
						$hasil=mysqli_query($koneksi, $sql);
						if (mysqli_num_rows($hasil) > 0) {
						while ($pecah = mysqli_fetch_array($hasil)){?>
				<option value="<?php echo $pecah['id_kota'];?>">
					<?php echo $pecah['kota'];?></option>
					<?php } } ?>
			</select>

            <button class="btn-custom-primary" name="simpan">Simpan</button>
            <a href="index.php?halaman=ongkir" class="btn-custom-danger">Batal</a>
        </form>
</div>

<?php
	include '../config.php';
	if(isset($_POST["simpan"]))
	{
		$kueri=mysqli_query($koneksi, "SELECT max(id_ongkir) as kodeTerbesar FROM ongkir");
		$data=mysqli_fetch_array($kueri);
		$id_ongkir=$data['kodeTerbesar'];
		$urutan=(int) substr($id_ongkir,3,3);
		$urutan++;
		$huruf="O";
		$id_ongkir = $huruf . sprintf("%03s", $urutan);
		$sql=$koneksi->query("INSERT INTO ongkir(id_ongkir,ongkir,id_kota) VALUES('$id_ongkir','$_POST[ongkir]','$_POST[id_kota]')");
		if($sql)
		{
			echo "<script>alert('Data berhasil ditambahkan'); window.location = 'index.php?halaman=ongkir'</script>";
		}
		else
		{
			echo "<script>alert('Proses gagal'); window.location = 'index.php?halaman=tambahongkir'</script>";
		}
	}
?>