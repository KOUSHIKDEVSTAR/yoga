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
                         <h4 class="card-title">Edit Memebership Details</h4>

                         <div class="row">
                             <div class="col-md-12">

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
                                             <form class="form" method="POST" action="<?= base_url('memberlist/update');?>"
                                                 enctype="multipart/form-data">
                                                 <input type="hidden" name="id" value="<?= $edit_data[0]->memberlist_id;?>">
                                                 <div class="row">
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Type</label>
                                                             <select class="form-select form-select-lg" name="type"
                                                                 id="selectLarge">
                                                                 <option>Choose One</option>
                                                                 <?php foreach($tax_info as $tax){?>
                                                                    <option value="<?= $tax->tax_id;?>" <?php if($tax->tax_id == $edit_data[0]->tax_type){echo "selected";}?>><?= $tax->template_name;?></option>

                                                                <?php  }?>
                                                            
                                                             </select>
                                                         </div>
                                                     </div>
                                                     
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="first-name-column">Product Name</label>
                                                                 <input type="text" id="" value="<?= $edit_data[0]->name;?>" class="form-control"
                                                               placeholder="Product Name" name="name" />
                                                             
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="first-name-column">Price</label>
                                                                 <input type="text" id="" value="<?= $edit_data[0]->price;?>" class="form-control"
                                                               placeholder="Price" name="price" />
                                                             
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                       <div class="mb-1">
                                                           <label class="form-label" for="city-column">Discounted Price
                                                               </label>
                                                           <input type="text" id="" value="<?= $edit_data[0]->dis_price;?>" class="form-control"
                                                               placeholder="Discounted Price" name="discounted_price" />
                                                       </div>
                                                     </div>
                                                     
                                                     <div class="col-md-6 col-12">
                                                       <div class="mb-1">
                                                           <label class="form-label" for="city-column">Validity In Days
                                                               </label>
                                                           <input type="text" id="" value="<?= $edit_data[0]->validty_days;?>" class="form-control"
                                                               placeholder="Validity In Days" name="validty_days" />
                                                       </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"  for="first-name-column">No. Of Session</label>
                                                                 <input type="text" id="" value="<?= $edit_data[0]->no_session;?>" class="form-control"
                                                               placeholder="No. Of Session" name="no_session" />
                                                             
                                                         </div>
                                                     </div>
                                                    
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Branch</label>
                                                             <select class="form-select form-select-lg" name="branch"
                                                                 id="selectLarge">
                                                                 <option>Choose One</option>
                                                                 <?php foreach($branch_data as $branch){?>
                                                                    <option value="<?=$branch['id'];?>" <?php if($branch['id'] == $edit_data[0]->branch_id){echo "selected";}?>><?= $branch['name'];?></option>

                                                                <?php } ?>
                                                            
                                                             </select>
                                                         </div>
                                                     </div>
                                                      <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Mode List</label>
                                                             <select class="form-select form-select-lg" name="modelist"
                                                                 id="selectLarge">
                                                                 <option>Choose One</option>
                                                                 <?php foreach($modelist as $mode){?>
                                                                    <option value="<?=$mode->mode_id;?>" <?php if($mode->mode_id == $edit_data[0]->mode_id){echo "selected";}?>><?= $mode->mode_name;?></option>

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
                                                               <input type="hidden" name="old_image" value="<?= $edit_data[0]->product_image;?>">
                                                       </div>
                                                     </div>
                                                    
                                                    <div class="col-md-6 col-12">
                                                       <div class="mb-1">
                                                        <img src="<?= base_url('uploads/membership_product/');?><?= $edit_data[0]->product_image;?>" style="width: 100px;height: 100px;">
                                                           
                                                       </div>
                                                     </div>
                                                     <div class="col-md-12 col-12">
                                                       <div class="mb-1">
                                                           <label class="form-label" for="city-column">Description
                                                               </label>
                                                               <textarea rows="5" cols="30" id="textEditor4" class="form-control" name="description" placeholder="Product Description"><?= $edit_data[0]->description;?></textarea>
                                                           
                                                       </div>
                                                     </div>
                                                     
                                                     <div class="col-12">
                                                         <button type="submit"
                                                             class="btn btn-primary me-1">Submit</button>
                                                         <a href="<?=base_url('');?>"><button type="button" class="btn btn-outline-secondary">Reset</button></a>
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
    $("#memberlist").addClass('active');

});
</script>
