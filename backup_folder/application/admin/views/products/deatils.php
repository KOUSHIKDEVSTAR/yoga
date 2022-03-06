<div class="app-content content ecommerce-application">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Product Details</h2>

                    </div>
                </div>
            </div>
            
        </div>
        <div class="content-body">
            <!-- app e-commerce details start -->
            <section class="app-ecommerce-details">
                <div class="card">
                    <!-- Product Details starts -->
                    <div class="card-body">
                        <div class="row my-2">
                            <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                                <div class="d-flex align-items-center justify-content-center">
                                    <img src="<?= base_url('uploads/product_image/');?><?= $products_details[0]->image;?>"
                                        class="img-fluid product-img" alt="product image" />
                                </div>
                            </div>
                            <div class="col-12 col-md-7">

                                <h4><?= $products_details[0]->name;?></h4>

                                  <h4 class="item-price me-1">RS: <strike><?= number_format($products_details[0]->price);?>.00</strike> to <?= number_format($products_details[0]->discounted_price);?>.00 </h4>
                                
                                <div class="card-text">
                                    <?= $products_details[0]->description;?>

                                </div>
                                
                                <hr />
                                <div class="d-flex flex-column flex-sm-row pt-1">
                                    <?php 
                                          if(!in_array('updateProduct', $this->permission)) {
                                                redirect('dashboard', 'refresh');
                                            }else{?>
                                    <a href="<?php echo base_url('products/edit/');?><?= $products_details[0]->id;?>"
                                        class="btn btn-primary btn-cart me-0 me-sm-1 mb-1 mb-sm-0">
                                        <i data-feather="edit" class="me-50"></i>
                                        <span class="add-to-cart">Edit Product</span>
                                    </a>
                                    <?php } ?>
                                    <a href="<?php echo base_url('products');?>">

                                        <button type="button" class="btn btn-outline-secondary">Back</button>
                                    </a>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>
            <!-- app e-commerce details end -->

        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $("#mainProductNav").addClass('active');
    

});
</script>