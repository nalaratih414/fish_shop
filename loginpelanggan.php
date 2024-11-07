<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login R Fish Shop</title>
    <link rel="stylesheet" href="css/stylelogin.css">
</head>
<body>
    <div class="container">
        <h1>Login Pelanggan</h1><br>
        <form id="login-form" action="prosesloginpelanggan.php" method="post">
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <button name="login">Login</button>
        </form>
        <p>Belum punya akun? <a href="regis.php">Buat akun di sini</a></p>
    </div>
</body>
</html>
