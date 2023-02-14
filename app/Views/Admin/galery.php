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
                            <a class="btn btn-outline-primary" href="#" role="button" data-toggle="modal"
                                data-target="#tambah-gallery">
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
                                        <h5 class="mb-10 color-white pd-20">
                                            <?php echo word_limiter($img['description'], 5, '...') ?></h5>
                                        <ul class="clearfix">
                                            <li><a href="<?php echo base_url('assets/vendors/gallery/' . $img['img']); ?>"
                                                    data-fancybox="images">
                                                    <i class="fa fa-picture-o"></i></a><small>View</small>
                                            </li>
                                            <li><a href="#" data-toggle="modal"
                                                    data-target="#update-gallery<?php echo $img['id']; ?>"><i
                                                        class="icon-copy fa fa-wrench"
                                                        aria-hidden="true"></i></a><small>Edit</small></li>

                                            <li>

                                                <a href="#" data-toggle="modal"
                                                    data-target="#delete-gallery<?php echo $img['id']; ?>"><i
                                                        class="icon-copy fa fa-trash"
                                                        aria-hidden="true"></i></i></a><small>Delete</small>
                                            </li>



                                            <li>
                                                <?php
                                                    $status = $img['status'];
                                                    if ($status == 1) {
                                                    ?>
                                                <a href="#" data-toggle="modal"
                                                    data-target="#status-gallery<?= $img['id']; ?>"><i
                                                        class="icon-copy fa fa-check-square"
                                                        aria-hidden="true"></i></a><small>Active</small>



                                                <?php
                                                    } else {
                                                    ?>

                                                <a href="#" data-toggle="modal"
                                                    data-target="#status-gallery<?= $img['id']; ?>"><i
                                                        class="icon-copy fi-x"
                                                        aria-hidden="true"></i></a><small>Non-Active</small>


                                                <?php } ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>


                    <?php } ?>
                </ul>
            </div>
        </div>

    </div>
</div>
<!-- Modal Tambah Gallery -->

<div class="modal fade" id="tambah-gallery" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Tambah Gallery
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/admin/TambahGallery'); ?>" enctype="multipart/form-data" method="post">
                    <?= csrf_field() ?>


                    <input name="fullname" type="text"
                        class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>"
                        placeholder="" value="<?= user()->fullname; ?>" hidden />
                    <input name="username" type="text"
                        class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>"
                        placeholder="" value="<?= user()->username; ?>" hidden />
                    <input name="groups" type="text"
                        class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>"
                        placeholder="" value="<?= user()->groups; ?>" hidden />



                    <div class="input-group custom">
                        <input name="img[]" type="file" value="<?= set_value('img'); ?>" multiple="multiple"
                            accept="image/*"
                            class="form-control form-control-lg <?= $validation->hasError('img') ? 'is-invalid' : null ?>"
                            alt="NOT FOUND" />
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
                        <input name="deskripsi" type="text" value="<?= set_value('deskripsi'); ?>"
                            class="form-control form-control-lg <?= $validation->hasError('deskripsi') ? 'is-invalid' : null ?>"
                            placeholder="Deskripsi" />
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


<!-- Modal Update Gallery -->

<?php
foreach ($gallery as $img) :  ?>
<div class="modal fade" id="update-gallery<?= $img['id']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Update Gallery
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/admin/updateGallery/' . $img['id']); ?>" enctype="multipart/form-data"
                    method="post">
                    <?= csrf_field() ?>

                    <input type="hidden" name="_method" value="PUT">
                    <input name="fullname" type="text"
                        class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>"
                        placeholder="" value="<?= user()->fullname; ?>" hidden />
                    <input name="username" type="text"
                        class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>"
                        placeholder="" value="<?= user()->username; ?>" hidden />
                    <input name="groups" type="text"
                        class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>"
                        placeholder="" value="<?= user()->groups; ?>" hidden />
                    <input name="gambar_lama" type="text"
                        class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>"
                        placeholder="" value="<?= $img['img'] ?>" hidden />



                    <div class="input-group custom">
                        <input name="img" type="file" value="<?= set_value('img'); ?>" accept="image/*"
                            class="form-control form-control-lg <?= $validation->hasError('img') ? 'is-invalid' : null ?>"
                            alt="NOT FOUND" />
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
                        <input name="deskripsi" type="text" value="<?= $img['description']  ?>"
                            class="form-control form-control-lg <?= $validation->hasError('deskripsi') ? 'is-invalid' : null ?>"
                            placeholder="Deskripsi" />
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
</div>

</div>
<?php endforeach ?>

<!-- Modal -->


<!-- Status -->
<?php foreach ($gallery as $img) { ?>
<?php $status = $img['status'];
    if ($status == 1) {
    ?>
<div class="modal fade" id="status-gallery<?= $img['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Aktivisasi Gallery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/statusGallery/' . $img['id']) ?>" method="POST">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="_put">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="id" value="<?= $img['id']; ?>" />
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control required" id="status" name="status">
                                    <option value="0" <?php if ($img['status'] == "0") echo "selected='selected'" ?>>
                                        Non Active
                                    </option>
                                    <option value="1" <?php if ($img['status'] == "1") echo "selected='selected'" ?>>
                                        Active
                                    </option>

                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php } else { ?>
    <div class="modal fade" id="status-gallery<?= $img['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Aktivisasi Gallery</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/statusGallery/' . $img['id']) ?>" method="POST">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="_put">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="id" value="<?= $img['id']; ?>" />
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control required" id="status" name="status">
                                        <option value="0"
                                            <?php if ($img['status'] == "0") echo "selected='selected'" ?>>
                                            Non Active
                                        </option>
                                        <option value="1"
                                            <?php if ($img['status'] == "1") echo "selected='selected'" ?>>
                                            Active
                                        </option>

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save
                                changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- End -->
        <!-- Delete Gallery -->
        <?php foreach ($gallery as $img) { ?>
        <div class="modal fade" id="delete-gallery<?= $img['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center font-18">
                        <h4 class="padding-top-30 mb-30 weight-500">
                            Are you sure you want to Delete?
                        </h4>

                        <form action="<?php echo base_url('admin/deleteGallery/' . $img['id']); ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="_delete">
                            <input type="hidden" name="confirm_delete" value="1">
                            <input type="text" hidden name="gambar_lama" value="<?php echo $img['img']; ?>">
                            <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto">
                                <div class="col-6">
                                    <button type="button"
                                        class="btn btn-secondary border-radius-100 btn-block confirmation-btn"
                                        data-dismiss="modal">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    NO
                                </div>
                                <div class="col-6">
                                    <button type="submit"
                                        class="btn btn-primary border-radius-100 btn-block confirmation-btn">
                                        <i class="fa fa-check"></i>
                                    </button>
                                    YES
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php } ?>
<!-- End -->
<!-- Delete Gallery -->
<?php foreach ($gallery as $img) { ?>
<div class="modal fade" id="delete-gallery<?= $img['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500">
                    Are you sure you want to Delete?
                </h4>

                <form action="<?php echo base_url('admin/deleteGallery/' . $img['id']); ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="_delete">
                    <input type="hidden" name="confirm_delete" value="1">
                    <input type="text" hidden name="gambar_lama" value="<?php echo $img['img']; ?>">
                    <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn"
                                data-dismiss="modal">
                                <i class="fa fa-times"></i>
                            </button>
                            NO
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary border-radius-100 btn-block confirmation-btn">
                                <i class="fa fa-check"></i>
                            </button>
                            YES
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php } ?>
<?php $this->endSection(); ?>