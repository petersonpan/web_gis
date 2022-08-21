<?php echo view('layout/header'); ?>

<!-- Table Start -->

<div class="container-fluid pt-4 ">
    <div class="row">

        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">

                <h4 class="mb-9"><?php echo $title ?> <a href="#" class="btn btn-success rounded-pill m-2 btn-sm">+
                        Tambah</a>
                </h4>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Keterangan</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($tampildata as $sd) {
                            ?>
                            <tr>
                                <td><?php echo $sd['keterangan']; ?></td>

                                <td><a
                                        href="<?php echo base_url(); ?>/student/edit/<?php echo $sd['id_fasilitas']; ?>">Edit</a>&nbsp;<a
                                        href="<?php echo base_url(); ?>/student/delete/<?php echo $sd['id_fasilitas']; ?>">Delete</a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->
<?php echo view('layout/footer'); ?>