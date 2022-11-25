<?php $page_session = \config\Services::session(); ?>
<?php //$validation =  \Config\Services::validation(); 
?>

<?php

use App\Controllers\trpadmin\trpadmin;

$this->extend('trpview/layout/index');
$this->Section('title');
?>
New Bilty
<?php
$this->endSection(); ?>


<?php $this->section('profilename'); ?>

<?php if ($userdata->profile_pic != '') : ?>
  <img src='<?= $userdata->profile_pic; ?>' alt='Profile' class='rounded-circle'>
<?php else : ?>
  <img src='<?php echo base_url() ?>/assets/img/profile-preview.png' alt='Profile' class='rounded-circle'>
<?php endif; ?>
<span class="d-none d-md-block dropdown-toggle ps-2"><?= ucfirst($userdata->name); ?></span>
</a><!-- End Profile Iamge Icon -->

<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
  <li class="dropdown-header">
    <h6><?= ucfirst($userdata->name); ?></h6>
    <span><?= $userdata->post; ?></span>
    <?php $this->endSection(); ?>



    <?php $this->section('content'); ?>


    <main id="main" class="main">

      <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item">Users</li>
            <li class="breadcrumb-item active">Profile</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section profile">
        <div class="row">
          <div class="col-xl-4">

            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <?php if ($userdata->profile_pic != '') : ?>
                  <img src='<?= $userdata->profile_pic; ?>' alt='Profile' class='rounded-circle'>
                <?php else : ?>
                  <img src='<?php echo base_url() ?>/assets/img/profile-preview.png' alt='Profile' class='rounded-circle'>
                <?php endif; ?>
                <h2><?= ucfirst($userdata->name); ?></h2>
                <h3><?= $userdata->post; ?></h3>
                <!-- <div class="social-links mt-2">
                  <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                  <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                  <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div> -->
              </div>
            </div>

          </div>

          <div class="col-xl-8">

            <div class="card">
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                  </li>



                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                  </li>

                </ul>

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
                  <div class="alert alert-danger fff"><?= $page_session->getTempdata('error'); ?></div>

                <?php
                endif;
                ?>
                <?php if (isset($validation)) : ?>
                  <div class="alert alert-danger"><?= $validation->listErrors(); ?></div>
                <?php endif; ?>
                <div class="tab-content pt-2">

                  <div class="tab-pane fade show active profile-overview" id="profile-overview">

                    <h5 class="card-title">Profile Details</h5>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Full Name</div>
                      <div class="col-lg-9 col-md-8"><?= ucfirst($userdata->name); ?></div>
                    </div>



                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Job</div>
                      <div class="col-lg-9 col-md-8"><?= $userdata->post; ?></div>
                    </div>

                    <!-- <div class="row">
                <div class="col-lg-3 col-md-4 label">Country</div>
                <div class="col-lg-9 col-md-8">USA</div>
              </div> -->

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Address</div>
                      <div class="col-lg-9 col-md-8"><?= $userdata->address; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Phone</div>
                      <div class="col-lg-9 col-md-8"><?= $userdata->mobile; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Email</div>
                      <div class="col-lg-9 col-md-8"><?= $userdata->email; ?></div>
                    </div>

                  </div>

                  <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                    <!-- Profile Edit Form -->

                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <?php if ($userdata->profile_pic != '') : ?>
                          <img src='<?= $userdata->profile_pic; ?>' alt='Profile'>
                        <?php else : ?>
                          <img src='<?php echo base_url() ?>/assets/img/profile-preview.png' alt='Profile'>
                        <?php endif; ?>
                        <div class="pt-2">
                          <!-- <a href="<?php 1; //echo base_url() 
                                        ?>/trpadmin/trpadmin/avtar" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a> -->
                          <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editmodal" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal"> -->
                          <a href="<?php echo base_url() ?>/delete_profile_pic" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>
                    <form action="<?php echo base_url() ?>/edit_profile" method="post" accept-charset="utf-8">
                      <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="name" type="text" class="form-control" id="fullName" value="<?= ucfirst($userdata->name); ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="address" type="text" class="form-control" id="Address" value="<?= $userdata->address; ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="mobile" type="text" class="form-control" id="Phone" value="<?= $userdata->mobile; ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="email" type="email" class="form-control" id="Email" value="<?= $userdata->email; ?>">
                        </div>
                      </div>



                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                      </div>
                    </form>
                    <!-- End Profile Edit Form -->

                  </div>



                  <div class="tab-pane fade pt-3" id="profile-change-password">
                    <!-- Change Password Form -->
                    <form action="<?php echo base_url() ?>/change_password" method="post" accept-charset="utf-8">


                      <div class="row mb-3">
                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="password" type="password" class="form-control" id="currentPassword">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="newpassword" type="password" class="form-control" id="newPassword">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                        </div>
                      </div>

                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                      </div>
                    </form>
                    <!-- End Change Password Form -->

                  </div>

                </div><!-- End Bordered Tabs -->

              </div>
            </div>

          </div>
        </div>
      </section>
      <div class="modal" id="editmodal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Modal Heading</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <?= form_open_multipart('trpadmin/trpadmin/avtar'); ?>
            <div class="col-6">
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
              

            </div>

            <div class="col-12">
              <button class="btn btn-primary w-100 mb-3 mt-3" type="submit">Upload</button>
            </div>



            <?= form_close(); ?>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>

    </main><!-- End #main -->

    <?php $this->endsection(); ?>
    <?php
    $this->section('scripts');
    ?>





    <?php $this->endsection(); ?>