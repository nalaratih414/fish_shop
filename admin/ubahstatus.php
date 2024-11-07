<link rel="stylesheet" href="../css/styletambah.css">

<?php
$id_status=isset($_GET['id_status']) ? $_GET['id_status']:'';
$sql="SELECT * FROM status_pemesanan WHERE id_status='$id_status'";
$hasil=mysqli_query($koneksi, $sql);
while($data= mysqli_fetch_array($hasil))
{ echo

"<div class='report-box'>
        <form method='POST' enctype='multipart/form-data'>
			<h2>Ubah Data Status Pemesanan</h2><br>
		
			<label>Status Pemesanan:</label>
            <input type='text' name='status' value='".$data['status']."'/>

            <button class='btn-custom-primary' name='ubah'>Ubah</button>
			<a href='index.php?halaman=status' class='btn-custom-warning'>Kembali</a>
        </form>
</div>";

}
if(isset($_POST['ubah']))
{
	$sql=$koneksi->query("UPDATE status_pemesanan SET status='$_POST[status]' WHERE id_status='$_GET[id_status]'");
	if($sql) 
	{
		echo "<script>alert('Data Berhasil Diubah'); document.location.href='index.php?halaman=status'; </script>";
	} 
	else 
	{
		echo "<script>alert('Proses gagal'); window.location = 'index.php?halaman=ubahstatus'</script>";
	}
}
?>