<link rel="stylesheet" href="./Styles/page_lihat_2.css">

<?php
if ($_GET['k']) @$kelas = $_GET['k'];
else @$kelas = $_SESSION['a_global']->kelas;
?>

<section id="pageLihat2">
    <div class="container d-flex flex-column align-items-center justify-content-center">
        <h1 class="mb-0 text-warning"><?= $kelas; ?></h1>
        <h3 class="mb-4 text-warning"><?= date("l, d F Y", strtotime($_GET['t'])); ?></h3>

        <table class="m-2 bg-secondary">
            <thead>
                <tr>
                    <th>Nama</th>
                    <?php
                    for ($i = 1; $i <= 9; $i++) {
                        $ambil_data_absen = mysqli_query($conn, "SELECT * FROM `absen` WHERE `kelas` = '". $kelas ."' AND `tanggal` = '". $_GET['t'] ."' AND `jam` = '". $i ."' LIMIT 1");
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
                        $ambil_data_absen = mysqli_query($conn, "SELECT * FROM `absen` WHERE `kelas` = '". $kelas ."' AND `tanggal` = '". $_GET['t'] ."' AND `jam` = '". $i ."' AND `nama` = '". $tampil_siswa['nama'] ."' LIMIT 1");
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
