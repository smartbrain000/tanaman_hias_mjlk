<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <?php if (!empty($_SESSION['csrf_token'])) : ?>
        <meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
    <?php endif; ?>


    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title><?= $judul ?></title>
    <link rel="shortcut icon" sizes="16x16" href="<?= base_url('assets/img/kab_mjlk.jpg') ?>">
    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/') ?>css/features.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/slg.css" rel="stylesheet">

    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
</head>

<body>
    <header>
        <?php $this->load->view('guest/navbar'); ?>

    </header>

    <main style="margin-top:0px">
        <div class="container px-5 py-5" id="custom-cards">

            <?php $this->load->view('guest/' . $file); ?>


        </div>
    </main>

    <?php $this->load->view('guest/botnav'); ?>


    <script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
    <script async src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous"></script>


    <?php if ($this->uri->segment('2') == 'detail') : ?>
        <script>
            $(document).ready(function() {
                //Mengirimkan Token Keamanan
                $.ajaxSetup({
                    headers: {
                        'Csrf-Token': $('meta[name="csrf-token" ]').attr('content')
                    }
                });
                $('#form_komen').on('submit', function(event) {
                    event.preventDefault();
                    let id_komentar = $('#id_komentar').val();
                    let id_ins = $('#id_ins').val();
                    let komen = $('#komen').val();
                    if (komen == '') {
                        alert("Komentar Harus disii");
                    } else {
                        var form_data = $(this).serialize();
                        $.ajax({
                            url: "<?= base_url('post/i_komentar') ?>",
                            method: "POST",
                            data: form_data,
                            success: function(data) {
                                console.log(form_data)
                                $('#form_komen')[0].reset();
                                $('#id_komentar').val('0');
                                setTimeout(function() {
                                    window.location.replace("<?= base_url('post/detail/' . $this->uri->segment('3')) ?>");
                                }, 1000);
                            },
                            error: function(data) {
                                console.log(data.responseText)
                            }
                        })
                    }
                });

                $(document).on('click', '.reply', function() {
                    var id_komentar = $(this).attr("id");
                    $('#id_komentar').val(id_komentar);
                    $('#komen').focus();
                });
            });
        </script>
    <?php endif; ?>

</body>

</html>