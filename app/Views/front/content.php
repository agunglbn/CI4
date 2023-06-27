<?= $this->extend('front/index') ?>
<!-- echo header,rightsidebar,leftsidebar and loader -->
<?= $this->section('main-content'); ?>

<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
                    <div class="about-img">
                        <img src="<?php echo base_url(); ?>/assets/vendors/front/assets/img/bout.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                    <h3>HKBP Beringin Indah.</h3>
                    <p class="fst-italic">

                    </p>
                    <ul>
                        <!-- <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </li>
                        <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate
                            velit.</li>
                        <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu
                            fugiat nulla pariatur.</li> -->
                    </ul>
                    <p>

                    </p>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>HKBP Beringin Indah</h2>
                <p>Worship Schedule</p>
            </div>

            <div class="row">

                <div class="col-lg-4 mt-4 mt-lg-0 mb-3">
                    <div class="box" data-aos="zoom-in" data-aos-delay="100">
                        <span>01</span>
                        <h4>Morning Worship </h4>
                        <small>
                            <h6>Monday, 07.00 AM - 09.00 AM </h6>
                        </small>
                        <!-- <p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat -->
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 mt-4 mt-lg-0 mb-3">
                    <div class="box" data-aos="zoom-in" data-aos-delay="200">
                        <span>02</span>
                        <h4>Morning Worship </h4>
                        <small>
                            <h6>Sunday, 09.00 - 10.30 AM </h6>
                        </small>
                        <!-- <p>Dolorem est fugiat occaecati voluptate velit esse. Dicta veritatis dolor quod et vel dire
                            leno para dest</p> -->
                    </div>
                </div>

                <div class="col-lg-4 mt-4 mt-lg-0 mb-3">
                    <div class="box" data-aos="zoom-in" data-aos-delay="300">
                        <span>03</span>
                        <h4> Afternoon Worship </h4>
                        <small>
                            <h6>Sunday, 11.00 AM - 01.00 PM </h6>
                        </small>
                        <!-- <p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam quis
                        </p> -->
                    </div>
                </div><br>
                <hr>
                <div class="col-lg-4 mt-4 mt-lg-0 mb-3">
                    <div class="box" data-aos="zoom-in" data-aos-delay="300">
                        <span>03</span>
                        <h4> Evening Worship </h4>
                        <small>
                            <h6>Sunday, 05.00 PM - 06.00 PM </h6>
                        </small>
                        <!-- <p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam quis
                        </p> -->
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Menu Section ======= --
<section id="menu" class="menu section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Menu</h2>
      <p>Check Our Tasty Menu</p>
    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="menu-flters">
          <li data-filter="*" class="filter-active">All</li>
          <li data-filter=".filter-starters">Starters</li>
          <li data-filter=".filter-salads">Salads</li>
          <li data-filter=".filter-specialty">Specialty</li>
        </ul>
      </div>
    </div>

    <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

      <div class="col-lg-6 menu-item filter-starters">
        <img src="assets/img/menu/lobster-bisque.jpg" class="menu-img" alt="">
        <div class="menu-content">
          <a href="#">Lobster Bisque</a><span>$5.95</span>
        </div>
        <div class="menu-ingredients">
          Lorem, deren, trataro, filede, nerada
        </div>
      </div>

      <div class="col-lg-6 menu-item filter-specialty">
        <img src="assets/img/menu/bread-barrel.jpg" class="menu-img" alt="">
        <div class="menu-content">
          <a href="#">Bread Barrel</a><span>$6.95</span>
        </div>
        <div class="menu-ingredients">
          Lorem, deren, trataro, filede, nerada
        </div>
      </div>

      <div class="col-lg-6 menu-item filter-starters">
        <img src="assets/img/menu/cake.jpg" class="menu-img" alt="">
        <div class="menu-content">
          <a href="#">Crab Cake</a><span>$7.95</span>
        </div>
        <div class="menu-ingredients">
          A delicate crab cake served on a toasted roll with lettuce and tartar sauce
        </div>
      </div>

      <div class="col-lg-6 menu-item filter-salads">
        <img src="assets/img/menu/caesar.jpg" class="menu-img" alt="">
        <div class="menu-content">
          <a href="#">Caesar Selections</a><span>$8.95</span>
        </div>
        <div class="menu-ingredients">
          Lorem, deren, trataro, filede, nerada
        </div>
      </div>

      <div class="col-lg-6 menu-item filter-specialty">
        <img src="assets/img/menu/tuscan-grilled.jpg" class="menu-img" alt="">
        <div class="menu-content">
          <a href="#">Tuscan Grilled</a><span>$9.95</span>
        </div>
        <div class="menu-ingredients">
          Grilled chicken with provolone, artichoke hearts, and roasted red pesto
        </div>
      </div>

      <div class="col-lg-6 menu-item filter-starters">
        <img src="assets/img/menu/mozzarella.jpg" class="menu-img" alt="">
        <div class="menu-content">
          <a href="#">Mozzarella Stick</a><span>$4.95</span>
        </div>
        <div class="menu-ingredients">
          Lorem, deren, trataro, filede, nerada
        </div>
      </div>

      <div class="col-lg-6 menu-item filter-salads">
        <img src="assets/img/menu/greek-salad.jpg" class="menu-img" alt="">
        <div class="menu-content">
          <a href="#">Greek Salad</a><span>$9.95</span>
        </div>
        <div class="menu-ingredients">
          Fresh spinach, crisp romaine, tomatoes, and Greek olives
        </div>
      </div>

      <div class="col-lg-6 menu-item filter-salads">
        <img src="assets/img/menu/spinach-salad.jpg" class="menu-img" alt="">
        <div class="menu-content">
          <a href="#">Spinach Salad</a><span>$9.95</span>
        </div>
        <div class="menu-ingredients">
          Fresh spinach with mushrooms, hard boiled egg, and warm bacon vinaigrette
        </div>
      </div>

      <div class="col-lg-6 menu-item filter-specialty">
        <img src="assets/img/menu/lobster-roll.jpg" class="menu-img" alt="">
        <div class="menu-content">
          <a href="#">Lobster Roll</a><span>$12.95</span>
        </div>
        <div class="menu-ingredients">
          Plump lobster meat, mayo and crisp lettuce on a toasted bulky roll
        </div>
      </div>

    </div>

  </div>
</section><!-- End Menu Section -->

    <!-- ======= Berita Section ======= -->
    <!-- <section id="news" class="specials">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>information</h2>
                <p>Latest News</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <?php foreach ($berita as $news) { ?>
                            <button class="nav-link" id="v-pills-berita-tab" data-toggle="pill" data-target="#<?php echo $news['slug'] ?>" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><?php echo word_limiter($news['judul_berita'], 3, ' ...'); ?></button>
                        <?php } ?>
                    </div>
                </div>


                <div class="col-lg-9 mt-4 mt-lg-0">
                    <div class="tab-content">
                        <?php foreach ($berita as $news) { ?>
                            <div class="tab-pane" id="<?php echo $news['slug'] ?>" role="tabpanel" aria-labelledby="v-pills-berita-tab">
                                <div class="row">

                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3><?php echo word_limiter($news['judul_berita'], 15, ' ...'); ?></h3>

                                        <p><?php echo word_limiter($news['isi_berita'], 50, ' ...') ?></p>
                                    </div>

                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="<?php echo base_url('assets/vendors/img_berita/' . $news['img']); ?>" alt="" class="img-fluid">
                                    </div>

                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
    </section> -->
    <!-- End Specials Section -->

    <!-- ======= Berita Section ======= -->
    <section id="news" class="events">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>News</h2>
                <p>Latest News</p>
            </div>

            <div class="events-slider swiper" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper-wrapper">
                    <?php foreach ($berita as $news) { ?>
                    <div class="swiper-slide">

                        <div class="row event-item">
                            <div class="col-lg-6">
                                <img src="<?php echo base_url('/assets/vendors/img_berita/' . $news['img']); ?>"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-6 pt-4 pt-lg-0 content">
                                <h3><?php echo $news['judul_berita'] ?></h3>
                                <div class="price">
                                    <p><span><?php echo $news['kategori_berita'] ?></span></p>
                                </div>


                                <p>
                                    <?php echo word_limiter($news['isi_berita'], 25, ' ...') ?>
                                </p>
                            </div>
                        </div>

                    </div><!-- End testimonial item -->
                    <?php } ?>

                </div>
                <div class="swiper-pagination"></div>
                <!--</div> -->
            </div>
        </div>

    </section><!-- End Events Section -->
    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Activity</h2>
                <p>Event Activities</p>
            </div>

            <div class="events-slider swiper" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper-wrapper">
                    <?php foreach ($events as $event) { ?>
                    <div class="swiper-slide">

                        <div class="row event-item">
                            <div class="col-lg-6">
                                <img src="<?php echo base_url('/assets/vendors/img_berita/' . $event['img']); ?>"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-6 pt-4 pt-lg-0 content">
                                <h3><?php echo $event['judul_berita'] ?></h3>
                                <div class="price">
                                    <p><span><?php echo $event['kategori_berita'] ?></span></p>
                                </div>
                                <p>
                                    <?php echo word_limiter($event['isi_berita'], 25, ' ...') ?>
                                </p>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->
                    <?php } ?>
                </div>

                <div class="swiper-pagination"></div>
                <!--</div> -->

            </div>
        </div>
    </section><!-- End Events Section -->

    <!-- ======= Testimonials Section ======= --
    <section id="testimonials" class="testimonials section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Testimonials</h2>
                <p>What they're saying about us</p>
            </div>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                risus at semper.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="<?php echo base_url(); ?>/assets/vendors/front/assets/img/testimonials/testimonials-1.jpg"
                                class="testimonial-img" alt="">
                            <h3>Saul Goodman</h3>
                            <h4>Ceo &amp; Founder</h4>
                        </div>
                    </div><!-- End testimonial item --

    <div class="swiper-slide">
        <div class="testimonial-item">
            <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet
                legam anim culpa.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="<?php echo base_url(); ?>/assets/vendors/front/assets/img/testimonials/testimonials-2.jpg"
                class="testimonial-img" alt="">
            <h3>Sara Wilsson</h3>
            <h4>Designer</h4>
        </div>
    </div><!-- End testimonial item --

    <div class="swiper-slide">
        <div class="testimonial-item">
            <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam
                duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="<?php echo base_url(); ?>/assets/vendors/front/assets/img/testimonials/testimonials-3.jpg"
                class="testimonial-img" alt="">
            <h3>Jena Karlis</h3>
            <h4>Store Owner</h4>
        </div>
    </div><!-- End testimonial item --

    <div class="swiper-slide">
        <div class="testimonial-item">
            <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat
                minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore
                labore illum veniam.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="<?php echo base_url(); ?>/assets/vendors/front/assets/img/testimonials/testimonials-4.jpg"
                class="testimonial-img" alt="">
            <h3>Matt Brandon</h3>
            <h4>Freelancer</h4>
        </div>
    </div><!-- End testimonial item --

    <div class="swiper-slide">
        <div class="testimonial-item">
            <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster
                veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam
                culpa fore nisi cillum quid.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="<?php echo base_url(); ?>/assets/vendors/front/assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
            <h3>John Larson</h3>
            <h4>Entrepreneur</h4>
        </div>
    </div>
    <!-- End testimonial item --

    </div>
    <div class="swiper-pagination"></div>
    </div>

    </div>
 </section><!-- End Testimonials Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Gallery</h2>
                <p>Some photos from HKBP Beringin Indah Church</p>
            </div>
        </div>

        <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">



            <div class="row g-0">
                <?php foreach ($gallery as $img) { ?>
                <div class="col-lg-3 col-md-3">
                    <div class="gallery-item">
                        <a href="<?php echo base_url('/assets/vendors/gallery/' . $img['img']); ?>"
                            class="gallery-lightbox" data-gall="gallery-item">
                            <img src="<?php echo base_url('/assets/vendors/gallery/' . $img['img']); ?>" alt=""
                                class="img-fluid">
                        </a>
                    </div>
                </div>

                <?php } ?>

            </div>

        </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Chefs Section ======= --
    <section id="servent" class="chefs">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Servant</h2>
                <p>Servant Leadership</p>
            </div>

            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="member" data-aos="zoom-in" data-aos-delay="100">
                        <img src="<?php echo base_url(); ?>/assets/vendors/front/assets/img/chefs/chefs-1.jpg"
                            class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Walter White</h4>
                                <span>Master Chef</span>
                            </div>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="member" data-aos="zoom-in" data-aos-delay="200">
                        <img src="<?php echo base_url(); ?>/assets/vendors/front/assets/img/chefs/chefs-2.jpg"
                            class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Sarah Jhonson</h4>
                                <span>Patissier</span>
                            </div>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="member" data-aos="zoom-in" data-aos-delay="300">
                        <img src="<?php echo base_url(); ?>/assets/vendors/front/assets/img/chefs/chefs-3.jpg"
                            class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>William Anderson</h4>
                                <span>Cook</span>
                            </div>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Chefs Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Contact</h2>
                <p>Contact Us</p>
            </div>
        </div>
        <div data-aos="fade-up">
            <iframe style="border:0; width: 100%; height: 350px;"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6903446877045!2d101.4194336138957!3d0.4589082996651914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5a8b816ec9303%3A0xe05fd3fb8d8d9325!2sHKBP%20Beringin%20Indah!5e0!3m2!1sid!2sid!4v1675488567012!5m2!1sid!2sid"
                frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="container" data-aos="fade-up">

            <div class="row mt-5">

                <div class="col-lg-4">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>Jl. Palaraya No.5, Sidomulyo Tim., Kec. Marpoyan Damai, Kota Pekanbaru, Riau 28289</p>
                        </div>

                        <div class="open-hours">
                            <i class="bi bi-clock"></i>
                            <h4>Open Hours:</h4>
                            <p>
                                Monday-Sunday:<br>
                                11:00 PM - 10:00 AM
                            </p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>nhkbpberinginindah@gmail.com</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>+1 5589 55488 55s</p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0">

                    <form action="<?= base_url('/addMessage'); ?>" enctype="multipart/form-data" method="post"
                        class="php-email-form">
                        <?= csrf_field() ?>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name"
                                    class="form-control <?= $validation->hasError('name') ? 'is-invalid' : null ?>"
                                    id="name" placeholder="Your Name">
                                <?php if ($validation->hasError('name')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('name'); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email"
                                    class="form-control <?= $validation->hasError('email') ? 'is-invalid' : null ?>"
                                    name="email" id="email" placeholder="Your Email">
                                <?php if ($validation->hasError('email')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email'); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text"
                                class="form-control <?= $validation->hasError('subject') ? 'is-invalid' : null ?>"
                                name="subject" id="subject" placeholder="Subject" required>
                            <?php if ($validation->hasError('subject')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('subject'); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control <?= $validation->hasError('message') ? 'is-invalid' : null ?>"
                                name="message" rows="8" placeholder="Message" required></textarea>
                            <?php if ($validation->hasError('message')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('message'); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->
<?php $this->endSection(); ?>