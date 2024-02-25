<link rel="stylesheet" href="./Styles/page_lihat_1.css">

<section id="pageLihat1">
    <div class="container d-flex justify-content-center">
        <form method="post" class="mt-3 d-flex flex-column justify-content-center bg-dark">
            <input type="date" name="tanggal" class="bg-secondary text-white" required>
            <button type="submit" name="submit" class="mt-3">Lihat</button>
        </form>
    </div>
</section>

<?php
if(isset($_POST['submit']))
{
    header("Location: ./?page=lihat&n=2&t=". $_POST['tanggal'] ."");
    return 1;
}
?>