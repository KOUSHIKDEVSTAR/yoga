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
                                 <h4 class="card-title">Product/Subscription

                                 <a href="<?php echo base_url('memberlist/add');?>"><button type="button"
                                                 class="btn btn-primary" data-bs-toggle="" data-bs-target="">Add
                                                 Product/Subscription</button>
                                         </a>
                                 </h4>
                                 </div>
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
                                                 <th>Type</th>
                                                 <th>Product/Subscription</th>
                                                 <!-- <th>Tax Type</th>
                                                 <th>Name</th> -->
                                                 <th>Price</th>
                                                 <th>Branch</th>
                                                 <!-- <th>Modelist</th> -->
                                                 <th>Status</th>
                                                 <th>Actions</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <?php 
                                    if(isset($memberlist_details)){
                                        $i=0;
                                        foreach($memberlist_details as $value){
                                            $i++;
                                            ?>
                                             <tr>
                                                 <td><?= $i;?></td>
                                                 <td><?= $value->membership_product_type;?></td>
                                                 <td>
                                                 <div class="d-flex justify-content-left align-items-center">
                                                         <div class="avatar-wrapper">
                                                             <div class="avatar me-50"><img
                                                                     src="<?php echo  base_url('uploads/membership_product/');?><?=$value->product_image;?>"
                                                                     alt="Avatar" width="32" height="32"></div>
                                                         </div>
                                                         <div class="d-flex flex-column">
                                                             <h6 class="user-name text-truncate mb-0"><?= $value->name;?></h6>
                                                             
                                                         </div>
                                                     </div

                                                   
                                                        </td>
                                                 <!-- <td><?= $value->template_name;?></td> -->
                                                 <!-- <td><?= $value->name;?></td> -->
                                                 <td><?= $value->price;?></td>
                                                 <td><?= $value->br_name;?></td>
                                                 
                                                 <!-- <td><?= $value->mode_name;?></td> -->
                                                 <td><?php if($value->is_show == 1){?>
                                                    <span class="badge bg-light-success">Active</span>
                                                 <?php }else{?>
                                                    <span class="badge bg-light-danger">InActive</span>
                                                 <?php } ?></td>
                                                

                                                 <td>
                                                
                                                     <a href="<?php echo base_url('memberlist/edit/');?><?= $value->memberlist_id;?>"><i
                                                             data-toggle="tooltip" data-placement="top" title="Edit"
                                                             data-feather="edit"></i></a>
                                                             
                                                    
                                                     <a onclick="return confirm('Are you sure you want to delete this?')" href="<?php echo base_url('memberlist/delete/');?><?= $value->memberlist_id;?>"><i
                                                             data-toggle="tooltip" data-placement="top" title="Delete"
                                                             data-feather="delete"></i></a>
                                                            
                                                 </td>


                                             </tr>
                                             <?php } } ?>
                                         </tbody>
                                     </table>
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
    $("#AccountMainMenu").addClass('sidebar-group-active open');
    $("#memberlist").addClass('active');

});
 </script>