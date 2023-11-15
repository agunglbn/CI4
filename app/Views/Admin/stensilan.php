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
                            <h4>Stensilan</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Stensilan Dan Warta
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#tambah-stensilan">
                            Add New
                        </a>
                    </div>
                </div>
            </div>
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Data Stensilan</h4>
                    <p class="mb-0">
                        you can find more options

                    </p>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr class="text-center">
                                <th class="table-plus datatable-nosort">No</th>
                                <th>Judul Stensilan</th>
                                <th>File</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($stensilan as $sten) : ?>
                                <tr class="text-center">
                                    <td class="table-plus"><?= $i++; ?></td>
                                    <td><?= $sten['judul_berita']; ?></td>
                                    <td>
                                        <a href="<?= base_url(); ?>/admin/downloadfile/<?= $sten['id']; ?>"><i class="icon-copy fi-download"></i><small><br>Download File</small></a>

                                    </td>

                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <!-- Butonn View -->
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">


                                                <!-- Butonn Edit -->
                                                <a class="dropdown-item" data-toggle="modal" type="button" data-target="#update-stensilan<?= $sten['id']; ?>"><i class="dw dw-edit2"></i>
                                                    Edit</a>
                                                <!-- Butonn Delete -->
                                                <a class="dropdown-item" data-toggle="modal" type="button" data-target="#confirmation-modal<?= $sten['id']; ?>"><i class="DeleteJemaat dw dw-delete-3"></i>Delete</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Simple Datatable End -->

        </div>

        <!-- Modal Tambah  -->
        <div class="modal fade" id="tambah-stensilan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">
                            Tambah Stensilan Dan Warta
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('/admin/addStensilan'); ?>" enctype="multipart/form-data" method="post">
                            <?= csrf_field() ?>


                            <input name="fullname" type="text" class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>" placeholder="" value="<?= user()->fullname; ?>" hidden />
                            <input name="username" type="text" class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>" placeholder="" value="<?= user()->username; ?>" hidden />
                            <input name="user" type="text" class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>" placeholder="" value="<?= user()->groups; ?>" hidden />


                            <div class="input-group custom">
                                <input name="judul_berita" type="text" value="<?= set_value('judul_berita'); ?>" class="form-control form-control-lg <?= $validation->hasError('judul_berita') ? 'is-invalid' : null ?>" placeholder="Deskripsi" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-newspaper"></i></span>
                                </div>
                                <?php if ($validation->hasError('judul_berita')) : ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('judul_berita'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="input-group custom">
                                <input name="stensilan" type="file" value="<?= set_value('stensilan'); ?>" accept="file/*" class="form-control form-control-lg <?= $validation->hasError('stensilan') ? 'is-invalid' : null ?>" alt="NOT FOUND" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-image"></i></span>
                                </div>
                                <?php if ($validation->hasError('stensilan')) : ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('stensilan'); ?>
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
    foreach ($stensilan as $sten) :  ?>
        <div class="modal fade" id="update-stensilan<?= $sten['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">
                            Update Data Stensilan Dan Warta
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('/admin/updateStensilan/' . $sten['id']); ?>" enctype="multipart/form-data" method="post">
                            <?= csrf_field() ?>

                            <input type="hidden" name="_method" value="PUT">
                            <input name="fullname" type="text" class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>" placeholder="" value="<?= user()->fullname; ?>" hidden />
                            <input name="username" type="text" class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>" placeholder="" value="<?= user()->username; ?>" hidden />
                            <input name="groups" type="text" class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>" placeholder="" value="<?= user()->groups; ?>" hidden />
                            <input name="file_lama" type="text" class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>" placeholder="" value="<?= $sten['img'] ?>" hidden />



                            <div class="input-group custom">
                                <input name="judul_berita" type="text" value="<?= $sten['judul_berita']; ?>" class="form-control form-control-lg <?= $validation->hasError('judul_berita') ? 'is-invalid' : null ?>" placeholder="Deskripsi" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-newspaper"></i></span>
                                </div>
                                <?php if ($validation->hasError('judul_berita')) : ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('judul_berita'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="input-group custom">
                                <input name="stensilan" type="file" value="<?= $sten['img']; ?>" accept="file/*" class="form-control form-control-lg <?= $validation->hasError('stensilan') ? 'is-invalid' : null ?>" alt="NOT FOUND" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-image"></i></span>
                                </div>
                                <?php if ($validation->hasError('stensilan')) : ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('stensilan'); ?>
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


<?php foreach ($stensilan as $blog) :  ?>
    <!-- Confirmation Delete modal -->

    <div class="modal fade" id="confirmation-modal<?= $blog['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center font-18">
                    <h4 class="padding-top-30 mb-30 weight-500">
                        Are you sure you want to Delete?
                    </h4>

                    <form action="<?php echo base_url('admin/deleteBerita/' . $blog['id']); ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="_delete">
                        <input type="hidden" name="confirm_delete" value="1">
                        <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal">
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
<?php endforeach; ?>
<?php $this->endSection(); ?>