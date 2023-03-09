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
                            <h4>Data Berita</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Data Berita
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                Add New
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?= base_url('admin/formBerita'); ?>">Tambah Berita
                                    Baru</a>
                                <a class="dropdown-item" href="#">Export blog</a>
                                <a class="dropdown-item" href="#">Import blog</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swalalert" data-swal="<?= session()->get('success'); ?>">
            </div>
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Data Berita</h4>
                    <p class="mb-0">
                        Data Berita dan Renungan Beringin Indah

                    </p>
                </div>
                <!-- Notifikasi Alert Berhasil-->
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
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap table-bordered">
                        <!-- <table class="table hover multiple-select-row data-table-export nowrap"> Membuat Option Export-->
                        <thead>
                            <tr class="text-center">
                                <th class="table-plus datatable-nosort" width="1px">No</th>
                                <th width="5px">Judul Berita</th>
                                <th width="5px">Isi</th>
                                <th width="2px">Kategori</th>
                                <th width="3px">Status</th>
                                <th width="3px" class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($berita as $blog) : ?>
                            <tr class="text-center">
                                <td class="table-plus"><?= $i++; ?></td>
                                <td><?php echo word_limiter($blog->judul_berita, 2, '....'); ?></td>
                                <td><?php echo word_limiter($blog->isi_berita, 3, '.....'); ?></td>
                                <td><?php echo $blog->kategori_berita; ?></td>
                                <td> <?php
                                            $status = $blog->status;
                                            if ($status == 0) {
                                            ?>

                                    <span class="btn btn-outline-danger" data-toggle="modal"
                                        data-target="#exampleModal<?= $blog->id; ?>">Non-Active</span>

                                    <div class="modal fade" id="exampleModal<?= $blog->id; ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Aktivisasi Berita
                                                        Gereja</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="<?php echo base_url('admin/updateStatusBerita/' . $blog->id) ?>"
                                                        method="POST">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="_method" value="_put">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <input type="hidden" name="id"
                                                                    value="<?= $blog->id; ?>" />
                                                                <div class="form-group">
                                                                    <label for="status">Status</label>
                                                                    <select class="form-control required" id="status"
                                                                        name="status">
                                                                        <option value="1"
                                                                            <?php if ($blog->status == "1") echo "selected='selected'" ?>>
                                                                            Active
                                                                        </option>
                                                                        <option value="0"
                                                                            <?php if ($blog->status == "0") echo "selected='selected'" ?>>
                                                                            Non Active
                                                                        </option>

                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                            } else { ?>
                                        <span class="btn btn-outline-success" data-toggle="modal"
                                            data-target="#exampleModalactive<?= $blog->id; ?>">Active</span>


                                        <div class="modal fade" id="exampleModalactive<?= $blog->id; ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Aktivisasi
                                                            Berita Gereja</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="<?php echo base_url('admin/updateStatusBerita/' . $blog->id) ?>"
                                                            method="POST">
                                                            <?= csrf_field() ?>
                                                            <input type="hidden" name="_method" value="_put">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="hidden" name="id"
                                                                        value="<?= $blog->id; ?>" />
                                                                    <div class="form-group">
                                                                        <label for="status">Status</label>
                                                                        <select class="form-control required"
                                                                            id="status" name="status">

                                                                            <option value="1"
                                                                                <?php if ($blog->status == "1") echo "selected='selected'" ?>>
                                                                                Active
                                                                            </option>
                                                                            <option value="0"
                                                                                <?php if ($blog->status == "0") echo "selected='selected'" ?>>
                                                                                Non Active
                                                                            </option>

                                                                        </select>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                            <?php
                                            }
                                                ?>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                            href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url('detailBerita/' . $blog->id . '/' . $blog->judul_berita . $blog->slug); ?>"><i
                                                    class="dw dw-eye"></i> View</a>

                                            <a class="dropdown-item"
                                                href="<?php echo base_url('formUpdateBerita/' . $blog->id . '/' . $blog->judul_berita . $blog->slug); ?>"><i
                                                    class="dw dw-edit2"></i> Edit</a>

                                            <a class="dropdown-item" data-toggle="modal" type="button"
                                                data-target="#confirmation-modal<?= $blog->id ?>"><i
                                                    class="DeleteJemaat dw dw-delete-3"></i>Delete</a>

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



        <div class="min-height-200px">

            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Data Renungan</h4>
                    <p class="mb-0">
                        Renungan HKBP Beringin Indah

                    </p>
                </div>

                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap table-bordered">
                        <!-- <table class="table hover multiple-select-row data-table-export nowrap"> Membuat Option Export-->
                        <thead>
                            <tr class="text-center">
                                <th class="table-plus datatable-nosort" width="1px">No</th>
                                <th width="5px">Judul Renungan</th>
                                <th width="5px">Isi</th>
                                <th width="2px">Kategori</th>
                                <th width="3px">Status</th>
                                <th width="3px" class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($renungan as $blog) : ?>
                            <tr class="text-center">
                                <td class="table-plus"><?= $i++; ?></td>
                                <td><?php echo word_limiter($blog->judul_berita, 2, '....'); ?></td>
                                <td><?php echo word_limiter($blog->isi_berita, 3, '.....'); ?></td>
                                <td><?php echo $blog->kategori_berita; ?></td>
                                <td> <?php
                                            $status = $blog->status;
                                            if ($status == 0) {
                                            ?>

                                    <span class="btn btn-outline-danger" data-toggle="modal"
                                        data-target="#exampleModal<?= $blog->id; ?>">Non-Active</span>

                                    <div class="modal fade" id="exampleModal<?= $blog->id; ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Aktivisasi Berita
                                                        Gereja</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="<?php echo base_url('admin/updateStatusBerita/' . $blog->id) ?>"
                                                        method="POST">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="_method" value="_put">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <input type="hidden" name="id"
                                                                    value="<?= $blog->id; ?>" />
                                                                <div class="form-group">
                                                                    <label for="status">Status</label>
                                                                    <select class="form-control required" id="status"
                                                                        name="status">
                                                                        <option value="1"
                                                                            <?php if ($blog->status == "1") echo "selected='selected'" ?>>
                                                                            Active
                                                                        </option>
                                                                        <option value="0"
                                                                            <?php if ($blog->status == "0") echo "selected='selected'" ?>>
                                                                            Non Active
                                                                        </option>

                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                            } else { ?>
                                        <span class="btn btn-outline-success" data-toggle="modal"
                                            data-target="#exampleModalactive<?= $blog->id; ?>">Active</span>


                                        <div class="modal fade" id="exampleModalactive<?= $blog->id; ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Aktivisasi
                                                            Berita Gereja</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="<?php echo base_url('admin/updateStatusBerita/' . $blog->id) ?>"
                                                            method="POST">
                                                            <?= csrf_field() ?>
                                                            <input type="hidden" name="_method" value="_put">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="hidden" name="id"
                                                                        value="<?= $blog->id; ?>" />
                                                                    <div class="form-group">
                                                                        <label for="status">Status</label>
                                                                        <select class="form-control required"
                                                                            id="status" name="status">

                                                                            <option value="1"
                                                                                <?php if ($blog->status == "1") echo "selected='selected'" ?>>
                                                                                Active
                                                                            </option>
                                                                            <option value="0"
                                                                                <?php if ($blog->status == "0") echo "selected='selected'" ?>>
                                                                                Non Active
                                                                            </option>

                                                                        </select>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                            <?php
                                            }
                                                ?>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                            href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item"
                                                href="<?php echo base_url('detailBerita/' . $blog->id . '/' . $blog->judul_berita . $blog->slug); ?>"><i
                                                    class="dw dw-eye"></i> View</a>

                                            <a class="dropdown-item"
                                                href="<?php echo base_url('formUpdateBerita/' . $blog->id . '/' . $blog->judul_berita . $blog->slug); ?>"><i
                                                    class="dw dw-edit2"></i> Edit</a>

                                            <a class="dropdown-item" data-toggle="modal" type="button"
                                                data-target="#confirmation-modal<?= $blog->id ?>"><i
                                                    class="DeleteJemaat dw dw-delete-3"></i>Delete</a>

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

        <?php
        foreach ($berita as $blog) :  ?>
        <!-- Confirmation modal -->

        <div class="modal fade" id="confirmation-modal<?= $blog->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center font-18">
                        <h4 class="padding-top-30 mb-30 weight-500">
                            Are you sure you want to Delete?
                        </h4>

                        <form action="<?php echo base_url('admin/deleteBerita/' . $blog->id); ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="_delete">
                            <input type="hidden" name="confirm_delete" value="1">
                            <input type="text" hidden name="gambar_lama" value="<?php echo $blog->img; ?>">
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
<?php endforeach; ?>
<?php $this->endSection(); ?>