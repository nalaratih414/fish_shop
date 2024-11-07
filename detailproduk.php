<?php
session_start();
include "config.php";
$id_ikan=$_GET['id_ikan'];

$ambil=$koneksi->query("SELECT * FROM ikan  
		WHERE id_ikan='$id_ikan'");
$detail = $ambil->fetch_assoc();
?>

<html>
<head>
	<?php include 'head.php'; ?>
<style>
.product-detail {
    display: flex;
    background-color: white;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.product-image {
    width: 300px;
    height: auto;
}

.product-info {
    padding: 20px;
    flex: 1;
}

.product-info h2 {
    margin: 0 0 10px;
}

.product-info p {
    margin: 5px 0;
}

main {
    padding: 20px;
    text-align: justify;
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

.search-box-data {
    display: flex;
	margin-left: 0px;
    margin-bottom: 5px;
}

.search-box-data input {
    padding: 50px;
    width: 200px; 
}

.search-box-data button {
    padding: 10px;
}
</style>

</head>
<body>
	<?php include 'header.php'; ?>
	<main>
	<div class="report-box">
	<div class="product-detail">
        <img src="img/<?php echo $detail['foto'];?>" alt="<?php echo $detail['nama_ikan'];?>" class="product-image">
        <div class="product-info">
            <h2><?php echo $detail['nama_ikan'];?></h2><br>
            <p><strong>Harga:</strong> <?php echo $detail['harga'];?></p><br>
            <p><strong>Stok:</strong> <?php echo $detail['stok'];?></p><br>
            <p><strong>Deskripsi:</strong></p>
            <p><?php echo $detail['deskripsi'];?></p><br>
			<input type="number" min="1" max="<?php echo $row['stok'];?>" class="search-box-data" name="jumlah" required>
			<a href="beli.php?id_ikan=<?php echo $detail['id_ikan'];?>" class="btn-custom-save">Masukkan keranjang</a>
            <a href="index.php" class="btn-custom-warning">Lanjutkan Beli</a>
        </div>
    </div>
	</div>

<?php if(isset($_POST['beli'])){
	$jumlah=$_POST['jumlah'];
	$_SESSION['keranjang'][$id_ikan]=$jumlah;
	echo "<script>alert('Produk telah masuk ke keranjang');</script>";
	echo "<script>location='keranjang.php';</script>";} ?>
	
	</main>
</body>
</html>

