<?php
$id_ikan=$_GET['id_ikan'];

$ambil=$koneksi->query("SELECT * FROM ikan  
		WHERE id_ikan='$id_ikan'");
$detail = $ambil->fetch_assoc();
?>

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
</style>

<div class="report-box">
	<div class="product-detail">
        <img src="../img/<?php echo $detail['foto'];?>" alt="<?php echo $detail['nama_ikan'];?>" class="product-image">
        <div class="product-info">
            <h2><?php echo $detail['nama_ikan'];?></h2><br>
            <p><strong>Harga:</strong> <?php echo $detail['harga'];?></p><br>
            <p><strong>Stok:</strong> <?php echo $detail['stok'];?></p><br>
            <p><strong>Deskripsi:</strong></p>
            <p><?php echo $detail['deskripsi'];?></p><br>
            <a href="index.php?halaman=ikan" class="btn-custom-warning">Kembali</a>
        </div>
    </div>
</div>