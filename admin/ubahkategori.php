<link rel="stylesheet" href="../css/styletambah.css">

<?php
$id_kategori=isset($_GET['id_kategori']) ? $_GET['id_kategori']:'';
$sql="SELECT * FROM kategori WHERE id_kategori='$id_kategori'";
$hasil=mysqli_query($koneksi, $sql);
while($data= mysqli_fetch_array($hasil))
{ echo

"<div class='report-box'>
        <form method='POST' enctype='multipart/form-data'>
			<h2>Ubah Data Kategori Ikan</h2><br>
		
			<label>Kategori Ikan:</label>
            <input type='text' name='kategori' value='".$data['kategori']."'/>

            <button class='btn-custom-primary' name='ubah'>Ubah</button>
			<a href='index.php?halaman=kategori' class='btn-custom-warning'>Kembali</a>
        </form>
</div>";

}
if(isset($_POST['ubah']))
{
	$sql=$koneksi->query("UPDATE kategori SET kategori='$_POST[kategori]' WHERE id_kategori='$_GET[id_kategori]'");
	if($sql) 
	{
		echo "<script>alert('Data Berhasil Diubah'); document.location.href='index.php?halaman=kategori'; </script>";
	} 
	else 
	{
		echo "<script>alert('Proses gagal'); window.location = 'index.php?halaman=ubahkategori'</script>";
	}
}
?>