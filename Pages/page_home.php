<link rel="stylesheet" href="./Styles/page_home.css">

<section id="pageHome">
    <div class="container d-flex align-items-center justify-content-center">
        <div class="row align-items-center justify-content-center">
            <h1 class="text-warning text-center">Jadwal Pembelajaran</h1>
            <h3 class="text-warning text-center mb-3"><?php echo $_GET['k']; ?></h3>
            <form method="post" class="d-flex flex-column align-items-center justify-content-center">
                <div>
                    <select name="kelas" class="bg-dark text-white" required>
                        <option value="" disabled selected>Kelas</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                    <select name="jurusan" class="bg-dark text-white" required>
                        <option value="" disabled selected>Jurusan</option>
                        <option value="TKP">TKP</option>
                        <option value="Furnitur">Furnitur</option>
                        <option value="DPIB">DPIB</option>
                        <option value="GMT">GMT</option>
                        <option value="TAV">TAV</option>
                        <option value="TITL">TITL</option>
                        <option value="TKRO">TKRO</option>
                        <option value="TBSM">TBSM</option>
                        <option value="TP">TP</option>
                        <option value="TKJ">TKJ</option>
                        <option value="RPL">RPL</option>
                    </select>
                    <select name="nomor_kelas" class="bg-dark text-white" required>
                        <option value="" disabled selected>Nomor</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="mt-2">Lihat</button>
            </form>

            <hr class="text-white mt-4 mb-4">
            
            <?php if($_GET['k'] != "") for ($i = 1; $i < 7; $i++) { ?>
                <div class="col-lg-5 d-flex flex-column align-items-center justify-content-center">
                    <h3 class="text-warning"><?php echo getHari($i); ?></h3>
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr><th>JP</th><th>MAPEL</th><th>GURU</th></tr>
                        </thead>
                        <tbody>
                            <?php $ambil_data = mysqli_query($conn, "SELECT * FROM `jadwal` WHERE `kelas` = '". $_GET['k'] ."' AND `hari` = '". $i ."'"); 
                            while ($tampil = mysqli_fetch_array($ambil_data)) echo "<tr><td>$tampil[jp]</td><td>$tampil[mapel]</td><td>$tampil[guru]</td></tr>"; ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php
if(isset($_POST['submit']))
{
    echo "<script>window.location='./?k=$_POST[kelas] $_POST[jurusan] $_POST[nomor_kelas]'</script>";
    return 1;
}
?>