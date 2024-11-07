<?php
session_start();
include '../config.php';

if (!isset($_SESSION['login']))
{
	echo "<script>alert('Anda harus login');</script>";
	echo "<script>location='../loginadmin.php';</script>";
	header('location=../loginadmin.php');
	exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin R Fish Shop</title>
	<link href="../img/logo.png" rel="icon">
    <link rel="stylesheet" href="../css/styleadmin.css">
	<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
	<style>
	.report-box-lap {
    display: inline-block;
	padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #c3e8c4;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);}
	</style>
</head>
<body>
    <div class="container">
        <nav class="navbar">
		<center><img src="../img/logo.png" alt="Logo R Fish Shop" class="logo"></center>
		<h2>Admin Panel</h2>
            <ul>
                <li><a href="index.php">Dashboard</a></li>
                <li>
                    <a href="#" class="dropdown-toggle">Data Ikan <span class="arrow">▼</span></a>
                    <ul class="dropdown">
                        <li><a href="index.php?halaman=ikan">Ikan</a></li>
                        <li><a href="index.php?halaman=kategori">Kategori</a></li>
                    </ul>
                </li>
				<li>
                    <a href="#" class="dropdown-toggle1">Data Ongkir <span class="arrow">▼</span></a>
                    <ul class="dropdown">
                        <li><a href="index.php?halaman=ongkir">Ongkir</a></li>
                        <li><a href="index.php?halaman=kota">Kota</a></li>
                    </ul>
                </li>
                <li><a href="index.php?halaman=pelanggan">Pelanggan</a></li>
                <li><a href="index.php?halaman=faktur">Faktur</a></li>
				<li><a href="index.php?halaman=metode">Metode Pembayaran</a></li>
				<li><a href="index.php?halaman=status">Status Pemesanan</a></li>
				<li><a href="index.php?halaman=admin">Admin</a></li>
				<li><strong><a href="index.php?halaman=logout">Logout</a></strong></li>
            </ul>
        </nav>
        
        <main>
            <div class="header-info">
                <div class="welcome-message">Selamat datang, Admin!</div>
                <img src="../img/adminputih.png" alt="Profil Admin" class="profile-pic" id="profile-pic">
                <div class="logout-menu" id="logout-menu">
                    <span class="logout-icon">🔒</span>
                    <a href="index.php?halaman=logout" class="logout">Logout</a>
                </div>
            </div>
			
            <?php
			if (isset($_GET['halaman']))
			{
				if ($_GET['halaman']=="ikan"){
					include 'ikan.php';}
				elseif ($_GET['halaman']=="cariikan"){
					include 'cariikan.php';}
				elseif ($_GET['halaman']=="tambahikan"){
					include 'tambahikan.php';}
				elseif ($_GET['halaman']=="hapusikan"){
					include 'hapusikan.php';}
				elseif ($_GET['halaman']=="ubahikan"){
					include 'ubahikan.php';}
				elseif ($_GET['halaman']=="detailikan"){
					include 'detailikan.php';}
				elseif ($_GET['halaman']=="kategori"){
					include 'kategori.php';}
				elseif ($_GET['halaman']=="carikategori"){
					include 'carikategori.php';}
				elseif ($_GET['halaman']=="tambahkategori"){
					include 'tambahkategori.php';}
				elseif ($_GET['halaman']=="hapuskategori"){
					include 'hapuskategori.php';}
				elseif ($_GET['halaman']=="ubahkategori"){
					include 'ubahkategori.php';}
				elseif ($_GET['halaman']=="ongkir"){
					include 'ongkir.php';}
				elseif ($_GET['halaman']=="cariongkir"){
					include 'cariongkir.php';}
				elseif ($_GET['halaman']=="tambahongkir"){
					include 'tambahongkir.php';}
				elseif ($_GET['halaman']=="hapusongkir"){
					include 'hapusongkir.php';}
				elseif ($_GET['halaman']=="ubahongkir"){
					include 'ubahongkir.php';}
				elseif ($_GET['halaman']=="kota"){
					include 'kota.php';}
				elseif ($_GET['halaman']=="carikota"){
					include 'carikota.php';}
				elseif ($_GET['halaman']=="tambahkota"){
					include 'tambahkota.php';}
				elseif ($_GET['halaman']=="hapuskota"){
					include 'hapuskota.php';}
				elseif ($_GET['halaman']=="ubahkota"){
					include 'ubahkota.php';}
				elseif ($_GET['halaman']=="pelanggan"){
					include 'pelanggan.php';}
				elseif ($_GET['halaman']=="caripelanggan"){
					include 'caripelanggan.php';}
				elseif ($_GET['halaman']=="hapuspelanggan"){
					include 'hapuspelanggan.php';}
				elseif ($_GET['halaman']=="metode"){
					include 'metode.php';}
				elseif ($_GET['halaman']=="carimetode"){
					include 'carimetode.php';}
				elseif ($_GET['halaman']=="tambahmetode"){
					include 'tambahmetode.php';}
				elseif ($_GET['halaman']=="hapusmetode"){
					include 'hapusmetode.php';}
				elseif ($_GET['halaman']=="ubahmetode"){
					include 'ubahmetode.php';}
				elseif ($_GET['halaman']=="status"){
					include 'status.php';}
				elseif ($_GET['halaman']=="caristatus"){
					include 'caristatus.php';}
				elseif ($_GET['halaman']=="tambahstatus"){
					include 'tambahstatus.php';}
				elseif ($_GET['halaman']=="hapusstatus"){
					include 'hapusstatus.php';}
				elseif ($_GET['halaman']=="ubahstatus"){
					include 'ubahstatus.php';}
				elseif ($_GET['halaman']=="admin"){
					include 'admin.php';}
				elseif ($_GET['halaman']=="cariadmin"){
					include 'cariadmin.php';}
				elseif ($_GET['halaman']=="tambahadmin"){
					include 'tambahadmin.php';}
				elseif ($_GET['halaman']=="hapusadmin"){
					include 'hapusadmin.php';}
				elseif ($_GET['halaman']=="ubahadmin"){
					include 'ubahadmin.php';}
				elseif ($_GET['halaman']=="logout"){
					include 'logout.php';}
				elseif ($_GET['halaman']=="faktur"){
					include 'faktur.php';}
				elseif ($_GET['halaman']=="carifaktur"){
					include 'carifaktur.php';}
				elseif ($_GET['halaman']=="detailfaktur"){
					include 'detailfaktur.php';}
				elseif ($_GET['halaman']=="penilaian"){
					include 'penilaian.php';}
				elseif ($_GET['halaman']=="komplain"){
					include 'komplain.php';}
				elseif ($_GET['halaman']=="pembayaran"){
					include 'pembayaran.php';}
				elseif ($_GET['halaman']=="laporanikanterlaris"){
					include 'laporanikanterlaris.php';}
			}
			else 
			{
				include "home.php";
			}?>
        </main>
    </div>

	<script>
        // Script untuk dropdown menu
        document.querySelector('.dropdown-toggle').addEventListener('click', function(e) {
            e.preventDefault();
            const dropdown = this.nextElementSibling;
            dropdown.classList.toggle('show');
        });
		
		document.querySelector('.dropdown-toggle1').addEventListener('click', function(e) {
            e.preventDefault();
            const dropdown = this.nextElementSibling;
            dropdown.classList.toggle('show');
        });

        // Script untuk menampilkan logout menu
        document.getElementById('profile-pic').addEventListener('click', function() {
            const logoutMenu = document.getElementById('logout-menu');
            logoutMenu.classList.toggle('show');
        });
    </script>
</body>
</html>
