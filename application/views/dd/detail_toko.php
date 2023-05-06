<div class="row my-3">
    <div class="card col-md-8">
        <div class="card-body">

            <a href="#" class="btn btn-sm btn-primary tambahFoto" onclick="tampilInput()">
                <span data-feather="x-circle"></span>
                Tambahkan Bunga</a>

            <a href="<?= base_url('admin/del_toko/' . $toko['id_ins']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                <span data-feather="x-circle"></span>
                Hapus</a>


            <div style="max-height: 350px; overflow:hidden;">
                <img src="<?= base_url('toko/' . $toko['cover']) ?>" alt="<?= $toko['nama_instansi'] ?>" class="img-fluid mt-3">
            </div>


            <table class="table mt-4">
                <tr>
                    <td>Nama Pengguna</td>
                    <td>: <?= $username ?></td>
                </tr>
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
    <div class="card col-md-4">
        <div class="card-body">
            <form action="<?= base_url('Admin/add_bunga') ?>" method="POST" class="inputFoto d-none" enctype="multipart/form-data">
                <div class="input-group text-ask">
                    <h6>Tambahkan Foto Dokumentasi ?</h6>
                </div>
                <img class="img-preview img-fluid mb-3">
                <div class="input-group">
                    <input type="text" name="nama_bunga" class="form-control" placeholder="nama bunga">
                </div>
                <div class="input-group">
                    <input type="text" name="harga" class="form-control" placeholder="harga">
                </div>
                <div class="input-group">
                    <input type="text" name="id_ins" value="<?= $toko['id_ins'] ?>" hidden>
                    <input type="file" class="form-control imgInput" name="image" onchange="previewImage()">
                    <button class="btn btn-primary" type="submit" id="button-addon2">
                        Tambahkan
                    </button>
                </div>
                <hr>
            </form>
            <script>
                function tampilInput() {
                    const formInput = document.querySelector('.inputFoto');
                    formInput.classList.remove('d-none');
                }

                function previewImage() {
                    const txtask = document.querySelector('.text-ask');
                    const image = document.querySelector('.imgInput');
                    const imgPreview = document.querySelector('.img-preview');

                    imgPreview.style.display = 'block';
                    txtask.style.display = 'none';

                    const oFReader = new FileReader();
                    oFReader.readAsDataURL(image.files[0]);

                    oFReader.onload = function(oFREvent) {
                        imgPreview.src = oFREvent.target.result;
                    }
                }
            </script>

            <?php
            foreach ($tampil as $f) {
            ?>
                <img src="<?= base_url('bunga/' . $f['foto']) ?>" alt="" class="img-thumbnail">
                <a href="<?= base_url('Dashboard/detail_bunga/' . $f['id_bunga']) ?>">
                    <p class="text-center"><b><?= $f['nama_bunga'] ?></b></p>
                </a>
                <p class="text-center"><b><?= $f['harga'] ?></b></p>

            <?php
            }
            ?>
        </div>
    </div>
</div>