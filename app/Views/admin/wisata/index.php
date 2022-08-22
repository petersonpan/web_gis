<?php echo view('layout/header'); ?>

<!-- Table Start -->

<div class="container-fluid pt-4 ">
    <div class="row">

        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">

                <h4 class="mb-9"><?php echo $title ?> <a href="/wisata/create"
                        class="btn btn-success rounded-pill m-2 btn-sm">+
                        Tambah</a>
                </h4>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Wisata</th>

                                <th scope="col">Jenis Wisata</th>
                                <th scope="col">Nama Tempat</th>
                                <th scope="col">Fasilitas</th>
                                <th scope="col">Longitude</th>
                                <th scope="col">Latitude</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <?php $i = 1; ?>
                                <?php foreach ($objek_wisata as $sd) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?php echo $sd['nama_wisata']; ?></td>
                                <td><?php echo $sd['nama_jenis']; ?></td>
                                <td><?php echo $sd['nama_tempat']; ?></td>
                                <td><?php echo $sd['keterangan']; ?></td>
                                <td><?php echo $sd['longitude']; ?></td>
                                <td><?php echo $sd['latitude']; ?></td>
                                <td><?php echo $sd['foto']; ?></td>
                                <td><?php echo $sd['keterangan']; ?></td>
                                <td>
                                    <a href="/tempat/edit/<?= $sd['id_wisata']; ?>" class="btn btn-primary">Edit</a>
                                    <form action="/tempat/<?= $sd['id_wisata']; ?>" class="d-inline" method="post">
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