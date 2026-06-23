<?php

//Koneksi Database
$server = "localhost";
$user = "root";
$password = "";
$database = "dbreinbloom";

//buat koneksi
$koneksi = mysqli_connect($server, $user, $password, $database)
    or die(mysqli_connect_error());