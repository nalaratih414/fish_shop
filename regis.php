<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - R Fish Shop</title>
    <link rel="stylesheet" href="css/styleregis.css">
</head>
<body>
    <div class="container">
        <h1>Registrasi Akun</h1>
        <form id="register-form" action="prosesregis.php" method="post">
            <label>Nama:</label>
            <input type="text" name="nama" required>

            <label>Email:</label>
            <input type="email" name="email" required>
			
			<label>Telepon:</label>
            <input type="text" name="telepon" required>
			
			<label>Alamat:</label>
            <input type="text" name="alamat" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Daftar</button>
        </form>
		<p>Sudah punya akun? <a href="loginpelanggan.php">Login di sini</a></p>
    </div>
</body>
</html>
