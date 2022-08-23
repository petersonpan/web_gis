<?php echo view('layout/header'); ?>

<!-- Table Start -->
<?= \Config\Services::validation()->listErrors(); ?>
<div class="container-fluid pt-4 ">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h4 class="mb-4"><?php echo $title ?></h4>

                <form method="post" action="/wisata/simpan" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Wisata</label>
                        <input type="text" value="<?= old('nama_wisata')  ?>" name="nama_wisata" class="form-control" <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ; ?> id="nama_wisata">

                        <div class="invalid-feedback">
                            <?=$validation->getError('nama_wisata')?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jenis Wisata</label>
                        <select class="form-select" required id="floatingSelect" name="id_jenis" aria-label="Floating label select example">
                            <option selected>-- Pilih Jenis wisata --</option>
                            <?php
                            if (!empty($jenis)) {
                                foreach ($jenis as $u) {
                            ?>
                                    <option value="<?php echo $u['id_jenis']; ?>"><?php echo $u['nama_jenis']; ?>
                                    </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tempat Wisata</label>
                        <select class="form-select" required id="id_tempat" name="id_tempat" aria-label="Floating label select example">
                            <option selected>-- Pilih Tempat wisata --</option>
                            <?php
                            if (!empty($tempat)) {
                                foreach ($tempat as $u) {
                            ?>
                                    <option value="<?php echo $u['id_tempat']; ?>"><?php echo $u['nama_tempat']; ?>
                                    </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">

                        <label for="exampleInputEmail1" class="form-label">Fasilitas</label>
                        <select class="form-select" required id="id_fasilitas" name="id_fasilitas" aria-label="Floating label select example">
                            <option selected>-- Pilih Fasilitas --</option>
                            <?php
                            if (!empty($fasilitas)) {
                                foreach ($fasilitas as $u) {
                            ?>
                                    <option value="<?php echo $u['id_fasilitas']; ?>"><?php echo $u['keterangan']; ?>
                                    </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3 mt-2">
                        <h5>Lokasi Wisata</h5>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Long</label>
                                <input type="text" id="longitude" name="longitude" class="form-control" id="exampleInputPassword1">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Lat</label>
                                <input type="text" id="latitude" name="latitude" class="form-control" id="exampleInputPassword1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="map" style="width: 100%; height: 300px; border-radius: 10px"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control" id="foto">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" id="keterangan">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    // Creating map options
    var map = L.map('map').setView([-10.5390, 121.8686], 11);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© ESC17'
    }).addTo(map);

    var assetLayerGroup = new L.LayerGroup();
    map.on('click', function(e) {
        assetLayerGroup.clearLayers();
        map.addLayer(assetLayerGroup);
        document.getElementById('longitude').value = e.latlng.lng;
        document.getElementById('latitude').value = e.latlng.lat;

        var mp = new L.Marker([e.latlng.lat, e.latlng.lng]);
        map.eachLayer((layer) => {
            if (layer instanceof L.Marker) {

            }
        });
        assetLayerGroup.addLayer(mp);
    });
</script>
<!-- Table End -->
<?php echo view('layout/footer'); ?>