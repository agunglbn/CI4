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
                            <h4>Form</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?= $title; ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <!-- <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                January 2018
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Export List</a>
                                <a class="dropdown-item" href="#">Policies</a>
                                <a class="dropdown-item" href="#">View Assets</a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Tambah Data Jemaat</h4>
                        <p class="mb-30">Gunakan Ketentuan !!</p>
                    </div>
                    <!-- <div class="pull-right">
                        <a href="#basic-form1" class="btn btn-primary btn-sm scroll-click" rel="content-y"
                            data-toggle="collapse" role="button"><i class="fa fa-code"></i> Source Code</a>
                    </div> -->
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
                <form action="<?= base_url('/admin/addNewJemaat'); ?>" enctype="multipart/form-data" method="post"
                    class="user">
                    <?= csrf_field() ?>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Nama Jemaat</label>
                        <div class="col-sm-12 col-md-10">
                            <input name="nama_jemaat" value="<?= set_value('nama_jemaat'); ?>"
                                class="form-control <?= $validation->hasError('nama_jemaat') ? 'is-invalid' : null ?>"
                                type="text" placeholder="Parataon" />
                            <input class="form-control" type="text" placeholder="Parataon" name="id" hidden />
                            <?php if ($validation->hasError('nama_jemaat')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_jemaat'); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control <?= $validation->hasError('email') ? 'is-invalid' : null ?>"
                                name="email" placeholder="agungsilaban25@gmail.com" type="email"
                                value="<?= set_value('email'); ?>" />


                            <?php if ($validation->hasError('email')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('email'); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Pekerjaan</label>
                        <div class="col-sm-12 col-md-10">
                            <input name="pekerjaan"
                                class="form-control <?= $validation->hasError('pekerjaan') ? 'is-invalid' : null ?>"
                                type="text" placeholder="Mahasiswa" value="<?= set_value('pekerjaan'); ?>" />
                            <?php if ($validation->hasError('pekerjaan')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('pekerjaan'); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Sektor</label>
                        <div class="col-sm-12 col-md-10">
                            <select name="sektor"
                                class="custom-select col-12 <?= $validation->hasError('kategori') ? 'is-invalid' : null ?>">
                                <?php foreach ($sektor as $sek) :  ?>
                                <option value="" disabled selected hidden>--Choice--</option>
                                <option value="<?php echo $sek->nama_sektor; ?>">
                                    <?php echo $sek->nama_sektor; ?>
                                </option>

                                <?php endforeach; ?>

                            </select>
                            <?php if ($validation->hasError('sektor')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('sektor'); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Kategori</label>
                        <div class="col-sm-12 col-md-10">
                            <select name="kategori"
                                class="custom-select col-12 <?= $validation->hasError('kategori') ? 'is-invalid' : null ?>">
                                <?php foreach ($kategori as $kat) :  ?>
                                <option value="" disabled selected hidden>--Choice--</option>
                                <option value="<?php echo $kat['nama_kategori']; ?>">
                                    <?php echo $kat['nama_kategori']; ?>
                                </option>

                                <?php endforeach; ?>

                            </select>
                            <?php if ($validation->hasError('kategori')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('kategori'); ?>
                            </div>
                            <?php endif; ?>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Telephone</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control <?= $validation->hasError('nohp') ? 'is-invalid' : null ?>"
                                name="nohp" placeholder="089500112233" type="tel" value="<?= set_value('nohp'); ?>" />
                            <?php if ($validation->hasError('nohp')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('nohp'); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control <?= $validation->hasError('alamat') ? 'is-invalid' : null ?>"
                                name="alamat" placeholder="Jalan Purodadi No 25" type="text"
                                value="<?= set_value('alamat'); ?>" />
                            <?php if ($validation->hasError('alamat')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('alamat'); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-12 col-md-10">
                            <select name="jk"
                                class="custom-select col-12 <?= $validation->hasError('jk') ? 'is-invalid' : null ?>">
                                <option value="0" disabled selected hidden>--Choice--</option>
                                <option value="Laki-laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <?php if ($validation->hasError('jk')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('jk'); ?>
                            </div>
                            <?php endif; ?>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Profile</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control <?= $validation->hasError('img') ? 'is-invalid' : null ?>"
                                name="img" placeholder="Jalan Purodadi No 25" type="file"
                                value="<?= set_value('img'); ?>" accept="image/*" />
                            <?php if ($validation->hasError('img')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('img'); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="pull-right ml-lg-5 mt-30">
                            <button class="btn btn-primary  " href="#" type="submit">
                                Submit</button>
                            <button class="btn btn-danger " href="#" type="submit">
                                Cancel</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
<!-- Default Basic Forms End -->







<?php $this->endSection(); ?>