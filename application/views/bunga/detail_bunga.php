<div class="row my-3">
    <div class="card col-md-8">
        <div class="card-body">

            <?php //HANYA Instansi yang dapat mengedit data bunga
            if ($_SESSION['level'] == '2') : ?>
                <a href="<?= base_url('bunga/e_bunga/' . $bunga['id_bunga']) ?>" class="btn btn-sm btn-warning">
                    <span data-feather="edit"></span>
                    Edit</a>
            <?php endif; ?>

            <div style="overflow:hidden;">
                <img src="<?= base_url('bunga/' . $bunga['foto']) ?>" alt="<?= $bunga['nama_bunga'] ?>" class="img-fluid mt-3">
            </div>


            <table class="table mt-4">
                <tr>
                    <td>Nama Bunga</td>
                    <td>: <?= $bunga['nama_bunga'] ?></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>: Rp <?= number_format($bunga['harga']) ?></td>
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td>: <?= $bunga['jumlah'] ?></td>
                </tr>
                <tr>
                    <td>Nama Toko</td>
                    <td>: <?= $bunga['toko'] ?></td>
                </tr>
            </table>
            <article class="my-3 fs-6" style="text-align:justify;">
                <?= $bunga['deskripsi'] ?>
            </article>
        </div>
    </div>
</div>