<div class="row my-3">
    <div class="card col-md-6">
        <div class="card-body">

            <a href="<?= base_url('instansi/e_toko') ?>" class="btn btn-sm btn-warning">
                <span data-feather="edit"></span>
                Edit</a>

            <div style="max-height: 540px; overflow:hidden;">
                <img src="<?= base_url('toko/' . $toko['cover']) ?>" alt="<?= $toko['nama_instansi'] ?>" class="img-fluid mt-3">
            </div>

            <table class="table mt-4">
                <tr>
                    <td>Nama Pemilik</td>
                    <td>: <?= $toko['nama_pemilik'] ?></td>
                </tr>
                <tr>
                    <td>No.Telepon</td>
                    <td>: <?= $toko['no_telp'] ?></td>
                </tr>
                <tr>
                    <td>Alamat Lengkap</td>
                    <td>: <?= $toko['alamat_toko'] ?></td>
                </tr>
            </table>
            <article class="my-3 fs-6" style="text-align:justify;">
                <?= $toko['deskripsi'] ?>
            </article>
        </div>
    </div>

    <div class="card col-md-6">
        <div class="card-header">
            <form action="<?= base_url('instansi/add_banking') ?>" method="POST">
                <div class="row">

                    <div class="col-md-5">
                        <label for="e_banking" class="form-label">Metode Pembayaran</label>
                        <select name="e_banking" id="e_banking" class="form-select" onchange="show_btn(this)">
                            <option hidden value="Pilih">Pilih</option>
                            <option value="BRI">BRI</option>
                            <option value="BNI">BNI</option>
                            <option value="DANA">DANA</option>

                        </select>
                    </div>
                    <div class="col-md-7">
                        <label for="no_rek" class="form-label">No. Rekening</label>
                        <input type="text" name="no_rek" id="no_rek" class="form-control" required>
                    </div>
                    <div class="col-md-12 mt-1">
                        <button type="submit" class="btn btn-primary" id="btn_submit">Tambah</button>
                    </div>

                </div>
            </form>
            <script>
                var btn_submit = document.querySelector('#btn_submit').classList;
                btn_submit.add('d-none');

                //menampilkan input upload
                function show_btn(what) {
                    if (what.form.e_banking.value == 'Pilih') {
                        btn_submit.add('d-none');
                    } else {
                        btn_submit.remove('d-none');
                    }
                }
            </script>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama E-Banking</th>
                            <th>No. Rek</th>
                            <th>Del</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($payment as $p) { ?>
                            <tr>
                                <td><?= $p['nama_mp'] ?></td>
                                <td><?= $p['nomor_rek'] ?></td>
                                <td>
                                    <a href="<?= base_url('instansi/hapus_banking/' . $p['id_mtp']) ?>" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>