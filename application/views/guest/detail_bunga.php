<div class="row my-3">
    <div id="detail_bunga" class="card col-md-7">
        <div class="card-body">

            <div style="overflow:hidden;">
                <img src="<?= base_url('bunga/' . $bunga['foto']) ?>" alt="<?= $bunga['nama_bunga'] ?>" class="img-fluid mt-3">
            </div>

            <table class="table mt-4">
                <tr>
                    <td>Nama Bunga</td>
                    <td>: <?= $bunga['nama_bunga'] ?></td>
                </tr>
                <tr>
                    <td>harga</td>
                    <td>: <?= $bunga['harga'] ?></td>
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td>: <?= $bunga['jumlah'] ?></td>
                </tr>
                <tr>
                    <td>Nama Toko</td>
                    <td>: <a href="<?= base_url('post/detail/' . $bunga['id_ins']) ?>"><?= $bunga['toko'] ?></a>
                    </td>
                </tr>
                <?php if ($bunga['jumlah'] > 0) : ?>
                    <tr>
                        <td colspan="2" align="right">
                            <a href="#" class="btn btn-primary" id="order" onclick="return tampilOrder()">Tambahkan ke Keranjang Belanja</a>
                        </td>
                    </tr>
                <?php endif; ?>
            </table>
            <article class="my-3 fs-6" style="text-align:justify;">
                <?= $bunga['deskripsi'] ?>
            </article>
        </div>
        <script>
            function tampilOrder() {
                const formInput = document.querySelector('.order');
                formInput.classList.remove('d-none');
                document.getElementById('order').classList.add('d-none');
                document.getElementById('order_bunga').classList.add('col-md-8');
                document.getElementById('detail_bunga').classList.remove('col-md-7');
                document.getElementById('detail_bunga').classList.add('col-md-4');
            }
        </script>
    </div>
    <div id="order_bunga" class="card order d-none">
        <div class="card-header">
            Order Toko : <?= $bunga['toko'] ?>
        </div>
        <div class="card-body">
            <form action="<?= base_url('post/order_bunga') ?>" method="POST">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bunga</th>
                                <th>Harga</th>
                                <th>Jumlah Dipesan</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            if (!empty($_SESSION['id_user'])) {
                                $cek_order = $this->order_model->order_bunga($_SESSION['id_user'], $bunga['id_ins']);
                                if ($cek_order->num_rows() > 0) {
                                    $order = $cek_order->row_array();
                                    $id_order = $order['id_order'];
                                    $item = $this->order_model->get_item($id_order)->result_array();
                                    $total_pb = 0;
                                    foreach ($item as $t) {
                            ?>
                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td><?= $t['nama_bunga'] ?></td>
                                            <td>Rp <?= $t['total_harga'] / $t['jumlah_dipesan'] ?></td>
                                            <td class="text-center"><?= $t['jumlah_dipesan'] ?></td>
                                            <td>Rp <?= $t['total_harga'] ?></td>
                                        </tr>
                            <?php
                                        $total_pb += $t['total_harga'];
                                        $no++;
                                    }
                                } else {
                                    $total_pb = 0;
                                    $id_order = 0;
                                }
                            } else {
                                $total_pb = 0;
                                $id_order = 0;
                            }
                            ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td><?= $bunga['nama_bunga'] ?></td>
                                <td>Rp <?= $bunga['harga'] ?></td>
                                <td>
                                    <input type="text" name="jml_dipesan" id="jml_dipesan" onkeyup="countit(this)" style="width: 70px;">
                                    <input type="hidden" name="id_bunga" value="<?= $bunga['id_bunga'] ?>">
                                    <input type="hidden" name="id_ins" value="<?= $bunga['id_ins'] ?>">
                                    <div for="jml_dipesan" class="text-danger" id="notif_jml_dipesan"></div>
                                </td>
                                <td id="total"></td>
                            </tr>
                            <tr>
                                <td colspan="4"><b>Total Pembayaran</b></td>
                                <td id="total_pb"></td>
                            </tr>
                            <tr>
                                <td colspan="5" align="right">
                                    <input type="hidden" name="total_harga" id="total_harga">
                                    <input type="hidden" name="total_pembayaran" id="total_pembayaran">
                                    <button type="submit" class="btn btn-primary btn-block my-1 d-none" id="btn_simpan">Simpan</button>
                                    <?php
                                    if ($id_order != 0) :
                                    ?>
                                        <a href="<?= base_url('user/detail_order/' . $id_order) ?>" class="btn btn-warning">Check Out</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <script>
                        function countit(what) {
                            var jml_dipesan = what.form.jml_dipesan.value;
                            const input_jml_dipesan = document.getElementById('jml_dipesan');
                            const notif_jml_dipesan = document.getElementById('notif_jml_dipesan');
                            const text_total = document.getElementById('total');
                            const text_total_pb = document.getElementById('total_pb');
                            const btn_simpan = document.getElementById('btn_simpan');
                            if (jml_dipesan > <?= $bunga['jumlah'] ?>) {
                                input_jml_dipesan.classList.add('border-danger');
                                notif_jml_dipesan.innerHTML = '<small> Jumlah dipesan melebihi yang tersedia !!!</small>';
                                text_total.innerHTML = ' ';
                                what.form.total_pembayaran.value = ' ';
                                text_total_pb.innerHTML = ' ';
                                btn_simpan.classList.add('d-none');
                            } else if (jml_dipesan < 0) {
                                input_jml_dipesan.classList.add('border-danger');
                                notif_jml_dipesan.innerHTML = '<small> Jumlah dipesan tidak logis !!!</small>';
                                text_total.innerHTML = ' ';
                                what.form.total_pembayaran.value = ' ';
                                text_total_pb.innerHTML = ' ';
                                btn_simpan.classList.add('d-none');
                            } else {
                                btn_simpan.classList.remove('d-none');
                                input_jml_dipesan.classList.remove('border-danger');
                                notif_jml_dipesan.innerHTML = ' ';
                                var total = jml_dipesan * <?= $bunga['harga'] ?>;
                                what.form.total_harga.value = total;
                                text_total.innerHTML = 'Rp ' + total;
                                var total_pb = total + <?= $total_pb ?>;
                                what.form.total_pembayaran.value = total_pb;
                                text_total_pb.innerHTML = 'Rp ' + total_pb;
                            }
                        }
                    </script>
                </div>
            </form>
        </div>
    </div>
</div>