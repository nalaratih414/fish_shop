<link rel="stylesheet" href="../css/styletambah.css">

<?php
$id_ikan=isset($_GET['id_ikan']) ? $_GET['id_ikan']:'';
$sql="SELECT * FROM ikan WHERE id_ikan='$id_ikan'";
$hasil=mysqli_query($koneksi, $sql);
while($data= mysqli_fetch_array($hasil))
{ echo

"<div class='report-box'>
        <form method='POST' enctype='multipart/form-data'>
			<h2>Ubah Data Ikan</h2><br>
		
			<label>Nama Ikan:</label>
            <input type='text' name='nama_ikan' value='".$data['nama_ikan']."' required/>
			
			<label>Kategori Ikan:</label>
			<select name='id_kategori' required>
			  <option value=''>Pilih Kategori Ikan</option>";
			  $sql2="SELECT * FROM kategori";
				$hasil2=mysqli_query($koneksi, $sql2);
				if (mysqli_num_rows($hasil2) > 0) {
				while ($data2= mysqli_fetch_array($hasil2)){
					echo"
					<option value='".$data2['id_kategori']."'>";
					echo $data2['kategori']; "</option>";
					} } 
					echo"
			</select>
			
			<label>Harga:</label>
            <input type='text' name='harga' value='".$data['harga']."' required/>
			
			<label>Deskripsi:</label>
			<textarea name='deskripsi' value='".$data['deskripsi']."' required></textarea>
			
			<label>Stok:</label>
            <input type='text' name='stok' value='".$data['stok']."' required/>
			
			<label>Foto:</label>
            <input type='file' name='foto' value='".$data['foto']."' required/>
			
            <button class='btn-custom-primary' name='ubah'>Ubah</button>
			<a href='index.php?halaman=ikan' class='btn-custom-warning'>Kembali</a>
        </form>
</div>";

}
if(isset($_POST['ubah']))
{
	$nama_ikan=isset($_POST['nama_ikan']) ? $_POST['nama_ikan']:'';
	$harga=isset($_POST['harga']) ? $_POST['harga']:'';
	$foto=isset($_FILES['foto']['name']) ? $_FILES['foto']['name']:'';
	$deskripsi=isset($_POST['deskripsi']) ? $_POST['deskripsi']:'';
	$stok=isset($_POST['stok']) ? $_POST['stok']:'';
	$id_kategori=isset($_POST['id_kategori']) ? $_POST['id_kategori']:'';
	$namabukti=$_FILES["foto"]["name"];
	$lokasibukti=$_FILES["foto"]["tmp_name"];
	move_uploaded_file($lokasibukti,"../img/$namabukti");
	$sql="UPDATE ikan SET id_ikan='$id_ikan', nama_ikan='$nama_ikan', harga='$harga', foto='$namabukti', deskripsi='$deskripsi', stok='$stok', id_kategori='$id_kategori' WHERE id_ikan='$id_ikan'";
	$hasil = mysqli_query($koneksi, $sql);
	if($hasil){
		echo "<script>alert('Data Berhasil Diubah'); document.location.href='index.php?halaman=ikan'; </script>";} 
	else {
		echo "<script>alert('Proses Gagal'); document.location.href='index.php?halaman=ubahikan'; </script>";}
}
?>