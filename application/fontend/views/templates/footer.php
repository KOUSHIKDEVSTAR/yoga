<footer class="custome-footer">
    <div class="container-fluid">
        <p> &copy; Copyright all rights reserved 2022 2023</p>
    </div>
</footer>

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
<script src="<?php echo base_url(); ?>admin/app-assets/vendors/js/charts/apexcharts.min.js"></script>
<script src="<?php echo base_url(); ?>admin/app-assets/vendors/js/extensions/toastr.min.js"></script>
<script src="<?php echo base_url(); ?>admin/app-assets/vendors/js/extensions/moment.min.js"></script>
<script src="<?php echo base_url(); ?>admin/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>admin/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo base_url(); ?>admin/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>admin/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>
<script src="<?php echo base_url(); ?>admin/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script> -->
<script src="<?php echo base_url(); ?>app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>

<script src="<?php echo base_url(); ?>admin/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo base_url(); ?>admin/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>admin/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js"></script>
<script src="<?php echo base_url(); ?>admin/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
<script src="<?php echo base_url(); ?>admin/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>admin/app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>admin/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>admin/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>admin/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>admin/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>admin/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="<?php echo base_url(); ?>admin/app-assets/js/core/app-menu.js"></script>
<script src="<?php echo base_url(); ?>admin/app-assets/js/core/app.js"></script>

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
</body>
<!-- END: Body-->

</html>