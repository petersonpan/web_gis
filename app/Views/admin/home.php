<?php echo view('layout/header'); ?>

<div class="container">
    <span class="text-center">
        <h4 class="my-3">Map Wisata</h4>
    </span>
    <div id="map" style="width: 100rel; height: 720px; border-radius: 20px"></div>

</div>

<script>
    // Creating map options
    var map = L.map('map').setView([-10.5390, 121.8686], 11);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© ESC17'
    }).addTo(map);
    <?php
    foreach ($objek_wisata as $r) {
    ?>
        L.marker([<?= $r['longitude'] ?>, <?= $r['latitude'] ?>])
            .addTo(map)
            .bindPopup("<h5><?= $r['nama_wisata'] ?></h5> <div class='isiWisata'><?= $r['keterangan'] ?></div>");
    <?php
    }
    ?>
</script>
<?php echo view('layout/footer'); ?>