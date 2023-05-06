<div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4">

    <?php foreach ($bunga_terbaru as $bunga) { ?>
        <div class="col-sm-6 col-lg-4 mb-4">
            <div class="card">
                <img class="card-img-top" width="100%" src="<?= base_url('bunga/' . $bunga['foto']) ?>" role="img">

                <div class="card-body">
                    <h5 class="card-title">
                        <a href="<?= base_url('post/detail_bunga/' . $bunga['id_bunga']) ?>">

                            <?= $bunga['nama_bunga'] ?>
                        </a>

                    </h5>
                    <p class="card-text">
                        Rp <?= $bunga['harga'] ?>,


                        <a href="<?= base_url('post/detail/' . $bunga['id_ins']) ?>">

                            <?= $bunga['toko'] ?>

                        </a>

                    </p>
                </div>
            </div>
        </div>

    <?php } ?>

</div>
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-center my-2">
            <?= $pagination; ?>
        </div>

    </div>
</div>