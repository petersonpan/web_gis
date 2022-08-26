<?php echo view('layout/header'); ?>

<!-- Table Start -->

<div class="container-fluid pt-4 ">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h4 class="mb-4"><?php echo $title ?></h4>
                <?php $validation = \Config\Services::validation(); ?>

                <form action="/jenis/update/<?= $jenis['id_jenis']; ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Jenis wisata</label>
                        <input type="text" value="<?= $jenis['nama_jenis'] ?>" class="form-control <?= $validation->hasError('jenis')   ?  'is-invalid' : null ?>" autofocus id="jenis" name="jenis">

                        <div class="invalid-feedback">
                            <?= $validation->getError('jenis'); ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                        <input type="text" value="<?= $jenis['keterangan'] ?>" class="form-control <?= $validation->hasError('keterangan')   ?  'is-invalid' : null ?>" autofocus id="keterangan" name="keterangan">
                        <div class="invalid-feedback">
                            <?= $validation->getError('keterangan'); ?>
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