<link rel="stylesheet" href="./Styles/Admin/page_lihat_kelas.css">

<section id="pageLihatKelas">
    <div class="container d-flex flex-column align-items-center">
        <h1 class="text-warning"><?= $_GET['k'] ?></h1>
        <table class="m-2 bg-secondary">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th class="text-center">Option</th>
                </tr>
            </thead>
            <tbody>
                <?php $ambil_data = mysqli_query($conn, "SELECT * FROM `siswa` WHERE `kelas` = '". $_GET['k'] ."'"); 
                while ($tampil = mysqli_fetch_array($ambil_data)) {
                echo "
                <tr>
                    <td>$tampil[nama]</td>
                    <td class='text-center'>
                        <form method='POST'><button type='submit' value='$tampil[nama]' name='hapus_siswa' class='btn btn-danger btn-sm'>Hapus</button></form>
                    </td>
                </tr>
                "; } ?>
            </tbody>
        </table>
    </div>
</section>

<?php
if(isset($_POST['hapus_siswa'])) {
    $query = mysqli_query($conn, "DELETE FROM `siswa` WHERE `nama` = '". $_POST['hapus_siswa'] ."'");
    if($query) {
        ?><script src="./JS/jquery-3.4.1.min.js"></script>
        <script src="./JS/sweetalert2.all.min.js"></script>
        <script>
            Swal.fire("Success..","Berhasil menghapus siswa <?= $_POST['hapus_siswa'] ?>!","success").then(function() {
                window.location="./?page=admin&h=lihat_kelas&k=<?= $_GET['k'] ?>";
            });
            e.preventDefault();
        </script><?php
    }
}
?>