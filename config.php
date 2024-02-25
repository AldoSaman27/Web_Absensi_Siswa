<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname   = 'absen_siswa';

    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die (`[MySQL] Gagal terconnect ke database!`);
?>