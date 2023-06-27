<?= $this->extend('/deskapp/includes/index') ?>
<!-- echo header,rightsidebar,leftsidebar and loader -->
<?= $this->section('main-content'); ?>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Profile</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <div class="profile-photo">
                            <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i
                                    class="fa fa-pencil"></i></a>
                            <img src="<?php echo base_url(); ?>/assets/vendors/images/photo1.jpg" alt=""
                                class="avatar-photo">
                            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body pd-5">
                                            <div class="img-container">
                                                <img id="image"
                                                    src="<?php echo base_url(); ?>/assets/vendors/images/photo2.jpg"
                                                    alt="Picture">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" value="Update" class="btn btn-primary">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5 class="text-center h5 mb-0"><?= $user->username; ?></h5>
                        <p class="text-center text-muted font-14"><?= $user->fullname; ?></p>
                        <div class="profile-info">
                            <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                            <ul>
                                <li>
                                    <span>Email Address:</span>
                                    <?= $user->email; ?>
                                </li>
                                <li>
                                    <span>Phone Number:</span>
                                    <?= $user->mobile; ?>
                                </li>

                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
                    <div class="card-box height-100-p overflow-hidden">
                        <div class="profile-tab height-100-p">
                            <div class="tab height-100-p">
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">Setting
                                            Account</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tasks" role="tab">Change
                                            Password</a>
                                    </li> -->

                                </ul>
                                <div class="tab-content">
                                    <!-- Timeline Tab start -->
                                    <div class="tab-pane fade show active" id="timeline" role="tabpanel">
                                        <div class="pd-20">
                                            <form action="<?= base_url('/user/updateProfile'); ?>"
                                                enctype="multipart/form-data" method="post" class="user">
                                                <?= csrf_field() ?>

                                                <ul class="profile-edit-list row">
                                                    <li class="weight-500 col-md-6">
                                                        <h4 class="text-blue h5 mb-20">Edit Your Accout</h4>
                                                        <div class="form-group">
                                                            <label>Full Name</label>
                                                            <input
                                                                class="form-control <?= $validation->hasError('fullname') ? 'is-invalid' : null ?> form-control-lg"
                                                                name="fullname" type="text"
                                                                value="<?= user()->fullname; ?>">
                                                            <?php if ($validation->hasError('fullname')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('fullname'); ?>
                                                            </div>
                                                            <?php endif; ?>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input
                                                                class="form-control <?= $validation->hasError('email') ? 'is-invalid' : null ?> form-control-lg"
                                                                value="<?= $user->email; ?>" name="email" type="email">
                                                            <?php if ($validation->hasError('email')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('email'); ?>
                                                            </div>
                                                            <?php endif; ?>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Username :</label>
                                                            <input class="form-control form-control-lg"
                                                                value="<?= $user->username; ?>" type="text" readonly
                                                                placeholder="Your Username">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Mobile :</label>
                                                            <input
                                                                class="form-control form-control-lg <?= $validation->hasError('mobile') ? 'is-invalid' : null ?>"
                                                                value="<?= $user->mobile; ?>" name="mobile"
                                                                type="number" placeholder="Your Mobile">
                                                            <?php if ($validation->hasError('mobile')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('mobile'); ?>
                                                            </div>
                                                            <?php endif; ?>
                                                        </div>

                                                        <div class="form-group mb-0">
                                                            <input name="profile" type="submit" class="btn btn-primary"
                                                                value="Update Account">
                                                        </div>
                                                    </li>

                                            </form>


                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Timeline Tab End -->
                                    <!-- Tasks Tab start -->

                                    <!-- Tasks Tab End -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->


    </div>
</div>
<?php $this->endSection(); ?>