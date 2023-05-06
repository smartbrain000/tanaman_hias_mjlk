<div class="card">
    <div class="card-header">
        <a href="<?= base_url("bunga/i_bunga") ?>" class="btn btn-dark">
            TAMBAH BUNGA
        </a>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered responsive dataTable" id="styleTable" width="100%">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Bunga</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($tampil as $t) { ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td>
                                <a href="<?= base_url("dashboard/detail_bunga/" . $t['id_bunga']) ?>">
                                    <?= $t['nama_bunga'] ?>
                                </a>
                            </td>
                            <td>
                                <?= $t['harga'] ?>
                            </td>
                            <td>
                                <?= $t['jumlah'] ?>
                            </td>
                            <td>
                                <img src="<?= base_url('bunga/' . $t['foto']) ?>" alt="" width="100px">
                            </td>
                            <td>
                                <a href="<?= base_url("bunga/del_bunga/" . $t['id_bunga']) ?>" class="btn btn-danger btn-sm">
                                    delete
                                </a>
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
</div>