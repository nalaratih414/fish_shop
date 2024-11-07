<style>
.logo {
    width: 100px; /* Sesuaikan ukuran logo */
    height: auto;
    margin-right: 10px; /* Jarak antara logo dan teks */
    vertical-align: middle; /* Menjaga agar logo sejajar dengan teks */
    border: 0px solid #000; /* Warna dan ketebalan bingkai */
    border-radius: 5px; /* Menggunakan border-radius untuk sudut yang membulat */
    padding: 5px; /* Ruang antara gambar dan bingkai */
    background-color: #fff; /* Warna latar belakang di dalam bingkai */
}
</style>

	<header>
		<table border="1" width="100%">
			<tr>
				<td align="center">
				<center><img src="img/logo.png" alt="Logo R Fish Shop" class="logo"></center>
				</td>
				<td align="center">
				<font size="5" color="white"><h1>R Fish Shop</h1></font>
				</td>
				<td align="center">
				<center><img src="img/logo.png" alt="Logo R Fish Shop" class="logo"></center>
				</td>
			<tr>
				<td colspan="3">
				<marquee direction="left"><center><font color="white">Selamat Datang di R Fish Shop! Menyediakan bibit ikan berkualitas untuk ternak ikan yang sukses</font></center></marquee>
				</td>
			</tr>
		</table>
	
		<nav>
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
			<li><a href="keranjang.php">Keranjang</a></li>
			<li><a href="checkout.php">Checkout</a></li>
			<?php if (isset($_SESSION["Pelanggan"])): ?>
				<li><a href="riwayat.php">Riwayat Belanja</a></li>
				<li><a href="logout.php">Logout</a></li>
			<?php else: ?>
				<li><a href="pilihlogin.php">Login</a></li>
				<li><a href="regis.php">Register</a></li>
			<?php endif ?>
            <!--<li><a href="#">xxx</a>
                <ul class="submenu">
                    <li><a href="tambahproduk.php">xxx</a></li>
                    <li><a href="tran/index.php">xxx</a></li>
                </ul>
            </li>-->
        </ul>
		</nav>
    </header>