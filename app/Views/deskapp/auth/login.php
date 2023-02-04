<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Login Beringin Indah </title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180"
        href="<?php echo base_url(); ?>/assets/vendors/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="<?php echo base_url(); ?>/assets/vendors/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?php echo base_url(); ?>/assets/vendors/images/favicon-16x16.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/vendors/styles/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-119386393-1');
    </script>
</head>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="login">
                    <img src="<?php echo base_url(); ?>/assets/vendors/images/deskapp-logo.svg" alt="">
                </a>
            </div>
            <div class="login-menu">
                <ul>
                    <li><a href="<?= url_to('register') ?>">Register</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
        <?php endif; ?>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="<?php echo base_url(); ?>/assets/vendors/images/login-page-img.png" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Login To Beringin Indah</h2>
                        </div>
                        <?= view('Myth\Auth\Views\_message_block') ?>
                        <form action="<?= url_to('login') ?>" method="post">
                            <?= csrf_field() ?>
                            <!-- <div class="select-role">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn active">
										<input type="radio" name="options" id="admin">
										<div class="icon"><img src="<?php echo base_url(); ?>/assets/vendors/images/briefcase.svg" class="svg" alt=""></div>
										<span>I'm</span>
										Manager
									</label>
									<label class="btn">
										<input type="radio" name="options" id="user">
										<div class="icon"><img src="<?php echo base_url(); ?>/assets/vendors/images/person.svg" class="svg" alt=""></div>
										<span>I'm</span>
										Employee
									</label>
								</div>
							</div> -->
                            <?php if ($config->validFields === ['email']) : ?>
                            <div class="input-group custom">
                                <input name="login" type="text"
                                    class="form-control form-control-lg <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                    placeholder="Username or Email">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                                <div class="invalid-feedback">
                                    <?= session('errors.login') ?>
                                </div>
                            </div>
                            <?php else : ?>
                            <div class="input-group custom">

                                <input name="login" type="text"
                                    class="form-control form-control-lg <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                    placeholder="Username or Email">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                                <div class="invalid-feedback">
                                    <?= session('errors.login') ?>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="input-group custom">
                                <input name="password" type="password"
                                    class="form-control form-control-lg <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                    placeholder="**********">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                                <div class="invalid-feedback">
                                    <?= session('errors.password') ?>
                                </div>
                            </div>

                            <div class="row pb-30">
                                <div class="col-6">
                                    <?php if ($config->allowRemembering) : ?>
                                    <div class="custom-control custom-checkbox">
                                        <input name="remember" type="checkbox"
                                            class="custom-control-input <?php if (old('remember')) : ?> checked <?php endif ?>>"
                                            id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember</label>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <?php if ($config->activeResetter) : ?>
                                <div class="col-6">
                                    <div class="forgot-password"><a href="<?= url_to('forgot') ?>">Forgot Password</a>
                                    </div>
                                </div>

                                <?php endif; ?>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">

                                        <!-- use code for form submit -->
                                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">

                                        <!-- <a class="btn btn-primary btn-lg btn-block" href="index">Sign In</a> -->
                                    </div>
                                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR
                                    </div>
                                    <?php if ($config->allowRegistration) : ?>
                                    <div class="input-group mb-0">
                                        <a class="btn btn-outline-primary btn-lg btn-block"
                                            href="<?= url_to('register') ?>">Register To Create
                                            Account</a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="<?php echo base_url(); ?>/assets/vendors/scripts/core.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vendors/scripts/script.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vendors/scripts/process.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vendors/scripts/layout-settings.js"></script>
</body>

</html>