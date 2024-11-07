<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();	

	echo "<script>alert('Anda telah berhasil Logout');</script>";
	echo "<script>location='index.php';</script>";
	header('location=index.php');
	exit();
?>