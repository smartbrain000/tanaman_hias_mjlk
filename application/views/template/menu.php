<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?= base_url('Dashboard/index') ?>">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <?php
            //MENU ADMIN
            if ($_SESSION['level'] == "1") { ?>
                <li class="nav-item bg-info ">
                    <a class="nav-link text-white" href="<?= base_url('admin/toko') ?>">
                        <span data-feather="list" class="text-white"></span>
                        Daftar Toko
                    </a>
                </li>
            <?php }
            //MENU INSTANSI
            if ($_SESSION['level'] == "2") { ?>
                <li class="nav-item bg-info">
                    <a class="nav-link text-white" href="<?= base_url('instansi') ?>">
                        <span data-feather="list" class="text-white"></span>
                        Informasi Toko
                    </a>
                </li>
                <li class="nav-item bg-warning">
                    <a class="nav-link text-white" href="<?= base_url('bunga/jenis_bunga') ?>">
                        <span data-feather="sun" class="text-white"></span>
                        Jenis Bunga
                    </a>
                </li>
                <li class="nav-item bg-info">
                    <a class="nav-link text-white" href="<?= base_url('instansi/pembelian') ?>">
                        <span data-feather="file" class="text-white"></span>
                        Data Pembelian
                    </a>
                </li>
            <?php } ?>

            <li class="nav-item bg-info">
                <a class="nav-link text-white" href="<?= base_url('user/pemesanan') ?>">
                    <span data-feather="file" class="text-white"></span>
                    Data Pemesanan
                </a>
            </li>
            <li class="nav-item bg-secondary">
                <a class="nav-link text-white" href="<?= base_url('post/home') ?>">
                    <span data-feather="globe" class="text-white"></span>
                    Situs
                </a>
            </li>
            <li class="nav-item bg-warning">
                <a class="nav-link text-white" href="<?= base_url('Dashboard/ubah_password') ?>">
                    <span data-feather="sun" class="text-white"></span>
                    Ubah Password
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link bg-danger text-white" href="<?= base_url('auth/logout') ?>">
                    <span data-feather="log-out" class="text-white"></span>
                    Logout
                </a>
            </li>


        </ul>


    </div>
</nav>