<?php
include 'config.php'; 
$query = "SELECT * FROM ikan";
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>R Fish Shop</title>
    <style>
        /* CSS dasar untuk tampilan */
        .gambar { width: 200px; height: 200px; }
		.produk {
			display: inline-block;
			margin: 10px;
			background-color: white;
			border: 1px solid #ddd;
			border-radius: 5px;
			padding: 15px;
			margin: 10px 0;
		}
		.details {
			display: inline-block;
			margin-bottom: 10px;
			color: #4CAF50;
			text-decoration: none;
		}
		.add-to-cart {
			padding: 10px;
			background-color: #4CAF50;
			color: white;
			border: none;
			border-radius: 3px;
			cursor: pointer;
		}
		.search-box-data {
		display: flex;
		justify-content: center; 
		align-items: center; 
		margin-left: 20px;
		margin-bottom: 10px;
		}
		.search-box-data input {
		padding: 10px;
		width: 200px;
		}
		.search-box-data button {
		padding: 10px;
		}
    </style>
	<link rel="stylesheet" href="css/stylekeranjang.css">
</head>
<body>
    <h1>Daftar Produk</h1>
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="produk">
            <img src="img/<?= $row['foto'] ?>" class="gambar" alt="<?= $row['nama_ikan'] ?>">
            <h4><?= $row['nama_ikan'] ?></h4>
            <p>Harga: Rp <?= number_format($row['harga'], 2) ?></p>
			<a href="detailproduk.php?id_ikan=<?php echo $row['id_ikan'];?>" class="details">Lihat Detail</a><br>
			<a href="beli.php?id_ikan=<?php echo $row['id_ikan'];?>" class="btn-custom-save">Masukkan keranjang</a>
        </div>
    <?php endwhile; ?>
</body>
</html>