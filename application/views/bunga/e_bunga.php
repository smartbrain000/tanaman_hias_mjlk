<link rel="stylesheet" type="text/css" href="<?= base_url() ?>trix/trix.css">
<script type="text/javascript" src="<?= base_url() ?>trix/trix.js"></script>

<div class="col-lg-8">
    <form action="<?= base_url('bunga/p_e_bunga/' . $bunga['id_bunga']) ?>" method="POST" class="mb-5" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama_bunga" class="form-label">Nama Bunga</label>
            <input type="text" name="nama_bunga" class="form-control" id="nama_bunga" value="<?= $bunga['nama_bunga'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" name="harga" class="form-control" id="harga" value="<?= $bunga['harga'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="text" name="jumlah" class="form-control" id="jumlah" value="<?= $bunga['jumlah'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Foto Bunga</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input type="file" class="form-control imgInput" id="image" name="image" onchange="previewImage()">
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="hidden" id="deskripsi" name="deskripsi" value="<?= $bunga['deskripsi'] ?>">
            <trix-editor input="deskripsi"></trix-editor>

        </div>
        <button class="btn btn-primary" type="submit">Simpan</button>
    </form>
</div>


<script>
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

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