<?= $this->extend('blogs/index') ?>
<!-- echo header,rightsidebar,leftsidebar and loader -->
<?= $this->section('main-content'); ?>


<!-- Blog Top  -->
<div class="site-section py-0">
    <div class="owl-carousel hero-slide owl-style">
        <?php foreach ($slider as $top) { ?>
        <div class="site-section">
            <div class="container">
                <div class="half-post-entry d-block d-lg-flex bg-light">

                    <div class="img-bg"
                        style="background-image: url('<?php echo base_url('assets/vendors/img_berita/' . $top['img']); ?>')">
                    </div>
                    <div class="contents">
                        <span class="caption"><?php echo $top['kategori_berita']; ?></span>
                        <h2><a href="blog-single.html"><?php echo word_limiter($top['judul_berita'], 10, ' ...'); ?></a>
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
        <?php } ?>



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
                <div class="post-entry-2 d-flex">
                    <div class="thumbnail" alt="s"
                        style="background-image: url('<?php echo base_url(); ?>/assets/vendors/blogs/images/img_v_1.jpg')">
                    </div>
                    <div class="contents">
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi temporibus
                            praesentium neque, voluptatum quam quibusdam.</p>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>
                <div class="post-entry-2 d-flex">
                    <div class="thumbnail"
                        style="background-image: url('<?php echo base_url(); ?>/assets/vendors/blogs/images/img_v_2.jpg')">
                    </div>
                    <div class="contents">
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi temporibus
                            praesentium neque, voluptatum quam quibusdam.</p>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>
                <div class="post-entry-2 d-flex">
                    <div class="thumbnail"
                        style="background-image: url('<?php echo base_url(); ?>/assets/vendors/blogs/images/img_v_3.jpg')">
                    </div>
                    <div class="contents">
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi temporibus
                            praesentium neque, voluptatum quam quibusdam.</p>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="section-title">
                    <h2>Stensilan Ibadah</h2>
                </div>

                <div class="trend-entry d-flex">
                    <div class="number align-self-start">01</div>
                    <div class="trend-contents">
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>

                <div class="trend-entry d-flex">
                    <div class="number align-self-start">02</div>
                    <div class="trend-contents">
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>

                <div class="trend-entry d-flex">
                    <div class="number align-self-start">03</div>
                    <div class="trend-contents">
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>

                <div class="trend-entry d-flex pl-0">
                    <div class="number align-self-start">04</div>
                    <div class="trend-contents">
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>

                <p>
                    <a href="#" class="more">See All Popular <span class="icon-keyboard_arrow_right"></span></a>
                </p>
            </div>
        </div>
        <p>
            <a href="#" class="more">See All Popular <span class="icon-keyboard_arrow_right"></span></a>
        </p>
        <div class="row">
            <div class="col-lg-6">
                <ul class="custom-pagination list-unstyled">
                    <li><a href="#">1</a></li>
                    <li class="active">2</li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                </ul>
            </div>
        </div>

    </div>







    <div class="site-section subscribe bg-light">
        <div class="container">
            <form action="#" class="row align-items-center">
                <div class="col-md-5 mr-auto">
                    <h2>Newsletter Subcribe</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis aspernatur ut at quae omnis
                        pariatur obcaecati possimus nisi ea iste!</p>
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