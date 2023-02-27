<?php echo view('layout/header'); ?>

<!-- Table Start -->

<div class="container-fluid pt-4 ">
    <div class="row">

        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">

                <h4 class="mb-9"><?php echo $title ?> <a href="/jenis/create" class="btn btn-success rounded-pill m-2 btn-sm">+
                        Tambah</a>
                </h4>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Jenis Wisata</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($jenis_wisata as $k) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $k['nama_jenis']; ?> </td>
                                    <td><?= $k['keterangan']; ?></td>
                                    <td>
                                        <img src="<?= base_url() . '/img/' . $k['gambar'] ?>" width="200px">
                                    </td>
                                    <td>

                                        <a href="/jenis/edit/<?= $k['id_jenis']; ?>" class="btn btn-primary">Edit</a>
                                        <form action="/jenis/<?= $k['id_jenis']; ?>" class="d-inline" method="post">`
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