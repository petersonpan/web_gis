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
                <div class="col-6">
                    <div class="col-lg-12 mb-4">
                        <div class="card border-0 shadow" style="border-radius: 20px;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div id="map" style="margin: 0; padding: 0; display: flex; width: 100%; height: 700px"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <?php
                        foreach ($objek_wisata as $r) {
                        ?>
                            <div class="col-lg-6 mb-3" data-jenis="<?= $r['nama_jenis'] ?>">
                                <div class="card border-0 shadow" style="border-radius: 20px;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <figure style="border-radius: 10px;">
                                                    <img src="<?= base_url() ?>/img/<?= $r['foto'] ?>" style="width: 100%; height: 150px; object-fit: cover;border-radius: 10px;" class="shadow-sm">
                                                </figure>



                                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="flush-headingOne">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-<?= $r['id_wisata'] ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                                                                <h4> <?= $r['nama_wisata'] ?></h4>
                                                            </button>
                                                        </h2>
                                                        <div id="flush-<?= $r['id_wisata'] ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body">
                                                                <div>
                                                                    <a href="#" style="color: red" onclick="omong('<?= $r['keterangan'] ?>')"><i class="bi bi-play-circle-fill"></i> Putar Audio</a>
                                                                    <div class="subtitle mb-3">
                                                                        <span class="badge bg-primary"><?= $r['nama_tempat'] ?></span>
                                                                        <span class="badge bg-secondary"><?= $r['nama_jenis'] ?></span>
                                                                    </div>
                                                                    <p>
                                                                        <?= $r['keterangan'] ?>
                                                                    </p>
                                                                    <br>
                                                                    <p><b>Fasilitas: </b></p>
                                                                    <p>
                                                                        <?= $r['nama_fasilitas'] ?>
                                                                    </p>
                                                                    <a href="#" data-bs-target="#checkrating_<?= $r['id_wisata'] ?>" data-bs-toggle="modal"><b><u>Lihat Rating</u></b></a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <a href="https://www.google.com/maps?q=<?= $r['latitude'] ?>,<?= $r['longitude'] ?>" target="_blank">
                                        <div class="card-footer text-center" style="color: #333"><i class="bi bi-google"></i> Lihat di Google Maps</div>
                                    </a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#rating_<?= $r['id_wisata'] ?>">
                                        <div class="card-footer text-center text-white bg-warning" style="color: #333"><i class="bi bi-star-fill"></i> Beri Rating</div>
                                    </a>

                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="rating_<?= $r['id_wisata'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><?= $r['nama_wisata'] ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/objek-wisata/rating" method="post">
                                                <div class="mb-3">
                                                    Beri Rating:
                                                    <input type="hidden" name="id_wisata" value="<?= $r['id_wisata'] ?>">
                                                    <select name="rating" id="">
                                                        <option value="1">1⭐</option>
                                                        <option value="2">2⭐</option>
                                                        <option value="3">3⭐</option>
                                                        <option value="4">4⭐</option>
                                                        <option value="5">5⭐</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    Beri Komentar: <br>
                                                    <textarea name="komentar" class="form-control" cols="30" rows="05"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="checkrating_<?= $r['id_wisata'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><?= $r['nama_wisata'] ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <?php
                                            foreach (App\Models\Mrating::checkRating($r['id_wisata']) as $b) {
                                            ?>
                                                <p class="mb-3">
                                                <div>
                                                    <b class="text-warning"><?php
                                                                            for ($i = 1; $i <= $b['rating']; $i++) {
                                                                            ?>
                                                            <i class="bi bi-star-fill"></i>
                                                        <?php
                                                                            }
                                                        ?></b>
                                                </div>
                                                <div class="text-muted">
                                                    <?= $b['komentar'] ?>
                                                </div>
                                                </p>
                                                <hr>
                                            <?php
                                            }

                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<script>
    
    // Creating map options
    var map = L.map('map').setView([-10.5390, 121.8686], 12);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: 'Cisco17'
    }).addTo(map);


    var currentLatLong = ['-10.456382907601117', '121.87981075422701'];
    <?php
    foreach ($objek_wisata as $r) {
    ?>
        var distance = getDistance(currentLatLong, [<?= $r['latitude'] ?>, <?= $r['longitude'] ?>]);
            L.marker([<?= $r['latitude'] ?>, <?= $r['longitude'] ?>])
            .addTo(map)
            .bindPopup("<div class='accordion accordion-flush' id='accordionFlushExample'><div class='accordion-item'><h2 class='accordion-header' id='flush-headingOne'><button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#flush-<?= $r['id_wisata'] ?>' aria-expanded='false' aria-controls='flush-collapseOne'><h4><?= $r['nama_wisata'] ?></h4></button></h2><div id='flush-<?= $r['id_wisata'] ?>' class='accordion-collapse collapse' aria-labelledby='flush-headingOne' data-bs-parent='#accordionFlushExample'><div class='accordion-body'><img src='<?= base_url() ?>/img/<?= $r['foto'] ?>' style='width: 100%'> <br><div><div class='subtitle mb-3'><span class='badge bg-primary'><?= $r['nama_tempat'] ?></span><span class='badge bg-secondary'><?= $r['nama_jenis'] ?></span></div><p><?= $r['keterangan'] ?></p><br><b>Jarak: " + Math.round(distance) + " km dari Seba</b></div></div></div></div></div>");
        L.polyline([currentLatLong, [<?= $r['latitude'] ?>,<?= $r['longitude'] ?>]], {
            
            color: 'red',
            weight: 3,
            opacity: 0.5,
            smoothFactor: 1
        }).addTo(map);
    <?php
    }
    ?>
    //-10.456382907601117, 121.87981075422701
    function getDistance(origin, destination) {
        // return distance in meters
        var lon1 = toRadian(origin[1]),
            lat1 = toRadian(origin[0]),
            lon2 = toRadian(destination[1]),
            lat2 = toRadian(destination[0]);

        var deltaLat = lat2 - lat1;
        var deltaLon = lon2 - lon1;

        var a = Math.pow(Math.sin(deltaLat / 2), 2) + Math.cos(lat1) * Math.cos(lat2) * Math.pow(Math.sin(deltaLon / 2), 2);
        var c = 2 * Math.sin(Math.sqrt(a));
        var EARTH_RADIUS = 6371;
        return (c * EARTH_RADIUS * 1000) / 1000;
    }

    function toRadian(degree) {
        return degree * Math.PI / 180;
    }
</script>
<?php echo view('/user/footer'); ?>