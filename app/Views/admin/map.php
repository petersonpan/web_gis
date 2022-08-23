<?php echo view('layout/header'); ?>

<!-- Table Start -->

<div class="container-fluid pt-4 ">
    <div class="row">

        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">

                <h4 class="mb-9"><?php echo $title ?>
                    <a href="/create" class="btn btn-success rounded-pill m-2 btn-sm">+
                        Tambah</a>
                    <a href="/wisata/map" class="btn btn-outline-success rounded-pill btn-sm"><i class="bi bi-map px-2"></i>
                        Maps</a>
                </h4>
                <div>
                    <div id="map" style="width: 900px; height: 580px"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->

<script>
    // Creating map options
    var map = L.map('map').setView([-10.2308, 123.6868], 11);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© ESC17'
    }).addTo(map);
    <?php
    foreach ($objek_wisata as $r) {
    ?>
        L.marker([<?= $r['Longitude'] ?>, <?= $r['Latitude'] ?>])
            .addTo(map)
            .bindPopup("<h5><?= $r['nama_wisata'] ?></h5> <div class='isiWisata'><?= $r['keterangan'] ?></div>");
    <?php
    }
    ?>
</script>
<?php echo view('layout/footer'); ?>