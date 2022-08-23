<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
            integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

        <title>Login</title>
    </head>
    <!-- <style>
    body {
        background-color: #F0F8FF;
    }
    </style> -->

    <body>
        <div class="container mt-5 col-4">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Login</h3>
                </div>
                <div class="card-body">

                    <div class="col-12">

                        <!-- <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                        <?php endif; ?> -->
                        <form action="<?php echo base_url('login/aksi_login'); ?>" method="post">
                            <div class="mb-3">
                                <label for="InputForEmail" class="form-label">Username</label>
                                <input type="text" placeholder="Masukan Username" name="username" class="form-control"
                                    id="InputForEmail">
                            </div>
                            <div class="mb-3">
                                <label for="InputForPassword" class="form-label">Password</label>
                                <input type="password" placeholder="Masukan Password" name="password"
                                    class="form-control" id="InputForPassword">
                            </div>
                            <input type="submit" value="LOGIN" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!-- Popper.js first, then Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
            integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
        </script>
    </body>

</html>