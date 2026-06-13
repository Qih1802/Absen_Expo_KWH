<?php
session_start();
include "database.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

$data = mysqli_query($db,
"SELECT * FROM data_absensi
WHERE username='$username'
ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Absensi</title>
    <link rel="stylesheet" href="index.css">
</head>
<body class="body-rekap">

<div class="navbar" id="navbar">
    <li class="li-navbar">
        <a href="dashboard.php" class="font-navbar">Dashboard</a>
    </li>

    <li class="li-navbar">
        <a href="absen.php" class="font-navbar">Absen</a>
    </li>

    <li class="li-navbar">
        <a href="#" class="font-navbar">Rekap Absen</a>
    </li>

    <li class="li-navbar">
        <a href="logout.php" class="font-navbar">Logout</a>
    </li>
</div>

<div class="container-rekap">

    <h1 class="judul-rekap">
        Rekap Absensi
    </h1>

    <table class="table-rekap">

        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Jam Masuk</th>
            <th>Jam Keluar</th>
            <th>Status</th>
        </tr>

        <?php
        $no = 1;
        while($row = mysqli_fetch_assoc($data)){
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['tanggal'] ?></td>
            <td><?= $row['jam_masuk'] ?></td>
            <td><?= $row['jam_keluar'] ?></td>
            <td>
                <span class="status <?= strtolower($row['status']) ?>">
                    <?= $row['status'] ?>
                </span>
            </td>
        </tr>
        <?php } ?>

    </table>

</div>

<script src="index.js"></script>
</body>
</html>