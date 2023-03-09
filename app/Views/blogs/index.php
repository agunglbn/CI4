<!DOCTYPE html>
<html lang="en">

<head>
    <title>HKBP &mdash; Beringin Indah Pekanbaru</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link href="<?php echo base_url(); ?>/assets/vendors/front/assets/img/hkbp.png" rel="icon">
    <link href="<?php echo base_url(); ?>/assets/vendors/front/assets/img/hkbp.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=B612+Mono|Cabin:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendors/blogs/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendors/blogs/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendors/blogs/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendors/blogs/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendors/blogs/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendors/blogs/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendors/blogs/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendors/blogs/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendors/blogs/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendors/blogs/css/aos.css">
    <link href="<?php echo base_url(); ?>/assets/vendors/blogs/css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendors/button/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendors/button/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendors/blogs/css/style.css">



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>


        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-6 d-flex">
                        <a href="<?php echo base_url('/front')  ?>" class="site-logo">
                            HKBP Beringin Indah
                        </a>

                        <a href="#" class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>

                    </div>
                    <div class="col-12 col-lg-6 ml-auto d-flex">
                        <div class="ml-md-auto top-social d-none d-lg-inline-block">
                            <a href="#" class="d-inline-block p-3"><span class="icon-facebook"></span></a>
                            <a href="#" class="d-inline-block p-3"><span class="icon-twitter"></span></a>
                            <a href="#" class="d-inline-block p-3"><span class="icon-instagram"></span></a>
                        </div>
                        <form action="#" class="search-form d-inline-block">

                            <div class="d-flex">
                                <input type="email" class="form-control" placeholder="Search...">
                                <button type="submit" class="btn btn-secondary"><span class="icon-search"></span></button>
                            </div>
                        </form>


                    </div>
                    <div class="col-6 d-block d-lg-none text-right">

                    </div>
                </div>
            </div>




            <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">

                <div class="container">
                    <div class="d-flex align-items-center">

                        <div class="mr-auto">
                            <nav class="site-navigation position-relative text-right" role="navigation">
                                <ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block">
                                    <li class="active">
                                        <a href="<?php echo base_url('/blogs')  ?>" class="nav-link text-left">Home</a>
                                    </li>
                                    <li class="active">
                                        <a href="<?php echo base_url('/blogs')  ?>" class="nav-link text-left">Latest
                                            News</a>
                                    </li>
                                    <?php foreach ($kategori as $kat) { ?>
                                        <li>
                                            <a href="<?php echo base_url('kategori/' . $kat['nama_kategori']) ?>" class="nav-link text-left">
                                                <?php echo $kat['nama_kategori'] ?></a>
                                        </li>
                                    <?php } ?>
                                    <li>
                                        <a href="categories.html" class="nav-link text-left">Renungan</a>
                                    </li>
                                </ul>
                            </nav>

                        </div>

                    </div>
                </div>

            </div>

        </div>

        <!-- Main Content  -->
        <?= $this->renderSection('main-content'); ?>
        <!--  -->

        <!-- Footer -->
        <?= $this->include('blogs/footer') ?>
        <!-- ======= Footer ======= -->