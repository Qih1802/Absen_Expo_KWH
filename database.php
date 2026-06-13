<?php

$hostname="localhost";
$username="root";
$password= "";
$email= "";

$database_name="absensi";


$db = mysqli_connect($hostname, $username, $password,$database_name);

if(!$db){

    die("Kobeksi Gagal: " . mysqli_connect_error());
}

?>  