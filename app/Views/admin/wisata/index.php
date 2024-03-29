<?php echo view('layout/header'); ?>

<!-- Table Start -->

<div class="container-fluid pt-4 ">
    <div class="row">

        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">

                <h4 class="mb-9"><?php echo $title ?>
                    <a href="/wisata/create" class="btn btn-success rounded-pill m-2 btn-sm">+
                        Tambah</a>
                    <a href="/wisata/map" class="btn btn-outline-success rounded-pill btn-sm"><i class="bi bi-map px-2"></i>
                        Maps</a>
                </h4>

                <div class="table-responsive">
                    <table class="table"> 
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Wisata</th>
                                <th scope="col">Nama Tempat</th>
                                <th scope="col">Fasilitas</th>
                                <th scope="col">Koordinat</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($objek_wisata as $sd) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?php echo $sd['nama_wisata']; ?> <br>
                                        <span class="badge bg-secondary" style="font-size: 11px"><?php echo $sd['nama_jenis'];?></span>

                                    </td>
                                    <td><?php echo $sd['nama_tempat']; ?></td>
                                    <td><?php echo $sd['nama_fasilitas']; ?></td>
                                    <td><code><?php echo "lat: " . round($sd['longitude'], 2, PHP_ROUND_HALF_UP) . '<br> long: ' . round($sd['latitude'], 1, PHP_ROUND_HALF_UP); ?></code></td>
                                    <td class="align-middle">
                                        <a target="_blank" href="<?= base_url() ?>/img/<?= $sd['foto'] ?>">
                                            <img style="border-radius: 8px" src="<?= base_url() ?>/img/<?= $sd['foto'] ?>" width="100px" alt="">
                                        </a>
                                    </td>
                                    <td style="max-width: 200px;"><?php echo $sd['keterangan']; ?></td>
                                    <td>
                                        <a href="/wisata/edit/<?= $sd['id_wisata']; ?>" class="btn btn-primary">Edit</a>
                                        <form action="/wisata/<?= $sd['id_wisata']; ?>" class="d-inline" method="post">
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