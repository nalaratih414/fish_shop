<link rel="stylesheet" href="../css/styletambah.css">

<?php
$id_ongkir=isset($_GET['id_ongkir']) ? $_GET['id_ongkir']:'';
$sql="SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'";
$hasil=mysqli_query($koneksi, $sql);
while($data= mysqli_fetch_array($hasil))
{ echo

"<div class='report-box'>
        <form method='POST' enctype='multipart/form-data'>
			<h2>Ubah Data Ongkir</h2><br>
		
			<label>Harga Ongkir:</label>
            <input type='text' name='ongkir' value='".$data['ongkir']."'/>
			
			<label>Kota:</label>
            <select name='id_kota' required>
				<option>Pilih Kota</option>";
					$sql2="SELECT * FROM kota";
					$hasil2=mysqli_query($koneksi, $sql2);
					if (mysqli_num_rows($hasil2) > 0) {
						while ($data2= mysqli_fetch_array($hasil2)){
							echo"<option value='".$data2['id_kota']."'>";
							echo $data2['kota']; "</option>";
					} } echo"
			</select>

            <button class='btn-custom-primary' name='ubah'>Ubah</button>
			<a href='index.php?halaman=ongkir' class='btn-custom-warning'>Kembali</a>
        </form>
</div>";

}
if(isset($_POST['ubah']))
{
	$sql=$koneksi->query("UPDATE ongkir SET ongkir='$_POST[ongkir]',id_kota='$_POST[id_kota]' WHERE id_ongkir='$_GET[id_ongkir]'");
	if($sql) 
	{
		echo "<script>alert('Data Berhasil Diubah'); document.location.href='index.php?halaman=ongkir'; </script>";
	} 
	else 
	{
		echo "<script>alert('Proses gagal'); window.location = 'index.php?halaman=ubahongkir'</script>";
	}
}
?>