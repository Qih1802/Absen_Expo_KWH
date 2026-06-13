<?php

include "database.php";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if(isset($_POST['signup'])){

    $gmail = $_POST['gmail'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query($db,"SELECT * FROM users WHERE username='$username' OR gmail='$gmail'");

    if(mysqli_num_rows($cek) > 0){

        echo "<script>alert('Username atau Gmail sudah digunakan');</script>";

    }else{

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($db,"INSERT INTO users(gmail,username,password)
                          VALUES('$gmail','$username','$password_hash')");

        echo "<script>
                alert('Registrasi Berhasil');
                window.location='login.php';
              </script>";
        exit;
    }
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

<body class="body-register">
    <div class="register-body">
        <div class="register-page">
        <h1 class="judul-register">Daftar Dengan Menggunakan</h1>
        <p class="paragraf-register">Username,Gmail, or Nomor Telpon</p>
        <form action="register.php" method="POST" class="form-register">
            <div class="input-register">
                <input type="text" name="gmail" placeholder="Masukan Gmail" required>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="signup-medsos">
                <h1>OR</h1>
            </div>
            <div class="logo-regis">
                <img src="assets/GOOGLE.png" class="foto-google"><a href="login.php" class="font-logo-regis">Dengan Google</a>

            </div>
            <button type="submit" name="signup" class="button-register" class="font-signup">Sign Up</button>
        </form>
    </div>

    </div>
</body>

</html>