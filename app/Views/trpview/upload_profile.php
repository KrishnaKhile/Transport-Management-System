<?php $page_session = \config\Services::session(); ?>

<?php $validation =  \Config\Services::validation(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Krushna Logitech</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url('assets/img/truck.png'); ?>" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">



</head>

<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="<?= base_url() ?>/dashboard" class="logo d-flex align-items-center w-auto">
                                    <img src="<?php echo base_url('assets/img/truck.png'); ?>" alt="">
                                    <span class="d-none d-lg-block">Welcome to Krushna Logistics Company</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Upload Your Profile image</h5>
                                        <!-- <p class="text-center small">Enter your username & password to login</p> -->
                                    </div>

                                    <?php
                                    if ($page_session->getTempdata('success')) :
                                    ?>
                                        <div class="alert alert-success"><?= $page_session->getTempdata('success'); ?></div>

                                    <?php
                                    endif;
                                    ?>


                                    <?php
                                    if ($page_session->getTempdata('error')) :
                                    ?>
                                        <div class="alert alert-danger"><?= $page_session->getTempdata('error'); ?></div>

                                    <?php
                                    endif;
                                    ?>



                                    <?= form_open_multipart(); ?>
                                    <div class="col-12">
                                        <div class="row mb-3">
                                            <label for="profileImage">Profile Image</label>

                                            <?php if ($userdata->profile_pic != '') : ?>
                                                <img src='<?= $userdata->profile_pic; ?>' alt='Profile'>
                                            <?php else : ?>
                                                <img src='<?php echo base_url() ?>/assets/img/profile-preview.png' alt='Profile'>
                                            <?php endif; ?>


                                        </div>
                                        <label for="yourUsername" class="form-label">Upload File</label>
                                        <div class="input-group">

                                            <input type="file" name="avatar" class="form-control">

                                        </div>
                                        <span class="text-danger"><?= display_error($validation, 'avatar'); ?></span>

                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 mb-3 mt-3" type="submit">Upload</button>
                                    </div>



                                    <?= form_close(); ?>

                                </div>
                            </div>

                            <div class="credits">

                                Designed by <a href="#">Krushna</a>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>


</body>

</html>