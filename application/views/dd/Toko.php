<a href="<?= base_url("admin/i_toko") ?>" class="btn btn-dark">TAMBAH TOKO</a>
<div class="table-responsive mt-2">
    <table class="table table-bordered responsive dataTable" id="styleTable" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Toko</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($tampil as $t) { ?>
                <tr>
                    <td><?= $no ?></td>
                    <td>
                        <a href="<?= base_url("admin/detail/" . $t['id_ins']) ?>">
                            <?= $t['nama_instansi'] ?>
                        </a>
                    </td>
                    <td><?= $t['alamat_toko'] ?></td>
                    <td>
                        <?php
                        if ($t['status'] != '1') {
                        ?>
                            <a href="<?= base_url("admin/acc_toko/" . $t['id_ins']) ?>" class="btn btn-success btn-sm">
                                ACC
                            </a>
                        <?php } ?>
                        <a href="<?= base_url("admin/e_toko/" . $t['id_ins']) ?>" class="btn btn-info btn-sm">
                            edit
                        </a>
                        <a href="<?= base_url("admin/del_toko/" . $t['id_ins']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin ingin menghapus <?= $t['nama_instansi'] ?> ')">
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