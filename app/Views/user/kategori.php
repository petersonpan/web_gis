<?php echo view('/user/header'); ?>

<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Objek Wisata</h2>
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Kategori</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                foreach ($jenis as $r) {
                ?>
                    <a href="/objek-wisata?q=<?= $r['id_jenis'] ?>" class="text-dark">
                        <div class="col">
                            <div class="border-0 card h-100 shadow" style="border-radius: 10px;">
                                <figure style="border-radius: 10px;">
                                    <img src="<?= base_url() . '/img/' . $r['gambar'] ?>" class="card-img-top" style="width: 100%; height: 200px; object-fit: cover;border-radius: 10px;" alt="Hollywood Sign on The Hill" />
                                </figure>
                                <div class="card-body">
                                    <h5 class="card-title text-center"><b><?= $r['nama_jenis'] ?></b></h5>
                                    <p class="card-text">
                                        <?= $r['keterangan'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php echo view('/user/footer'); ?>