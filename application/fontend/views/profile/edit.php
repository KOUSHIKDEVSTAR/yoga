 <div class="app-content content ">

     <div class="content-wrapper container-xxl p-0">
         <div class="content-header row">


         </div>
         <div class="content-body">
             <!-- users list start -->
             <section class="app-user-list">

                 <!-- list and filter start -->
                 <div class="">
                 <div class="card offset-1">
                     <div class="card-body border-bottom">
                         <h4 class="card-title">Edit Customer Details</h4>
                         <section id="multiple-column-form">
                             <div class="row ">
                                 <div class="col-12">
                                     <div class="card">
                                         <div class="card-header">
                                             <h4 class="card-title"></h4>
                                         </div>
                                         <div class="card-body">
                                             <form class="form" method="POST" action="<?= base_url('profile/update');?>"
                                                 enctype="multipart/form-data">
                                                 <div class="row">
                                                    <input type="hidden" name="id" value="<?= $customer_details[0]->cust_id;?>"> 
                                                
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Full Name
                                                             </label>
                                                             <input type="text" id="" class="form-control"
                                                                 placeholder="Full Name" name="name" value="<?= $customer_details[0]->full_name;?>"  required="" readonly />
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Email</label>
                                                             <input type="email" id="" class="form-control"
                                                                 placeholder="Email" name="email" value="<?= $customer_details[0]->email;?>"required="" readonly  />

                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Mobile Number
                                                             </label>
                                                             <input type="text" id="" class="form-control"
                                                                 placeholder="Mobile Number"
                                                                 name="mobile_number" value="<?= $customer_details[0]->mobile_number;?>"  required="" readonly />
                                                         </div>
                                                     </div>
                                                    <!--  <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="first-name-column">Branch
                                                                 </label>
                                                             <select class="form-select form-select-lg"
                                                                 name="branch_id" id="selectLarge">
                                                                 <option>Choose One</option>
                                                                 <?php foreach($branch_data as $branch){?>
                                                                 <option value="<?=$branch['id'];?>" <?php if($branch['id'] == $customer_details[0]->branch_id){echo "selected";}?>><?= $branch['name'];?>
                                                                 </option>

                                                                 <?php } ?>

                                                             </select>
                                                         </div>
                                                     </div> -->
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Image
                                                             </label>
                                                             <img src="<?= base_url('admin/uploads/customer_details/');?><?= $customer_details[0]->pr_image;?>" style="width: 40px;height: 40px;">
                                                             <input type="file" id="" class="form-control"
                                                                 placeholder="" name="image" />
                                                                 <input type="hidden" name="old_image" value="<?=$customer_details[0]->pr_image;?>">
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Other Docs
                                                             </label>
                                                             <a href="<?= base_url('uploads/customer_details/');?><?= $customer_details[0]->other_docs;?>" target="_blank">Preview</a>
                                                             <input type="file" id="" class="form-control"
                                                                 placeholder="" name="other_docs" />
                                                                 <input type="hidden" name="old_other_docs" value="<?=$customer_details[0]->other_docs;?>">
                                                         </div>
                                                     </div>
                                                      <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">DOB
                                                             </label>
                                                             <input type="date" id="" class="form-control"
                                                                 placeholder="" name="dob" value="<?= $customer_details[0]->dob;?>" required=""  />
                                                         </div>
                                                     </div>
                                                     <div class="col-md-12 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Address
                                                             </label>
                                                             <textarea rows="5" cols="30" id="classic-editor"
                                                                 class="form-control" name="address"
                                                                 placeholder="Full Address" required="" ><?= $customer_details[0]->address;?></textarea>

                                                         </div>
                                                     </div>

                                                     <div class="col-12">
                                                         <button type="submit"
                                                             class="btn btn-primary me-1">Submit</button>
                                                         <a href="<?=base_url('profile');?>"><button type="button"
                                                                 class="btn btn-outline-secondary">Back</button></a>
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
