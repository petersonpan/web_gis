<?php echo view('layout/header'); ?>

<!-- Table Start -->

<div class="container-fluid pt-4 ">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h4 class="mb-4"><?php echo $title ?></h4>

                <form action="/fasilitas/update/<?= $fasilitas['id_fasilitas']; ?>" method="post">
                    <?= csrf_field(); ?>


                    <div class="mb-3">
                    <?php $validation = \Config\Services::validation();?>
                        <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                        <input type="text" value="<?= $fasilitas['keterangan']; ?>" class="form-control <?=$validation->hasError('keterangan')   ?  'is-invalid' : null ?>" autofocus 
                            name="keterangan" id="keterangan">
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