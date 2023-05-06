<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dashboard Sistem Informasi Tanaman Hias">
    <meta name="author" content="DEA JUWITA SUWARDI">

    <title> <?= $judul ?> </title>

    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/img/chosokabe.png') ?>">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables  -->
    <link href="<?= base_url() ?>assets/tables/css/datatables.min.css" rel="stylesheet">
    <script src="<?= base_url() ?>assets/tables/vendors.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/tables/js/datatable/datatables.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="<?= base_url() ?>assets/dashboard.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/style.css" rel="stylesheet">

</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-success flex-md-nowrap p-0 shadow">

        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><?= $_SESSION['title'] ?></a>
        &nbsp;
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </header>

    <div class="container-fluid">
        <div class="row">

            <?php $this->load->view('template/menu') ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"> <?= $judul ?> </h1>
                </div>

                <?= $this->session->flashdata('message'); ?>