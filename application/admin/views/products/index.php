<style type="text/css">
.img-fluid {
    width: 120px;
    height: 120px;
    margin-top: 20px;
}
</style>
<!-- BEGIN: Content-->
<div class="app-content content ecommerce-application">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <div class="card-body border-bottom">
                            <h2 class="content-header-title float-start mb-0">Manage Product</h2>
                            <?php if(in_array('createProduct', $user_permission)): ?>
                            <a href="<?php echo base_url('products/add') ?>" class="btn btn-primary">Add Product</a>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="content-body">
            <!-- Wishlist Starts -->
            <section id="wishlist" class="grid-view wishlist-items">
                <div class="row">

                    <?php
                      foreach($products_details as $product){ ?>
                    <div class="col-md-3">
                        <div class="card ecommerce-card">
                            <div class="item-img text-center">
                                <a href="<?php echo base_url('products/view_details/');?><?= $product->id;?>">
                                    <img src="<?php echo base_url('uploads/product_image/');?><?= $product->image;?>"
                                        class="img-fluid" alt="img-placeholder" />
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="item-wrapper">
                                    <div class="item-cost">
                                        <h6 class="item-price me-1">RS:
                                            <strike><?= number_format($product->price);?>.00</strike> to
                                            <?= number_format($product->discounted_price);?>.00
                                        </h6>
                                    </div>
                                </div>
                                <div class="item-name">
                                    <a
                                        href="<?php echo base_url('products/view_details/');?><?= $product->id;?>"><?= $product->name;?></a>
                                </div>
                                <p class="card-text item-description">
                                    <a href="<?php echo base_url('products/view_details/');?><?= $product->id;?>"
                                        style="color: black;"><?= strip_tags(substr($product->description, 0, 100));?>...</a>

                                </p>
                            </div>
                            <div class="item-options text-center">
                                <?php 
                                        if(!in_array('updateProduct', $this->permission)) {
                                                redirect('dashboard', 'refresh');
                                            }else{?>
                                <a href="<?php echo base_url('products/edit/');?><?= $product->id;?>"><button
                                        type="button" class="btn btn-light btn-wishlist remove-wishlist">
                                        <i data-feather="edit"></i>
                                        <span>Edit</span>
                                    </button>
                                </a>

                                <?php  }
                                        ?>
                                <?php 
                                        if(!in_array('viewProduct', $this->permission)) {
                                                redirect('dashboard', 'refresh');
                                            }else{?>
                                <a href="<?php echo base_url('products/view_details/');?><?= $product->id;?>"><button
                                        type="button" class="btn btn-primary btn-cart move-cart">
                                        <i data-feather="shopping-cart"></i>
                                        <span class="add-to-cart">View Details</span>
                                    </button>
                                </a>

                                <?php  }
                                        ?>


                            </div>
                        </div>
                    </div>

                    <?php } ?>


                </div>


            </section>
            <!-- Wishlist Ends -->

        </div>
    </div>
</div>
<!-- END: Content-->

<!-- END: Content-->
<!-- END: Content-->
<script type="text/javascript">
$(document).ready(function() {

    $("#mainProductNav").addClass('active');

});
</script>