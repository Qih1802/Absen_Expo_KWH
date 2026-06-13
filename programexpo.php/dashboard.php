<?php

session_start();
include "database.php";

$username = $_SESSION['username'];

$total_hadir = mysqli_num_rows(
    mysqli_query(
        $db,
        "SELECT * FROM data_absensi
     WHERE username='$username'
     AND status='Hadir'"
    )
);

$total_izin = mysqli_num_rows(
    mysqli_query(
        $db,
        "SELECT * FROM data_absensi
     WHERE username='$username'
     AND status='Izin'"
    )
);

$total_sakit = mysqli_num_rows(
    mysqli_query(
        $db,
        "SELECT * FROM data_absensi
     WHERE username='$username'
     AND status='Sakit'"
    )
);

$total_alfa = mysqli_num_rows(
    mysqli_query(
        $db,
        "SELECT * FROM data_absensi
     WHERE username='$username'
     AND status='Alfa'"
    )
);

$today = date('Y-m-d');

$query = mysqli_query(
    $db,
    "SELECT * FROM data_absensi
     WHERE username='$username'
     AND tanggal='$today'"
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

<body class="body-dashboard">
    <div class="navbar" id="navbar">
        <li class="li-navbar">
            <a href="#" class="font-navbar">Dashboard</a>
        </li>
        <li class="li-navbar">
            <a href="absen.php" class="font-navbar">Absen</a>
        </li>
        <li class="li-navbar">
            <a href="absenrekap.php" class="font-navbar">Rekap Absen</a>
        </li>
        <li class="li-navbar">
            <a href="logout.php" class="font-navbar">Logout</a>
        </li>
    </div>
    <div class="content-dashboard">
        <h1 class="judul-dashboard">Selamat Datang <?php echo $_SESSION['username']; ?></h1>
        <p class="paragraf-dashboard">Dashboard Absensi</p>
        <div class="jam-box">
            <h2 id="jam"></h2>
            <p id="tanggal"></p>
        </div>
    </div>

    <div class="card-absen">

        <div class="card">
            <h3>Kehadiran</h3>
            <p><?php echo $total_hadir; ?></p>
        </div>

        <div class="card">
            <h3>Izin</h3>
            <p><?php echo $total_izin; ?></p>
        </div>

        <div class="card">
            <h3>Sakit</h3>
            <p><?php echo $total_sakit; ?></p>
        </div>

        <div class="card">
            <h3>Alfa</h3>
            <p><?php echo $total_alfa; ?></p>
        </div>

    </div>

    <div class="card-absen">
        <h2 class="judul-dashbboard">Absensi Hari Ini</h2>
        <table class="table-absen">
            <tr>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Status</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                <tr>
                    <td><?php echo $row['tanggal']; ?></td>
                    <td><?php echo $row['jam_masuk']; ?></td>
                    <td><?php echo $row['jam_keluar'] ?? '-'; ?></td>
                    <td><?php echo $row['status']; ?></td>
                </tr>
            <?php } ?>
        </table>


    <script src="index.js"></script>
</body>

</html>