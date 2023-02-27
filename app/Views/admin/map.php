<?php echo view('layout/header'); ?>

<!-- Table Start -->

<div class="container-fluid pt-4 ">
    <div class="row">

        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">

                <h4 class="mb-9"><?php echo $title ?>
                    <a href="/create" class="btn btn-success rounded-pill m-2 btn-sm">+
                        Tambah</a>
                    <a href="/wisata/" class="btn btn-outline-success rounded-pill btn-sm"><i class="bi bi-table px-2"></i>
                        Table Data</a>
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
//10.6869226,122.8350832,10z
//-10.737524, 123.113861
    navigator.geolocation.getCurrentPosition(function(location) {
var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

//map view
console.log(location.coords.latitude, location.coords.longitude);

    // Creating map options
    var map = L.map('map').setView([-10.6869226, 122.8350832], 10);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© ESC17'
    }).addTo(map);
    <?php
    foreach ($objek_wisata as $r) {
    ?>
        L.marker([<?= $r['latitude'] ?>, <?= $r['longitude'] ?>])
            .addTo(map)
            .bindPopup("<h5><?= $r['nama_wisata'] ?></h5> <img src='<?= base_url() ?>/img/<?= $r['foto'] ?>' style='width: 100%'> <br> <div class='mt-2'><span class='badge bg-primary'><?= $r['nama_tempat'] ?></span> &nbsp; <span class='badge bg-secondary'><?= $r['nama_jenis'] ?></span> <br><div class='mt-2'><?= $r['keterangan'] ?></div>");
    <?php
    }
    ?>
</script>
<?php echo view('layout/footer'); ?>