<?php echo view('layout/header'); ?>

<!-- Table Start -->

<div class="container-fluid pt-4 ">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h4 class="mb-4"><?php echo $title ?></h4>

                <form action="/fasilitas/simpan" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                        <input type="text" required class="form-control" id="keterangan" name="keterangan"
                            aria-describedby="emailHelp">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

            </div>

        </div>
    </div>
</div>
<!-- Table End -->
<?php echo view('layout/footer'); ?>