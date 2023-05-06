<div class="row my-3">

    <!-- //INFORMASI USER -->
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header">
                <h5>Informasi User</h5>
            </div>
            <div class="card-body">
                <table class="table">

                    <tr>
                        <td width="40%">Nama</td>
                        <td>: <?= $user['nama'] ?></td>
                    </tr>
                    <tr>
                        <td>No.Telepon</td>
                        <td>: <?= $user['no_telp_user'] ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: <?= $user['email_user'] ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: <?= $user['alamat'] ?></td>
                    </tr>

                </table>
                <a href="<?= base_url("user/edit_user") ?>" class="btn btn-warning mt-2">
                    Edit
                </a>
            </div>
        </div>

        <?php
        $cek_toko = $this->db->get_where('instansi', ['id_user' => $_SESSION['id_user']]);
        $toko = $cek_toko->row_array();
        if ($cek_toko->num_rows() < 1) :
        ?>
            <a href="<?= base_url("user/buat_toko") ?>" class="btn btn-dark mt-2">
                Buat Toko
            </a>
        <?php endif; ?>
    </div>

</div>