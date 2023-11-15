<?= $this->extend('blogs/index') ?>
<!-- echo header,rightsidebar,leftsidebar and loader -->
<?= $this->section('main-content'); ?>


<!-- Blog Top  -->
<div class="site-section py-0">
    <div class="owl-carousel hero-slide owl-style">
        <?php foreach ($slider as $top) : ?>
        <div class="site-section">
            <div class="container">
                <div class="half-post-entry d-block d-lg-flex bg-light">

                    <div class="img-bg"
                        style="background-image: url('<?php echo base_url('assets/vendors/img_berita/' . $top['img']); ?>')">
                    </div>
                    <div class="contents">
                        <span class="caption"><?php echo $top['kategori_berita']; ?></span>
                        <h2><a
                                href="<?php echo base_url('/blogs/detailBerita' .  $top['id'] . '/' . $top['judul_berita'] . $top['slug']); ?>"><?php echo word_limiter($top['judul_berita'], 10, ' ...'); ?></a>
                        </h2>
                        <p class="mb-3"><?php echo word_limiter($top['isi_berita'], 60, ' ...'); ?></p>

                        <div class="post-meta">
                            <span class="d-block"><a href="#">Post</a> By <a href="#"><?php echo $top['role']; ?></a>
                                (<?php echo $top['username']; ?>)</span>
                            <span class="date-read"><?php echo $top['created'] ?> <span class="mx-1">&bullet;</span> 3
                                min read <span class="icon-star2"></span></span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>



    </div>
</div>
<!-- End -->


<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title">
                    <h2>Recent News</h2>
                </div>
                <?php foreach ($berita  as $blogs) : ?>
                <div class="post-entry-2 d-flex">
                    <div class="thumbnail" alt="s"
                        style="background-image: url('<?php echo base_url('assets/vendors/img_berita/' . $blogs['img']); ?>')">
                    </div>
                    <div class="contents">
                        <h2><a
                                href="<?php echo base_url('/blogs/detailBerita' .  $blogs['id'] . '/' . $blogs['judul_berita'] . $blogs['slug']); ?>">
                                <?php echo word_limiter($blogs['judul_berita'], 10, ' ...'); ?></a>
                        </h2>

                        <p class="mb-3"><?php echo word_limiter($blogs['isi_berita'], 20, ' ...'); ?></p>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Post</a> By <a href="#"><?php echo $blogs['role']; ?></a>
                                (<?php echo $blogs['username']; ?>)</span>
                            <span class="d-block"><a><?php echo $blogs['created'] ?></a> <span
                                    class="mx-1">&bullet;</span>
                                <a href="#"><?php echo $blogs['kategori_berita'] ?></a>
                                <span class="icon-star2"></span></button>
                            </span>
                            <!-- <span class="date-read"><?php echo $blogs['created'] ?>
                                <span class="mx-1">&bullet;</span>
                                <?php echo $blogs['kategori_berita'] ?>
                                <span class="icon-star2"></span></span> -->
                        </div>
                    </div>
                </div>
                <?php endforeach  ?>
            </div>

            <div class="col-lg-6">
                <div class="section-title">
                    <h2>Stensilan dan Warta Ibadah</h2>
                </div>
                <?php $i = 1; ?>
                <?php foreach ($stensilan as $stensil) : ?>
                <div class="trend-entry d-flex">
                    <div class="number align-self-start"><?= $i++; ?></div>
                    <div class="trend-contents">
                        <h2><a
                                href="<?= base_url(); ?>/front/downloadwarta/<?= $stensil['id']; ?>"><?php echo $stensil['judul_berita']; ?></a>
                        </h2>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Post</a> By <a
                                    href="#"><?php echo $stensil['role']; ?></a>
                                (<?php echo $stensil['username']; ?>)</span>
                            <span class="date-read"><?php echo $stensil['created'] ?> <span class="mx-1">&bullet;</span>
                                <span class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>



                <!-- <p>
                    <a href="#" class="more">See All Popular <span class="icon-keyboard_arrow_right"></span></a>
                </p> -->
            </div>
        </div>
        <p>
            <a href="#" class="more">See All Popular <span class="icon-keyboard_arrow_right"></span></a>
        </p>
        <div class="row">
            <div class="col-lg-6">
                <?= $pager->links('recent', 'berita_Pagination') ?>
            </div>
        </div>

    </div>



    <div class="site-section subscribe bg-light">
        <div class="container">
            <form action="#" class="row align-items-center">
                <div class="col-md-5 mr-auto">
                    <h2>HKBP Beringin Indah</h2>
                    <p>

                    </p>
                </div>
                <div class="col-md-6 ml-auto">
                    <div class="d-flex">
                        <input type="email" class="form-control" placeholder="Enter your email">
                        <button type="submit" class="btn btn-secondary"><span class="icon-paper-plane"></span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php $this->endSection(); ?>