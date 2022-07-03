 <div class="app-content ">

     <div class="content-wrapper p-0 div-use-minhight">
         <div class="content-body">


             <div class="content-body">
                 <section id="ecommerce-products " class="list-view">
                     <div class="container-xxl container-lg">
                     <?php 
                    if(isset($memberlist_details)){
                        $i=0;
                        foreach($memberlist_details as $value){
                            $i++;
                            ?>
                     <div class="row card ecommerce-card custom-card ">
                         <div class="item-img text-center col-xxl-3 col-lg-3">
                            <div class="img-wp">
                                 <img class="img-fluid card-img-top"
                                     src="<?php echo  base_url('admin/uploads/membership_product/');?><?=$value->product_image;?>"
                                     alt="img-placeholder">
                                     </div>
                         </div>
                         <div class="card-body col-xxl-6 col-lg-6">
                             <div class="item-wrapper">
                                 <div class="item-rating">
                                     <ul class="unstyled-list list-inline">
                                         <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                 width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                 stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                 stroke-linejoin="round" class="feather feather-star filled-star">
                                                 <polygon
                                                     points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                 </polygon>
                                             </svg></li>
                                         <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                 width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                 stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                 stroke-linejoin="round" class="feather feather-star filled-star">
                                                 <polygon
                                                     points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                 </polygon>
                                             </svg></li>
                                         <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                 width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                 stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                 stroke-linejoin="round" class="feather feather-star filled-star">
                                                 <polygon
                                                     points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                 </polygon>
                                             </svg></li>
                                         <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                 width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                 stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                 stroke-linejoin="round" class="feather feather-star filled-star">
                                                 <polygon
                                                     points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                 </polygon>
                                             </svg></li>
                                         <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                 width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                 stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                 stroke-linejoin="round" class="feather feather-star unfilled-star">
                                                 <polygon
                                                     points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                 </polygon>
                                             </svg></li>
                                     </ul>
                                 </div>
                                 <div>
                                     <h6 class="item-price">$<?= $value->price;?></h6>
                                 </div>
                             </div>
                             <h6 class="item-name">
                                 <a class="text-body" href="app-ecommerce-details.html"><?= $value->name;?></a>
                                 <span class="card-text item-company"></span>
                             </h6>
                             <p class="card-text item-description">
                                 <?= $value->description;?>
                             </p>
                         </div>
                         <div class="item-options text-center col-xxl-3 col-lg-3">
                             <div class="cart-both-btn">
                             <div class="item-wrapper">
                                 <div class="item-cost">
                                     <h4 class="item-price">$<?= $value->price;?></h4>
                                 </div>
                             </div>
                             <?php if($this->session->userdata('cust_email')){?>
                                
                             <a href="<?php echo base_url('memberlist/purchase');?>/<?= $value->memberlist_id ;?>" class="btn btn-primary ">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-shopping-cart">
                                     <circle cx="9" cy="21" r="1"></circle>
                                     <circle cx="20" cy="21" r="1"></circle>
                                     <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                 </svg>
                                 <span class="add-to-cart">Buy Now</span>
                             </a>
                             <?php }else{?>

                                <a href="<?php echo base_url('login');?>" class="btn btn-primary ">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-shopping-cart">
                                     <circle cx="9" cy="21" r="1"></circle>
                                     <circle cx="20" cy="21" r="1"></circle>
                                     <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                 </svg>
                                 <span class="add-to-cart">Buy Now</span>
                             </a>

                             <?php }?>
                             </div>
                         </div>
                     </div>
                     <?php } } ?>
                     </div>
                 </section>
                 </section>
                 <!-- users list ends -->

             </div>


         </div>
     </div>
 </div>