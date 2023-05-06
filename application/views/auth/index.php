<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("assets/img/") ?>">
    <title>login</title>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .text-left {
            text-align: left;
        }

        a {
            text-decoration: none;
        }
    </style>
    <link href="<?= base_url('assets/') ?>css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <?= $this->session->flashdata('message'); ?>
        <form method="POST" action="<?= base_url("auth/login") ?>">
            <img class="mb-4" src="<?= base_url('assets/img/') ?>" alt="" width="100">

            <div class="form-floating">
                <input type="username" class="form-control" id="floatingInput" name="username" placeholder="Username">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            <p class="text-left mt-2">
                <a href="<?= base_url() ?>">Kembali</a>
            </p>
            <p class="mt-5 mb-3 text-muted">&copy; copyright 2022
                <br>build with by. Dea Juwita Suwardi
                <br> UNIVERSITAS MAJALENGKA
            </p>
        </form>
    </main>


</body>

</html>