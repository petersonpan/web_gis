<?php echo view('layout/header'); ?>

<!-- Table Start -->

<div class="container-fluid pt-4 ">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h4 class="mb-4"><?php echo $title ?></h4>
                <?php $validation = \Config\Services::validation(); ?>

                <form action="/jenis/simpan" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama Jenis</label>
                        <input type="text" value="<?= old('jenis') ?>" class="form-control <?= $validation->hasError('jenis')   ?  'is-invalid' : null ?>" autofocus id="jenis" name="jenis">
                        <div class="invalid-feedback">
                            <?= $validation->getError('jenis'); ?>

                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                        <input type="text" value="<?= old('keterangan') ?>" class="form-control <?= $validation->hasError('keterangan')   ?  'is-invalid' : null ?>" autofocus id="keterangan" name="keterangan">
                        <div class="invalid-feedback">
                            <?= $validation->getError('keterangan'); ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Foto Jenis Wisata</label>
                        <input type="file" name="foto" class="form-control" id="foto" required>
                        <span class="float-end text-sm text-muted">*Foto akan merepresentasikan jenis wisata ini</span>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

            </div>

        </div>
    </div>
</div>
<!-- Table End -->
<?php echo view('layout/footer'); ?>