<div class="row">
    <h1>
        <?= $judul ?>
    </h1>
</div>

<div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4">


    <?php foreach ($instansi as $pd) { ?>
        <div class="col">
            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('<?= base_url("toko/" . $pd['cover']) ?>');">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                    <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">


                        <a href="<?= base_url("post/detail/" . $pd['id_ins']) ?>" class="text-decoration-none text-white">
                            <?= $pd['nama_instansi'] ?>
                        </a>
                    </h2>
                    <ul class="d-flex list-unstyled mt-auto">
                        <li class="me-auto">
                            <img src="<?= base_url("assets/img/logokabupatenmajalengka.jpg") ?>" width="32" height="32" class="rounded-circle border-border-white">
                        </li>
                        <li class="d-flex align-items-center me-3">
                            <svg class="bi me-2" width="1em" height="1em">
                                <use xlink:href="#geo-fill" />
                            </svg>
                            <small><?= $pd['alamat_toko'] ?></small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<div class="d-flex justify-content-center">
    <?= $pagination; ?>
</div>