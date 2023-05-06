<div class="row my-3">
    <div class="col-md-8">


        <div class="card ">
            <div class="card-body">
                <div style="max-height: 540px; overflow:hidden;">
                    <img src="<?= base_url('toko/' . $toko['cover']) ?>" alt="<?= $toko['nama_instansi'] ?>" class="mt-3" width="100%">
                </div>
                <table class="table mt-4">
                    <tr>
                        <td>Nama Pemilik</td>
                        <td>: <?= $toko['nama_pemilik'] ?></td>
                    </tr>
                    <tr>
                        <td>No.Telepon</td>
                        <td>:
                            <a href="https://wa.me/<?= $toko['no_telp'] ?>" target="_blank">
                                <?= $toko['no_telp'] ?>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat Lengkap</td>
                        <td>: <?= $toko['alamat_toko'] ?></td>
                    </tr>
                </table>
                <article class="my-3 fs-6" style="text-align:justify;">
                    <?= $toko['deskripsi'] ?>
                </article>
                <div class="row">
                    <div class="col-md-12">
                        <script src="https://maps.google.com/maps/api/js?key=AIzaSyCDIivvFuzooFH4LHdTRj5_lbPmWR5W5y4" type="text/javascript"></script>
                        <div id="petaToko" style="width: 100%;height:500px">
                            <!-- INI PETA -->
                        </div>
                    </div>
                    <script>
                        (function() {
                            window.onload = function() {
                                var map;
                                //Parameter Google maps
                                var options = {
                                    zoom: 9, //level zoom
                                    //posisi tengah peta
                                    center: new google.maps.LatLng(-7.090911, 107.668887),
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                };
                                //Buat peta di
                                var map = new google.maps.Map(document.getElementById('petaToko'), options);
                                // Tambahkan Marker
                                var locations = [
                                    <?php
                                    echo "['" . $toko['nama_instansi'] . "',
                                    '" . $toko['lat'] . "',
                                    '" . $toko['lng'] . "'],";
                                    ?>
                                ];
                                var infowindow = new google.maps.InfoWindow();
                                var marker, i;
                                /* kode untuk menampilkan banyak marker */
                                for (i = 0; i < locations.length; i++) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        map: map,
                                        draggable: true,
                                        animation: google.maps.Animation.BOUNCE
                                    });
                                    /* menambahkan event clik untuk menampikan infowindows dengan isi sesuai denga marker yang di klik */
                                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                        return function() {
                                            infowindow.setContent(locations[i][0]);
                                            infowindow.open(map, marker);
                                        }
                                    })(marker, i));
                                }
                            };
                        })();
                    </script>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <?php if (!empty($_SESSION['username'])) : ?>
                            <form method="POST" id="form_komen">
                                <div class="form-group">
                                    <textarea name="komen" id="komen" class="form-control" placeholder="Tulis Komentar" rows="5"></textarea>
                                </div>
                                <div class="form=group">
                                    <input type="hidden" name="id_ins" id="id_ins" value="<?= $toko['id_ins'] ?>" />
                                    <input type="hidden" name="id_komentar" id="id_komentar" value="0" />
                                    <input type="submit" name="submit" id="submit" class="btn btn-info" value="submit" />
                                </div>
                            </form>
                        <?php endif; ?>
                        <hr>
                        <div id="display_comment">
                            <?php if ($komen['num_rows'] > 0) :
                                foreach ($komen['data'] as $row) :
                            ?>
                                    <div class="border p-2">

                                        <div class="row">
                                            <div class="col-sm-9">
                                                <p><b><?= $row["nama"] ?></b><br> <small><i><?= $row["waktu"] ?></i></small></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <p><?= $row["komentar"] ?></p>
                                            </div>
                                            <?php if (!empty($_SESSION['username'])) : ?>
                                                <div class="col-sm-2">

                                                    <button type="button" class="btn btn-primary btn-sm reply" id="<?= $row["id_komentar"] ?>">Reply</button>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <?php
                                                if ($row['child'] != 'nothing') :
                                                    foreach ($row['child'] as $row2) {
                                                ?>
                                                        <div class="media border p-2 mb-1" style="margin-left: 30px;">
                                                            <div class="media-body">
                                                                <div class="row">
                                                                    <div class="col-sm-9 my-1">
                                                                        <p><b><?= $row2['nama'] ?></b><br><small><i><?= $row2['waktu'] ?></i></small> </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <p><?= $row2['komentar'] ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php }
                                                endif;
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                            <?php endforeach;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">

        <div class="card">
            <div class="card-body">

                <?php
                foreach ($tampil as $f) {
                ?>
                    <img src="<?= base_url('bunga/' . $f['foto']) ?>" alt="" class="img-thumbnail">
                    <a href="<?= base_url('post/detail_bunga/' . $f['id_bunga']) ?>">
                        <p class="text-center"><b><?= $f['nama_bunga'] ?></b></p>
                    </a>
                    <p class="text-center"><b><?= $f['harga'] ?></b></p>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
</div>