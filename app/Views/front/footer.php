<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <h3>HKBP Beringin Indah</h3>
                        <p>
                            Jl. Palaraya No.5, Sidomulyo Tim.,<br> Kec. Marpoyan Damai, Kota Pekanbaru,<br> Riau 28289
                            <br><br>
                            <strong>Phone:</strong> 0761-7415905 <br>
                            <strong>Email:</strong> hkbpberinginindah@gmail.com<br>
                        </p>
                        <div class="social-links mt-3">
                            <a href="https://www.youtube.com/@hkbpberinginindah8221" class="youtube"><i
                                    class="bx bxl-youtube"></i></a>
                            <a href="https://www.facebook.com/beringin.indah.543" class="facebook"><i
                                    class="bx bxl-facebook"></i></a>
                            <a href="https://www.instagram.com/nhkbpberinginindah/" class="instagram"><i
                                    class="bx bxl-instagram"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#news">News</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#servent">Servent</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#gallery">Gallery</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <?php foreach ($kategori as $kat) : ?>
                        <li><i class="bx bx-chevron-right"></i> <a
                                href="<?php echo base_url('kategori/' . $kat['nama_kategori']) ?>"><?php echo $kat['nama_kategori'] ?></a>
                        </li>

                        <?php endforeach ?>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>HKBP Beringin Indah</h4>
                    <p>Hii All, please subscribe to support the channel HKBP Beringin Indah</p>
                    <form action="" method="post">
                        <input type="email" name="email"> <a
                            href="https://www.youtube.com/channel/UCk9sspQKQt-PP73_czMmryA?sub_confirmation=1">
                            Subscribe
                        </a>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <!-- <a href="https://wa.me/6289508837177?text=Isi Pesan">Chat Via WhatsApp</a> -->
    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>Dikelola <span>Multimedia</span></strong>. Team Kreatif NHKBP Beringin Indah
        </div>
        <div class="credits">

            Designed by <a href="">Agung Ferdinan</a>
        </div>
    </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i></a>


<!-- Vendor JS Files -->
<script src="<?php echo base_url(); ?>/assets/vendors/front/assets/vendor/aos/aos.js"></script>
<script src="<?php echo base_url(); ?>/assets/vendors/front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js">
</script>
<script src="<?php echo base_url(); ?>/assets/vendors/front/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/vendors/front/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/vendors/front/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/vendors/front/assets/vendor/php-email-form/validate.js"></script>
<!-- Sweeat alert -->
<script src="<?php echo base_url(); ?>/assets/src/plugins/sweetalerts2/dist/sweetalert2.all.min.js"></script>
<!-- Boostrap 4.6 -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>
<!-- Template Main JS File -->
<script src="<?php echo base_url(); ?>/assets/vendors/front/assets/js/main.js"></script>

<script>
$(function() {
    <?php if (session()->has("success")) { ?>
    Swal.fire({
        icon: 'success',
        title: 'Success !!',
        text: '<?= session("success") ?>'
    })
    <?php } ?>
});
$(function() {

    <?php if (session()->has("error")) { ?>
    Swal.fire({
        icon: 'error',
        title: 'Error !!',
        text: '<?= session("error") ?>'
    })
    <?php } ?>
});
</script>
</body>

</html>