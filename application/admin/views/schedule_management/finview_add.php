 <div class="app-content content ">

     <div class="content-wrapper container-xxl p-0">
         <div class="content-header row">


         </div>
         <div class="content-body">
             <!-- users list start -->
             <section class="app-user-list">

                 <!-- list and filter start -->
                 <div class="card">
                     <div class="card-body border-bottom">
                         <h4 class="card-title">Add Expenses Details

                         <a href="<?php echo base_url('schedule_management/finview');?>"><button type="button"
                                         class="btn btn-primary" data-bs-toggle="" data-bs-target="">View All
                                     </button>
                                 </a>
                         </h4>

                         <div class="row">
                             
                         </div>
                         <section id="multiple-column-form">
                             <div class="row">
                                 <div class="col-12">
                                     <div class="card">
                                         
                                         <div class="card-body">
                                             <form class="form" method="POST" action="<?php echo base_url('Schedule_management/finview_Store');?>"
                                                 enctype="multipart/form-data">
                                                 <div class="row">
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Date</label>
                                                                 <input type="text" name="date" class="form-control" value="<?= date('Y-m-d');?>" required="" readonly>

                                            
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Type
                                                             </label>
                                                            <select class="form-control" name="type">
                                                                <option>Choose One</option>
                                                                <option value="Expense" selected="">Expense</option>
                                                            </select>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Towards</label>
                                                             <select class="form-control" name="towards">
                                                                <option>Choose One</option>
                                                                <?php foreach($towards_data as $towards){?>
                                                                    <option value="<?= $towards->fan_exp_id;?>"><?= $towards->name;?></option>

                                                                <?php } ?>
                                                                
                                                            </select>

                                                         </div>
                                                     </div>
                                                    
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="first-name-column">Amount
                                                                 </label>
                                                                 <input type="text" name="amount" class="form-control">
                                                            
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="first-name-column">Tagged To
                                                                 </label>
                                                             <select class="form-select form-select-lg"
                                                                 name="staff_id" id="selectLarge">
                                                                 <option  value="">Choose One</option>
                                                                 <?php foreach($staff_data as $staff){?>
                                                                 <option value="<?=$staff->id;?>"><?= $staff->firstname;?> <?= $staff->lastname;?>
                                                                 </option>

                                                                 <?php } ?>

                                                             </select>
                                                         </div>
                                                     </div>


                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Refrence
                                                             </label>
                                                             <input type="text" id="" class="form-control"
                                                                 placeholder="Refrence" name="refrence" />
                                                         </div>
                                                     </div>

                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Attach Refrrence
                                                             </label>
                                                             <input type="file" id="" class="form-control"
                                                                 placeholder="" name="attach_refrence" />
                                                         </div>
                                                     </div>


                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Mode
                                                             </label>
                                                              <select class="form-select form-select-lg"
                                                                 name="mode_data" id="mode_data" required>
                                                                 <option value="">Choose One</option>
                                                                 <option value="Cash">Cash</option>
                                                                 <option value="Card">Card</option>
                                                             </select>
                                                         </div>
                                                     </div>
                                            
                                                
                                                     </div>
                                                    
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Remarks
                                                             </label>
                                                             <textarea class="form-control" name="remarks"></textarea>
                                                             
                                                         </div>
                                                     </div>
                                                     <div class="col-12">
                                                         <button type="submit"
                                                             class="btn btn-primary me-1">Submit</button>
                                                         <a href="<?=base_url('schedule_management');?>"><button type="button"
                                                                 class="btn btn-outline-secondary">Reset</button></a>
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
    $("#mainProductNav").addClass('active');

});
 </script>

