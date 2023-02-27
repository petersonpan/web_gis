<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="container footer-bottom clearfix">
        <div class="copyright">
            &copy; Copyright SIG Pemetaan Objek Wisata Di Kabupaten Sabu Rai Jua
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bocor-bootstrap-template-nice-animation/ -->
            Designed by <a href="https://Cisco17.herokuapp.com"><strong><span>Cisco<sup>17</sup></span></strong>.</a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url('user-template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('user-template/assets/vendor/glightbox/js/glightbox.min.js') ?>"></script>
<script src="<?= base_url('user-template/assets/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
<script src="<?= base_url('user-template/assets/vendor/swiper/swiper-bundle.min.js') ?>"></script>
<script src="<?= base_url('user-template/assets/vendor/php-email-form/validate.js') ?>"></script>

<!-- Template Main JS File -->
<script src="<?= base_url('user-template/assets/js/main.js') ?>"></script>
<script src="<?= base_url('template/js/voicerss-tts.min.js') ?>"></script>
<script>
    function omong(text) {
        VoiceRSS.speech({
            key: 'becd31bb41814a95995a38dcc4b96210',
            src: text,
            hl: 'id-id',
            r: 0,
            c: 'mp3',
            f: '44khz_16bit_stereo',
            ssml: false
        });

    }
</script>

</body>

</html>