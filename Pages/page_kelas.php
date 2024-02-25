<link rel="stylesheet" href="./Styles/page_kelas.css">

<section id="pageKelas">
    <div class="container d-flex flex-column align-items-center justify-content-center">
        <h1 class="mb-0 text-warning">X RPL 1</h1>
        <h3 class="mb-3 text-warning">27 Maret 2007</h3>

        <?php for ($i = 1; $i < 10; $i++) {  ?>
            <a href="./?page=absen&jam=<?= $i ?>" class="m-2">Jam Pembelajaran: <?= $i ?></a>
        <?php } ?>
    </div>
</section>