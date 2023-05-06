<div class="col-lg-8">
    <form action="<?= base_url('user/p_e_user/' . $user['id_user']) ?>" method="POST" class="mb-5" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input value='<?= $user['nama'] ?>' type="text" name="nama" class="form-control" id="nama" autofocus value="<?= set_value('nama') ?>" required>
        </div>
        <div class="mb-3">
            <label for="telp" class="form-label">Nomor Telepon</label>
            <input value='<?= $user['no_telp_user'] ?>' type="text" name="telp" class="form-control" id="no_telp_user" value="<?= set_value('no_telp_user') ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input value='<?= $user['email_user'] ?>' type="text" name="email" class="form-control" id="email_user" autofocus value="<?= set_value('email_user') ?>" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Lengkap</label>
            <input value='<?= $user['alamat'] ?>' type="text" name="alamat" class="form-control" id="alamat" value="<?= set_value('alamat') ?>" required>
        </div>
        <button class="btn btn-primary" type="submit">Simpan</button>
    </form>
</div>