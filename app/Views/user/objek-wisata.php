<?php echo view('/user/header'); ?>

<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Objek Wisata</h2>
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Objek Wisata</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
        <div class="container">
            <div class="row">

                <form action="/objek-wisata">
                    <div class="input-group mb-3">
                        <select name="q" class="form-select shadow">
                            <option value="">Semua</option>
                            <?php
                            foreach ($jenis as $j) {
                            ?>
                                <option value="<?= $j['id_jenis'] ?>"><?= $j['nama_jenis'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <button class="btn btn-secondary shadow" type="submit"><i class="bi bi-search"></i> Cari</button>
                    </div>
                </form>

            </div>
            <div class="row">
                <?php
                foreach ($objek_wisata as $r) {
                ?>
                    <div class="col-lg-12 mb-3" data-jenis="<?= $r['nama_jenis'] ?>">
                        <div class="card border-0 shadow" style="border-radius: 20px;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <figure style="border-radius: 10px;">
                                            <img src="<?= base_url() ?>/img/<?= $r['foto'] ?>" style="width: 100%; height: 300px; object-fit: cover;border-radius: 10px;" class="shadow-sm">
                                        </figure>
                                    </div>
                                    <div class="col-lg-8">
                                        <h4><a href="#" style="color: red" onclick="omong('<?= $r['keterangan'] ?>')"><i class="bi bi-play-circle-fill"></i></a> <?= $r['nama_wisata'] ?></h4>
                                        <div class="subtitle mb-3">
                                            <span class="badge bg-primary"><?= $r['nama_tempat'] ?></span>
                                            <span class="badge bg-secondary"><?= $r['nama_jenis'] ?></span>
                                        </div>
                                        <div>
                                            <p>
                                                <?= $r['keterangan'] ?>
                                            </p>
                                            <br>
                                            <p><b>Fasilitas: </b></p>
                                            <p>
                                                <?= $r['nama_fasilitas'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="https://www.google.com/maps?q=<?= $r['longitude'] ?>,<?= $r['latitude'] ?>" target="_blank">
                                <div class="card-footer text-center" style="color: #333"><i class="bi bi-geo-alt-fill"></i> Lihat Titik</div>
                            </a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php echo view('/user/footer'); ?>