
<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>Boxer3D</span></strong>. All Rights Reserved
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url() ?>assets/user/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/user/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?= base_url() ?>assets/user/vendor/php-email-form/validate.js"></script>
<script src="<?= base_url() ?>assets/user/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url() ?>assets/user/vendor/venobox/venobox.min.js"></script>
<script src="<?= base_url() ?>assets/user/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>assets/user/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url() ?>assets/user/js/main.js"></script>
<script src="<?= base_url() ?>assets/style.js"></script>

<script>
  $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });
</script>

</body>

</html>