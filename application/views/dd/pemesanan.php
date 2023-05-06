<div class="table-responsive">

    <table class="table table-bordered responsive dataTable" id="styleTable" width="100%">
        <thead>
            <tr>
                <th scope="col">Waktu</th>
                <th scope="col">Nama Toko</th>
                <th scope="col">Total Pembayaran</th>
                <th scope="col">Type Payment</th>
                <th scope="col">Bukti</th>
                <th scope="col">status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tampil as $t) { ?>
                <tr>
                    <td>
                        <a href="<?= base_url("user/detail_order/" . $t['id_order']) ?>">
                            <?= $t['waktu_order'] ?>
                        </a>
                    </td>
                    <td>
                        <a href="<?= base_url("post/detail/" . $t['id_ins']) ?>">
                            <?= $t['nama_instansi'] ?>
                        </a>
                    </td>
                    <td>
                        <?= number_format($t['total_pembayaran']) ?>
                    </td>
                    <td>
                        <?= $t['type_payment'] ?>
                    </td>
                    <td>

                        <?php
                        if (($t['type_payment'] == 'Transfer') && ($t['bukti_transfer'] == null)) {
                            if ($t['status_order'] != 'dibatalkan') {
                        ?>

                                <a href="<?= base_url("user/detail_order/" . $t['id_order']) ?>">
                                    Upload Bukti TF
                                </a>

                            <?php
                            }
                        } else { ?>

                            <a href="<?= base_url("bukti_tf/" . $t['bukti_transfer']) ?>" target="_blank">
                                <?= $t['bukti_transfer'] ?>
                            </a>

                        <?php } ?>

                    </td>
                    <td>
                        <?= status_order($t['status_order']) ?>
                    </td>
                    <td>
                        <?php if (($t['status_order'] != 'dibatalkan') && ($t['status_order'] != 'berhasil')) { ?>
                            <a href="<?= base_url("user/batal/" . $t['id_order']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin membatalkan pemesanan ini?')">
                                Batal
                            </a>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
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