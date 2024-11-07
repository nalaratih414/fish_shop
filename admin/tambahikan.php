<link rel="stylesheet" href="../css/styletambah.css">
<div class="report-box">
        <form method="POST" enctype="multipart/form-data">
			<h2>Tambah Data Ikan</h2><br>
		
			<label>Nama Ikan:</label>
            <input type="text" name="nama_ikan" required>
			
			<label>Kategori Ikan:</label>
            <select name="id_kategori" required>
				<option>Pilih Jenis Kategori</option>
					<?php $sql="SELECT * FROM kategori";
						$hasil=mysqli_query($koneksi, $sql);
						if (mysqli_num_rows($hasil) > 0) {
						while ($pecah = mysqli_fetch_array($hasil)){?>
				<option value="<?php echo $pecah['id_kategori'];?>">
					<?php echo $pecah['kategori'];?></option>
					<?php } } ?>
			</select>

            <label>Harga:</label>
            <input type="number" name="harga" required>
			
			
			<label>Deskripsi:</label>
            <textarea name="deskripsi" required></textarea>

            <label>Stok:</label>
            <input type="number" name="stok" required>
			

            <label>Foto:</label>
            <input type="file" name="foto" required>

            <button class="btn-custom-primary" name="simpan">Simpan</button>
            <a href="index.php?halaman=ikan" class="btn-custom-danger">Batal</a>
        </form>
</div>

<?php
	include '../config.php';
	if(isset($_POST["simpan"]))
	{
		$kueri=mysqli_query($koneksi, "SELECT max(id_ikan) as kodeTerbesar FROM ikan");
		$data=mysqli_fetch_array($kueri);
		$id_ikan=$data['kodeTerbesar'];
		$urutan=(int) substr($id_ikan,3,3);
		$urutan++;
		$huruf="I";
		$id_ikan = $huruf . sprintf("%03s", $urutan);
		$tanggal_masuk=date("Y-m-d");
		
		$foto=isset($_FILES['foto']['name']) ? $_FILES['foto']['name']:'';
		$type=isset($_FILES['foto']['type']) ? $_FILES['foto']['type']:'';
		$temp=isset($_FILES['foto']['tmp_name']) ? $_FILES['foto']['tmp_name']:'';
		$error=isset($_FILES['foto']['error']) ? $_FILES['foto']['error']:'';
		$size=isset($_FILES['foto']['size']) ? $_FILES['foto']['size']:'';
		$simpan= "../img/".$foto;
		if ($error > 0){
			echo "<script>alert('ERROR !'); document.location.href='index.php?halaman=tambahikan'; </script>";} 
		else {
			move_uploaded_file('$temp', '$simpan');}
		$sql = "INSERT INTO ikan (id_ikan,nama_ikan,harga,foto,deskripsi,stok,id_kategori,tanggal_masuk) 
				VALUES ('$id_ikan','$_POST[nama_ikan]','$_POST[harga]','$simpan','$_POST[deskripsi]','$_POST[stok]','$_POST[id_kategori]','$tanggal_masuk')";
		if (mysqli_query($koneksi, $sql)) {
			echo "New record created successfully";} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);}
		if($sql) {
			echo "<script>alert('Data berhasil ditambahkan'); document.location.href='index.php?halaman=ikan'; </script>";} 
	}
?>