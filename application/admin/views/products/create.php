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
                         <h4 class="card-title">Add Product Details
                         <a href="<?php echo base_url('products');?>"><button type="button"
                                         class="btn btn-primary" data-bs-toggle="" data-bs-target="">View
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
                                             <form class="form" method="POST" action="<?= base_url('products/store');?>"
                                                 enctype="multipart/form-data">
                                                 <div class="row">
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Type</label>
                                                             <select class="form-select form-select-lg" name="type"
                                                                 id="selectLarge">
                                                                 <option>Choose One</option>
                                                                 <?php foreach($product_type as $product){?>
                                                                 <option value="<?=$product->fan_exp_id;?>">
                                                                     <?= $product->name;?></option>

                                                                 <?php } ?>
                                                                 <!--  
                                                                 <option value="FK Template Name">FK Template Name</option> -->

                                                             </select>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Product Name
                                                             </label>
                                                             <input type="text" id="" class="form-control"
                                                                 placeholder="Product Name" name="name" />
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Price</label>
                                                             <input type="text" id="" class="form-control"
                                                                 placeholder="Price" name="price" />

                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Discounted
                                                                 Price
                                                             </label>
                                                             <input type="text" id="" class="form-control"
                                                                 placeholder="Discounted Price"
                                                                 name="discounted_price" />
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="first-name-column">Available
                                                                 In</label>
                                                             <select class="form-select form-select-lg"
                                                                 name="available_in" id="selectLarge">
                                                                 <option>Choose One</option>
                                                                 <?php foreach($branch_type as $branch){?>
                                                                 <option value="<?=$branch->id;?>"><?= $branch->name;?>
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
                                                     <div class="col-md-12 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Description
                                                             </label>
                                                             <textarea rows="5" cols="30" id="classic-editor"
                                                                 class="form-control" name="description"
                                                                 placeholder="Product Description"></textarea>

                                                         </div>
                                                     </div>

                                                     <div class="col-12">
                                                         <button type="submit"
                                                             class="btn btn-primary me-1">Submit</button>
                                                         <a href="<?=base_url('');?>"><button type="button"
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
