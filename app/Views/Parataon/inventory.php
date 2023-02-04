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
                            <h4>Data inventory</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Data inventory
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-primary" href="#" role="button" data-toggle="modal"
                                data-target="#add-inventory">
                                Add New
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
                    <h4 class="text-blue h4">Data inventory</h4>
                    <p class="mb-0">
                        you can find more options

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
                    <table class="data-table table stripe hover nowrap table-bordered">
                        <!-- <table class="table hover multiple-select-row data-table-export nowrap"> Membuat Option Export-->
                        <thead>
                            <tr class="text-center">
                                <th class="table-plus datatable-nosort" width="1px">No</th>
                                <th width="5px">Fullname</th>
                                <th width="5px">Inventory Name</th>
                                <th width="2px">Inventory Date</th>
                                <th width="3px">Status</th>
                                <th width="3px" class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($inventory as $inv) : ?>
                            <tr class="text-center">
                                <td class="table-plus"><?= $i++; ?></td>
                                <td><?php echo word_limiter($inv['fullname'], 5, '....'); ?></td>
                                <td><?php echo word_limiter($inv['nama_barang'], 5, '.....'); ?></td>
                                <td><?php echo $inv['tanggal']; ?></td>
                                <td>
                                    <?php if (in_groups('admin')) : ?>
                                    <?php
                                                    $status = $inv['status'];
                                                    if ($status == 0) {
                                                        ?>

                                    <span class="btn btn-outline-warning" data-toggle="modal"
                                        data-target="#exampleModal<?= $inv['id']; ?>">Pendding</span>

                                    <div class="modal fade" id="exampleModal<?= $inv['id']; ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Aktivisasi Inventory
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="<?php echo base_url('admin/updateStatusinventory/' . $inv['id']) ?>"
                                                        method="POST">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="_method" value="_put">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <input type="hidden" name="id"
                                                                    value="<?= $inv['id']; ?>" />
                                                                <div class="form-group">
                                                                    <label for="status">Status</label>
                                                                    <select class="form-control required" id="status"
                                                                        name="status">
                                                                        <option value="1"
                                                                            <?php if ($inv['status'] == "1") echo "selected='selected'" ?>>
                                                                            Active
                                                                        </option>
                                                                        <option value="0"
                                                                            <?php if ($inv['status'] == "0") echo "selected='selected'" ?>>
                                                                            Pendding
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
                                            data-target="#exampleModalactive<?= $inv['id']; ?>">Approve</span>


                                        <div class="modal fade" id="exampleModalactive<?= $inv['id']; ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Aktivisasi
                                                            Inventory </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="<?php echo base_url('admin/updateStatusinventory/' . $inv['id']) ?>"
                                                            method="POST">
                                                            <?= csrf_field() ?>
                                                            <input type="hidden" name="_method" value="_put">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="hidden" name="id"
                                                                        value="<?= $inv['id']; ?>" />
                                                                    <div class="form-group">
                                                                        <label for="status">Status</label>
                                                                        <select class="form-control required"
                                                                            id="status" name="status">

                                                                            <option value="1"
                                                                                <?php if ($inv['status'] == "1") echo "selected='selected'" ?>>
                                                                                Approve
                                                                            </option>
                                                                            <option value="0"
                                                                                <?php if ($inv['status'] == "0") echo "selected='selected'" ?>>
                                                                                Pendding
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

                                            <?php elseif (in_groups('parataon')) : ?>

                                            <?php
                                                            $nama = $inv['status'];

                                                            if ($nama == 0) {

                                                                ?>

                                            <div class="alert alert-warning" role="alert">
                                                Pendding
                                            </div>

                                            <?php
                                                            } elseif ($nama == 1) { ?><div class="alert alert-danger"
                                                role="alert">
                                                Non-Aprove
                                            </div>
                                        </div>
                                        <?php } else { ?>
                                        <div class="alert alert-success" role="alert">
                                            Approve
                                        </div>
                                        <?php } ?>
                                </td>
                                <?php endif; ?>
                                </td>


                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                            href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <!-- Butonn View -->
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" data-toggle="modal" type="button"
                                                data-target="#view-modal<?= $inv['id']; ?>"><i class="dw dw-eye"></i>
                                                View</a>

                                            <!-- Butonn Edit -->
                                            <a class="dropdown-item" data-toggle="modal" type="button"
                                                data-target="#edit-modal<?= $inv['id']; ?>"><i class="dw dw-edit2"></i>
                                                Edit</a>
                                            <!-- Butonn Delete -->
                                            <a class="dropdown-item" data-toggle="modal" type="button"
                                                data-target="#confirmation-modal<?= $inv['id']; ?>"><i
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



        <!-- Data Peminjaman Parataon -->


        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">


                    </div>
                </div>
                <div class="swalalert" data-swal="<?= session()->get('success'); ?>">
                </div>
                <!-- Simple Datatable start -->
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Data Peminjaman</h4>
                        <p class="mb-0">
                            you can find more options

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
                                    <th width="5px">Fullname</th>
                                    <th width="5px">Inventory Name</th>
                                    <th width="2px">Peminjaman</th>
                                    <th width="9px">Pengembalian</th>
                                    <th width="3px">Status</th>
                                    <th width="3px" class="datatable-nosort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($peminjaman as $send) : ?>
                                <tr class="text-center">
                                    <td class="table-plus"><?= $i++; ?></td>
                                    <td><?php echo word_limiter($send['nama_peminjam'], 5, '....'); ?></td>
                                    <td><?php echo word_limiter($send['nama_barang'], 5, '.....'); ?></td>
                                    <td><?php echo $send['tanggal']; ?></td>
                                    <td><?php echo $send['return_date']; ?></td>
                                    <td>
                                        <?php if (in_groups('parataon')) : ?>
                                        <?php
                                                        $status = $send['status'];
                                                        if ($status == 0) {
                                                            ?>

                                        <span class="btn btn-outline-warning" data-toggle="modal"
                                            data-target="#exampleModal<?= $send['id']; ?>">Pendding</span>

                                        <div class="modal fade" id="exampleModal<?= $send['id']; ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Aktivisasi
                                                            Inventory
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="<?php echo base_url('users/updateStatusPeminjaman/' . $send['id']) ?>"
                                                            method="POST">
                                                            <?= csrf_field() ?>
                                                            <input type="hidden" name="_method" value="_put">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="hidden" name="id"
                                                                        value="<?= $send['id']; ?>" />
                                                                    <div class="form-group">
                                                                        <label for="status">Status</label>
                                                                        <select class="form-control required"
                                                                            id="status" name="status">

                                                                            <option value="0"
                                                                                <?php if ($send['status'] == "0") echo "selected='selected'" ?>>
                                                                                Pendding
                                                                            </option>
                                                                            <option value="1"
                                                                                <?php if ($send['status'] == "1") echo "selected='selected'" ?>>
                                                                                Non Approve
                                                                            </option>
                                                                            <option value="2"
                                                                                <?php if ($send['status'] == "2") echo "selected='selected'" ?>>
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
                                                data-target="#exampleModalactive<?= $send['id']; ?>">Non Aprrove</span>


                                            <div class="modal fade" id="exampleModalactive<?= $send['id']; ?>"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Aktivisasi
                                                                Inventory </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="<?php echo base_url('users/updateStatusPeminjaman/' . $send['id']) ?>"
                                                                method="POST">
                                                                <?= csrf_field() ?>
                                                                <input type="hidden" name="_method" value="_put">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input type="hidden" name="id"
                                                                            value="<?= $send['id']; ?>" />
                                                                        <div class="form-group">
                                                                            <label for="status">Status</label>
                                                                            <select class="form-control required"
                                                                                id="status" name="status">

                                                                                <option value="0"
                                                                                    <?php if ($send['status'] == "0") echo "selected='selected'" ?>>
                                                                                    Pendding
                                                                                </option>
                                                                                <option value="1"
                                                                                    <?php if ($send['status'] == "1") echo "selected='selected'" ?>>
                                                                                    Non Approve
                                                                                </option>
                                                                                <option value="2"
                                                                                    <?php if ($send['status'] == "2") echo "selected='selected'" ?>>
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
                                                    data-target="#exampleModalactive<?= $send['id']; ?>">Approve</span>


                                                <div class="modal fade" id="exampleModalactive<?= $send['id']; ?>"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Aktivisasi Inventory </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form
                                                                    action="<?php echo base_url('users/updateStatusPeminjaman/' . $send['id']) ?>"
                                                                    method="POST">
                                                                    <?= csrf_field() ?>
                                                                    <input type="hidden" name="_method" value="_put">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="hidden" name="id"
                                                                                value="<?= $send['id']; ?>" />
                                                                            <div class="form-group">
                                                                                <label for="status">Status</label>
                                                                                <select class="form-control required"
                                                                                    id="status" name="status">

                                                                                    <option value="0"
                                                                                        <?php if ($send['status'] == "0") echo "selected='selected'" ?>>
                                                                                        Pendding
                                                                                    </option>
                                                                                    <option value="1"
                                                                                        <?php if ($send['status'] == "1") echo "selected='selected'" ?>>
                                                                                        Non Approve
                                                                                    </option>
                                                                                    <option value="2"
                                                                                        <?php if ($send['status'] == "2") echo "selected='selected'" ?>>
                                                                                        Approve
                                                                                    </option>>

                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Save
                                                                            changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <?php
                                                                    }
                                                                    ?>

                                                    <?php elseif (in_groups('parataon')) : ?>

                                                    <?php
                                                                    $nama = $send['status'];

                                                                    if ($nama == 0) {

                                                                        ?>

                                                    <div class="alert alert-warning" role="alert">
                                                        Pendding
                                                    </div>

                                                    <?php
                                                                    } elseif ($nama == 1) { ?><div
                                                        class="alert alert-danger" role="alert">
                                                        Non-Aprove
                                                    </div>
                                                </div>
                                                <?php } else { ?>
                                                <div class="alert alert-success" role="alert">
                                                    Approve
                                                </div>
                                                <?php } ?>
                                    </td>
                                    <?php endif; ?>
                                    </td>


                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <!-- Butonn View -->
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" data-toggle="modal" type="button"
                                                    data-target="#view-modal<?= $send['id']; ?>"><i
                                                        class="dw dw-eye"></i>
                                                    View</a>

                                                <!-- Butonn Edit -->
                                                <a class="dropdown-item" data-toggle="modal" type="button"
                                                    data-target="#edit-modal<?= $send['id']; ?>"><i
                                                        class="dw dw-edit2"></i>
                                                    Edit</a>
                                                <!-- Butonn Delete -->
                                                <a class="dropdown-item" data-toggle="modal" type="button"
                                                    data-target="#confirmation-modal<?= $send['id']; ?>"><i
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
            </div>
            <!-- Simple Datatable End -->
        </div>



        <!-- Modal View Data  -->

        <?php
        foreach ($peminjaman as $send) :  ?>
        <div class="modal fade" id="view-modal<?= $send['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center font-18">
                        <h4 class="padding-top-30 mb-30 weight-500">
                            Detail view of data !!
                        </h4>
                        <div class="profile-info">
                            <h5 class="mb-20 h5 text-blue">Detail Peminjaman !!</h5>
                            <ul>
                                <li>
                                    <span>Created / Update by :</span>
                                    <?= $send['nama_peminjam']; ?> // <?= $send['username']; ?>
                                </li>

                                <li>
                                    <span>Nama Peminjam :</span>
                                    <?= $send['nama_peminjam']; ?>
                                </li>
                                <li>
                                    <span>Inventory Name :</span>
                                    <?= $send['nama_barang']; ?>
                                </li>

                                <li>
                                    <span>Tanggal Peminjaman :</span>
                                    <?= $send['tanggal']; ?>
                                </li>
                                <li>
                                    <span>Tanggal Pengembalian :</span>
                                    <?= $send['return_date']; ?>
                                </li>
                                <li>
                                    <span>Created / Updated Time :</span>
                                    <?= $send['created']; ?> // <?= $send['modified']; ?>
                                </li>

                                <li>
                                    <span>Status :</span>

                                    <?php
                                            $nama = $send['status'];

                                            if ($nama == 0) {

                                                ?>

                                    <div class="alert alert-warning" role="alert">
                                        Pendding
                                    </div>

                                    <?php
                                            } elseif ($nama == 1) { ?><div class="alert alert-danger" role="alert">
                                        Non-Aprove
                                    </div>
                        </div>
                        <?php } else { ?>
                        <div class="alert alert-success" role="alert">
                            Approve
                        </div>
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
foreach ($peminjaman as $send) :  ?>
    <div class="modal fade" id="edit-modal<?= $send['id']; ?>" tabindex="-1" role="dialog"
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
                    <form
                        action="<?= base_url('/users/updateInventory/' . $send['id'] . '/' . $send['nama_barang']); ?>"
                        enctype="multipart/form-data" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PUT">


                        <div class="input-group custom">
                            <input name="nama_barang" type="text" value="<?= $send['nama_barang']; ?>"
                                class="form-control form-control-lg <?= $validation->hasError('nama_barang') ? 'is-invalid' : null ?>"
                                placeholder="Nama Barang" />
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy dw dw-package"></i></span>
                            </div>
                            <?php if ($validation->hasError('nama_barang')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_barang'); ?>
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
                            <input name="tanggal" value="<?= $send['tanggal']; ?>" class=" form-control date-picker
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
foreach ($peminjaman as $send) :  ?>
<!-- Confirmation modal Delete -->

<div class="modal fade" id="confirmation-modal<?= $send['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500">
                    Are you sure you want to Delete?
                </h4>

                <form action="<?php echo base_url('/users/deleteInventory/' . $send['id']); ?>" method="post">
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


<!-- End Row -->
</div>
<!-- End Main Conten -->
</div>
<?php endforeach; ?>
<?php $this->endSection(); ?>