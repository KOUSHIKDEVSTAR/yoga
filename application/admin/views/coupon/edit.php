 <div class="app-content content ">

     <div class="content-wrapper container-xxl p-0">
         <div class="content-header row">
             <div class="content-header-left col-md-9 col-12 mb-2">
                 <div class="row breadcrumbs-top">
                     <div class="col-12">
                         <ul class="nav nav-pills mb-2">
                        <!-- account -->
                        

                    </ul>
                     </div>
                 </div>
             </div>

         </div>
         <div class="content-body">
             <!-- users list start -->
             <section class="app-user-list">

                 <!-- list and filter start -->
                 <div class="card">
                     <div class="card-body border-bottom">
                         <h4 class="card-title">Edit Coupon Data</h4>

                         <div class="row">
                             <div class="col-md-12">

                                 <a href="<?php echo base_url('siteSetting/coupon_list');?>"><button type="button" class="btn btn-primary"
                                         data-bs-toggle="" data-bs-target="">View
                                         </button>
                                 </a>

                             </div>
                         </div>
                         <section id="multiple-column-form">
                             <div class="row">
                                 <div class="col-12">
                                     <div class="card">
                                         <div class="card-header">
                                             <h4 class="card-title"></h4>
                                         </div>
                                         <div class="card-body">
                                             <form class="form" method="POST" action="<?= base_url('siteSetting/coupon_update');?>"
                                                 enctype="multipart/form-data">
                                                 <div class="row">
                                                    <input type="hidden" name="id" value="<?= $coupon_edit[0]->coup_id;?>">
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Used For</label>
                                                             <select class="form-select form-select-lg" name="used_for"
                                                                 id="selectLarge">
                                                                 <option>Choose One</option>
                                                                 <option value="Membership" <?php if( $coupon_edit[0]->coup_for=="Membership"){echo "selected";};?>>Membership</option>
                                                                 <option value="Product" <?php if( $coupon_edit[0]->coup_for=="Product"){echo "selected";};?>>Product</option>
                                                             </select>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Title
                                                                 </label>
                                                             <input type="text" id="" value="<?= $coupon_edit[0]->coup_title;?>" class="form-control"
                                                                 placeholder="Title" name="title" />
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Coupon Type</label>
                                                             <select class="form-select form-select-lg" name="type"
                                                                 id="selectLarge">
                                                                 <option>Choose One</option>
                                                                 <option value="percentage" <?php if( $coupon_edit[0]->coup_type=="percentage"){echo "selected";};?>>Percentage</option>
                                                                 <option value="rate" <?php if( $coupon_edit[0]->coup_type=="rate"){echo "selected";};?>>Rate</option>
                                                             </select>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Coupon Code
                                                                 </label>
                                                             <input type="text" id="" value="<?= $coupon_edit[0]->coup_code;?>" class="form-control"
                                                                 placeholder="Ex:FLT300" name="copn_code" />
                                                         </div>
                                                     </div>
                                                      <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Discount Amount
                                                                 </label>
                                                             <input type="number" id="" value="<?= $coupon_edit[0]->coup_amnt;?>" class="form-control"
                                                                 placeholder="Ex:200" name="copn_amt" />
                                                         </div>
                                                     </div>
                                                      <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Applicable Amount
                                                                 </label>
                                                             <input type="number" id="" value="<?= $coupon_edit[0]->applicable_amnt;?>" class="form-control"
                                                                 placeholder="Ex:200" name="applicable_amnt" />
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Start Date
                                                                 </label>
                                                             <input type="date" id=""  value="<?= $coupon_edit[0]->coup_start_time;?>" class="form-control"
                                                                 placeholder="Ex:200" name="start_date" />
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">End Date
                                                                 </label>
                                                             <input type="date" id="" value="<?= $coupon_edit[0]->coup_end_time;?>" class="form-control"
                                                                 placeholder="Ex:200" name="end_date" />
                                                         </div>
                                                     </div>

                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Coupon Status</label>
                                                             <select class="form-select form-select-lg" name="status"
                                                                 id="selectLarge">
                                                                 <option>Choose One</option>
                                                                 <option value="1" <?php if( $coupon_edit[0]->is_active==1){echo "selected";};?>>Active</option>
                                                                 <option value="0" <?php if( $coupon_edit[0]->is_active==0){echo "selected";};?>>InActive</option>
                                                             </select>
                                                         </div>
                                                     </div>
                                                     
                                                     
                                                     <div class="col-12">
                                                         <button type="submit"
                                                             class="btn btn-primary me-1">Submit</button>
                                                         <a href="<?=base_url('siteSetting/coupon_list');?>"><button type="button" class="btn btn-outline-secondary">Reset</button></a>
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
    // $("#RolesExpense").addClass('sidebar-group-active open');
    $("#couponlist").addClass('active');

});
</script>