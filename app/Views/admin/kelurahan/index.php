<?php echo view('layout/header'); ?>

<!-- Table Start -->

<div class="container-fluid pt-4 ">
    <div class="row">

        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">

                <h4 class="mb-9"><?php echo $title ?> <a href="/kecamatan/create" class="btn btn-success rounded-pill m-2 btn-sm">+
                        Tambah</a>
                </h4>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">kelurahan</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">#</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1;?>
                        <?php foreach ($kelurahan as $k ): ?>
                            <tr>
                                <th scope="row"><?= $i++;?></th>
                                <td><?= $k['nama_kelurahan'];?> </td>
                                <td><?= $k['keterangan']; ?></td>
                                <td>

                                    <a href="/kelurahan/edit/<?=$k['id_kelurahan'];?>" class="btn btn-primary">Edit</a>
                                    <form action="/kelurahan/<?=$k['id_kelurahan'];?>" class="d-inline" method="post">
                                    <?= csrf_field();?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                  </form>
                                </td>
                            </tr>

                     <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->
<?php echo view('layout/footer'); ?>