<?php echo view('/user/header'); ?>


<style>
    .hc1 {
        filter: hue-rotate(0deg);
    }

    .hc2 {
        filter: hue-rotate(30deg);
    }

    .hc3 {
        filter: hue-rotate(60deg);
    }

    
    .hc4 {
        filter: hue-rotate(280deg);
    }

    
    .hc5 {
        filter: hue-rotate(300deg);
    }


    .hc6 {
        filter: hue-rotate(90deg);
    }

    .hc7 {
        filter: hue-rotate(120deg);
    }

    .hc8 {
        filter: hue-rotate(150deg);
    }

    .hc9 {
        filter: hue-rotate(180deg);
    }

    .hc10 {
        filter: hue-rotate(210deg);
    }

    .hc11 {
        filter: hue-rotate(240deg);
    }

    .hc12 {
        filter: hue-rotate(0deg);
    }
</style>
<div class="container-fluid">
    <div id="map" style="margin: 0; padding: 0;height: 81vh; width: 98vw;"></div>

    <div class="container-fluid mt-3 mb-3 text-center">
        <?php
            foreach($jenis_wisata as $k => $r){
        switch ($k) {
            case 0:
        ?>
                <button class="btn btn-primary hc1"></button> <?= $r['nama_jenis']?>
            <?php
                break;

            case 1:
            ?>
                <button class="btn btn-primary hc2"></button> <?= $r['nama_jenis']?>
            <?php
                break;

            case 2:
            ?>
                <button class="btn btn-primary hc3"></button> <?= $r['nama_jenis']?>
            <?php
                break;

            case 3:
            ?>
                <button class="btn btn-primary hc4"></button> <?= $r['nama_jenis']?>
            <?php
                break;

            case 4:
            ?>
                <button class="btn btn-primary hc5"></button> <?= $r['nama_jenis']?>
            <?php
                break;

            case 5:
            ?>
                <button class="btn btn-primary hc6"></button> <?= $r['nama_jenis']?>
            <?php
                break;

            case 6:
            ?>
                <button class="btn btn-primary hc7"></button> <?= $r['nama_jenis']?>
            <?php
                break;

            case 7:
            ?>
                <button class="btn btn-primary hc8"></button> <?= $r['nama_jenis']?>
            <?php
                break;

            case 8:
            ?>
                <button class="btn btn-primary hc9"></button> <?= $r['nama_jenis']?>
            <?php
                break;

            case 9:
            ?>
                <button class="btn btn-primary hc10"></button> <?= $r['nama_jenis']?>
            <?php
                break;
            case 10:
            ?>
                <button class="btn btn-primary hc11"></button> <?= $r['nama_jenis']?>
            <?php
                break;
            case 11:
            ?>
                <button class="btn btn-primary hc12"></button> <?= $r['nama_jenis']?>
            <?php
                break;
            default:
            ?>
                <button class="btn btn-primary hc1"></button> <?= $r['nama_jenis']?>
            <?php
                break;
            }
        }
        ?>
        
    </div>
</div>



<style>
    .huechange1 {
        filter: hue-rotate(0deg);
    }

    .huechange2 {
        filter: hue-rotate(30deg);
    }

    .huechange3 {
        filter: hue-rotate(60deg);
    }

    
    .huechange4 {
        filter: hue-rotate(280deg);
    }

    
    .huechange5 {
        filter: hue-rotate(300deg);
    }


    .huechange6 {
        filter: hue-rotate(90deg);
    }

    .huechange7 {
        filter: hue-rotate(120deg);
    }

    .huechange8 {
        filter: hue-rotate(150deg);
    }

    .huechange9 {
        filter: hue-rotate(180deg);
    }

    .huechange10 {
        filter: hue-rotate(210deg);
    }

    .huechange11 {
        filter: hue-rotate(240deg);
    }

    .huechange12 {
        filter: hue-rotate(0deg);
    }
</style>
<script>
    // Creating map options
    var map = L.map('map').setView([-10.6869226, 122.8350832], 10);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '©ESC17'
    }).addTo(map);
    
</script>
<?php echo view('/user/footer'); ?>