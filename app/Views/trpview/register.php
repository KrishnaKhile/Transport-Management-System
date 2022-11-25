<?php $page_session= \config\Services::session(); ?>
<?php $validation =  \Config\Services::validation(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register</title>
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

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                  </div>
                  <?php 
                  if($page_session->getTempdata('success')):
                    ?>
                    <div class="alert alert-success"><?= $page_session->getTempdata('success'); ?></div>

                  <?php
                  endif;
                  ?>
                  <?php 
                  if($page_session->getTempdata('error')):
                    ?>
                    <div class="alert alert-danger"><?= $page_session->getTempdata('error'); ?></div>

                  <?php
                  endif;
                  ?>
                 
                <?= form_open('/trpadmin/user/index'); ?>
                  <!-- <form class="row g-3 needs-validation" novalidate> -->
                    <div class="col-12">
                      <label for="yourName" class="form-label">Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" value="<?= set_value('name'); ?>">
                      <span class="text-danger"><?= display_error($validation,'name'); ?></span>
                    </div>
                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Contact Number</label>
                      <input type="number" name="mobile" class="form-control" id="yourMobile" value="<?= set_value('mobile'); ?>">
                      <span class="text-danger"><?= display_error($validation,'mobile'); ?></span>
                      
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" value="<?= set_value('email'); ?>">
                      <span class="text-danger"><?= display_error($validation,'email'); ?></span>
                      
                    </div>
                    <div class="col-12">
                      <label for="yourRole" class="form-label">Role</label>
                      <select name="role" class="form-select form-control" value="<?= set_value('role'); ?>">
                          <option> </option>
                          <?php if (!empty($rolelist)) : ?>
                        <?php foreach ($rolelist as $user) : ?>
                          <option value="<?= $user->r_id; ?>"><?= $user->post; ?></option>
                        <?php endforeach; ?>
                      <?php else : ?>
                        <h1>Sorry! No records found</h1>
                      <?php endif; ?>
                      </select>
                      <span class="text-danger"><?= display_error($validation,'role'); ?></span>
                      
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" value="<?= set_value('username'); ?>">
                      

                      </div>
                      <span class="text-danger"><?= display_error($validation,'username'); ?></span>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" >
                      <span class="text-danger"><?= display_error($validation,'password'); ?></span>

                    </div>
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Confirm Password</label>
                      <input type="password" name="cpassword" class="form-control" id="yourcPassword" >
                      <span class="text-danger"><?= display_error($validation,'cpassword'); ?></span>

                    </div>
                    <div class="col-12 mt-3">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                   
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="#">Log in</a></p>
                    </div>
                  <!-- </form> -->
                  <?= form_close(); ?>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
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
  <!-- <script src="assets/vendor/apexcharts/apexcharts.min.js"></script> -->
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <!-- <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <!-- <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
  <!-- <script src="assets/js/main.js"></script> -->

</body>

</html>