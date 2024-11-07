<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();	

	echo "<script>alert('Anda telah berhasil Logout');</script>";
	echo "<script>location='../loginadmin.php';</script>";
	header('location=../loginadmin.php');
	exit();
?>