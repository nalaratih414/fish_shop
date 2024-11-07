<?php
if(isset($_POST["login"]))
{
   session_start();
   require_once("config.php");
   $email = $_POST['email'];
   $pass = $_POST['password'];
   $sql = "SELECT * FROM pelanggan WHERE email = '$email'";
   $query = $koneksi->query($sql);
   $hasil = $query->fetch_assoc();
   if($query->num_rows == 0) 
   {
     echo "<script>alert('Email belum terdaftar'); window.location = 'loginpelanggan.php'</script>";
   } 
   else 
   {
     if($pass <> $hasil['password'])
	 {
       echo "<script>alert('Password salah'); window.location = 'loginpelanggan.php'</script>";
     }
	 else 
	 {
		$_SESSION['Pelanggan'] = $hasil;
		$_SESSION["login"] = true;
		header('location:index.php');
	 }
   }
}
?>