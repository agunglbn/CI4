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
                            <h4>Data Keuangan Beringin Indah</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php echo base_url('/Users'); ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Keuangan
                                </li>
                            </ol>
                        </nav>

                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-primary" href="#" role="button" data-toggle="modal"
                                data-target="#tambah-khas">
                                Add New
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Filter  -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Filter Data</h4>
                    </div>
                </div>
                <form action="<?php echo base_url('/filter') ?>">
                    <?= csrf_field() ?>
                    <div class="row">

                        <div class="col-md-3 col-sm-12">
                            <div class="input-group custom">
                                <select
                                    class="form-control<?= $validation->hasError('jenis_khas') ? 'is-invalid' : null ?>"
                                    id="jenis_khas" name="jenis_khas">
                                    <option value="" disabled selected hidden>--Choice--</option>
                                    <option value="1">
                                        Pemasukan
                                    </option>
                                    <option value="2">
                                        Pengeluaran
                                    </option>

                                </select>

                                <?php if ($validation->hasError('jenis_khas')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jenis_khas'); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="input-group custom">
                                <input name="tanggalawal" class="form-control date-picker
                            <?= $validation->hasError('tanggalawal') ? 'is-invalid' : null ?>"
                                    placeholder="Select Date" type="text" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i
                                            class="icon-copy dw dw-time-management"></i></span>
                                </div>
                                <?php if ($validation->hasError('tanggalawal')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tanggalawal'); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="input-group custom">
                                <input name="tanggalakhir" class=" form-control date-picker
                            <?= $validation->hasError('tanggalakhir') ? 'is-invalid' : null ?>"
                                    placeholder="Select Date" type="text" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i
                                            class="icon-copy dw dw-time-management"></i></span>
                                </div>
                                <?php if ($validation->hasError('tanggalakhir')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tanggalakhir'); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="input-group custom">
                                <button name="search_pemasukan" value="search_pemasukan" type="submit"
                                    class="btn btn-secondary">
                                    <i class="icon-copy dw dw-search"></i>
                                </button>
                </form>
                <form action="<?php echo base_url('/admin/kas') ?>">
                    <button type="submit" class="btn btn-info ml-lg-4 ">
                        <i class="icon-copy dw dw-search">View All</i>
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

</div>
<!-- Simple Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">

        <h5>
            Total Kas = Rp. <?php echo number_format($total_kas, 0, '.', '.'); ?></h5>
        <br>
        <h4 class="text-blue h4">Data Pemasukan</h4>
        <p class="mb-0">
            Rincian Pemasukan Kas

        </p>
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
    <div class="pb-20">
        <table class="data-table table ssendtripe hover nowrap table-bordered">
            <!-- <table class="table hover multiple-select-row data-table-export nowrap"> Membuat Option Export-->
            <thead>
                <tr class="text-center small">
                    <th class="table-plus datatable-nosort" width="10px">No</th>
                    <th width="5px">Username</th>
                    <th width="5px">Jenis Kas</th>
                    <th width="2px">Deskripsi</th>
                    <th width="9px">Nominal</th>
                    <th width="3px" class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($keuangan as $khas) : ?>
                <tr class="text-center">
                    <td class="table-plus"><?= $i++; ?></td>
                    <td><?php echo word_limiter($khas['username'], 5, '....'); ?></td>
                    <td><?php
                            $nama = $khas['jenis_khas'];

                            if ($nama == 1) {

                            ?>
                        Pemasukan

                        <?php
                            } else { ?>Pengeluaran
                        <?php } ?></td>
                    <td><?php echo $khas['deskripsi']; ?></td>
                    <td>Rp. <?php echo number_format($khas['nominal'], 0, '.', '.');  ?></td>

                    <!-- Action Button -->
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <!-- Butonn View -->
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" data-toggle="modal" type="button"
                                    data-target="#view-modal<?= $khas['id']; ?>"><i class="dw dw-eye"></i>
                                    View</a>

                                <!-- Butonn Edit -->
                                <a class="dropdown-item" data-toggle="modal" type="button"
                                    data-target="#edit-modal<?= $khas['id']; ?>"><i class="dw dw-edit2"></i>
                                    Edit</a>
                                <!-- Butonn Delete -->
                                <a class="dropdown-item" data-toggle="modal" type="button"
                                    data-target="#confirmation-modal<?= $khas['id']; ?>"><i
                                        class="DeleteJemaat dw dw-delete-3"></i>Delete</a>

                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tr>
                <td class="text-center" colspan="4">Total Pemasukan</td>

                <td class="text-center"><b>Rp.
                        <?php echo number_format((int) $total_pemasukan, 0, '.', '.'); ?></b></td>
                <td></td>


            </tr>
        </table>
    </div>
</div>
<!-- Simple Datatable End -->

</div>


<!-- Table Pengeluaran -->
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">

            <div class="col-md-6 col-sm-12 text-right">

            </div>
        </div>
        <div class="swalalert" data-swal="<?= session()->get('success'); ?>">
        </div>
        <!-- Simple Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="text-blue h4">Data Pengeluaran</h4>
                <p class="mb-0">
                    Rincian Pengeluaran

                </p>
            </div>

            <div class="pb-20">
                <table class="data-table table ssendtripe hover nowrap table-bordered">
                    <!-- <table class="table hover multiple-select-row data-table-export nowrap"> Membuat Option Export-->
                    <thead>
                        <tr class="text-center small">
                            <th class="table-plus datatable-nosort" width="10px">No</th>
                            <th width="5px">Fullname</th>
                            <th width="5px">Jenis Kas</th>
                            <th width="2px">Deskripsi</th>
                            <th width="9px">Nominal</th>
                            <th width="3px">Status</th>
                            <th width="3px" class="datatable-nosort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pengeluaran as $khas) : ?>
                        <tr class="text-center">
                            <td class="table-plus"><?= $i++; ?></td>
                            <td><?php echo word_limiter($khas['username'], 5, '....'); ?></td>
                            <td><?php
                                    $nama = $khas['jenis_khas'];

                                    if ($nama == 1) {

                                    ?>
                                Pemasukan

                                <?php
                                    } else { ?>Pengeluaran
                                <?php } ?></td>
                            <td><?php echo $khas['deskripsi']; ?></td>
                            <td>Rp. <?php echo number_format($khas['nominal'], 0, '.', '.');  ?></td>
                            <td> <?php if (in_groups('admin')) : ?>
                                <?php
                                            $status = $khas['status'];
                                            if ($status == 0) {
                                        ?>

                                <span class="btn btn-outline-warning" data-toggle="modal"
                                    data-target="#exampleModal<?= $khas['id']; ?>">Pendding</span>


                                <div class="modal fade" id="exampleModal<?= $khas['id']; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    Aktivisasi
                                                    Berita
                                                    Gereja</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form
                                                    action="<?php echo base_url('admin/updateStatusKas/' . $khas['id']) ?>"
                                                    method="POST">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="_put">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="hidden" name="id"
                                                                value="<?= $khas['id']; ?>" />
                                                            <div class="form-group">
                                                                <label for="status">Status</label>
                                                                <select class="form-control required" id="status"
                                                                    name="status">

                                                                    <option value="0"
                                                                        <?php if ($khas['status'] == "0") echo "selected='selected'" ?>>
                                                                        Pendding
                                                                    </option>
                                                                    <option value="1"
                                                                        <?php if ($khas['status'] == "1") echo "selected='selected'" ?>>
                                                                        No-Approve
                                                                    </option>
                                                                    <option value="2"
                                                                        <?php if ($khas['status'] == "2") echo "selected='selected'" ?>>
                                                                        Approve
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
                                            } elseif ($status == 1) { ?>
                                    <span class="btn btn-outline-danger" data-toggle="modal"
                                        data-target="#exampleModalactive<?= $khas['id']; ?>">No-Approve</span>


                                    <div class="modal fade" id="exampleModalactive<?= $khas['id']; ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        Aktivisasi
                                                        Berita Gereja</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="<?php echo base_url('admin/updateStatusKas/' . $khas['id']) ?>"
                                                        method="POST">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="_method" value="_put">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <input type="hidden" name="id"
                                                                    value="<?= $khas['id']; ?>" />
                                                                <div class="form-group">
                                                                    <label for="status">Status</label>
                                                                    <select class="form-control required" id="status"
                                                                        name="status">
                                                                        <option value="0"
                                                                            <?php if ($khas['status'] == "0") echo "selected='selected'" ?>>
                                                                            Pendding
                                                                        </option>
                                                                        <option value="1"
                                                                            <?php if ($khas['status'] == "1") echo "selected='selected'" ?>>
                                                                            No-Approve
                                                                        </option>
                                                                        <option value="2"
                                                                            <?php if ($khas['status'] == "2") echo "selected='selected'" ?>>
                                                                            Approve
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
                                            data-target="#exampleModalactive<?= $khas['id']; ?>">Approve</span>


                                        <div class="modal fade" id="exampleModalactive<?= $khas['id']; ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            Aktivisasi
                                                            Berita Gereja</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="<?php echo base_url('admin/updateStatusKas/' . $khas['id']) ?>"
                                                            method="POST">
                                                            <?= csrf_field() ?>
                                                            <input type="hidden" name="_method" value="_put">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="hidden" name="id"
                                                                        value="<?= $khas['id']; ?>" />
                                                                    <div class="form-group">
                                                                        <label for="status">Status</label>
                                                                        <select class="form-control required"
                                                                            id="status" name="status">
                                                                            <option value="0"
                                                                                <?php if ($khas['status'] == "0") echo "selected='selected'" ?>>
                                                                                Pendding
                                                                            </option>
                                                                            <option value="1"
                                                                                <?php if ($khas['status'] == "1") echo "selected='selected'" ?>>
                                                                                No-Approve
                                                                            </option>
                                                                            <option value="2"
                                                                                <?php if ($khas['status'] == "2") echo "selected='selected'" ?>>
                                                                                Approve
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
                                            <?php elseif ('user') : ?>
                                            <?php
                                                    $nama = $khas['status'];

                                                    if ($nama == 0) {

                                                    ?>
                                            Pendding

                                            <?php
                                                    } elseif ($nama == 1) { ?>Non-Approve

                                            <?php
                                                    } else { ?>Approve
                                            <?php } ?>

                            </td>
                            <?php endif; ?>
                            </td>



                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                        role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <!-- Butonn View -->
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item" data-toggle="modal" type="button"
                                            data-target="#view-modal<?= $khas['id']; ?>"><i class="dw dw-eye"></i>
                                            View</a>

                                        <!-- Butonn Edit -->
                                        <a class="dropdown-item" data-toggle="modal" type="button"
                                            data-target="#edit-modal<?= $khas['id']; ?>"><i class="dw dw-edit2"></i>
                                            Edit</a>
                                        <!-- Butonn Delete -->
                                        <a class="dropdown-item" data-toggle="modal" type="button"
                                            data-target="#confirmation-modal<?= $khas['id']; ?>"><i
                                                class="DeleteJemaat dw dw-delete-3"></i>Delete</a>

                                    </div>
                                </div>
                            </td>
                        </tr>

                        <?php endforeach; ?>
                    </tbody>
                    <tr>
                        <td class="text-center" colspan="4">Total Pengeluaran</td>
                        <?php
                        $total_pengeluaran['total'] = [];
                        if (isset($total_pengeluaran['total'])) {

                        ?>
                        <td class="text-center"><b>Rp.0
                            </b></td>

                        <?php } else { ?>
                        <td class="text-center"><b>Rp.
                                <?php echo number_format($total_pengeluaran, 0, '.', '.'); ?></b></td>
                        <?php  } ?>
                        <td></td>
                        <td></td>


                    </tr>
                </table>

            </div>
        </div>
        <!-- Simple Datatable End -->
    </div>

    <!-- End Pemasukan -->



    <!-- Modal Tambah Data Keuangan -->

    <div class="modal fade" id="tambah-khas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Tambah Data Keuangan
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('/admin/TambahKhas'); ?>" enctype="multipart/form-data" method="post">
                        <?= csrf_field() ?>


                        <div class="input-group custom">
                            <select name="jenis_khas" value="<?= set_value('jenis_khas'); ?>"
                                class="custom-select col-12 <?= $validation->hasError('jenis_khas') ? 'is-invalid' : null ?>">
                                <option value="" disabled selected hidden>--Choice--</option>
                                <option value="1">Pemasukan </option>
                                <option value="2">Pengeluaran </option>
                            </select>
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy fi-list-thumbnails"></i></span>
                            </div>
                            <?php if ($validation->hasError('jenis_khas')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('jenis_khas'); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="input-group custom">
                            <input name="deskripsi" type="text" value="<?= set_value('deskripsi'); ?>"
                                class="form-control form-control-lg <?= $validation->hasError('deskripsi') ? 'is-invalid' : null ?>"
                                placeholder="Nama Khas" />
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy dw dw-package"></i></span>
                            </div>
                            <?php if ($validation->hasError('deskripsi')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('deskripsi'); ?>
                            </div>
                            <?php endif; ?>
                        </div>


                        <input name="fullname" type="text"
                            class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>"
                            placeholder="" value="<?= user()->fullname; ?>" hidden />
                        <input name="username" type="text"
                            class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>"
                            placeholder="" value="<?= user()->username; ?>" hidden />
                        <input name="groups" type="text"
                            class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>"
                            placeholder="" value="<?= user()->username; ?>" hidden />



                        <div class="input-group custom">
                            <input name="nominal" type="text" value="" id="jumlah_pemasukan"
                                value="<?= set_value('nominal'); ?>"
                                class="form-control form-control-lg <?= $validation->hasError('jumlah_pemasukan') ? 'is-invalid' : null ?>"
                                placeholder="Jumlah Nominal" />
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy dw dw-money"></i></span>
                            </div>
                            <?php if ($validation->hasError('jumlah_pemasukan')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('jumlah_pemasukan'); ?>
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="input-group custom">
                            <input name="tanggal" value="<?= set_value('tanggal'); ?>"
                                class="form-control date-picker <?= $validation->hasError('tanggal') ? 'is-invalid' : null ?>"
                                placeholder="Select Date" type="text" />
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy dw dw-time-management"></i></span>
                            </div>
                            <?php if ($validation->hasError('tanggal')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('tanggal'); ?>
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



<!-- End Table -->
</div>
</div>
<!--  -->








<!-- Modal View Kas -->

<?php
foreach ($keuangan as $khas) :  ?>
<div class="modal fade" id="view-modal<?= $khas['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500">
                    Detail view of financial data !!
                </h4>
                <div class="profile-info">
                    <h5 class="mb-20 h5 text-blue">Detail Financial !!</h5>
                    <ul>
                        <li>
                            <span>Create by :</span>
                            <?= $khas['fullname']; ?>
                        </li>

                        <li>
                            <span>Jenis Khas:</span>
                            <?php
                                $nama = $khas['jenis_khas'];

                                if ($nama == 1) {

                                ?>
                            Pemasukan

                            <?php
                                } else { ?>Pengeluaran
                            <?php } ?>
                        </li>
                        <li>
                            <span>Deskripsi Khas:</span>
                            <?= $khas['deskripsi']; ?>
                        </li>
                        <li>
                            <span>Nominal :</span>
                            Rp. <?= number_format($khas['nominal'], 0, ',', ',');  ?>
                        </li>
                        <li>
                            <span>Tanggal :</span>
                            <?= $khas['tanggal']; ?>
                        </li>
                        <li>
                            <span>Create Time :</span>
                            <?= $khas['created']; ?>
                        </li>
                        <li>
                            <span>Status :</span>
                            <?php $nama = $khas['status'];

                                if ($nama == 0) {

                                ?>
                            Pendding

                            <?php
                                } else { ?>Approve
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
<!--  -->


<!-- Modal Update Data Keuangan -->

<?php
foreach ($keuangan as $khas) :  ?>
<div class="modal fade" id="edit-modal<?= $khas['id']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Update Data Finance
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/admin/UpdateKas/' . $khas['id']); ?>" enctype="multipart/form-data"
                    method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">

                    <div class="input-group custom">
                        <select name="jenis_khas"
                            class="custom-select col-12 <?= $validation->hasError('jenis_khas') ? 'is-invalid' : null ?>">
                            <option value="" disabled selected hidden>--Choice--</option>
                            <option value="1" <?php if ($khas['jenis_khas'] == 1) echo "selected = 'selected'" ?>>
                                Pemasukan</option>
                            <option value="2" <?php if ($khas['jenis_khas'] == 2) echo "selected = 'selected'" ?>>
                                Pengeluaran</option>
                        </select>
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="icon-copy fi-list-thumbnails"></i></span>
                        </div>
                        <?php if ($validation->hasError('jenis_khas')) : ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('jenis_khas'); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="input-group custom">
                        <input name="deskripsi" type="text" value="<?= $khas['deskripsi']; ?>"
                            class="form-control form-control-lg <?= $validation->hasError('deskripsi') ? 'is-invalid' : null ?>"
                            placeholder="Nama Khas" />
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="icon-copy dw dw-package"></i></span>
                        </div>
                        <?php if ($validation->hasError('deskripsi')) : ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('deskripsi'); ?>
                        </div>
                        <?php endif; ?>
                    </div>


                    <input name="fullname" type="text"
                        class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>"
                        placeholder="" value="<?= user()->fullname; ?>" hidden />
                    <input name="groups" type="text"
                        class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>"
                        placeholder="" value="<?= user()->groups; ?>" hidden />
                    <input name="username" type="text"
                        class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>"
                        placeholder="" value="<?= user()->username; ?>" hidden />

                    <div class="input-group custom">
                        <input name="nominal" type="text" value="<?= $khas['nominal'] ?>" id="jumlah_pemasukan"
                            class="form-control form-control-lg <?= $validation->hasError('jumlah_pemasukan') ? 'is-invalid' : null ?>"
                            placeholder="Jumlah Nominal" />
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="icon-copy dw dw-money"></i></span>
                        </div>
                        <?php if ($validation->hasError('jumlah_pemasukan')) : ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('jumlah_pemasukan'); ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="input-group custom">
                        <input name="tanggal" value="<?= $khas['tanggal']; ?>" class=" form-control date-picker
                            <?= $validation->hasError('tanggal') ? 'is-invalid' : null ?> placeholder=" Select Date"
                            type="text" />
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="icon-copy dw dw-time-management"></i></span>
                        </div>
                        <?php if ($validation->hasError('tanggal')) : ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('tanggal'); ?>
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

<?php
foreach ($keuangan as $khas) :  ?>
<!-- Confirmation modal Delete -->

<div class="modal fade" id="confirmation-modal<?= $khas['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500">
                    Are you sure you want to Delete?
                </h4>

                <form action="<?php echo base_url('admin/deleteKas/' . $khas['id']); ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="_delete">
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
<?php endforeach; ?>


<!-- Pengeluaran Modal -->

<!-- Modal View Kas -->

<?php
foreach ($pengeluaran as $khas) :  ?>
<div class="modal fade" id="view-modal<?= $khas['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500">
                    Detail view of financial data !!
                </h4>
                <div class="profile-info">
                    <h5 class="mb-20 h5 text-blue">Detail Financial !!</h5>
                    <ul>
                        <li>
                            <span>Create by :</span>
                            <?= $khas['fullname']; ?>
                        </li>

                        <li>
                            <span>Jenis Khas:</span>
                            <?php
                                $nama = $khas['jenis_khas'];

                                if ($nama == 1) {

                                ?>
                            Pemasukan

                            <?php
                                } else { ?>Pengeluaran
                            <?php } ?>
                        </li>
                        <li>
                            <span>Deskripsi Khas:</span>
                            <?= $khas['deskripsi']; ?>
                        </li>
                        <li>
                            <span>Nominal :</span>
                            Rp. <?= number_format($khas['nominal'], 0, ',', ',');  ?>
                        </li>
                        <li>
                            <span>Tanggal :</span>
                            <?= $khas['tanggal']; ?>
                        </li>
                        <li>
                            <span>Create Time :</span>
                            <?= $khas['created']; ?>
                        </li>
                        <li>
                            <span>Status :</span>
                            <?php $nama = $khas['status'];

                                if ($nama == 0) {

                                ?>
                            Pendding

                            <?php
                                } else { ?>Approve
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
<!--  -->


<!-- Pengeluaran -->

<!-- Modal Update Data Keuangan -->

<?php
foreach ($pengeluaran as $khas) :  ?>
<div class="modal fade" id="edit-modal<?= $khas['id']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Update Data Finance
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/admin/UpdateKas/' . $khas['id']); ?>" enctype="multipart/form-data"
                    method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">

                    <div class="input-group custom">
                        <select name="jenis_khas"
                            class="custom-select col-12 <?= $validation->hasError('jenis_khas') ? 'is-invalid' : null ?>">
                            <option value="" disabled selected hidden>--Choice--</option>
                            <option value="1" <?php if ($khas['jenis_khas'] == 1) echo "selected = 'selected'" ?>>
                                Pemasukan</option>
                            <option value="2" <?php if ($khas['jenis_khas'] == 2) echo "selected = 'selected'" ?>>
                                Pengeluaran</option>
                        </select>
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="icon-copy fi-list-thumbnails"></i></span>
                        </div>
                        <?php if ($validation->hasError('jenis_khas')) : ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('jenis_khas'); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="input-group custom">
                        <input name="deskripsi" type="text" value="<?= $khas['deskripsi']; ?>"
                            class="form-control form-control-lg <?= $validation->hasError('deskripsi') ? 'is-invalid' : null ?>"
                            placeholder="Nama Khas" />
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="icon-copy dw dw-package"></i></span>
                        </div>
                        <?php if ($validation->hasError('deskripsi')) : ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('deskripsi'); ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <input name="fullname" type="text" class="form-control form-control-lg
                     <?= $validation->hasError('username') ? 'is-invalid' : null ?>" placeholder=""
                        value="<?= user()->fullname; ?>" hidden />
                    <input name="groups" type="text"
                        class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>"
                        placeholder="" value="<?= user()->groups; ?>" hidden />
                    <input name="username" type="text"
                        class="form-control form-control-lg <?= $validation->hasError('username') ? 'is-invalid' : null ?>"
                        placeholder="" value="<?= user()->username; ?>" hidden />

                    <div class="input-group custom">
                        <input name="nominal" type="text" value="<?= $khas['nominal'] ?>" id=""
                            class="form-control form-control-lg <?= $validation->hasError('jumlah_pemasukan') ? 'is-invalid' : null ?>"
                            placeholder="Jumlah Nominal" />
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="icon-copy dw dw-money"></i></span>
                        </div>
                        <?php if ($validation->hasError('jumlah_pemasukan')) : ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('jumlah_pemasukan'); ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="input-group custom">
                        <input name="tanggal" value="<?= $khas['tanggal']; ?>" class=" form-control date-picker
                            <?= $validation->hasError('tanggal') ? 'is-invalid' : null ?>" placeholder="Select Date"
                            type="text" />
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="icon-copy dw dw-time-management"></i></span>
                        </div>
                        <?php if ($validation->hasError('tanggal')) : ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('tanggal'); ?>
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

<?php
foreach ($pengeluaran as $khas) :  ?>
<!-- Confirmation modal Delete -->

<div class="modal fade" id="confirmation-modal<?= $khas['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500">
                    Are you sure you want to Delete?
                </h4>

                <form action="<?php echo base_url('admin/deleteKas/' . $khas['id']); ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="_delete">
                    <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn"
                                data-dismiss="modal">
                                <i class="fa fa-times"></i>
                            </button>
                            NO
                        </div>
                        <div class="col-6">
                            <input type="hidden" name="confirm_delete" value="1">
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
<?php endforeach; ?>


<!-- End Row -->
</div>
<!-- End Main Conten -->
</div>
<?php $this->endSection(); ?>