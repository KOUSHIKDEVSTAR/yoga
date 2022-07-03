<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">Copyright &copy;
            2018-<?php echo date('Y') ?></span><span class="float-md-end d-none d-md-block">Hand-crafted & Made with<i
                data-feather="heart"></i></span></p>
</footer>
<!-- <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button> -->
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="<?php echo base_url(); ?>app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->
<script type="text/javascript">
$(document).ready(function() {
    $('.table').DataTable({

    });

});
</script>
<!-- ckeditor -->
<script src="<?= base_url() ?>app-assets/js/ckeditor/ckeditor.js"></script>
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script> -->

<script>
CKEDITOR.replace('classic-editor');
</script>
<!-- ckeditor -->


<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url(); ?>app-assets/vendors/js/charts/apexcharts.min.js"></script>

<!-- <script src="<?php echo base_url(); ?>app-assets/vendors/js/charts/chart.min.js"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/charts/apexcharts.js"></script> -->

<script src="<?php echo base_url(); ?>app-assets/vendors/js/extensions/toastr.min.js"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/extensions/moment.min.js"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script> -->
<script src="<?php echo base_url(); ?>app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>

<script src="<?php echo base_url(); ?>app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="<?php echo base_url(); ?>app-assets/js/core/app-menu.js"></script>
<script src="<?php echo base_url(); ?>app-assets/js/core/app.js"></script>

<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="<?php echo base_url(); ?>app-assets/js/scripts/pages/dashboard-analytics.js"></script>
<script src="<?php echo base_url(); ?>app-assets/js/scripts/pages/app-invoice-list.js"></script>
<script src="<?php echo base_url(); ?>app-assets/js/scripts/forms/form-validation.js"></script>
<script src="<?php echo base_url(); ?>app-assets/js/scripts/tables/table-datatables-basic.js"></script>
<!-- END: Page JS-->

<script>
$(window).on('load', function() {
    if (feather) {
        feather.replace({
            width: 14,
            height: 14
        });
    }
})
</script>
<script type="text/javascript">
$(window).on('load', function() {
    ClassicEditor.create(document.querySelector('#classic-editor'))
        .catch(error => {
            console.error(error);
        });
});
</script>
</body>
<!-- END: Body-->

</html>