<?php echo view('layout/header'); ?>

<!-- Table Start -->

<div class="container-fluid pt-4 ">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h4 class="mb-4"><?php echo $title ?></h4>

                <form method="post" action="/wisata/simpan" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Wisata</label>
                        <input type="text" name="nama_wisata" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jenis Wisata</label>
                        <select class="form-select" required id="floatingSelect" name="id_jenis"
                            aria-label="Floating label select example">
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
                        <select class="form-select" required id="floatingSelect" name="id_tempat"
                            aria-label="Floating label select example">
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
                        <select class="form-select" required id="floatingSelect" name="id_fasilitas"
                            aria-label="Floating label select example">
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
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Longitude</label>
                        <input type="text" name="longitude" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Latitude</label>
                        <input type="text" name="latitude" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control" id="exampleInputPassword1">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                 </form>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Table End -->
<?php echo view('layout/footer'); ?>