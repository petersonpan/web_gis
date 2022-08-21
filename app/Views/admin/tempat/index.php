<?php echo view('layout/header'); ?>

<!-- Table Start -->

<div class="container-fluid pt-4 ">
    <div class="row">

        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">

                <h4 class="mb-9"><?php echo $title ?> <a href="/tempat/create"
                        class="btn btn-success rounded-pill m-2 btn-sm">+
                        Tambah</a>
                </h4>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Tempat</th>
                                <th scope="col">Nama Kecamatan</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Jarak</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($tempat_wisata as $k) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $k['nama_tempat']; ?> </td>
                                <td><?= $k['nama_kecamatan']; ?></td>
                                <td><?= $k['keterangan_tempat']; ?></td>
                                <td><?= $k['jarak']; ?></td>
                                <td>

                                    <a href="/tempat/edit/<?= $k['id_tempat']; ?>" class="btn btn-primary">Edit</a>
                                    <form action="/tempat/<?= $k['id_tempat']; ?>" class="d-inline" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->
<?php echo view('layout/footer'); ?>