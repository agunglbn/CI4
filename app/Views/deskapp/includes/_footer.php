<!-- footer -->
<div class="footer-wrap pd-20 mb-20 card-box">
    DeskApp - Bootstrap 4 Admin Template By <a href="" target="_blank">HKBP Beringin
        Indah</a>
</div>
</div>
</div>
<div class="text-center mb-1">

    <script async defer="defer" src="https://buttons.github.io/buttons.js"></script>
</div>



<!-- js -->
<script src="<?php echo base_url(); ?>/assets/vendors/scripts/core.js"></script>
<script src="<?php echo base_url(); ?>/assets/vendors/scripts/script.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/vendors/scripts/process.js"></script>
<script src="<?php echo base_url(); ?>/assets/vendors/scripts/layout-settings.js"></script>
<!-- <script src="<?php echo base_url(); ?>/assets/src/plugins/jquery-steps/jquery.steps.js"></script>
<script src="<?php echo base_url(); ?>/assets/vendors/scripts/steps-setting.js"></script> -->
<script src="<?php echo base_url(); ?>/assets/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/vendors/scripts/dashboard.js"></script>
<script src="<?php echo base_url(); ?>/assets/src/plugins/sweetalerts2/dist/sweetalert2.all.min.js"></script>
<!-- buttons for Export datatable -->
<script src="<?php echo base_url(); ?>/assets/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/src/plugins/datatables/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/src/plugins/datatables/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/src/plugins/datatables/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/src/plugins/datatables/js/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/src/plugins/datatables/js/vfs_fonts.js"></script>
<!-- Datatable Setting js -->
<script src="<?php echo base_url(); ?>/assets/vendors/scripts/datatable-setting.js"></script>
<script src="<?php echo base_url(); ?>/assets/vendors/myscript.js"></script>
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


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
        style="display: none; visibility: hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

</body>

</html>