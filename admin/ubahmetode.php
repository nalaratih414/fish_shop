<link rel="stylesheet" href="../css/styletambah.css">

<?php
$id_metode=isset($_GET['id_metode']) ? $_GET['id_metode']:'';
$sql="SELECT * FROM metode_pembayaran WHERE id_metode='$id_metode'";
$hasil=mysqli_query($koneksi, $sql);
while($data= mysqli_fetch_array($hasil))
{ echo

"<div class='report-box'>
        <form method='POST' enctype='multipart/form-data'>
			<h2>Ubah Data Metode Pembayaran</h2><br>
		
			<label>Metode Pembayaran:</label>
            <input type='text' name='metode' value='".$data['metode']."'/>
			
			<label>Keterangan:</label>
            <input type='text' name='keterangan' value='".$data['keterangan']."'/>

            <button class='btn-custom-primary' name='ubah'>Ubah</button>
			<a href='index.php?halaman=metode' class='btn-custom-warning'>Kembali</a>
        </form>
</div>";

}
if(isset($_POST['ubah']))
{
	$sql=$koneksi->query("UPDATE metode_pembayaran SET metode='$_POST[metode]',keterangan='$_POST[keterangan]' WHERE id_metode='$_GET[id_metode]'");
	if($sql) 
	{
		echo "<script>alert('Data Berhasil Diubah'); document.location.href='index.php?halaman=metode'; </script>";
	} 
	else 
	{
		echo "<script>alert('Proses gagal'); window.location = 'index.php?halaman=ubahmetode'</script>";
	}
}
?>