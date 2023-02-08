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
                            <h4>Gallery HKBP Beringin Indah</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Gallery
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-outline-primary" href="#" role="button" data-toggle="modal" data-target="#tambah-gallery">
                                Add New Photo
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gallery-wrap">
                <ul class="row">
                    <?php foreach ($gallery as $img) { ?>
                        <li class="col-lg-4 col-md-6 col-sm-12">
                            <div class="da-card box-shadow">
                                <div class="da-card-photo">
                                    <img src="<?php echo base_url('assets/vendors/gallery/' . $img['img']); ?>" alt="">
                                    <div class="da-overlay">
                                        <div class="da-social">
                                            <h5 class="mb-10 color-white pd-20"><?php echo $img['description'] ?></h5>
                                            <ul class="clearfix">
                                                <li><a href="<?php echo base_url('assets/vendors/gallery/' . $img['img']); ?>" data-fancybox="images"><i class="fa fa-picture-o"></i></a></li>
                                                <li><a href="#"><i class="fa fa-link"></i></a></li>
                                                <li><a href="#"><i class="fa fa-link"></i></a></li>
                                                <li><a href="#"><i class="fa fa-link"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                        </li>

                </ul>
            </div>
        </div>

    </div>
</div>
<!-- Modal Tambah Gallery -->

<div class="modal fade" id="tambah-gallery" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Tambah Photo
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/admin/TambahGallery'); ?>" enctype="multipart/form-data" method="post">
                    <?= csrf_field() ?>


                    <input name="fullname" type="text" class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>" placeholder="" value="<?= user()->fullname; ?>" hidden />
                    <input name="username" type="text" class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>" placeholder="" value="<?= user()->username; ?>" hidden />
                    <input name="groups" type="text" class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>" placeholder="" value="<?= user()->username; ?>" hidden />



                    <div class="input-group custom">
                        <input name="img" type="file" value="<?= set_value('img'); ?>" class="form-control form-control-lg <?= $validation->hasError('img') ? 'is-invalid' : null ?>" alt="NOT FOUND" accept="image/*" />
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="icon-copy dw dw-image"></i></span>
                        </div>
                        <?php if ($validation->hasError('img')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('img'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="input-group custom">
                        <input name="deskripsi" type="text" value="<?= set_value('deskripsi'); ?>" class="form-control form-control-lg <?= $validation->hasError('deskripsi') ? 'is-invalid' : null ?>" placeholder="Deskripsi" />
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="icon-copy dw dw-newspaper"></i></span>
                        </div>
                        <?php if ($validation->hasError('deskripsi')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('deskripsi'); ?>
                            </div>
                        <?php endif; ?>
                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">
                    Save changes
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

<?php $this->endSection(); ?>