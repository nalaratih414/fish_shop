<?php
   require_once("config.php");
   $nama = $_POST['nama'];
   $email = $_POST['email'];
   $telepon = $_POST['telepon'];
   $alamat = $_POST['alamat'];
   $password = $_POST['password'];
   echo "$nama, $email, $telepon, $alamat, $password";
   $sql = "SELECT * FROM pelanggan WHERE email = '$email'";
   $query = $koneksi->query($sql);
   if($query->num_rows != 0) {
     echo "<script>alert('Email sudah terdaftar'); window.location = 'regis.php'</script>";
   } else {
     if(!$nama || !$email ||!$telepon ||!$alamat ||!$password ) {
       echo "<script>alert('Masih ada data yang kosong'); window.location = 'regis.php'</script>";
     } else {
       $data = "INSERT INTO pelanggan (nama, email, telepon, alamat, password) VALUES ('$nama', '$email', '$telepon', '$alamat','$password')";
       $simpan = $koneksi->query($data);
       if($simpan) {
         echo "<script>alert('Pendaftaran berhasil'); window.location = 'loginpelanggan.php'</script>";
       } else {
         //echo "<script>alert('Proses gagal'); window.location = 'regis.php'</script>";
       }
     }
   }
?>