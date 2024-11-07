<?php
session_start();
include 'config.php';

//echo "<pre>";
//print_r($_SESSION['Pelanggan']);
//echo "</pre>";

if (!isset($_SESSION['Pelanggan']))
{
	echo "<script>alert('Anda harus login');</script>";
	echo "<script>location='loginpelanggan.php';</script>";
	header('location=loginpelanggan.php');
	exit();
}

if(empty($_SESSION['keranjang']) || !isset($_SESSION['keranjang']))
	{
		echo "<script>alert('Keranjang kosong, silakan belanja terlebih dahulu'); location='index.php';</script>";
	}

$alamat=$_SESSION["Pelanggan"]["alamat"];
?>

<html>
<head>
	<?php include 'head.php'; ?>
    <link rel="stylesheet" href="css/styletambah.css">
	<link rel="stylesheet" href="css/stylekeranjang.css">
	<style>
		body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f5f5f5;
        }
		
        main {
            padding: 20px;
        }

        .checkout-summary, .shipping-details {
            background-color: white;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        h1, h2 {
            color: #4CAF50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        input[type="text"], input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px 15px;
            color: white;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
        }

        button:hover {
            background-color: #45a049;
        }
		</style>
</head>
<body>
	<?php include 'header.php'; ?>
	<main>
	<h1>Checkout</h1>
        <section class="checkout-summary">
            <h2>Ringkasan Pesanan</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nomor</th>
						<th>Nama Ikan</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subharga</th>
                    </tr>
                </thead>
                <tbody>
					<?php $nomor=1; 
					$total_belanja = 0; 
					foreach ($_SESSION['keranjang'] as $id_ikan => $jumlah): 
					$ambil=$koneksi->query("SELECT * FROM ikan WHERE id_ikan='$id_ikan'");
					$pecah = $ambil->fetch_assoc();
					$subharga = $pecah['harga']*$jumlah;?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah['nama_ikan']; ?></td>
						<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
						<td><?php echo $jumlah; ?></td>
						<td>Rp. <?php echo number_format($subharga); ?></td>
					</tr>
					<?php $nomor++; ?>
					<?php $total_belanja+=$subharga; ?>
					<?php  endforeach ?>
                </tbody>
				<tfoot>
					<tr>
						<th colspan="4">Total</th>
						<th>Rp. <?php echo number_format($total_belanja)?></th>
					</tr>
				</tfoot>
            </table>
        </section>

        <div class="report-box">
		<section class="shipping-details">
            <h2>Detail Pengiriman</h2>
            <form method="POST">
                <label for="nama">Nama Lengkap:</label>
                <input type="text" readonly value="<?php echo $_SESSION["Pelanggan"]["nama"];?>">
                
                <label for="alamat">Kota Tujuan (Ongkir):</label>
                <select class="form-control" name="id_ongkir" required>
					<option value="">Pilih Ongkir</option>
					<?php $ambil=$koneksi->query("SELECT * FROM ongkir JOIN kota 
					ON ongkir.id_kota=kota.id_kota");
					while($perongkir=$ambil->fetch_assoc()){?>
					<option value="<?php echo $perongkir['id_ongkir']; ?>">
					<?php echo $perongkir['kota'];?> - 
					Rp.<?php echo number_format($perongkir['ongkir']);?>
					</option>
					<?php }?>
				</select>
				
				<label for="alamat">Metode Pembayaran:</label>
				<select class="form-control" name="id_metode" required>
					<option value="">Pilih Metode Pembayaran</option>
					<?php $ambil=$koneksi->query("SELECT * FROM metode_pembayaran");
					while($pembayaran=$ambil->fetch_assoc()){?>
					<option value="<?php echo $pembayaran['id_metode']; ?>">
					<?php echo $pembayaran['metode'];?>
					</option>
					<?php }?>
				</select>
				
				<label> Alamat Pengiriman :</label>
				<textarea name="alamat_pengiriman" placeholder="Masukkan Alamat Pengiriman" required></textarea>
                
				<a href="index.php" class="btn-custom-default">Lanjutkan Beli</a>
				<button class="btn-custom-save" name="checkout">Checkout</button>
            </form>
			
			<?php if(isset($_POST['checkout'])){
				$id_pelanggan=$_SESSION["Pelanggan"]["id_pelanggan"];
				$id_ongkir=$_POST["id_ongkir"];
				$id_metode=$_POST["id_metode"];
				$tanggal_pembelian=date("Y-m-d");
				$alamat_pengiriman=$_POST["alamat_pengiriman"];
				$id_status="S001";
				
				$ambil=$koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
				$arrayongkir=$ambil->fetch_assoc();
				$ongkir=$arrayongkir['ongkir'];
				$total_keseluruhan=$total_belanja + $ongkir;
				
				$query=mysqli_query($koneksi, "SELECT max(id_faktur) as kodeTerbesar FROM faktur");
				$data=mysqli_fetch_array($query);
				$id_faktur=$data['kodeTerbesar'];
				$urutan=(int) substr($id_faktur,3,3);
				$urutan++;
				$huruf="F";
				$id_faktur = $huruf . sprintf("%03s", $urutan);
				echo "$id_faktur,$id_status,$id_metode,$id_ongkir,$id_pelanggan,$tanggal_pembelian,$total_keseluruhan,$alamat_pengiriman";
				
				$sql = "INSERT INTO faktur (id_faktur,id_status,id_metode,id_ongkir,id_pelanggan,tanggal_pembelian,total_harga,alamat_pengiriman) 
				VALUES ('$id_faktur','$id_status','$id_metode','$id_ongkir','$id_pelanggan','$tanggal_pembelian','$total_keseluruhan','$alamat_pengiriman')";
				if (mysqli_query($koneksi, $sql)) {
					echo "New record created successfully";} 
				else {
					echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);}
							
				foreach ($_SESSION['keranjang'] as $id_ikan => $jumlah){
					$ambil=$koneksi->query("SELECT * FROM ikan WHERE id_ikan='$id_ikan'");
					$perproduk=$ambil->fetch_assoc();
					$nama_ikan=$perproduk['nama_ikan'];
					$harga=$perproduk['harga'];
					$subharga=$perproduk['harga']*$jumlah;
					$sql = "INSERT INTO transaksi (id_faktur,id_ikan,jumlah_pesanan,ikan,harga,subharga) 
					VALUES ('$id_faktur','$id_ikan','$jumlah','$nama_ikan','$harga','$subharga')";
					if (mysqli_query($koneksi, $sql)) {
						echo "New record created successfully";} 
					else {
						echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);}
					$koneksi->query("UPDATE ikan SET stok=stok-$jumlah WHERE id_ikan='$id_ikan'");}
				
				unset($_SESSION["keranjang"]);
						
				
				echo "<script>alert('Pembelian Sukses');</script>";
				echo "<script>location='nota.php?id_faktur=$id_faktur';</script>";
			}?>
        </section>
		</div>
	</main>
</body>
</html>