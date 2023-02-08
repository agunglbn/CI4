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
<!-- fancybox Popup Js -->
<script src="<?php echo base_url(); ?>/assets/src/plugins/fancybox/dist/jquery.fancybox.js"></script>
<script src="<?php echo base_url(); ?>/assets/vendors/scripts/dashboard.js"></script>
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
/* Dengan Rupiah */
var dengan_rupiah = document.getElementById('jumlah_pemasukan');
dengan_rupiah.addEventListener('keyup', function(e) {
    dengan_rupiah.value = formatRupiah(this.value, ' ');
});

/* Fungsi */
function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
}
/* Tanpa Rupiah */
</script>


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
        style="display: none; visibility: hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

</body>

</html>