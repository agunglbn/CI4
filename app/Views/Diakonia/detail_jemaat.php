<?= $this->extend('/deskapp/includes/index') ?>
<!-- echo header,rightsidebar,leftsidebar and loader -->
<?= $this->section('main-content'); ?>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Profile</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <div class="profile-photo">
                            <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i
                                    class="fa fa-pencil"></i></a>
                            <img src="<?= base_url('/assets/vendors/images/' . $jemaat[0]['img']); ?>" alt=""
                                class="avatar-photo">
                            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body pd-5">
                                            <div class="img-container">
                                                <img id="image"
                                                    src="<?= base_url('/assets/vendors/images/' . $jemaat[0]['img']); ?>"
                                                    alt="Picture">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" value="Update" class="btn btn-primary">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5 class="text-center h5 mb-0"><?= $jemaat[0]['nama_jemaat']; ?></h5>
                        <p class="text-center text-muted font-14"><?= $jemaat[0]['kategori']; ?></p>
                        <div class="profile-info">
                            <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                            <ul>
                                <li>
                                    <span>Email Address:</span>
                                    <?= $jemaat[0]['email']; ?>
                                </li>
                                <li>
                                    <span>Phone Number:</span>
                                    <?= $jemaat[0]['nohp']; ?>
                                </li>
                                <li>
                                    <span>Tanggal Lahir :</span>
                                    <?= $jemaat[0]['tgl_lahir']; ?>
                                </li>
                                <li>
                                    <span>Umur :</span>
                                    <?= $jemaat[0]['umur']; ?>
                                </li>
                                <li>
                                    <span>Pekerjaan :</span>
                                    <?= $jemaat[0]['pekerjaan']; ?>
                                </li>
                                <li>
                                    <span>Sektor :</span>
                                    <?= $jemaat[0]['sektor']; ?>
                                </li>
                                <li>
                                    <span>Address:</span>
                                    <?= $jemaat[0]['alamat']; ?>
                                </li>
                            </ul>
                            <br>
                            <h5 class="mb-20 h5 text-blue">Information Keluarga</h5>
                            <ul>
                                <li>
                                    <span>Nama Kepala Keluarga :</span>
                                    <?= $jemaat[0]['kepala_keluarga']; ?>
                                </li>
                                <li>
                                    <span>NO HP :</span>
                                    <?= $jemaat[0]['nohp_kp']; ?>
                                </li>
                                <li>

                            </ul>
                            <br>
                        </div>

                    </div>
                </div>

                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
                    <div class="card-box height-100-p overflow-hidden">
                        <div class="profile-tab height-100-p">
                            <div class="tab height-100-p">
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#setting"
                                            role="tab">Settings</a>
                                    </li>


                                </ul>
                                <div class="tab-content">
                                    <!-- Timeline Tab start -->

                                    <!-- Timeline Tab End -->
                                    <!-- Tasks Tab start -->

                                    <!-- Tasks Tab End -->
                                    <!-- Setting Tab start -->
                                    <div class="tab-pane fade height-100-p show active" id="setting" role="tabpanel">
                                        <div class="profile-setting">
                                            <form action="<?= base_url('/admin/updateJemaat/' . $jemaat[0]['id']); ?>"
                                                enctype="multipart/form-data" method="post">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="_method" value="PUT">
                                                <ul class="profile-edit-list row">
                                                    <li class="weight-500 col-md-6">
                                                        <h4 class="text-blue h5 mb-20">Edit Data Pribadi Jemaat</h4>
                                                        <div class="form-group">
                                                            <label>Full Name</label>
                                                            <input type="hidden" name="id"
                                                                value="<?php echo $jemaat[0]['id']; ?>">
                                                            <input
                                                                class="form-control form-control-lg <?= $validation->hasError('nama_jemaat') ? 'is-invalid' : null ?>"
                                                                name="nama_jemaat"
                                                                value="<?php echo $jemaat[0]['nama_jemaat']; ?>"
                                                                type="text">
                                                            <?php if ($validation->hasError('nama_jemaat')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('nama_jemaat'); ?>
                                                            </div>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input
                                                                class="form-control form-control-lg <?= $validation->hasError('email') ? 'is-invalid' : null ?>"
                                                                name="email" type="email"
                                                                value="<?php echo $jemaat[0]['email']; ?>"
                                                                placeholder="<?php echo $jemaat[0]['email']; ?>">
                                                            <?php if ($validation->hasError('email')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('email'); ?>
                                                            </div>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Phone</label>
                                                            <input
                                                                class="form-control form-control-lg <?= $validation->hasError('nohp') ? 'is-invalid' : null ?>"
                                                                name="nohp" value="<?php echo $jemaat[0]['nohp']; ?>"
                                                                type="text">
                                                            <?php if ($validation->hasError('nohp')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('nohp'); ?>
                                                            </div>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Date of birth</label>
                                                            <input class="form-control form-control-lg date-picker"
                                                                name="tgl_lahir" type="text"
                                                                value="<?php echo $jemaat[0]['tgl_lahir']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Umur</label>
                                                            <input
                                                                class="form-control form-control-lg <?= $validation->hasError('umur') ? 'is-invalid' : null ?>"
                                                                name="umur" value="<?php echo $jemaat[0]['umur']; ?>"
                                                                type="number">
                                                            <?php if ($validation->hasError('umur')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('umur'); ?>
                                                            </div>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Pekerjaan :</label>
                                                            <input
                                                                class="form-control form-control-lg <?= $validation->hasError('pekerjaan') ? 'is-invalid' : null ?>"
                                                                name="pekerjaan"
                                                                value="<?php echo $jemaat[0]['pekerjaan']; ?>"
                                                                type="text" placeholder="Mahasiswa">
                                                            <?php if ($validation->hasError('pekerjaan')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('pekerjaan'); ?>
                                                            </div>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Gender</label>
                                                            <div class="d-flex">
                                                                <div class="custom-control custom-radio mb-5 mr-20">
                                                                    <input type="radio" id="customRadio4" name="jk"
                                                                        name="customRadio" class="custom-control-input"
                                                                        value="Laki-laki"
                                                                        <?php if ($jemaat[0]['jenis_kelamin'] == 'Laki-laki') echo 'checked' ?>>
                                                                    <label class="custom-control-label weight-400"
                                                                        for="customRadio4">Laki-Laki</label>
                                                                </div>
                                                                <div class="custom-control custom-radio mb-5">
                                                                    <input type="radio" id="customRadio5" name="jk"
                                                                        name="customRadio" class="custom-control-input"
                                                                        value="Perempuan"
                                                                        <?php if ($jemaat[0]['jenis_kelamin'] == 'Perempuan') echo 'checked' ?>>
                                                                    <label class=" custom-control-label weight-400"
                                                                        for="customRadio5">Perempuan</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kategori</label>
                                                            <select
                                                                class="selectpicker form-control form-control-lg <?= $validation->hasError('img') ? 'is-invalid' : null ?>""
                                                                data-style=" btn-outline-secondary btn-lg"
                                                                name="kategori">
                                                                <?php foreach ($kategori as $kat) :  ?>
                                                                <?php if (old('kategori', $jemaat[0]['kategori']) == $kat['nama_kategori']) : ?>
                                                                <option value="<?php echo  $jemaat[0]['kategori']; ?>"
                                                                    selected>
                                                                    <?= $kat['nama_kategori']; ?></option>
                                                                <?php else : ?>
                                                                <option value="<?php echo $kat['nama_kategori']; ?>">
                                                                    <?php echo $kat['nama_kategori']; ?>
                                                                </option>

                                                                <?php endif; ?>
                                                                <?php endforeach; ?>

                                                            </select>
                                                            <?php if ($validation->hasError('kategori')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('kategori'); ?>
                                                            </div>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Sektor :</label>
                                                            <input
                                                                class="form-control form-control-lg <?= $validation->hasError('sektor') ? 'is-invalid' : null ?>"
                                                                name="sektor"
                                                                value="<?php echo $jemaat[0]['sektor']; ?>" type="text"
                                                                placeholder="Nazaret">
                                                            <?php if ($validation->hasError('sektor')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('sektor'); ?>
                                                            </div>
                                                            <?php endif; ?>
                                                        </div>

                                                        <div class=" form-group">
                                                            <label>Alamat Lengkap :</label>
                                                            <textarea
                                                                class="form-control <?= $validation->hasError('img') ? 'is-invalid' : null ?>"
                                                                name="alamat"><?php echo $jemaat[0]['alamat']; ?></textarea>
                                                            <?php if ($validation->hasError('alamat')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('alamat'); ?>
                                                            </div>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Profile : </label>
                                                            <input
                                                                class="form-control form-control-lg <?= $validation->hasError('img') ? 'is-invalid' : null ?>"
                                                                value="<?php echo $jemaat[0]['img']; ?>"
                                                                accept="image/*" type="file" name="img">
                                                            <!-- gambar lama -->
                                                            <input
                                                                class="form-control form-control-lg <?= $validation->hasError('email') ? 'is-invalid' : null ?>"
                                                                name="gambar_lama" type="hidden"
                                                                value="<?php echo $jemaat[0]['img']; ?>">
                                                            <?php if ($validation->hasError('img')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('img'); ?>
                                                            </div>
                                                            <?php endif; ?>
                                                        </div>


                                                        <div class="form-group mb-0">
                                                            <button type="submit" class="btn btn-primary"
                                                                value="Update Data">Update Data</button>
                                                        </div>
                                                    </li>
                                                    <li class="weight-500 col-md-6">
                                                        <h4 class="text-blue h5 mb-20">Edit Data Keluarga</h4>
                                                        <div class="form-group">
                                                            <label>Nama Kepala Keluarga :</label>
                                                            <input
                                                                class="form-control form-control-lg <?= $validation->hasError('kepala_keluarga') ? 'is-invalid' : null ?>"
                                                                name="kepala_keluarga"
                                                                value="<?php echo $jemaat[0]['kepala_keluarga']; ?>"
                                                                type="text" placeholder="Nama Kepala Keluarga">
                                                            <?php if ($validation->hasError('kepala_keluarga')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('kepala_keluarga'); ?>
                                                            </div>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>NO HP :</label>
                                                            <input
                                                                class="form-control form-control-lg <?= $validation->hasError('nohp_kp') ? 'is-invalid' : null ?>"
                                                                name="nohp_kp"
                                                                value="<?php echo $jemaat[0]['nohp_kp']; ?>" type="text"
                                                                placeholder="8950888213123">
                                                            <?php if ($validation->hasError('nohp_kp')) : ?>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('nohp_kp'); ?>
                                                            </div>
                                                            <?php endif; ?>
                                                        </div>

                                                    </li>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Setting Tab End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->


    </div>
</div>
<?php $this->endSection(); ?>