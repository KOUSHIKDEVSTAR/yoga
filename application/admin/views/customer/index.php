 <div class="app-content content ">

     <div class="content-wrapper container-xxl p-0">
         <div class="content-header row">

         </div>
         <div class="content-body">
             <!-- users list start -->
             <section id="row-grouping-datatable">
                 <div class="row">
                     <div class="col-12">
                         <div class="card">
                             <div class="card-body border-bottom">
                                 <h4 class="card-title">Customer Details
                                     <?php if(in_array('createCustomer', $user_permission)): ?>
                                     <a href="<?php echo base_url('customers/add');?>"><button type="button"
                                             class="btn btn-primary" data-bs-toggle="" data-bs-target="">Add
                                             Customer</button>
                                     </a>
                                     <?php endif; ?>
                                 </h4>

                                 <div class="row">
                                     <div class="col-md-12">

                                         <?php if($this->session->flashdata('success')): ?>
                                         <div class="demo-spacing-0">
                                             <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                 <div class="alert-body">
                                                     <?php echo $this->session->flashdata('success'); ?>
                                                 </div>
                                                 <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                     aria-label="Close"></button>
                                             </div>
                                         </div>

                                         <?php elseif($this->session->flashdata('error')): ?>
                                         <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                             <div class="alert-body d-flex align-items-center">
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-info me-50">
                                                     <circle cx="12" cy="12" r="10"></circle>
                                                     <line x1="12" y1="16" x2="12" y2="12"></line>
                                                     <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                                 </svg>
                                                 <span>The value is <strong>
                                                         <?php echo $this->session->flashdata('error'); ?></strong>.
                                             </div>
                                             <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                 aria-label="Close"></button>
                                         </div>

                                         <?php endif; ?>
                                     </div>
                                 </div>


                                 <div class="card-datatable table-responsive pt-0">
                                     <table class="user-list-table table">
                                         <thead class="table-light">
                                             <tr>
                                                 <th>#</th>
                                                 <!-- <th>Image</th> -->
                                                 <th>Name</th>
                                                 <!-- <th>Email</th> -->
                                                 <th>Contact</th>
                                                 <th>Branch</th>
                                                 <th>Joined Date</th>
                                                 <th>Actions</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <?php 
                                    if(isset($customer_details)){
                                        $i=0;
                                        foreach($customer_details as $value){
                                            $i++;
                                            ?>
                                             <tr>
                                                 <td><?= $i;?></td>
                                                 <!-- <td>
                                                    <img class="img-fluid"
                                                         src="<?php echo  base_url('uploads/customer_details/');?><?=$value->pr_image;?>"
                                                         style="width: 100px;height: 80px;"></td> -->
                                                 <td>
                                                     <div class="d-flex justify-content-left align-items-center">
                                                         <div class="avatar-wrapper">
                                                             <div class="avatar me-50"><img
                                                                     src="<?php echo  base_url('uploads/customer_details/');?><?=$value->pr_image;?>"
                                                                     alt="Avatar" width="32" height="32"></div>
                                                         </div>
                                                         <div class="d-flex flex-column">
                                                             <h6 class="user-name text-truncate mb-0"><?= $value->full_name;?></h6>
                                                             <small
                                                                 class="text-truncate text-muted"><?= $value->email;?></small>
                                                         </div>
                                                     </div
                                                 </td>
                                                 <!-- <td><?= $value->email;?></td> -->
                                                 <td><?= $value->mobile_number;?></td>
                                                 <td><?= $value->name;?></td>

                                                 <td><?= $value->created_at;?></td>


                                                 <td>
                                                     <?php if(in_array('viewCustomer', $user_permission )) :?>
                                                     <a
                                                         href="<?php echo base_url('customers/view/');?><?= $value->cust_id;?>"><i
                                                             data-toggle="tooltip" data-placement="top" title="Edit"
                                                             data-feather="eye"></i></a>

                                                     <?php endif; ?>
                                                    
                                                 </td>


                                             </tr>
                                             <?php } } ?>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                             <!-- Modal to add new user starts-->

                             <!-- Modal to add new user Ends-->
                         </div>
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