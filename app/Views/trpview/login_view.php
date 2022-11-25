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
  <link href="<?php echo base_url('assets/img/favicon.png'); ?>" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
<style>
  main {
  background-image: url('<?php echo base_url('assets/img/loginback.jpg'); ?>');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center;
  background-size: cover;
  /* height: 100%;
  width: 100; */
}
</style>


</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="#" class="logo d-flex align-items-center w-auto">
                  <img src="<?php echo base_url('assets/img/truck.png'); ?>" alt="">
                  <!-- <span class="d-none d-lg-block">Welcome to Krushna Logistics Company</span> -->
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4 fw-bold">Login</h5>
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



                  <?= form_open(); ?>

                  <!-- <form class="row g-3 needs-validation" novalidate> -->

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" style="padding: 0.100rem 0.50rem;" id="inputGroupPrepend"><img style="height:33px ;" src="<?php echo base_url('assets/img/icons8-user-64.png'); ?>" alt=""></span>
                      <input type="text" name="username" class="form-control" id="yourUsername" value="<?= set_value('name'); ?>">

                    </div>
                    <span class="text-danger"><?= display_error($validation, 'username'); ?></span>

                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <div class="input-group has-validation">

                    <span class="input-group-text" style="padding: 0.100rem 0.50rem;" id="inputGroupPrepend"><img style="height:33px ;" src="<?php echo base_url('assets/img/icons8-password-80.png'); ?>" alt=""></span>

                    <input type="password" name="password" class="form-control" id="yourPassword">
                    </div>
                    <span class="text-danger"><?= display_error($validation, 'password'); ?></span>

                  </div>

                </div>

                <div class="col-12 px-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                  </div>
                </div>
                <div class="col-12 px-5">
                  <button class="btn btn-primary w-100 mb-3 fw-bold" type="submit">Login</button>
                  <a href="#"  data-bs-toggle="modal" data-bs-target="#passmodal" title="Forgot Your Password">Forgot Password</a>

                </div>
              
                <!-- </form> -->
                <?= form_close(); ?>

              </div>
            

            <div class="credits" style="color:#fff ;">

            Designed & Developed by <a href="#">Krushna</a>
            </div>
            </div>
          </div>
        </div>
    </div>

    </section>
    <div class="modal" id="passmodal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Forgot password</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <?= form_open('/trpadmin/login/passforgot'); ?>

<div class="card">
  <div class="card-body">
    <label for="yourUsername" class="form-label">Enter your registered Email</label>
    <div class="input-group has-validation">
        <span class="input-group-text" id="inputGroupPrepend">@</span>
        <input type="text" name="email" class="form-control"  value="<?= set_value('email'); ?>">

    </div>
    <span class="text-danger"><?= display_error($validation, 'email'); ?></span>
    <div class="col-12">
        <button class="btn btn-primary  mt-3" type="submit">Send Mail</button>
    </div>
    </div>
</div>
</div>


<?= form_close(); ?>


            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>


</body>

</html>