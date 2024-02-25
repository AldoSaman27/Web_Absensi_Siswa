<link rel="stylesheet" href="./Styles/page_absen_2.css">

<?php 
if ($_GET['t']) {
    @$t = $_GET['t'];
} else {
    @$t = date("Y-m-d");
}
?>

<section id="pageAbsen2">
    <form action="" method="post">
        <div class="container d-flex flex-column align-items-center justify-content-center p-5">
            <h1 class="text-warning mt-5"><?= $_SESSION['a_global']->kelas ?></h1>
            <h3 class="text-warning mb-3">JP: <?= $_GET['j'] ?> | <?= date("l, d F Y", strtotime($t)) ?></h3>

            <?php 
                $ambil_data = mysqli_query($conn, "SELECT * FROM `siswa` WHERE `kelas` = '". $_SESSION['a_global']->kelas ."'"); 
                while ($tampil = mysqli_fetch_array($ambil_data)) {
                    echo "
                    <div class='box bg-dark text-white d-flex align-items-center p-2 m-2 rounded-2'>
                        <div class='nama'>
                            <h6>$tampil[nama]</h6>
                            <input type='text' name='nama_siswa_$tampil[id]' value='$tampil[nama]' class='d-none' readonly>
                        </div>
                        <div class='option'>
                            <select name='keterangan_$tampil[id]' class='bg-secondary text-white rounded-2'>
                                <option value='1'>Hadir</option>
                                <option value='2'>Tanpa Kabar</option>
                                <option value='3'>Sakit</option>
                                <option value='4'>Ijin</option>
                            </select>
                        </div>
                    </div>
                    ";
                } 
            ?>
            <button type="submit" name="submit" class="bg-primary border-0 rounded-2 p-1 fw-bold mt-3">Kirim</button>
        </div>
    </form>
</section>

<script src="./JS/jquery-3.4.1.min.js"></script>
<script src="./JS/sweetalert2.all.min.js"></script>

<?php
$test = 1;
$ambil_data = mysqli_query($conn, "SELECT * FROM `siswa` WHERE `kelas` = '". $_SESSION['a_global']->kelas ."'"); 
while ($tampil = mysqli_fetch_array($ambil_data)) {
    if(isset($_POST["submit"])) {
        $nama_siswa = $_POST["nama_siswa_$tampil[id]"];
        $keterangan = $_POST["keterangan_$tampil[id]"];

        mysqli_query($conn, "INSERT INTO `absen` (`kelas`, `tanggal`, `nama`, `keterangan`, `jam`) VALUES ('". $_SESSION['a_global']->kelas ."', '". date("Y-m-d", strtotime($t)) ."','". $nama_siswa ."','". $keterangan ."', '". $_GET['j'] ."')");

        if($test == 1) 
        {
            ?><script>
                Swal.fire("Success..","Absen <?= $_SESSION['a_global']->kelas ?> jam pembelajaran ke <?= $_GET['j'] ?> berhasil terkirim","success").then(function() {
                    window.location="./?page=absen";
                });
                e.preventDefault();
            </script><?php
            $test--;
            // return 1;
        }
    }
}
?>