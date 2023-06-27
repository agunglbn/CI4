<?= $this->extend('/deskapp/includes/index') ?>
<!-- echo header,rightsidebar,leftsidebar and loader -->
<?= $this->section('main-content'); ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Form</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?= $title; ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <!-- <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                January 2018
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Export List</a>
                                <a class="dropdown-item" href="#">Policies</a>
                                <a class="dropdown-item" href="#">View Assets</a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Tambah Data User</h4>
                        <p class="mb-30">Gunakan Ketentuan !!</p>
                    </div>
                    <!-- <div class="pull-right">
                        <a href="#basic-form1" class="btn btn-primary btn-sm scroll-click" rel="content-y"
                            data-toggle="collapse" role="button"><i class="fa fa-code"></i> Source Code</a>
                    </div> -->
                </div>
                <!-- Notifikasi Alert Berhasil -->
                <?php if (session('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session('success'); ?>
                </div>
                <?php endif; ?>
                <!-- Notifikasi Alert Gagal -->
                <?php if (session('error')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session('error'); ?>
                </div>
                <?php endif; ?>
                <form action="<?= base_url('/admin/tambah'); ?>" enctype="multipart/form-data" method="post"
                    class="user">
                    <?= csrf_field() ?>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Username</label>
                        <div class="col-sm-12 col-md-10">
                            <input name="username"
                                class="form-control <?= $validation->hasError('username') ? 'is-invalid' : null ?>"
                                type="text" placeholder="Parataon" />
                            <input class="form-control" type="text" placeholder="Parataon" name="id" hidden />
                            <?php if ($validation->hasError('username')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('username'); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Fullname</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control <?= $validation->hasError('fullname') ? 'is-invalid' : null ?>"
                                name="fullname" placeholder="Agung Silaban" type="text" />

                            <?php if ($validation->hasError('fullname')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('fullname'); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control <?= $validation->hasError('email') ? 'is-invalid' : null ?>"
                                name="email" placeholder="agungsilaban25@gmail.com" type="email" />


                            <?php if ($validation->hasError('email')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('email'); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Telephone</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control <?= $validation->hasError('mobile') ? 'is-invalid' : null ?>"
                                name="mobile" placeholder="089500112233" type="tel" />

                            <?php if ($validation->hasError('mobile')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('mobile'); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                        <div class="col-sm-12 col-md-10">
                            <input
                                class="form-control <?= $validation->hasError('password_hash') ? 'is-invalid' : null ?>"
                                name="password_hash" placeholder="*******" type="password" />

                            <?php if ($validation->hasError('password_hash')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('password_hash'); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-12 col-md-10">
                            <input
                                class="form-control <?= $validation->hasError('pass_confirm') ? 'is-invalid' : null ?>"
                                placeholder="******" name="pass_confirm" type="password" />

                            <?php if ($validation->hasError('pass_confirm')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('pass_confirm'); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Role</label>
                        <div class="col-sm-12 col-md-10">
                            <select name="role"
                                class="custom-select col-12 <?= $validation->hasError('role') ? 'is-invalid' : null ?>">
                                <?php foreach ($group_role as $role) :  ?>
                                <option value="" disabled selected hidden>--Choice--</option>
                                <option value="<?php echo $role['name']; ?>">
                                    <?php echo $role['name']; ?>
                                </option>

                                <?php endforeach; ?>

                            </select>
                            <?php if ($validation->hasError('role')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('role'); ?>
                            </div>
                            <?php endif; ?>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="pull-right ml-lg-5 mt-30">
                            <button class="btn btn-primary  " href="#" type="submit">
                                Submit</button>
                            <a class="btn btn-danger " href="<?php echo base_url('/admin') ?>">
                                Cancel</a>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
<!-- Default Basic Forms End -->







<?php $this->endSection(); ?>