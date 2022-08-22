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
                                <th scope="col">id_jenis</th>
                                <th scope="col">id_tempat</th>
                                <th scope="col">id_fasilitas</th>
                                <th scope="col">Longitude</th>
                                <th scope="col">foto</th>
                                <th scope="col">keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                foreach ($Object as $sd) {
                                ?>
                            <tr>
                                <td><?php echo $sd['nama_wisata']; ?></td>
                                <td><?php echo $sd['id_jenis']; ?></td>
                                <td><?php echo $sd['id_tempat']; ?></td>
                                <td><?php echo $sd['id_fasilitas']; ?></td>
                                <td><?php echo $sd['Longitude']; ?></td>
                                <td><?php echo $sd['Latitude']; ?></td>
                                <td><?php echo $sd['foto']; ?></td>
                                <td><a
                                        href="<?php echo base_url(); ?>/student/edit/<?php echo $sd['id']; ?>">Edit</a>&nbsp;<a
                                        href="<?php echo base_url(); ?>/student/delete/<?php echo $sd['id']; ?>">Delete</a>
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