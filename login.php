<?php

session_start();
include "database.php";

if(isset($_POST['username']) && isset($_POST['password'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($db,"SELECT * FROM users WHERE username='$username'");

    $data = mysqli_fetch_assoc($query);

    if($data){

        if(password_verify($password,$data['password'])){

            $_SESSION['username'] = $data['username'];

            header("Location: dashboard.php");
            exit;
        }
    }

    echo "Username atau Password Salah";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>

<body class="home-body">

    <div class="content">
        <div class="font-home">
            <h1 class="judul-home">Sistem Absensi Digital</h1>
            <div class="p-home">
                <p>Silahkan Login Untuk Absen</p>
                <p>Apabila Belum Memiliki Akun, Silahkan Melakukan Registrasi</p>
                <p>Klik <a href="register.php"><b>Register</b></a> Untuk Membuat Akun Baru</p>
            </div>
        </div>
    </div>

    <div class="login">
        <div class="font-login">
            <h1 class="judul-login">Selamat Datang Kembali</h1>
            <p class="p-login"> Silahkan Masuk ke Akun Anda</p>

        </div>
        <form action="login.php" method="POST">
            <label for="username"></label>
            <input type="text" id="username" name="username" placeholder="Masukan Nama Anda" required>
            <label for="password"></label>
            <input type="password" id="password" name="password" placeholder="Masukan Password Anda" required>
            <button type="submit">Login</button>

        </form>

    </div>

    <script src="index.js"></script>
</body>

</html>