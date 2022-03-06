 <div class="app-content content ">

     <div class="content-wrapper container-xxl p-0">
         <div class="content-body">
             <!-- users list start -->
             <section class="app-user-list">

                 <!-- list and filter start -->
                 <div class="card">
                     <div class="card-body border-bottom">
                         <h4 class="card-title">Add Modelist</h4>
                         <section id="multiple-column-form">
                             <div class="row">
                                 <div class="col-12">
                                     <div class="card">
                                         <div class="card-header">
                                             <h4 class="card-title"></h4>
                                         </div>
                                         <div class="card-body">
                                             <form class="form" method="POST" action="<?= base_url('products/modelist_submit');?>"
                                                 enctype="multipart/form-data">
                                                 <div class="row">
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                            <label class="form-label" for="city-column">Mode Name
                                                            </label>
                                                            <input type="text" id="" class="form-control"
                                                                 placeholder="Mode Name" name="mode_name" />
                                                         </div>
                                                     </div>
                                                     
                                                     <div class="col-12">
                                                         <button type="submit"
                                                             class="btn btn-primary me-1">Submit</button>
                                                         <a href="<?=base_url('products/modelist');?>"><button type="button" class="btn btn-outline-secondary">Reset</button></a>
                                                     </div>
                                                 </div>
                                             </form>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </section>
                     </div>
                 </div>
                 <!-- list and filter end -->
             </section>
             <!-- users list ends -->

         </div>
     </div>
 </div>
 <script type="text/javascript">
$(document).ready(function() {
     $("#modeList").addClass('active');

});
 </script>