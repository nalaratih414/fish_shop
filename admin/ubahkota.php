<link rel="stylesheet" href="../css/styletambah.css">

<?php
$id_kota=isset($_GET['id_kota']) ? $_GET['id_kota']:'';
$sql="SELECT * FROM kota WHERE id_kota='$id_kota'";
$hasil=mysqli_query($koneksi, $sql);
while($data= mysqli_fetch_array($hasil))
{ echo

"<div class='report-box'>
        <form method='POST' enctype='multipart/form-data'>
			<h2>Ubah Data Kota</h2><br>
		
			<label>Kota Tujuan:</label>
            <input type='text' name='kota' value='".$data['kota']."'/>

            <button class='btn-custom-primary' name='ubah'>Ubah</button>
			<a href='index.php?halaman=kota' class='btn-custom-warning'>Kembali</a>
        </form>
</div>";

}
if(isset($_POST['ubah']))
{
	$sql=$koneksi->query("UPDATE kota SET kota='$_POST[kota]' WHERE id_kota='$_GET[id_kota]'");
	if($sql) 
	{
		echo "<script>alert('Data Berhasil Diubah'); document.location.href='index.php?halaman=kota'; </script>";
	} 
	else 
	{
		echo "<script>alert('Proses gagal'); window.location = 'index.php?halaman=ubahkota'</script>";
	}
}
?>