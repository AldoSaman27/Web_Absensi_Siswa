<link rel="stylesheet" href="./Styles/Admin/page_lihat_absen_perminggu.css">

<?php
if ($_GET['k']) @$kelas = $_GET['k'];
else @$kelas = $_SESSION['a_global']->kelas;

$tanggal_senin = strtotime($_GET['t']);
$tanggal_selasa = strtotime($_GET['t'] . '+1 day');
$tanggal_rabu = strtotime($_GET['t'] . '+2 day');
$tanggal_kamis = strtotime($_GET['t'] . '+3 day');
$tanggal_jumat = strtotime($_GET['t'] . '+4 day');
?>

<section id="pageLihatAbsenPerminggu">
    <div class="container d-flex flex-column align-items-center justify-content-center">
        <h1 class="mb-0 text-warning"><?= $kelas; ?></h1>

        <h3 class="mb-4 text-warning"><?= date("l, d F Y", $tanggal_senin); ?></h3>
        <table class="m-2 bg-secondary">
            <thead>
                <tr>
                    <th>Nama</th>
                    <?php
                    for ($i = 1; $i <= 9; $i++) {
                        $ambil_data_absen = mysqli_query($conn, "SELECT * FROM `absen` WHERE `kelas` = '". $kelas ."' AND `tanggal` = '". date("Y-m-d", $tanggal_senin) ."' AND `jam` = '". $i ."' LIMIT 1");
                        $tampil_absen = mysqli_fetch_array($ambil_data_absen);
                        echo "<th class='jp'>$i</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $ambil_data_siswa = mysqli_query($conn, "SELECT * FROM `siswa` WHERE `kelas` = '". $kelas ."'");

                while ($tampil_siswa = mysqli_fetch_array($ambil_data_siswa)) {
                    echo "<tr>";
                    echo "<td>$tampil_siswa[nama]</td>";

                    for ($i = 1; $i <= 9; $i++) {
                        $ambil_data_absen = mysqli_query($conn, "SELECT * FROM `absen` WHERE `kelas` = '". $kelas ."' AND `tanggal` = '". date("Y-m-d", $tanggal_senin) ."' AND `jam` = '". $i ."' AND `nama` = '". $tampil_siswa['nama'] ."' LIMIT 1");
                        $tampil_absen = mysqli_fetch_array($ambil_data_absen);

                        if ($tampil_absen) {
                            $keteranganFix = substr($tampil_absen['keterangan'], 0, 1);
                            echo "<td class='$tampil_absen[keterangan]'>$keteranganFix</td>";
                        } else {
                            echo "<td></td>";
                        }
                    }

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <h3 class="mt-4 mb-4 text-warning"><?= date("l, d F Y", $tanggal_selasa); ?></h3>
        <table class="m-2 bg-secondary">
            <thead>
                <tr>
                    <th>Nama</th>
                    <?php
                    for ($i = 1; $i <= 9; $i++) {
                        $ambil_data_absen = mysqli_query($conn, "SELECT * FROM `absen` WHERE `kelas` = '". $kelas ."' AND `tanggal` = '". date("Y-m-d", $tanggal_selasa) ."' AND `jam` = '". $i ."' LIMIT 1");
                        $tampil_absen = mysqli_fetch_array($ambil_data_absen);
                        echo "<th class='jp'>$i</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $ambil_data_siswa = mysqli_query($conn, "SELECT * FROM `siswa` WHERE `kelas` = '". $kelas ."'");

                while ($tampil_siswa = mysqli_fetch_array($ambil_data_siswa)) {
                    echo "<tr>";
                    echo "<td>$tampil_siswa[nama]</td>";

                    for ($i = 1; $i <= 9; $i++) {
                        $ambil_data_absen = mysqli_query($conn, "SELECT * FROM `absen` WHERE `kelas` = '". $kelas ."' AND `tanggal` = '". date("Y-m-d", $tanggal_selasa) ."' AND `jam` = '". $i ."' AND `nama` = '". $tampil_siswa['nama'] ."' LIMIT 1");
                        $tampil_absen = mysqli_fetch_array($ambil_data_absen);

                        if ($tampil_absen) {
                            $keteranganFix = substr($tampil_absen['keterangan'], 0, 1);
                            echo "<td class='$tampil_absen[keterangan]'>$keteranganFix</td>";
                        } else {
                            echo "<td></td>";
                        }
                    }

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <h3 class="mt-4 mb-4 text-warning"><?= date("l, d F Y", $tanggal_rabu); ?></h3>
        <table class="m-2 bg-secondary">
            <thead>
                <tr>
                    <th>Nama</th>
                    <?php
                    for ($i = 1; $i <= 9; $i++) {
                        $ambil_data_absen = mysqli_query($conn, "SELECT * FROM `absen` WHERE `kelas` = '". $kelas ."' AND `tanggal` = '". date("Y-m-d", $tanggal_rabu) ."' AND `jam` = '". $i ."' LIMIT 1");
                        $tampil_absen = mysqli_fetch_array($ambil_data_absen);
                        echo "<th class='jp'>$i</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $ambil_data_siswa = mysqli_query($conn, "SELECT * FROM `siswa` WHERE `kelas` = '". $kelas ."'");

                while ($tampil_siswa = mysqli_fetch_array($ambil_data_siswa)) {
                    echo "<tr>";
                    echo "<td>$tampil_siswa[nama]</td>";

                    for ($i = 1; $i <= 9; $i++) {
                        $ambil_data_absen = mysqli_query($conn, "SELECT * FROM `absen` WHERE `kelas` = '". $kelas ."' AND `tanggal` = '". date("Y-m-d", $tanggal_rabu) ."' AND `jam` = '". $i ."' AND `nama` = '". $tampil_siswa['nama'] ."' LIMIT 1");
                        $tampil_absen = mysqli_fetch_array($ambil_data_absen);

                        if ($tampil_absen) {
                            $keteranganFix = substr($tampil_absen['keterangan'], 0, 1);
                            echo "<td class='$tampil_absen[keterangan]'>$keteranganFix</td>";
                        } else {
                            echo "<td></td>";
                        }
                    }

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <h3 class="mt-4 mb-4 text-warning"><?= date("l, d F Y", $tanggal_kamis); ?></h3>
        <table class="m-2 bg-secondary">
            <thead>
                <tr>
                    <th>Nama</th>
                    <?php
                    for ($i = 1; $i <= 9; $i++) {
                        $ambil_data_absen = mysqli_query($conn, "SELECT * FROM `absen` WHERE `kelas` = '". $kelas ."' AND `tanggal` = '". date("Y-m-d", $tanggal_kamis) ."' AND `jam` = '". $i ."' LIMIT 1");
                        $tampil_absen = mysqli_fetch_array($ambil_data_absen);
                        echo "<th class='jp'>$i</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $ambil_data_siswa = mysqli_query($conn, "SELECT * FROM `siswa` WHERE `kelas` = '". $kelas ."'");

                while ($tampil_siswa = mysqli_fetch_array($ambil_data_siswa)) {
                    echo "<tr>";
                    echo "<td>$tampil_siswa[nama]</td>";

                    for ($i = 1; $i <= 9; $i++) {
                        $ambil_data_absen = mysqli_query($conn, "SELECT * FROM `absen` WHERE `kelas` = '". $kelas ."' AND `tanggal` = '". date("Y-m-d", $tanggal_kamis) ."' AND `jam` = '". $i ."' AND `nama` = '". $tampil_siswa['nama'] ."' LIMIT 1");
                        $tampil_absen = mysqli_fetch_array($ambil_data_absen);

                        if ($tampil_absen) {
                            $keteranganFix = substr($tampil_absen['keterangan'], 0, 1);
                            echo "<td class='$tampil_absen[keterangan]'>$keteranganFix</td>";
                        } else {
                            echo "<td></td>";
                        }
                    }

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <h3 class="mt-4 mb-4 text-warning"><?= date("l, d F Y", $tanggal_jumat); ?></h3>
        <table class="m-2 bg-secondary">
            <thead>
                <tr>
                    <th>Nama</th>
                    <?php
                    for ($i = 1; $i <= 9; $i++) {
                        $ambil_data_absen = mysqli_query($conn, "SELECT * FROM `absen` WHERE `kelas` = '". $kelas ."' AND `tanggal` = '". date("Y-m-d", $tanggal_jumat) ."' AND `jam` = '". $i ."' LIMIT 1");
                        $tampil_absen = mysqli_fetch_array($ambil_data_absen);
                        echo "<th class='jp'>$i</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $ambil_data_siswa = mysqli_query($conn, "SELECT * FROM `siswa` WHERE `kelas` = '". $kelas ."'");

                while ($tampil_siswa = mysqli_fetch_array($ambil_data_siswa)) {
                    echo "<tr>";
                    echo "<td>$tampil_siswa[nama]</td>";

                    for ($i = 1; $i <= 9; $i++) {
                        $ambil_data_absen = mysqli_query($conn, "SELECT * FROM `absen` WHERE `kelas` = '". $kelas ."' AND `tanggal` = '". date("Y-m-d", $tanggal_jumat) ."' AND `jam` = '". $i ."' AND `nama` = '". $tampil_siswa['nama'] ."' LIMIT 1");
                        $tampil_absen = mysqli_fetch_array($ambil_data_absen);

                        if ($tampil_absen) {
                            $keteranganFix = substr($tampil_absen['keterangan'], 0, 1);
                            echo "<td class='$tampil_absen[keterangan]'>$keteranganFix</td>";
                        } else {
                            echo "<td></td>";
                        }
                    }

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</section>
