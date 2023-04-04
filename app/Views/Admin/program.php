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
                            <h4>Data Program</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Data Program
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-primary" href="" role="button" data-toggle="modal"
                                data-target="#tambah-program">
                                Tambah Program
                                Baru
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="swalalert" data-swal="<?= session()->get('success'); ?>">
            </div>
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Data Program</h4>
                    <p class="mb-0">
                        Data Program HKBP Beringin Indah

                    </p>
                </div>
                <!-- Notifikasi Alert Berhasil-->
                <!-- <?php if (session('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session('success'); ?>
                    </div>
                <?php endif; ?> -->
                <!-- Notifikasi Alert Gagal -->
                <!-- <?php if (session('error')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session('error'); ?>
                    </div>
                <?php endif; ?> -->
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap table-bordered">
                        <!-- <table class="table hover multiple-select-row data-table-export nowrap"> Membuat Option Export-->
                        <thead>
                            <tr class="text-center">
                                <th class="table-plus datatable-nosort" width="1px">No</th>
                                <th width="5px">Nama Program</th>
                                <th width="5px">Divisi</th>
                                <th width="2px">Progres</th>
                                <th width="3px">Status</th>
                                <th width="3px" class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($program as $prog) : ?>
                            <tr class="text-center">
                                <td class="table-plus"><?= $i++; ?></td>
                                <td><?php echo word_limiter($prog['nama_program'], 3, '....'); ?></td>

                                <td><?php echo word_limiter($prog['divisi'], 3, '.....'); ?></td>
                                <td>
                                    <?php $progres = $prog['progres'];

                                        if ($progres == 100) {
                                        ?>
                                    <span class="alert alert-success">Sukses</span>
                                    <?php } else { ?>
                                    <div class="progress">
                                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated"
                                            role="progressbar" style="color:black;width: <?php echo $prog['progres'] ?>%;text-align:center;  font-weight: bold
" aria-valuenow="25" aria-valuemin="0" aria-placeholder="0%" aria-valuemax="100">
                                            <div class=""><?php echo $prog['progres']; ?>%</div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </td>
                                <td> <?php
                                            $status = $prog['status'];
                                            if ($status == 0) {
                                            ?>

                                    <span class="btn btn-outline-danger" data-toggle="modal"
                                        data-target="#exampleModal<?= $prog['id']; ?>">Non-Active</span>

                                    <div class="modal fade" id="exampleModal<?= $prog['id']; ?>" tabindex="-1"
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
                                                        action="<?php echo base_url('admin/statusProgram/' . $prog['id']) ?>"
                                                        method="POST">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="_method" value="_put">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <input type="hidden" name="id"
                                                                    value="<?= $prog['id']; ?>" />
                                                                <div class="form-group">
                                                                    <label for="status">Status</label>
                                                                    <select class="form-control required" id="status"
                                                                        name="status">
                                                                        <option value="1"
                                                                            <?php if ($prog['status'] == "1") echo "selected='selected'" ?>>
                                                                            Active
                                                                        </option>
                                                                        <option value="0"
                                                                            <?php if ($prog['status'] == "0") echo "selected='selected'" ?>>
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
                                            data-target="#exampleModalactive<?= $prog['id']; ?>">Active</span>


                                        <div class="modal fade" id="exampleModalactive<?= $prog['id']; ?>" tabindex="-1"
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
                                                            action="<?php echo base_url('admin/statusProgram/' . $prog['id']) ?>"
                                                            method="POST">
                                                            <?= csrf_field() ?>
                                                            <input type="hidden" name="_method" value="_put">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="hidden" name="id"
                                                                        value="<?= $prog['id']; ?>" />
                                                                    <div class="form-group">
                                                                        <label for="status">Status</label>
                                                                        <select class="form-control required"
                                                                            id="status" name="status">

                                                                            <option value="1"
                                                                                <?php if ($prog['status'] == "1") echo "selected='selected'" ?>>
                                                                                Active
                                                                            </option>
                                                                            <option value="0"
                                                                                <?php if ($prog['status'] == "0") echo "selected='selected'" ?>>
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
                                            <a class="dropdown-item" data-toggle="modal" type="button"
                                                data-target="#view-modal<?= $prog['id']; ?>"><i class="dw dw-eye"></i>
                                                View</a>


                                            <a class="dropdown-item" data-toggle="modal" type="button"
                                                data-target="#confirmation-modal<?= $prog['id'] ?>"><i
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

    </div>


    <!-- Modal Tambah Program -->

    <div class="modal fade" id="tambah-program" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Tambah Data Program
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('/admin/newProgram'); ?>" enctype="multipart/form-data" method="post">
                        <?= csrf_field() ?>


                        <div class="input-group custom">
                            <select name="divisi" value="<?= set_value('divisi'); ?>"
                                class="custom-select col-12 <?= $validation->hasError('divisi') ? 'is-invalid' : null ?>">
                                <option value="" disabled selected hidden>--Choice--</option>
                                <?php foreach ($group_role as $role) : ?>
                                <option value="<?php echo $role['name'] ?>"><?php echo $role['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy fi-list-thumbnails"></i></span>
                            </div>
                            <?php if ($validation->hasError('divisi')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('divisi'); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="input-group custom">
                            <input name="nama_program" type="text" value="<?= set_value('nama_program'); ?>"
                                class="form-control form-control-lg <?= $validation->hasError('nama_program') ? 'is-invalid' : null ?>"
                                placeholder="Nama Program" />
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy dw dw-package"></i></span>
                            </div>
                            <?php if ($validation->hasError('nama_program')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_program'); ?>
                            </div>
                            <?php endif; ?>
                        </div>


                        <input name="create_user" type="text"
                            class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>"
                            placeholder="" value="<?= user()->fullname; ?>" hidden />



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
    <!-- Modal View Kas -->

    <?php
    foreach ($program as $prog) :  ?>
    <div class="modal fade" id="view-modal<?= $prog['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center font-18">
                    <h4 class="padding-top-30 mb-30 weight-500">
                        Detail view of Program !!
                    </h4>
                    <div class="profile-info">
                        <h5 class="mb-20 h5 text-blue">Detail Program !!</h5>
                        <ul>
                            <li>
                                <span>Create by :</span>
                                <?= $prog['create_user']; ?>
                            </li>


                            <li>
                                <span>Nama Program:</span>
                                <?= $prog['nama_program']; ?>
                            </li>
                            <li>
                                <span>Divisi :</span>
                                <?= $prog['divisi'];  ?>
                            </li>

                            <li>
                                <span>Create Time :</span>
                                <?= $prog['created']; ?>
                            </li>
                            <li>
                                <span>Modified Time :</span>
                                <?php $modif = $prog['created'];
                                    if ($modif == null) {
                                    ?>
                                Belum Ada Perubahan
                                <?php } else { ?>
                                <?= $prog['created'];  ?>
                                <?php } ?>
                            </li>
                            <li>
                                <span>Status :</span>
                                <?php $nama = $prog['status'];

                                    if ($nama == 0) {

                                    ?>
                                Non Active

                                <?php
                                    } else { ?>Active
                                <?php } ?>
                            </li>
                        </ul>
                    </div>
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

                </div>
            </div>

        </div>
    </div>
    <?php endforeach; ?>
    <?php
    foreach ($program as $prog) :  ?>
    <!-- Confirmation modal -->

    <div class="modal fade" id="confirmation-modal<?= $prog['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center font-18">
                    <h4 class="padding-top-30 mb-30 weight-500">
                        Are you sure you want to Delete?
                    </h4>

                    <form action="<?php echo base_url('admin/deleteProgram/' . $prog['id']); ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="_delete">
                        <input type="hidden" name="confirm_delete" value="1">

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