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
                         <h4 class="card-title">Add Customer Details</h4>
                         <section id="multiple-column-form">
                             <div class="row">
                                 <div class="col-12">
                                     <div class="card">
                                         <div class="card-header">
                                             <h4 class="card-title"></h4>
                                         </div>
                                         <div class="card-body">
                                             <form class="form" method="POST" action="<?= base_url('customers/store');?>"
                                                 enctype="multipart/form-data">
                                                 <div class="row">
                                                
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Full Name
                                                             </label>
                                                             <input type="text" id="" class="form-control"
                                                                 placeholder="Full Name" name="name"  required="" />
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Email</label>
                                                             <input type="email" id="" class="form-control"
                                                                 placeholder="Email" name="email" required=""  />

                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Mobile Number
                                                             </label>
                                                             <input type="text" id="" class="form-control"
                                                                 placeholder="Mobile Number"
                                                                 name="mobile_number"  required="" />
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="first-name-column">Branch
                                                                 </label>
                                                             <select class="form-select form-select-lg"
                                                                 name="branch_id" id="selectLarge">
                                                                 <option>Choose One</option>
                                                                 <?php foreach($branch_data as $branch){?>
                                                                 <option value="<?=$branch['id'];?>"><?= $branch['name'];?>
                                                                 </option>

                                                                 <?php } ?>

                                                             </select>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Image
                                                             </label>
                                                             <input type="file" id="" class="form-control"
                                                                 placeholder="" name="image" />
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Other Docs
                                                             </label>
                                                             <input type="file" id="" class="form-control"
                                                                 placeholder="" name="other_docs" />
                                                         </div>
                                                     </div>
                                                      <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">DOB
                                                             </label>
                                                             <input type="date" id="" class="form-control"
                                                                 placeholder="" name="dob" required=""  />
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Address
                                                             </label>
                                                             <textarea rows="5" cols="30" id="classic-editor"
                                                                 class="form-control" name="address"
                                                                 placeholder="Full Address" required="" ></textarea>

                                                         </div>
                                                     </div>

                                                     <div class="col-12">
                                                         <button type="submit"
                                                             class="btn btn-primary me-1">Submit</button>
                                                         <a href="<?=base_url('customers');?>"><button type="button"
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
    $("#customersList").addClass('active');

});
 </script>
