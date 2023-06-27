<?= $this->extend('blogs/index') ?>
<!-- echo header,rightsidebar,leftsidebar and loader -->
<?= $this->section('main-content'); ?>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 single-content">

                <p class="mb-5">
                    <img src="<?php echo base_url('assets/vendors/img_berita/' . $berita[0]['img']); ?>"
                        alt="Image Not Found" class="img-fluid">
                </p>
                <h1 class="mb-4">
                    <?php echo $berita[0]['judul_berita']; ?>
                </h1>
                <div class="post-meta d-flex mb-5">
                    <div class="bio-pic mr-3">
                        <img src="" alt="Image" class="img-fluidid">
                    </div>
                    <div class="vcard">
                        <span class="d-block"><a href="#"> <?php echo $berita[0]['username']; ?>
                            </a> in <a href="#">News</a></span>
                        <span class="date-read"> <?php echo $berita[0]['created']; ?>
                            <span class="mx-1">&bullet;</span> <span class="icon-star2"></span></span>
                    </div>
                </div>

                <?php echo $berita[0]['isi_berita']; ?>




                <div class="pt-5">
                    <p>Categories: <a href="<?php echo base_url('kategori/' . $berita[0]['kategori_berita']) ?>">
                            <?php echo $berita[0]['kategori_berita']; ?>
                        </a>
                </div>


                <div class="pt-5">
                    <!-- <div class="section-title">
                        <h2 class="mb-5">6 Comments</h2>
                    </div> -->
                    <!-- <ul class="comment-list">
                        <li class="comment">
                            <div class="vcard bio">
                                <img src="images/person_1.jpg" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>Jean Doe</h3>
                                <div class="meta">January 9, 2018 at 2:21pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                    necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                    iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="reply">Reply</a></p>
                            </div>
                        </li>

                        <li class="comment">
                            <div class="vcard bio">
                                <img src="images/person_1.jpg" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>Jean Doe</h3>
                                <div class="meta">January 9, 2018 at 2:21pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                    necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                    iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="reply">Reply</a></p>
                            </div>

                            <ul class="children">
                                <li class="comment">
                                    <div class="vcard bio">
                                        <img src="images/person_1.jpg" alt="Image placeholder">
                                    </div>
                                    <div class="comment-body">
                                        <h3>Jean Doe</h3>
                                        <div class="meta">January 9, 2018 at 2:21pm</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem
                                            laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe
                                            enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?
                                        </p>
                                        <p><a href="#" class="reply">Reply</a></p>
                                    </div>


                                    <ul class="children">
                                        <li class="comment">
                                            <div class="vcard bio">
                                                <img src="images/person_1.jpg" alt="Image placeholder">
                                            </div>
                                            <div class="comment-body">
                                                <h3>Jean Doe</h3>
                                                <div class="meta">January 9, 2018 at 2:21pm</div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur
                                                    quidem laborum necessitatibus, ipsam impedit vitae autem, eum
                                                    officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum
                                                    impedit necessitatibus, nihil?</p>
                                                <p><a href="#" class="reply">Reply</a></p>
                                            </div>

                                            <ul class="children">
                                                <li class="comment">
                                                    <div class="vcard bio">
                                                        <img src="images/person_1.jpg" alt="Image placeholder">
                                                    </div>
                                                    <div class="comment-body">
                                                        <h3>Jean Doe</h3>
                                                        <div class="meta">January 9, 2018 at 2:21pm</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Pariatur quidem laborum necessitatibus, ipsam impedit vitae
                                                            autem, eum officia, fugiat saepe enim sapiente iste iure!
                                                            Quam voluptas earum impedit necessitatibus, nihil?</p>
                                                        <p><a href="#" class="reply">Reply</a></p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="comment">
                            <div class="vcard bio">
                                <img src="images/person_1.jpg" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>Jean Doe</h3>
                                <div class="meta">January 9, 2018 at 2:21pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                    necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                    iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="reply">Reply</a></p>
                            </div>
                        </li>
                    </ul> -->
                    <!-- END comment-list -->

                    <!-- <div class="comment-form-wrap pt-5">
                        <div class="section-title">
                            <h2 class="mb-5">Leave a comment</h2>
                        </div>
                        <form action="#" class="p-5 bg-light">
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="url" class="form-control" id="website">
                            </div>

                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Post Comment" class="btn btn-primary py-3">
                            </div>

                        </form>
                    </div> -->
                </div>
            </div>


            <div class="col-lg-3 ml-auto">
                <div class="section-title">
                    <h2> Last News Post</h2>
                </div>
                <?php $i = 1; ?>
                <?php foreach ($lastnews as $news) : ?>
                <div class="trend-entry d-flex">
                    <div class="number align-self-start"><?= $i++; ?></div>
                    <div class="trend-contents">
                        <h2><a
                                href="<?php echo base_url('/blogs/detailBerita/'.$news['id'])  ?>"><?php echo word_limiter($news['judul_berita'], 10, ' ...'); ?></a>
                        </h2>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span
                                    class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>


                <p>
                    <a href="#" class="more">See All Popular <span class="icon-keyboard_arrow_right"></span></a>
                </p>
            </div>


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