<header class="p-3 bg-success text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    Tanaman Hias Kab.Majalengka
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li>
                    <a href="<?= base_url('post') ?>" class="nav-link px-2 text-white">
                        Tanaman Hias Kab.Majalengka
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('post') ?>" class="nav-link px-2 text-white">Beranda</a>
                </li>
                <li>
                    <a href="<?= base_url('post/bunga') ?>" class="nav-link px-2 text-white">Bunga</a>
                </li>

            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="<?= base_url('post/cari') ?>" method="POST">
                <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search" name="search" value="<?= set_value('search') ?>">
            </form>
            <?php if (empty($_SESSION['title'])) : ?>
                <div class="text-end">
                    <a href="<?= base_url('auth') ?>" class="btn btn-outline-light me-2">Login</a>
                    &nbsp;
                    <a href="<?= base_url('auth/register') ?>" class="btn btn-warning">Registrasi</a>

                </div>
            <?php else :
                echo '<a href="' . base_url('dashboard')  . '" class="btn text-white" > '  . $_SESSION['title'] . '</a> &nbsp;';
                echo '<a href="' . base_url('auth/logout')  . '" class="btn btn-danger text-white" > Logout</a>';

            endif; ?>
        </div>
    </div>
</header>