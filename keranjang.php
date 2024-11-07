<?php
session_start();
$koneksi= new mysqli("localhost","root","","fish_shop");
//echo "<pre>";
//print_r($_SESSION['keranjang']);
//echo "</pre>";

if(empty($_SESSION['keranjang']) || !isset($_SESSION['keranjang']))
	{
		echo "<script>alert('Keranjang kosong, silakan belanja terlebih dahulu'); location='index.php';</script>";
	}
?>

<html>
<head>
	<?php include 'head.php'; ?>
	<link rel="stylesheet" href="css/stylekeranjang.css">
	<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
}
main {
    padding: 30px;
}
.product-detail {
    background-color: white;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    text-align: center;
}

.product-detail img {
    max-width: 100%;
    height: auto;
    margin-bottom: 15px;
}

.add-to-cart {
    padding: 10px 15px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.add-to-cart:hover {
    background-color: #45a049;
}
	</style>
</head>
<body>
	<?php include 'header.php'; ?>
	
	<main>
	<section class="product-detail">
        <table>
            <thead>
				<tr>
					<th>Nomor</th>
					<th>Nama Ikan</th>
					<th>Harga Ikan</th>
					<th>Jumlah Pesanan</th>
					<th>Subharga</th>
					<th>Aksi</th>
				</tr>
			</thead>
            <tbody>
				<?php $nomor=1; ?>
				<?php foreach($_SESSION['keranjang'] as $id_ikan => $jumlah){?>
				<?php $ambil=$koneksi->query("SELECT * FROM ikan WHERE id_ikan='$id_ikan'");?>
				<?php $pecah = $ambil->fetch_assoc();?>
				<?php //echo "<pre>";
					//print_r($_pecah);
					//echo "</pre>";?>
				<?php $subharga = $pecah['harga']*$jumlah;?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah['nama_ikan']; ?></td>
					<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
					<td><?php echo $jumlah; ?></td>
					<td>Rp. <?php echo number_format($subharga); ?></td>
					<td>
						<a href="detailproduk.php?id_ikan=<?php echo $pecah['id_ikan'];?>" class="btn-custom-default">ubah jumlah</a>
						<a href="hapuskeranjang.php?id_ikan=<?php echo $pecah['id_ikan']?>" onclick="return confirm('Apakah anda yakin ingin menghapus buku dari keranjang?')" class="btn-custom-danger" name="hapus">hapus</a>
					</td>
				</tr>
				<?php $nomor++; ?>
				<?php } ?>
	</tbody>
        </table>
        <a href="index.php" class="btn-custom-default">Lanjutkan Beli</a>
		<a href="checkout.php" class="btn-custom-save">Checkout</a>
    </section>
	</main>
</body>
</html>