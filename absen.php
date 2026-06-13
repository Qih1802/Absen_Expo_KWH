<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
include "database.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
if (isset($_POST['absen'])) {



    $tanggal = date('Y-m-d');
    $jam_masuk = date('H:i:s');
    $jam_masuk = date('H:i:s');
    $status = $_POST['status'];

    $cek = mysqli_query($db, "SELECT * FROM data_absensi
        WHERE username='$username'
        AND tanggal='$tanggal'
    ");

    if (mysqli_num_rows($cek) == 0) {

        $insert = mysqli_query($db, "
        INSERT INTO data_absensi(username,tanggal,jam_masuk,status)
        VALUES('$username','$tanggal','$jam_masuk','$status')
    ");

        if (!$insert) {
            die("Error: " . mysqli_error($db));
        }

        echo "<script>
                alert('Absen Masuk Berhasil');
                window.location='absen.php';
              </script>";
              exit();
    } 
}
if (isset($_POST['keluar'])) {

    $today = date('Y-m-d');
    $jam_keluar = date('H:i:s');

    mysqli_query($db, "UPDATE data_absensi SET jam_keluar='$jam_keluar' WHERE username='$username' AND tanggal='$today'");
}

$today = date('Y-m-d');

$data_hari_ini = mysqli_fetch_assoc(
    mysqli_query($db, "SELECT status FROM data_absensi WHERE username='$username' AND tanggal='$today' ORDER BY id DESC LIMIT 1")
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>

<body class="body-absen">
    <div class="navbar" id="navbar">
        <li class="li-navbar">
            <a href="dashboard.php" class="font-navbar">Dashboard</a>

        </li>
        <li class="li-navbar">
            <a href="#" class="font-navbar">Absen</a>

        </li>
        <li class="li-navbar">
            <a href="absenrekap.php" class="font-navbar">Rekap Absen</a>

        </li>
        <li class="li-navbar">
            <a href="logout.php" class="font-navbar">Logout</a>
        </li>
    </div>

    <div class="content-absen">
        
            <form method="POST" class="form-absen">
                <select name="status">
                    <option value="Hadir">Hadir</option>
                    <option value="Izin">Izin</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Alfa">Alfa</option>
                </select>
                <button type="submit" name="absen">Absen Masuk</button>

                <button type="submit" name="keluar">Absen Keluar</button>
            </form>
       
    </div>

    <script src="index.js"></script>
</body>


</html>