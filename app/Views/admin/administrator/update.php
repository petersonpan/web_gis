<?php echo view('layout/header'); ?>

<!-- Table Start -->

<div class="container-fluid pt-4 ">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h4 class="mb-4"><?php echo $title ?></h4>
                <?php $validation = \Config\Services::validation();?>
                <form action="/administrator/update/<?=$admin ['id_admin'] ?>" method="post">
                <?= csrf_field(); ?>
                
                <div class="mb-3">
                 <label for="exampleInputPassword1" class="form-label">username</label>
                    <input type="text" value="<?=$admin['username']?>" class="form-control <?=$validation->hasError('username')   ?  'is-invalid' : null ?>" autofocus id="username" name="username">
                    <div class="invalid-feedback">
                        <?= $validation->getError('username'); ?>

                         </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="text" value="<?=$admin['password']?>" class="form-control <?=$validation->hasError('password')   ?  'is-invalid' : null ?>" autofocus id="password" name="password">
                    <div class="invalid-feedback">
                        <?= $validation->getError('password'); ?>

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
