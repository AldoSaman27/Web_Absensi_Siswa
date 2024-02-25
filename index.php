<?php ob_start();
include './config.php';
include './function.php';
error_reporting(0);
session_start();
date_default_timezone_set("Asia/Jakarta");
setlocale(LC_TIME, 'id_ID.utf8');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Absensi Siswa - SMKN 3 GORONTALO</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- CSS -->
    <link rel="stylesheet" href="./Styles/style.css">
</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark fixed-top shadow-lg">
        <div class="container">
        <?php
if(!empty($_GET['page'])) {
    switch($_GET['page']) {
        case 'login':
            ?><a class="navbar-brand" href="#">SMKN 3 GORONTALO</a><?php
            break;
        case 'absen':
            if(!empty($_GET['j'])) {
                ?><a href="./?page=absen" class="navbar-brand"><i class="bi bi-arrow-left"></i></a><?php   
            } else {
                ?><a href="./?page=login" class="navbar-brand"><i class="bi bi-arrow-left"></i></a><?php
            }
            break;

        case 'lihat':
            switch ($_GET['n']) {
                case '1':
                    ?><a href="./?page=absen" class="navbar-brand"><i class="bi bi-arrow-left"></i></a><?php   
                    break;
                
                case '2':
                    ?><a href="./?page=lihat&n=1" class="navbar-brand"><i class="bi bi-arrow-left"></i></a><?php   
                    break;
                
                default:
                ?><a href="./?page=absen" class="navbar-brand"><i class="bi bi-arrow-left"></i></a><?php   
                    break;
            }
            break;

        case 'admin':
            if (!empty($_GET['h'])) {
                ?><a href="./?page=admin" class="navbar-brand"><i class="bi bi-arrow-left"></i></a><?php
            } else {
                ?><a href="./?page=login" class="navbar-brand"><i class="bi bi-arrow-left"></i></a><?php
            }
            break;
    }
}
?> 
            <?php if($_SESSION['status_login'] == true && $_SESSION['isAdmin'] == false) { ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="./?page=absen">Absensi Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="./?page=lihat&n=1">Lihat Absen</a>
                    </li>
                </ul>
            </div>
            <?php } ?>
        </div>
    </nav>

    <script src="./JS/jquery-3.4.1.min.js"></script>
    <script src="./JS/sweetalert2.all.min.js"></script>

<?php
    @$page = $_GET['page'];
    if(!empty($page)) {
        switch($page) {
            case 'login':
                include "./Pages/page_login.php";
                break;

            case 'absen':
                if($_SESSION['status_login'] != true) return Header("Location: ./?page=login");

                if(!empty($_GET['j'])) {                    
                    $cek1 = mysqli_query($conn, "SELECT * FROM `siswa` WHERE `kelas` = '". $_SESSION['a_global']->kelas ."'"); 
                    $cek2 = mysqli_query($conn, "SELECT * FROM `absen` WHERE `kelas` = '". $_SESSION['a_global']->kelas ."' AND `tanggal` = '". date("Y-m-d") ."' AND `jam` = '". $_GET['j'] ."'"); 

                    if(date("l") === "Sunday") {
                        ?><script>
                            Swal.fire("Opss..","Ini hari minggu masbro!","warning").then(function() {
                                window.location="./?page=absen";
                            });
                            e.preventDefault();
                        </script><?php
                        return 1;
                    }
                    else if(mysqli_num_rows($cek1) == 0) {
                        ?><script>
                            Swal.fire("Opss..","Kelas anda belum mempunyai siswa!","warning").then(function() {
                                window.location="./?page=absen";
                            });
                            e.preventDefault();
                        </script><?php
                        return 1;
                    }
                    else if(mysqli_num_rows($cek2) > 0) {
                        ?><script>
                            Swal.fire("Opss..","Absen jam pembelajaran <?= $_GET['j'] ?> sudah terkirim!","warning").then(function() {
                                window.location="./?page=absen";
                            });
                            e.preventDefault();
                        </script><?php
                        return 1;
                    }

                    include "./Pages/page_absen_2.php";
                }
                else include "./Pages/page_absen_1.php";
                break;

            case 'lihat':
                if($_SESSION['status_login'] != true) return Header("Location: ./?page=login");

                if(!empty($_GET['n'])) {
                    switch($_GET['n']) {
                        case '1':
                            include "./Pages/page_lihat_1.php";
                            break;

                        case '2':
                            include "./Pages/page_lihat_2.php";
                            break;
                    }
                }
                break;

            case 'admin':
                if($_SESSION['status_login'] != true) return Header("Location: ./?page=login");

                if(!empty($_GET['h'])) {
                    switch($_GET['h']) {
                        case 'lihat_absen':
                            include "./Pages/page_lihat_2.php";
                            break;

                        case 'lihat_kelas':
                            include "./Pages/Admin/page_lihat_kelas.php";
                            break;

                        case 'lihat_absen_perminggu':
                            include "./Pages/Admin/page_lihat_absen_perminggu.php";
                            break;
                    }
                } else include "./Pages/page_admin.php";
                break;
        }
    } 
    else Header("Location: ./?page=login");
?>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

<?php ob_end_flush(); ?>