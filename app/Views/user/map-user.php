<?php echo view('/user/header'); ?>

<div class="container-fluid">
    <div id="map" style="margin: 0; padding: 0;height: 81vh; width: 98vw;"></div>
</div>

<script>
    // Creating map options
    var map = L.map('map').setView([-10.5390, 121.8686], 12);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '©ESC17'
    }).addTo(map);
    <?php
    foreach ($objek_wisata as $r) {
    ?>
        L.marker([<?= $r['longitude'] ?>, <?= $r['latitude'] ?>])
            .addTo(map)
            .bindPopup("<h5><?= $r['nama_wisata'] ?></h5> <img src='<?= base_url() ?>/img/<?= $r['foto'] ?>' style='width: 100%'> <br> <div class='mt-2'><span class='badge bg-primary'><?= $r['nama_tempat'] ?></span> &nbsp; <span class='badge bg-secondary'><?= $r['nama_jenis'] ?></span> <br><div class='mt-2'><?= $r['keterangan'] ?></div>");
    <?php
    }
    ?>
</script>
<?php echo view('/user/footer'); ?>