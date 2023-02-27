 <?php echo view('/user/header'); ?>

<!-- ======= Hero Section ======= -->
<section id="hero">

    <div class="container">
        <div class="row d-flex align-items-center mb-5">
      <div class=" col-lg-6 py-5 py-lg-0 order-2 order-lg-1" data-aos="fade-right">
            <h1>PESONA SABU</h1>
            <h2>PEMETAAN OBJEK WISATA <br>DAN DI KABUPATEN SABU RAI JUA</h2>
            <a href=" /map" class="btn-get-started scrollto"><i class="bi bi-map-fill"></i> Lihat Map</a>
        </div>

        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item">
                    <img src="<?= base_url() ?>/assets-img/Taman doa.jpg" style="width: 100%; max-height: 350px; border-radius: 10px;" class="shadow-sm">
                </div>
                <div class="carousel-item">
                     <img src="<?= base_url() ?>/assets-img/batu tiga2.jpg" style="width: 100%; max-height: 350px; border-radius: 10px;" class="shadow-sm">
                </div>
                <div class="carousel-item">
                     <img src="<?= base_url() ?>/assets-img/danau1.jpg" style="width: 100%; max-height: 350px; border-radius: 10px;" class="shadow-sm">
                </div>
                <div class="carousel-item">
                     <img src="<?= base_url() ?>/assets-img/Pantai-Cemara-Nyiuwudu.jpg" style="width: 100%; max-height: 350px; border-radius: 10px;" class="shadow-sm">
                </div>
                <div class="carousel-item active">
                    <img src="<?= base_url() ?>/assets-img/3 (2).jpg" style="width: 100%; max-height: 350px; border-radius: 10px;" class="shadow-sm">
                </div>
                <div class="carousel-item active">
                    <img src="<?= base_url() ?>/assets-img/3 (3).jpg" style="width: 100%; max-height: 350px; border-radius: 10px;" class="shadow-sm">
                </div>
                <div class="carousel-item active">
                    <img src="<?= base_url() ?>/assets-img/3 (4).jpg" style="width: 100%; max-height: 350px; border-radius: 10px;" class="shadow-sm">
                </div>
                <div class="carousel-item active">
                    <img src="<?= base_url() ?>/assets-img/3 (6).jpg" style="width: 100%; max-height: 350px; border-radius: 10px;" class="shadow-sm">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>

        </div>

</section><!-- End Hero -->
<?php echo view('/user/footer'); ?>