<link rel="stylesheet" href="../css/styletambah.css">

<?php
$id_admin=isset($_GET['id_admin']) ? $_GET['id_admin']:'';
$sql="SELECT * FROM admin WHERE id_admin='$id_admin'";
$hasil=mysqli_query($koneksi, $sql);
while($data= mysqli_fetch_array($hasil))
{ echo

"<div class='report-box'>
        <form method='POST' enctype='multipart/form-data'>
			<h2>Ubah Data Admin</h2><br>
		
			<label>Nama Admin:</label>
            <input type='text' name='nama' value='".$data['nama']."'/>
			
			<label>Username:</label>
            <input type='text' name='username' value='".$data['username']."'/>
			
			<label>Password:</label>
            <input type='text' name='password' value='".$data['password']."'/>

            <button class='btn-custom-primary' name='ubah'>Ubah</button>
			<a href='index.php?halaman=admin' class='btn-custom-warning'>Kembali</a>
        </form>
</div>";

}
if(isset($_POST['ubah']))
{
	$sql=$koneksi->query("UPDATE admin SET nama='$_POST[nama]',username='$_POST[username]',password='$_POST[password]' WHERE id_admin='$_GET[id_admin]'");
	if($sql) 
	{
		echo "<script>alert('Data Berhasil Diubah'); document.location.href='index.php?halaman=admin'; </script>";
	} 
	else 
	{
		echo "<script>alert('Proses gagal'); window.location = 'index.php?halaman=ubahadmin'</script>";
	}
}
?>