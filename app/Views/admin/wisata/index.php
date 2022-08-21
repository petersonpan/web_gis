<?php echo view('layout/header'); ?>

<!-- Table Start -->

<div class="container-fluid pt-4 ">
    <div class="row">

        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">

                <h4 class="mb-9"><?php echo $title ?> <a href="/create"
                        class="btn btn-success rounded-pill m-2 btn-sm">+
                        Tambah</a>
                </h4>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Country</th>
                                <th scope="col">ZIP</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                foreach ($objek_wisata as $sd) {
                                ?>
                            <tr>
                                <td><?php echo $sd['nama_wisata']; ?></td>
                                <td><?php echo $sd['nama_jenis']; ?></td>
                                <td><?php echo $sd['nama_tempat']; ?></td>
                                <td><?php echo $sd['keterangan']; ?></td>
                                <td><?php echo $sd['longitude']; ?></td>
                                <td><?php echo $sd['latitude']; ?></td>
                                <td><?php echo $sd['foto']; ?></td>
                                <td><?php echo $sd['keterangan']; ?></td>
                                <td>

                                    <a href="/tempat/edit/<?= $k['id_tempat']; ?>" class="btn btn-primary">Edit</a>
                                    <form action="/tempat/<?= $k['id_tempat']; ?>" class="d-inline" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                                <td>

                                    <a href="/tempat/edit/<?= $k['id_tempat']; ?>" class="btn btn-primary">Edit</a>
                                    <form action="/tempat/<?= $k['id_tempat']; ?>" class="d-inline" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                                }
                        ?>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->
<?php echo view('layout/footer'); ?>