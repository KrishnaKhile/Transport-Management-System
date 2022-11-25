<?php

$this->extend('trpview/layout/index');
$this->Section('title');
?>

Krushna Logistics Company
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








        <?php $this->Section('content'); ?>

        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Login Activity</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() ?>/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item">Login Activity</li>
                    </ol>
                </nav>

            </div><!-- End Page Title -->
            <section class="section dashboard">

                <div class="row">

                    
                    <div class="col-lg-12" style="padding: 0px !important; ">

                        <div class="col-12">

                            <div class="card mb-4">
                                <div class="card-header" style="background-color:#012970; color: #fff;">
                                    <i class="fas fa-table me-1"></i>
                                    -- Login Activity List --
                                </div>

                                <div class="card-body dataTable-container table-responsive">
                                    <?php if(count($login_info)>0): ?>
                                    <table class="table table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>UserName</th>
                                                <th>Login time</th>
                                                <th>Logout time</th>
                                                <th>Browser</th>
                                                <th>Ip address</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php foreach($login_info as $info): ?>
                                            <tr>
                                                <td><?= $info->la_id; ?></td>
                                                <td><?= $info->name; ?></td>
                                                <td><?= date("l dS M Y h:i:s a", strtotime($info->login_time)); ?></td>
                                                <td><?= $info->logout_time; ?></td>
                                                <td><?= $info->agent; ?></td>
                                                <td>::<?= $info->ip; ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <?php else: ?>
                                        <h5>Sorry! No information found.</h5>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- End Reports -->

            </section>
           
            
        </main><!-- End #main -->

        <?php $this->endSection(); ?>