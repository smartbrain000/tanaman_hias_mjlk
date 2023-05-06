<div class="card">
    <div class="card-header">
        <h4>Nama Toko :
            <a href="<?= base_url("post/detail/" . $order['id_ins']) ?>" target="_blank" class="text-decoration-none"><?= $order['nama_instansi'] ?></a>
        </h4>
        <p>Waktu Order : <?= $order['waktu_order'] ?></br>
            Berakhir : <?= $order['expired'] ?></p>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-bordered responsive dataTable" <?= ($tampil->num_rows() > 10) ? 'id="styleTable"' : ''; ?> width="100%">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Bunga</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah Dipesan</th>
                        <th scope="col">Total Harga</th>
                        <?php if (($order['status_order'] == "") || ($order['status_order'] == "pending")) { ?>
                            <th scope="col">Aksi</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($tampil->result_array() as $t) { ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td>
                                <a href="<?= base_url("post/detail_bunga/" . $t['id_bunga']) ?>">
                                    <?= $t['nama_bunga'] ?>
                                </a>
                            </td>
                            <td>
                                Rp <?= number_format($t['total_harga'] / $t['jumlah_dipesan']) ?>
                            </td>
                            <td>
                                <?= $t['jumlah_dipesan'] ?>
                            </td>
                            <td>
                                Rp <?= number_format($t['total_harga']) ?>
                            </td>
                            <?php if (($order['status_order'] == "") || ($order['status_order'] == "pending")) { ?>
                                <td>
                                    <a href="<?= base_url("user/hapus_item/" . $t['id_item']) ?>" class="btn btn-danger btn-sm">
                                        Hapus
                                    </a>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#styleTable').DataTable({
                        language: {
                            url: "<?= base_url('assets/tables/ID.json') ?>",
                        },
                    });
                });
            </script>
        </div>
    </div>
    <div class="card-footer">
        <form action="<?= base_url('user/p_check_out/' . $order['id_order']) ?>" method="post" enctype="multipart/form-data">
            <table class="table">
                <tbody>
                    <tr>
                        <td align="right"><b>Total Pembayaran : </b></td>
                        <td width="40%">Rp <?= number_format($order['total_pembayaran']) ?></td>
                    </tr>
                    <tr>
                        <td align="right"><b>Metode Pembayaran : </b></td>
                        <td>
                            <?php if ($order['type_payment'] == null) { ?>
                                <select name="type_payment" id="type_payment" class="form-select" onchange="show_upload(this)">
                                    <?= ($order['type_payment'] == null)
                                        ? '<option value="Pilih" hidden>Pilih Metode Pembayaran</option>'
                                        : '<option value="' . $order['type_payment'] . '" hidden>' . $order['type_payment'] . '</option>';

                                    ?>
                                    <option value="Cash">Cash</option>
                                    <option value="Transfer">Transfer</option>

                                </select>
                            <?php
                            } else {
                            ?>
                                <input type="hidden" name="type_payment" value="<?= $order['type_payment'] ?>">
                            <?php
                                echo $order['type_payment'] . ' ' . $order['bank'];
                            }
                            ?>

                        </td>
                    </tr>
                    <?php if (($order['status_order'] != 'proses')
                        && ($order['status_order'] != 'berhasil')
                        && ($order['status_order'] != 'dibatalkan')
                    ) { ?>
                        <tr id="form_upload_bukti">
                            <td align="right" valign="middle"><b>Upload Bukti Pembayaran</b></td>
                            <td>
                                <?php if ($order['bukti_transfer'] == null) { ?>

                                    <select name="e_banking" id="e_banking" class="form-select">
                                        <option value=""></option>
                                        <?php
                                        $where = ['id_ins' => $order['id_ins']];
                                        $payment = $this->db->get_where('metode_pembayaran', $where)->result_array();
                                        foreach ($payment as $p) { ?>
                                            <option value="<?= $p['nama_mp'] ?>"><?= $p['nama_mp'] . ' ' . $p['nomor_rek'] ?></option>
                                        <?php } ?>
                                    </select>

                                    <img id="img_bukti_tf" width="100%" class="img-preview">
                                    <input type="file" name="bukti_tf" id="bukti_tf" class="form-control imgInput" onchange="previewImage()">

                                <?php } else { ?>
                                    <input type="hidden" name="e_banking" value="<?= $order['bank'] ?>">
                                    <a href="<?= base_url("bukti_tf/" . $order['bukti_transfer']) ?>" target="_blank">
                                        <?= $order['bukti_transfer'] ?>
                                    </a>

                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                    <?php if (($order['status_order'] != 'proses')
                        && ($order['status_order'] != 'berhasil')
                        && ($order['status_order'] != 'dibatalkan')
                    ) { ?>
                        <tr>
                            <td colspan="2" align="right">
                                <input type="submit" class="btn btn-primary" id="btn_submit" value="Check Out">
                            </td>
                        </tr>
                    <?php } ?>


                </tbody>
            </table>
            <script>
                var btn_submit = document.querySelector('#btn_submit').classList;
                var form_bukti = document.getElementById('form_upload_bukti').classList;

                <?php
                if (($order['type_payment'] == null) ||
                    (($order['type_payment'] == 'Cash') && ($order['bukti_transfer'] == null))

                ) {
                ?>
                    btn_submit.add('d-none');
                    form_bukti.add('d-none');

                <?php } ?>

                //menampilkan input upload
                function show_upload(what) {
                    if (what.form.type_payment.value == 'Pilih') {
                        btn_submit.add('d-none');
                    }

                    if (what.form.type_payment.value == 'Transfer') {
                        form_bukti.remove('d-none');

                        <?= (($order['type_payment'] == null) ||
                            (($order['type_payment'] == 'Transfer')
                                && ($order['bukti_transfer'] == null)
                            )
                        ) ? "btn_submit.remove('d-none');" : ''; ?>

                    } else {
                        form_bukti.add('d-none');

                        <?= (($order['type_payment'] == null) ||
                            (($order['type_payment'] == 'Transfer')
                                && ($order['bukti_transfer'] == null)))
                            ? "btn_submit.remove('d-none');" : ''; ?>

                    }
                }

                //menampilkan image yang di upload
                function previewImage() {
                    const image = document.querySelector('.imgInput');
                    const imgPreview = document.querySelector('.img-preview');

                    imgPreview.style.display = 'block';

                    const oFReader = new FileReader();
                    oFReader.readAsDataURL(image.files[0]);

                    oFReader.onload = function(oFREvent) {
                        imgPreview.src = oFREvent.target.result;
                    }
                }
            </script>
        </form>
    </div>
</div>