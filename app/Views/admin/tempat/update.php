<?php echo view('layout/header'); ?>

<!-- Table Start -->

<div class="container-fluid pt-4 ">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h4 class="mb-4"><?php echo $title ?></h4>

                <form action="/tempat/update/<?= $tempat['id_tempat']; ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama tempat</label>
                        <input type="text" class="form-control" value="<?= $tempat['nama_tempat']; ?>" id="tempat"
                            name="tempat" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Kecamatan</label>
                        <select class="form-select" required id="floatingSelect" name="id_kecamatan"
                            aria-label="Floating label select example">
                            <?php
                            if (!empty($kecamatan)) {
                                foreach ($kecamatan as $u) {
                            ?>
                            <option value="<?php echo $u['id_kecamatan']; ?>" <?php if ($tempat['id_kecamatan'] == $u['id_kecamatan']) {
                                                                                            echo 'selected ';
                                                                                        } ?>>
                                <?php echo $u['nama_kecamatan']; ?>
                            </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" value="<?= $tempat['keterangan_tempat']; ?>"
                            name="keterangan" id="Keterangan">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Jarak</label>
                        <input type="text" class="form-control" value="<?= $tempat['jarak']; ?>" name="jarak"
                            id="Keterangan">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

            </div>

        </div>
    </div>
</div>
<!-- Table End -->
<?php echo view('layout/footer'); ?>