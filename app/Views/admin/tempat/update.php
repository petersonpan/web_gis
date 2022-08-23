<?php echo view('layout/header'); ?>

<!-- Table Start -->

<div class="container-fluid pt-4 ">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h4 class="mb-4"><?php echo $title ?></h4>
                <?php $validation = \Config\Services::validation();?>
                <form action="/tempat/update/<?= $tempat['id_tempat']; ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Tempat</label>
                        <input type="text" value="<?=$tempat['nama_tempat']?>" class="form-control <?=$validation->hasError('nama_tempat')   ?  'is-invalid' : null ?>" autofocus id="nama_tempat" name="nama_tempat">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_tempat'); ?>
                        </div>
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
                        <input type="text" value="<?=   $tempat['keterangan_tempat']?>" class="form-control <?=$validation->hasError('keterangan_tempat')   ?  'is-invalid' : null ?>" autofocus id="keterangan_tempat" name="keterangan_tempat">
                        <div class="invalid-feedback">
                            <?= $validation->getError('keterangan_tempat');?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Jarak</label>
                        <input type="text" value="<?=$tempat['jarak']?>" class="form-control <?=$validation->hasError('jarak')   ?  'is-invalid' : null ?>" autofocus id="jarak" name="jarak">
                        <div class="invalid-feedback">
                            <?= $validation->getError('jarak'); ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                   </form>

            </div>

        </div>
    </div>
</div>
<!-- Table End -->
<?php echo view('layout/footer'); ?>