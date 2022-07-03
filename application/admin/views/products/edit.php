 <div class="app-content content ">

     <div class="content-wrapper container-xxl p-0">
         <div class="content-header row">
             <div class="content-header-left col-md-9 col-12 mb-2">
                 <div class="row breadcrumbs-top">
                     <div class="col-12">
                         
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
                         <h4 class="card-title">Edit Product Details
                         <a href="<?php echo base_url('products');?>"><button type="button" class="btn btn-primary"
                                         data-bs-toggle="" data-bs-target="">View
                                         </button>
                                 </a>
                         </h4>

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
                                             <form class="form" method="POST" action="<?= base_url('products/update');?>"
                                                 enctype="multipart/form-data">
                                                 <div class="row">
                                                  <input type="hidden" name="id" value="<?= $products_details[0]->id;?>">
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Type</label>
                                                             <select class="form-select form-select-lg" name="type"
                                                                 id="selectLarge">
                                                                 <option>Choose One</option>
                                                                 <?php foreach($product_type as $product){?>
                                                                    <option value="<?=$product->fan_exp_id;?>" <?php if($products_details[0]->type == $product->fan_exp_id ) {echo "selected";}?> ><?= $product->name;?></option>

                                                                <?php } ?>
                                                            
                                                             </select>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                       <div class="mb-1">
                                                           <label class="form-label" for="city-column">Product Name
                                                               </label>
                                                           <input type="text" id="" class="form-control"
                                                               placeholder="Product Name" value="<?= $products_details[0]->name;?>" name="name" />
                                                       </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="first-name-column">Price</label>
                                                                 <input type="text" id="" class="form-control"
                                                               placeholder="Price" value="<?= $products_details[0]->price;?>" name="price" />
                                                             
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                       <div class="mb-1">
                                                           <label class="form-label" for="city-column">Discounted Price
                                                               </label>
                                                           <input type="text" id="" class="form-control"
                                                               placeholder="Discounted Price" value="<?= $products_details[0]->discounted_price;?>" name="discounted_price" />
                                                       </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Available In</label>
                                                             <select class="form-select form-select-lg" name="available_in"
                                                                 id="selectLarge">
                                                                 <option>Choose One</option>
                                                                <?php foreach($branch_type as $branch){?>
                                                                    <option value="<?=$branch->id;?>" <?php if($products_details[0]->availble_at == $branch->id) {echo "selected";}?>><?= $branch->name;?>
                                                                        
                                                                    </option>

                                                                <?php } ?>
                                                            
                                                             </select>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                       <div class="mb-1">
                                                           <label class="form-label" for="city-column">Image
                                                               </label>
                                                               <img src="<?= base_url('uploads/product_image/');?><?= $products_details[0]->image;?>" style="width: 50px;height: 50px;">
                                                           <input type="file" id="" class="form-control"
                                                               placeholder="" name="image" />
                                                               <input type="hidden" name="old_image" value="<?= $products_details[0]->image;?>">
                                                       </div>
                                                     </div>
                                                     <div class="col-md-12 col-12">
                                                       <div class="mb-1">
                                                           <label class="form-label" for="city-column">Description
                                                               </label>
                                                               <textarea rows="5" cols="30" id="classic-editor" class="form-control" name="description" placeholder="Product Description"><?= $products_details[0]->description;?></textarea>
                                                           
                                                       </div>
                                                     </div>
                                                     
                                                     <div class="col-12">
                                                         <button type="submit"
                                                             class="btn btn-primary me-1">Update</button>
                                                         <a href="<?=base_url('products');?>"><button type="button" class="btn btn-outline-secondary">Reset</button></a>
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

