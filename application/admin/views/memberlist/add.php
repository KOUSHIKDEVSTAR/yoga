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
                         <h4 class="card-title">Add Plans & Product</h4>

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
                                             <form class="form" method="POST" action="<?= base_url('memberlist/store');?>"
                                                 enctype="multipart/form-data">
                                                 <div class="row">
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Select Membership Or Product</label>
                                                             <select class="form-select form-select-lg" id="membership_product_type" name="membership_product_type"
                                                                 id="selectLarge">
                                                                <option>Choose One</option>
                                                                <option value="Membership">Membership</option>
                                                                <option value="Product">Product</option>
                                                            
                                                             </select>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Tax Applied</label>
                                                             <select class="form-select form-select-lg" name="type"
                                                                 id="selectLarge">
                                                                 <option>Choose One</option>
                                                                 <?php foreach($tax_info as $tax){?>
                                                                    <option value="<?= $tax->tax_id;?>"><?= $tax->template_name;?></option>

                                                                <?php  }?>
                                                            
                                                             </select>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12" id="cancel_div">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Cancelation Policy</label>
                                                             <select class="form-select form-select-lg" id="cancelation_policy" name="cancelation_policy"
                                                                 id="selectLarge">
                                                                 <option>Choose One</option>
                                                                 <?php foreach($cancelation_policy as $policy){?>
                                                                    <option value="<?= $policy->cancel_id;?>"><?= $policy->type;?></option>

                                                                <?php  } ?>
                                                            
                                                             </select>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Is Show Product</label>
                                                             <select class="form-select form-select-lg" id="show_product" name="show_product"
                                                                 id="selectLarge">
                                                                 <option>Choose One</option>
                                                                
                                                                    <option value="1">Yes</option>
                                                                    <option value="0">No</option>

                                                             
                                                            
                                                             </select>
                                                         </div>
                                                     </div>
                                                     
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="first-name-column">Product Name</label>
                                                                 <input type="text" id="" class="form-control"
                                                               placeholder="Product Name" name="name" />
                                                             
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="first-name-column">Price</label>
                                                                 <input type="text" id="" class="form-control"
                                                               placeholder="Price" name="price" />
                                                             
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                       <div class="mb-1">
                                                           <label class="form-label" for="city-column">Discounted Price
                                                               </label>
                                                           <input type="text" id="" class="form-control"
                                                               placeholder="Discounted Price" name="discounted_price" />
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
                                                                    <option value="<?=$branch['id'];?>"><?= $branch['name'];?></option>

                                                                <?php } ?>
                                                            
                                                             </select>
                                                         </div>
                                                     </div>
                                                     <div  class="row" id="val_session_div">
                                                         <div class="col-md-6 col-12">
                                                       <div class="mb-1">
                                                           <label class="form-label" for="city-column">Validity In Days
                                                               </label>
                                                           <input type="text" id="" class="form-control"
                                                               placeholder="Validity In Days" name="validty_days" />
                                                       </div>
                                                    </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="first-name-column">No. Of Session</label>
                                                                 <input type="text" id="no_of_session" class="form-control"
                                                               placeholder="No. Of Session" name="no_session" />
                                                             
                                                         </div>
                                                     </div>
                                                     </div>
                                                     
                                                    
                                                    
                                                    
                                                      <div class="col-md-6 col-12" id="mode_list_div">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Mode List</label>
                                                             <select class="form-select form-select-lg" name="modelist"
                                                                 id="selectLarge">
                                                                 <option>Choose One</option>
                                                                 <?php foreach($modelist as $mode){?>
                                                                    <option value="<?=$mode->mode_id;?>"><?= $mode->mode_name;?></option>

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
                                                     <div class="col-md-12 col-12">
                                                       <div class="mb-1">
                                                           <label class="form-label" for="city-column">Is Shareable
                                                               </label>
                                                           <select class="form-select form-select-lg" name="is_sharable"
                                                                 id="is_sharable" required>
                                                                <option value="">Choose One</option>
                                                                <option value="1">Yes</option>
                                                                <option value="2">No</option>
                                                             </select>
                                                       </div>
                                                     </div>
                                                    
                                                     <div class="col-md-12 col-12">
                                                       <div class="mb-1">
                                                           <label class="form-label" for="city-column">Description
                                                               </label>
                                                               <textarea rows="5" cols="30" id="textEditor4" class="form-control" name="description" placeholder="Product Description"></textarea>
                                                           
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
$(document).ready(function(e){
    $('#membership_product_type').on('change',function(e){
        var membership_product_type = $('#membership_product_type').val();
        if(membership_product_type == "Product"){
            $('#val_session_div').hide();
            $('#mode_list_div').hide();
            $('#cancel_div').hide();

        }else{
            $('#val_session_div').show();
            $('#mode_list_div').show();
             $('#cancel_div').show();


        }

    });
     $('#cancelation_policy').on('change',function(e){
        var cancelation_policy = $('#cancelation_policy').val();
        if(cancelation_policy == 2){
            $('#no_of_session').val(999);

        }else{
             $('#no_of_session').val('');

        }

    });

});
</script>
