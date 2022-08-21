<?php echo view('layout/header'); ?>

<!-- Table Start -->

<div class="container-fluid pt-4 ">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h4 class="mb-4"><?php echo $title ?></h4>

                <form action="/jenis/update/<?= $jenis['id_jenis']; ?>" method="post">
                <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">jenis wisata</label>
                        <input type="text" class="form-control" value="<?= $jenis['nama_jenis']; ?>" id="jenis" name="jenis" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" value="<?= $jenis['keterangan']; ?>" name="Keterangan" id="Keterangan">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                
            </div>

        </div>
    </div>
</div>
<!-- Table End -->
<?php echo view('layout/footer'); ?>
