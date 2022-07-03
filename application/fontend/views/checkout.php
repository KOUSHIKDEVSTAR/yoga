<!-- BEGIN: Body-->



    <!-- BEGIN: Content-->
    <div class="app-content content ecommerce-application">
        <div class="content-overlay"></div>
        
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Checkout</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">eCommerce</a>
                                    </li>
                                    <li class="breadcrumb-item active">Checkout
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="content-body">
                <div class="bs-stepper checkout-tab-steps">
                    <!-- Wizard starts -->
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#step-cart" role="tab" id="step-cart-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="shopping-cart" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Cart</span>
                                    <span class="bs-stepper-subtitle">Your Cart Items</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#step-address" role="tab" id="step-address-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="home" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Address</span>
                                    <span class="bs-stepper-subtitle">Enter Your Address</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#step-payment" role="tab" id="step-payment-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="credit-card" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Payment</span>
                                    <span class="bs-stepper-subtitle">Select Payment Method</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <!-- Wizard ends -->

                    <div class="bs-stepper-content">
                        <!-- Checkout Place order starts -->
                        <div id="step-cart" class="content" role="tabpanel" aria-labelledby="step-cart-trigger">
                            <div id="place-order" class="list-view product-checkout">
                                <!-- Checkout Place Order Left starts -->
                                <div class="checkout-items">
                                    <div class="card ecommerce-card">
                                        <div class="item-img">
                                            <a href="app-ecommerce-details.html">
                                                <img src="<?php echo  base_url('admin/uploads/membership_product/');?><?=$subs_info[0]->product_image;?>" alt="img-placeholder" />
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <div class="item-name">
                                                <h6 class="mb-0"><a href="" class="text-body"><?=$subs_info[0]->name;?></a></h6>
                                               <!--  <span class="item-company">By <a href="#" class="company-name">Apple</a></span> -->
                                                
                                            </div>
                                            <input type="hidden" name="" id="price" value="<?=$subs_info[0]->price;?>">
                                            <!-- <span class="text-success mb-1">In Stock</span> -->
                                          <!--   <div class="item-quantity">
                                                <span class="quantity-title">Qty:</span>
                                                <div class="quantity-counter-wrapper">
                                                    <div class="input-group">
                                                        <input type="text" class="quantity-counter" value="1" />
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="sp-quantity">
                                                <div class="sp-minus fff"> <a class="ddd" href="#">-</a></div>
                                                <div class="sp-input">
                                                    <input type="text" class="quntity-input" id="quanty" value="1">
                                                </div>
                                                <div class="sp-plus fff"> <a class="ddd" href="#">+</a></div>
                                            </div>
                                            
                                        </div>
                                        <div class="item-options text-center">
                                            <div class="item-wrapper">
                                                <div class="item-cost">
                                                    <h4 class="item-price"><span id="price_div"><?=$subs_info[0]->price;?></span></h4>
                                                    <p class="card-text shipping">
                                                        <span class="badge rounded-pill badge-light-success">Free Shipping</span>
                                                    </p>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- Checkout Place Order Left ends -->

                                <!-- Checkout Place Order Right starts -->
                                <div class="checkout-options">
                                    <div class="card">
                                        <div class="card-body">
                                            <label class="section-label form-label mb-1">Options</label>
                                            <form>
                                                <div class="coupons input-group input-group-merge">
                                                    <input type="text" class="form-control" id="coupon_code" placeholder="Coupons" aria-label="Coupons" aria-describedby="input-coupons" />
                                                    <span class="input-group-text text-primary ps-1" id=""><button type="button" class="btn btn-primary" id="coupons_apply">Apply</button></span>
                                                </div>
                                            </form>
                                            <hr />
                                            <div class="price-details">
                                                <h6 class="price-title">Price Details</h6>
                                                <ul class="list-unstyled">
                                                    <li class="price-detail">
                                                        <div class="detail-title">Total MRP</div>
                                                        <div class="detail-amt"><span id="total_price_div"><?=$subs_info[0]->price;?></span></div>
                                                    </li>
                                                    <li class="price-detail">
                                                        <div class="detail-title">Bag Discount</div>
                                                        <input type="hidden" name="" id="dis_cnt_div" value="0">
                                                        <input type="hidden" name="" id="copon_appled" value="">
                                                        <div class="detail-amt text-success"><span id="total_dis_div">0</span></div>
                                                    </li>
                                                    <!-- <li class="price-detail">
                                                        <div class="detail-title">Estimated Tax</div>
                                                        <div class="detail-amt">$1.3</div>
                                                    </li>
                                                    <li class="price-detail">
                                                        <div class="detail-title">EMI Eligibility</div>
                                                        <a href="#" class="detail-amt text-primary">Details</a>
                                                    </li>
                                                    <li class="price-detail">
                                                        <div class="detail-title">Delivery Charges</div>
                                                        <div class="detail-amt discount-amt text-success">Free</div>
                                                    </li> -->
                                                </ul>
                                                <hr />
                                                <ul class="list-unstyled">
                                                    <li class="price-detail">
                                                        <div class="detail-title detail-total">Total</div>
                                                        <div class="detail-amt fw-bolder"><span id="total_price"><?=$subs_info[0]->price;?></span></div>
                                                    </li>
                                                </ul>
                                                <button type="button" class="btn btn-primary w-100 btn-next place-order">Place Order</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Checkout Place Order Right ends -->
                                </div>
                            </div>
                            <!-- Checkout Place order Ends -->
                        </div>
                        <!-- Checkout Customer Address Starts -->
                        <div id="step-address" class="content" role="tabpanel" aria-labelledby="step-address-trigger">
                            <form id="checkout-address" class="list-view product-checkout">
                                <!-- Checkout Customer Address Left starts -->
                                <div class="card">
                                    <div class="card-header flex-column align-items-start">
                                        <h4 class="card-title">Add New Address</h4>
                                        <p class="card-text text-muted mt-25">Be sure to check "Deliver to this address" when you have finished</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="mb-2">
                                                    <input type="hidden" id="user_id"name="" value="<?= $cust_info[0]->id;?>">
                                                    <label class="form-label" cfor="checkout-name">Full Name:</label>
                                                    <input type="text" id="full_name" class="form-control" name="fname" value="<?= $cust_info[0]->firstname;?> <?= $cust_info[0]->lastname;?>" placeholder="John Doe"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="mb-2">
                                                    <label class="form-label" cfor="checkout-number">Mobile Number:</label>
                                                    <input type="number" id="mobile" class="form-control" name="mnumber" value="<?= $cust_info[0]->phone;?>" placeholder="0123456789" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="mb-2">
                                                    <label class="form-label" cfor="checkout-apt-number">Flat, House No:</label>
                                                    <input type="text" id="house_no" class="form-control" value="" name="apt-number" placeholder="9447 Glen Eagles Drive" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="mb-2">
                                                    <label class="form-label" cfor="checkout-landmark">Landmark e.g. near apollo hospital:</label>
                                                    <input type="text" id="land_maRK" class="form-control" name="landmark" placeholder="Near Apollo Hospital" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="mb-2">
                                                    <label class="form-label" cfor="checkout-city">Town/City:</label>
                                                    <input type="text" id="town_city" class="form-control" name="city" placeholder="Tokyo" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="mb-2">
                                                    <label class="form-label" cfor="checkout-pincode">Pincode:</label>
                                                    <input type="number" id="pincode" class="form-control" name="pincode" placeholder="201301" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="mb-2">
                                                    <label class="form-label" cfor="checkout-state">State:</label>
                                                    <input type="text" id="state" class="form-control" name="state" placeholder="California" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="mb-2">
                                                    <label class="form-label" cfor="add-type">Address Type:</label>
                                                    <select class="form-select" id="add_type">
                                                        <option value="Home">Home</option>
                                                        <option value="Work">Work</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="button" id="save_and_delver" class="btn btn-primary btn-next delivery-address">Save And Deliver Here</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Checkout Customer Address Left ends -->

                                <!-- Checkout Customer Address Right starts -->
                                <div class="customer-card">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title"><?= $cust_info[0]->firstname;?> <?= $cust_info[0]->lastname;?></h4>
                                        </div>
                                        <div class="card-body actions">
                                            <p class="card-text mb-0"><?= $cust_info[0]->address;?>  </p>
                                            <p class="card-text"><?= $cust_info[0]->country;?> </p>
                                            <p class="card-text"><?= $cust_info[0]->pin;?></p>
                                            <p class="card-text"><?= $cust_info[0]->phone;?></p>
                                            <button type="button" class="btn btn-primary w-100 btn-next delivery-address mt-2">
                                                Deliver To This Address
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Checkout Customer Address Right ends -->
                            </form>
                        </div>
                        <!-- Checkout Customer Address Ends -->
                        <!-- Checkout Payment Starts -->
                        <div id="step-payment" class="content" role="tabpanel" aria-labelledby="step-payment-trigger">
                        <form id="checkout-payment" class="list-view product-checkout" onsubmit="return false;">
                            <script
                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="pk_test_51HNKXeFjQ4dpWp5WaLwveImoE5sMMi9mF10LtMp7vPK2hW1MuVpJ6UNbYCmvZEkKK35mFFmHJ8YrsUfHqkyKT44t00dHjaA6Tb"
                                data-amount="1000"
                                data-name="Test Payment"
                                data-description="Test Payment"
                                data-image="<?php echo base_url();?>admin/app-assets/images/logo/logo.png"
                                data-currency="inr"
                                data-email="admin@admin.com"
                            >
                            </script>

                        </form>
                        </div>
                        <!-- Checkout Payment Ends -->
                        <!-- </div> -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->
    <script type="text/javascript">
            $(".ddd").on("click", function () {
            var price = $('#price').val();
            var total_dis_div = $('#dis_cnt_div').val();
            var $button = $(this);
            var oldValue = $button.closest('.sp-quantity').find("input.quntity-input").val();
            if ($button.text() == "+") {
                var newVal = parseFloat(oldValue) + 1;

                var newprice =(price) * newVal;
                $('#price_div').text(newprice); 
                $('#total_price_div').text(newprice); 
                var final_price = newprice - total_dis_div;
                $('#total_price').text(final_price);
                
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                    var newprice =(price) * newVal;
                    $('#price_div').text(newprice); 
                    $('#total_price_div').text(newprice); 
                    var final_price = newprice - total_dis_div;
                    $('#total_price').text(final_price);
                } else {
                    newVal = 0;
                    var newprice =(price) * newVal;
                    $('#price_div').text(newprice); 
                    $('#total_price_div').text(newprice); 
                    var final_price = newprice - 0;
                    $('#total_price').text(final_price);
                }
            }

            $button.closest('.sp-quantity').find("input.quntity-input").val(newVal);

        });
    </script>

<script type="text/javascript">
    $('#save_and_delver').click(function(e){
        var user_id=$('#user_id').val();
        var full_name=$('#full_name').val();
        var add_type=$('#add_type').val();
        var state=$('#state').val();
        var pincode=$('#pincode').val();
        var town_city=$('#town_city').val();
        var land_maRK=$('#land_maRK').val();
        var house_no=$('#house_no').val();
        var mobile=$('#mobile').val();


        $.ajax({
            url: "<?php echo base_url(); ?>memberlist/delivr_add_save",
            method: "POST",
            data: {
                user_id: user_id,full_name: full_name,add_type: add_type,state: state,pincode: pincode,town_city: town_city,land_maRK: land_maRK,house_no: house_no,mobile:mobile
            },
            success: function(data) {
               alert('Delivery Data Saved Successfully');
            }
        })



    });

    $('#coupons_apply').click(function(e){

        var coupons_code = $('#coupon_code').val();
        var copon_appled = $('#copon_appled').val();
        if(copon_appled == coupons_code){
            alert('Coupon Alreday Added');
            location.reload();


        }else{
        $.ajax({
            url: "<?php echo base_url(); ?>memberlist/coupon_dis_get",
            method: "POST",
            dataType: 'json',
            data: {
                coupons_code: coupons_code
            },
            async: true,
            success: function(data) {
            var daatt = data.data.all_coupons[0].coup_amnt;

            var price = $('#total_price_div').text();

              console.log("daatt",daatt);

            console.log("price",price);

            var apliclbe_price = data.data.all_coupons[0].applicable_amnt;

            console.log("apliclbe_price",apliclbe_price);

            if(price >= apliclbe_price){
                $('#dis_cnt_div').val(daatt);
                $('#total_dis_div').text(daatt);
                var qty = $('#quanty').val();

                var price_an  = $('#price').val();

                var newprice =(price_an) * qty;
                $('#price_div').text(newprice); 
                $('#total_price_div').text(newprice); 
                var total_dis_div=$('#total_dis_div').text();
                var final_price = newprice - total_dis_div;
                $('#total_price').text(final_price);

                $('#copon_appled').val(data.data.all_coupons[0].coup_code);
                 $('#coupon_code').val('');
                alert('Coupon Applied');

            }else{
                $('#dis_cnt_div').val(0);
                 $('#total_dis_div').text(0);
                alert('Price is small to apply coupon');

            }

            

            



                // $('#dis_cnt_div').val(data[0]['coup_amnt']);
               
            }
        });
    }

    });
</script>