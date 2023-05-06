<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <title>REGISTRASI</title>

    <link href="<?= base_url() ?>register/register.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>register/main.css" rel="stylesheet" media="all">
    <meta name="robots" content="noindex, follow">

</head>

<body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">REGISTRASI</h2>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <form method="POST" action="<?= base_url("auth/register") ?>" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="name">Foto Toko</div>
                            <div class="value">
                                <div class="input-group ">
                                    <input type="file" name="image" id="file" required>
                                </div>
                                <div class="label--desc">Upload foto Toko/Tempat. Maximal ukuran file 7 MB</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Nama Toko</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="nama_toko" value="<?= set_value('nama_toko') ?>">
                                <?= form_error('nama_toko', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Deskripsi</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="deskripsi" placeholder="Masukkan deskripsi"></textarea>
                                </div>
                                <?= form_error('deskripsi', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">*Nama Pemilik</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="nama_pemilik" value="<?= set_value('nama_pemilik') ?>">
                                <?= form_error('nama_pemilik', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Alamat Lengkap</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="alamat" placeholder="Masukkan alamat lengkap"></textarea>
                                    <?= form_error('alamat', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>

                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">No telp</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="no_telp" value="<?= set_value('no_telp') ?>">
                                <?= form_error('no_telp', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="email" value="<?= set_value('email') ?>">
                                    <?= form_error('email', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="password" name="password">
                                    <?= form_error('password', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>

                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <input class="btn btn--radius-2 btn--blue-2" type="submit" Value="Simpan">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('register') ?>/jquery/jquery.min.js"></script>

    <script src="<?= base_url('register') ?>/global.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"6dbc43ab6a473550","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.12.0","si":100}' crossorigin="anonymous"></script>
</body>

</html>