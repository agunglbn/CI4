<?= $this->extend('/deskapp/includes/index') ?>
<!-- echo header,rightsidebar,leftsidebar and loader -->
<?= $this->section('main-content'); ?>

<script src="<?php echo base_url(); ?>/assets/src/plugins/apexcharts/apexcharts.min.js"></script>
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="<?php echo base_url(); ?>/assets/vendors/images/banner-img.png" alt="">
                </div>
                <div class="col-md-8">
                    <h4 class="font-20 weight-500 mb-10 text-capitalize">
                        Welcome back <div class="weight-600 font-30 text-blue">
                            <?= user()->username; ?>
                            !
                        </div>
                    </h4>
                    <p class="font-18 max-width-600">Janganlah hendaknya kerajinanmu kendor, biarlah rohmu
                        menyala-nyala dan layanilah Tuhan..</p>
                </div>
            </div>
        </div>


        <div class="card-box mb-30">
            <div class="row clearfix progress-box">
                <?php foreach ($progres as $program) : ?>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <input type="text" class="knob dial1" value="<?php echo $program->nilai ?>" data-width="120"
                                data-height="120" data-linecap="round" data-thickness="0.12" data-bgColor="#fff"
                                data-fgColor="#1b00ff" data-angleOffset="180" readonly />
                            <h5 class="text-blue padding-top-10 h5"><?php echo $program->divisi  ?></h5>
                            <span class="d-block"><?php echo number_format($program->nilai, 1, '.', '') ?>% Average
                                <i class="fa fa-line-chart text-blue"></i></span>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>


            </div>
        </div>
        <div class="row">

            <div class="col-xl-12 mb-30">
                <div class="card-box height-100-p pd-20">
                    <h2 class="h4 mb-20">Lead Target</h2>
                    <div id="chart6"></div>
                </div>
            </div>
        </div>
        <?php $this->endSection(); ?>