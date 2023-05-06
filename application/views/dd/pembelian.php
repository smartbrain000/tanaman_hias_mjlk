<div class="table-responsive">

    <table class="table table-bordered responsive dataTable" id="styleTable" width="100%">
        <thead>
            <tr>
                <th scope="col">Waktu</th>
                <th scope="col">Pembeli</th>
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
                        <a href="<?= base_url("instansi/detail_order/" . $t['id_order']) ?>">
                            <?= $t['waktu_order'] ?>
                        </a>
                    </td>
                    <td>
                        <?= $t['nama'] ?>
                    </td>
                    <td>
                        <?= number_format($t['total_pembayaran']) ?>
                    </td>
                    <td>
                        <?= $t['type_payment'] ?>
                    </td>
                    <td>

                        <a href="<?= base_url("bukti_tf/" . $t['bukti_transfer']) ?>" target="_blank">
                            <?= $t['bukti_transfer'] ?>
                        </a>

                    </td>
                    <td>
                        <?= status_order($t['status_order']) ?>
                    </td>
                    <td>

                        <?php if ($t['status_order'] == 'proses') { ?>
                            <a href="<?= base_url("instansi/acc_pembelian/" . $t['id_order']) ?>" class="btn btn-warning btn-sm" onclick="return confirm('Apakah costumer sudah melakukan transaksi? Klik Batal jika belum')">
                                Validasi Pembayaran
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