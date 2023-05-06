<div class="card">
    <div class="card-header">
        <h4>Nama Toko :
            <a href="<?= base_url("post/detail/" . $order['id_ins']) ?>" target="_blank" class="text-decoration-none">
                <?= $order['nama_instansi'] ?></a>
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


        <table class="table">
            <tbody>
                <tr>
                    <td align="right"><b>Total Pembayaran : </b></td>
                    <td width="40%">Rp <?= number_format($order['total_pembayaran']) ?></td>
                </tr>
                <tr>
                    <td align="right"><b>Metode Pembayaran : </b></td>
                    <td>
                        <?php
                        if ($order['type_payment'] == null) {
                            echo "Belum memilih";
                        } else {
                            echo $order['type_payment'] . ' ' . $order['bank'];
                        }
                        ?>

                    </td>
                </tr>

                <?php if (($order['bukti_transfer'] == null) || ($order['bukti_transfer'] == 'Transfer')) { ?>
                    <tr>
                        <td align="right" valign="middle"><b>Bukti Pembayaran :</b></td>
                        <td>
                            <?php if ($order['bukti_transfer'] == null) {
                                echo "Belum di Upload";
                            } else { ?>

                                <a href="<?= base_url("bukti_tf/" . $order['bukti_transfer']) ?>" target="_blank">
                                    <?= $order['bukti_transfer'] ?>
                                </a>

                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>