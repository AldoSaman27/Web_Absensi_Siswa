<link rel="stylesheet" href="./Styles/page_admin.css">

<section id="pageAdmin">
    <div class="container d-flex align-items-center justify-content-center flex-column gap-2 pt-5">
        <form method="post" class="mt-3 d-flex flex-column justify-content-center bg-dark">
            <h3 class="text-warning text-center mb-0">Lihat Absen</h3>
            <div>
                <select name="kelas" required>
                    <option value="" disabled selected>Kelas</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
                <select name="jurusan" required>
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
                <select name="nomor_kelas">
                    <option value="-">Nomor</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
            <input type="date" name="tanggal" class="bg-secondary text-white" required>
            <button type="submit" name="lihat_absen" class="mt-3">Lihat</button>
        </form>
        <form method="post" class="mt-3 d-flex flex-column justify-content-center bg-dark">
            <h4 class="text-warning text-center mb-0">Lihat Absen Perminggu</h4>
            <div>
                <select name="kelas" required>
                    <option value="" disabled selected>Kelas</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
                <select name="jurusan" required>
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
                <select name="nomor_kelas">
                    <option value="-">Nomor</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
            <input type="date" name="tanggal" class="bg-secondary text-white" required>
            <button type="submit" name="lihat_absen_perminggu" class="mt-3">Lihat</button>
        </form>
        <form method="post" class="mt-3 d-flex flex-column justify-content-center bg-dark">
            <h3 class="text-warning text-center mb-0">Lihat Kelas</h3>
            <div>
                <select name="kelas" required>
                    <option value="" disabled selected>Kelas</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
                <select name="jurusan" required>
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
                <select name="nomor_kelas">
                    <option value="" disabled selected>Nomor</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
            <button type="submit" name="lihat_kelas" class="mt-1">Lihat</button>
        </form>
    </div>
</section>
<script src="./JS/jquery-3.4.1.min.js"></script>
<script src="./JS/sweetalert2.all.min.js"></script>

<?php
if(isset($_POST['lihat_absen']))
{
    if($_POST['nomor_kelas'] === "-") {
        $kelas = $_POST['kelas'] . " " . $_POST['jurusan'];
    } else {
        $kelas = $_POST['kelas'] . " " . $_POST['jurusan'] . " " . $_POST['nomor_kelas'];
    }
    echo "<script>window.location = './?page=admin&h=lihat_absen&t=". $_POST['tanggal'] ."&k=". $kelas ."'</script>";
    return 1;
}
if(isset($_POST['lihat_absen_perminggu']))
{
    if (date("l", strtotime($_POST['tanggal'])) !== "Monday") {
        ?><script>
            Swal.fire("Opss..","Harus hari senin!","warning").then(() => {
                window.location="./?page=admin";
            });
            e.preventDefault();
        </script><?php
        return 1;
    } else if($_POST['nomor_kelas'] === "-") {
        $kelas = $_POST['kelas'] . " " . $_POST['jurusan'];
    } else {
        $kelas = $_POST['kelas'] . " " . $_POST['jurusan'] . " " . $_POST['nomor_kelas'];
    }
    echo "<script>window.location = './?page=admin&h=lihat_absen_perminggu&t=". $_POST['tanggal'] ."&k=". $kelas ."'</script>";
    return 1;
}
if(isset($_POST['lihat_kelas']))
{
    if($_POST['nomor_kelas'] === "-") {
        $kelas = $_POST['kelas'] . " " . $_POST['jurusan'];
    } else {
        $kelas = $_POST['kelas'] . " " . $_POST['jurusan'] . " " . $_POST['nomor_kelas'];
    }
    echo "<script>window.location = './?page=admin&h=lihat_kelas&k=". $kelas ."'</script>";
    return 1;
}
?>