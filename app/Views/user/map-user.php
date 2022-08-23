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
</script>
<?php echo view('/user/footer'); ?>