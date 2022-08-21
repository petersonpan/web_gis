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
                                foreach ($fasilitas as $sd) {
                                ?>
                            <tr>
                                <td><?php echo $sd['keterangans']; ?></td>
                                <td><?php echo $sd['last_name']; ?></td>
                                <td><?php echo $sd['email']; ?></td>
                                <td><?php echo $sd['mobile']; ?></td>
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