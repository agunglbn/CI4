<?= $this->extend('blogs/index') ?>
<!-- echo header,rightsidebar,leftsidebar and loader -->
<?= $this->section('main-content'); ?>



<div class="site-section">
    <div class="container">
        <div class="row">

            <div class="col-lg-9">
                <?php foreach ($getkategori as $get) : ?>

                <div class="section-title">
                    <span class="caption d-block small">Categories</span>
                    <h2><?php echo $get['nama_kategori'] ?></h2>
                </div>
                <div class="post-entry-2 d-flex">
                    <div class="thumbnail order-md-2"
                        style="background-image: url('<?php echo base_url(); ?>/assets/vendors/blogs/images/img_h_4.jpg')">
                    </div>
                    <div class="contents order-md-1 pl-0">
                        <h2><a href="blog-single.html"><?php echo $get['judul_berita'] ?></a></h2>
                        <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi temporibus
                            praesentium neque, voluptatum quam quibusdam.</p>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>

                <?php endforeach ?>
            </div>

            <div class="col-lg-3">
                <div class="section-title">
                    <h2>Popular Posts</h2>
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
        <!-- <div class="block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div> -->
        <div class="row">
            <div class="col-lg-6">
                <?= $pager->links('berita', 'berita_Pagination') ?>
            </div>
        </div>
    </div>
</div>

<!-- <div class="site-section">
    <div class="container">
        <div class="row">
            <?php foreach ($getkategori as $get) : ?>

            <div class="col-lg-9">
                <div class="section-title">
                    <span class="caption d-block small">Categories</span>
                    <h2></h2>
                </div>
                <div class="post-entry-2 d-flex">
                    <div class="thumbnail order-md-2"
                        style="background-image: url('<?php echo base_url(); ?>/assets/vendors/blogs/images/img_h_4.jpg')">
                    </div>
                    <div class="contents order-md-1 pl-0">
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
            <?php endforeach ?>
            <div class="col-lg-3">
                <div class="section-title">
                    <h2>Popular Posts</h2>
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


    </div>
</div> -->

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