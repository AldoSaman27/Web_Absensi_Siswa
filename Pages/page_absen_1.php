<link rel="stylesheet" href="./Styles/page_absen_1.css">

<section id="pageAbsen1">
    <div class="container d-flex flex-column align-items-center justify-content-center">
        <h1 class="mb-0 text-warning"><?php echo $_SESSION['a_global']->kelas; ?></h1>
        <h3 class="mb-3 text-warning"><?php echo date("l, d F Y"); ?></h3>

        <?php for ($i = 1; $i < 10; $i++) {  ?>
            <a href="./?page=absen&j=<?= $i ?>" class="m-2">Jam Pembelajaran: <?= $i ?></a>
        <?php } ?>
    </div>
</section>