<?php
   session_start();
   require_once("config.php");
   $username = $_POST['username'];
   $pass = $_POST['password'];
   $sql = "SELECT * FROM admin WHERE username = '$username'";
   $query = $koneksi->query($sql);
   $hasil = $query->fetch_assoc();
   if($query->num_rows == 0) 
   {
     echo "<script>alert('Username belum terdaftar'); window.location = 'loginadmin.php'</script>";
   } 
   else 
   {
     if($pass <> $hasil['password'])
	 {
       echo "<script>alert('Password salah'); window.location = 'loginadmin.php'</script>";
     }
	 else 
	 {
		$_SESSION["login"] = true;
		$_SESSION["admin"] = true;
		header('location:admin/index.php');
	   
	 }
   }
?>