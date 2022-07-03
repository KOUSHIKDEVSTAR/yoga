       <!-- BEGIN: Main Menu-->
       
       <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
           <div class="navbar-header">
               <ul class="nav navbar-nav flex-row">
                   <li class="nav-item me-auto"><a class="navbar-brand"
                           href="<?php echo base_url(); ?>"><span
                               class="brand-logo">
                               <img src="<?php echo base_url();?>/app-assets/images/logo/logo.png" style="height: 40px; max-width: 100%;"> 
                               
                            </span>
                           <!-- <h2 class="brand-text">FitPlus </h2> -->
                       </a></li>
                   <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0"
                           data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4"
                               data-feather="x"></i><i
                               class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary"
                               data-feather="disc" data-ticon="disc"></i></a></li>
               </ul>
           </div>
           <div class="shadow-bottom"></div>
           <div class="main-menu-content">
               <?php if(in_array('updateProfile', $user_permission ) || in_array('updateSetting', $user_permission) || in_array('createGroup', $user_permission)) : ?>
               <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                   <li class=" nav-item" id="dashboardMainMenu">
                       <a href="<?php echo base_url('dashboard') ?>">
                           <i data-feather="home"></i> <span>Dashboard</span>
                       </a>
                   </li>

                  

                   <?php if(in_array('createVideo', $user_permission) || in_array('updateVideo', $user_permission) || in_array('viewVideo', $user_permission) || in_array('deleteVideo', $user_permission)): ?>
                   <li class="nav-item"  id="videoList">
                       <a href="<?php echo base_url('video') ?>">
                           <i data-feather="git-branch"></i>
                           <span>Video</span>
                           
                       </a>
                       
                   </li>
                   <?php endif; ?>

                   <?php if(in_array('createCustomer', $user_permission ) || in_array('viewCustomer', $user_permission ) || in_array('updateCustomer', $user_permission )) :?>
                           <li class=" nav-item" id="customersList">
                               <a href="<?php echo base_url('customers') ?>">
                                   <i data-feather="users"></i><span class="menu-item text-truncate"
                                       data-i18n="Users &amp; Plans">Customers</span>
                               </a>
                           </li>
                           <?php endif; ?>
                           <li class=" nav-item" id="saleslist">
                               <a href="<?php echo base_url('schedule_management') ?>">
                                   <i data-feather="calendar"></i><span class="menu-item text-truncate"
                                       data-i18n="Sales &amp; Plans">Schedule</span>
                               </a>
                           </li>
                           <?php if(in_array('createSales', $user_permission ) || in_array('viewSales', $user_permission ) || in_array('updateSales', $user_permission )) :?>
                           <li class=" nav-item" id="saleslist">
                               <a href="<?php echo base_url('sales') ?>">
                                   <i data-feather="shopping-cart"></i><span class="menu-item text-truncate"
                                       data-i18n="Sales &amp; Plans">Sales</span>
                               </a>
                           </li>
                           <?php endif; ?>

                           


                           <li class=" nav-item" id="saleslist">
                               <a href="<?php echo base_url('schedule_management/finview') ?>">
                                   <i data-feather="clipboard"></i><span class="menu-item text-truncate"
                                       data-i18n="Sales &amp; Plans">Expense</span>
                               </a>
                           </li>

                           <li class="nav-item has-sub" id="AccountMainMenu"><a class="d-flex align-items-center" href="#"><i
                               data-feather="settings"></i><span class="menu-item text-truncate"
                               data-i18n="Account Settings">Business Settings</span></a>
                       <ul class="menu-content">
                           <?php if(in_array('updateProfile', $user_permission )) :?>
                           <li id="AccountMenu"><a class="d-flex align-items-center"
                                   href="<?php echo base_url('users/setting/') ?>"><i data-feather="trello"></i><span
                                       class="menu-item text-truncate" data-i18n="Account">Settings</span></a>
                           </li>
                           <?php endif; ?>
                           <?php if(in_array('updateSetting', $user_permission )) :?>
                           <!-- <li id="siteSetting"><a class="d-flex align-items-center"
                                   href="<?php echo base_url('siteSetting') ?>"> <i data-feather="settings"></i> <span
                                       class="menu-item text-truncate" data-i18n="Security">Site Settings</span></a>
                           </li> -->
                           <?php endif; ?>
                           <?php if(in_array('createGroup', $user_permission )) :?>
                           <!-- <li id="RolesMenu"><a class="d-flex align-items-center"
                                   href="<?php echo base_url('groups') ?>"><i data-feather="cpu"></i><span
                                       class="menu-item text-truncate" data-i18n="Billings &amp; Plans">Roles</span></a>
                           </li> -->
                           <?php endif; ?>

                           <?php if(in_array('createUser', $user_permission ) || in_array('updateUser', $user_permission ) || in_array('deleteUser', $user_permission ) || in_array('viewUser')) :?>
                           <!-- <li class=" nav-item" id="RolesStaff">
                               <a href="<?php echo base_url('staff') ?>">
                                   <i data-feather="users"></i><span class="menu-item text-truncate"
                                       data-i18n="Billings &amp; Plans">Staff</span>
                               </a>
                           </li> -->
                           <?php endif; ?>
                           <?php if(in_array('createBranch', $user_permission ) || in_array('updateBranch', $user_permission ) || in_array('deleteBranch', $user_permission )) :?>
                           <li class=" nav-item" id="RolesBranch">
                               <a href="<?php echo base_url('branch') ?>">
                                   <i data-feather="git-branch"></i><span class="menu-item text-truncate"
                                       data-i18n="Billings &amp; Plans">Branch</span>
                               </a>
                           </li>
                           <?php endif; ?>
                           <?php if(in_array('createFinancial', $user_permission ) || in_array('updateFinancial', $user_permission ) || in_array('viewFinancial', $user_permission )) :?>
                           <li class=" nav-item" id="RolesExpense">
                               <a href="<?php echo base_url('siteSetting/financial_expense') ?>">
                                   <i data-feather="git-branch"></i><span class="menu-item text-truncate"
                                       data-i18n="Billings &amp; Plans">Financial Setting</span>
                               </a>
                           </li>
                           <?php endif; ?>
                        <?php if(in_array('createProduct', $user_permission ) || in_array('updateProduct', $user_permission ) || in_array('viewProduct', $user_permission )) :?>
                           <!-- <li class=" nav-item" id="modeList">
                               <a href="<?php echo base_url('products/modelist') ?>">
                                   <i data-feather="git-branch"></i><span class="menu-item text-truncate"
                                       data-i18n="Billings &amp; Plans">Mode List</span>
                               </a>
                           </li> -->
                           <?php endif; ?>

                           <li class=" nav-item" id="memberlist">
                               <a href="<?php echo base_url('memberlist') ?>">
                                   <i data-feather="git-branch"></i><span class="menu-item text-truncate"
                                       data-i18n="Billings &amp; Plans">Product/Subscription</span>
                               </a>
                           </li>
                            <li class=" nav-item" id="couponlist">
                               <a href="<?php echo base_url('siteSetting/coupon_list') ?>">
                                   <i data-feather="git-branch"></i><span class="menu-item text-truncate"
                                       data-i18n="Billings &amp; Plans">Coupon List</span>
                               </a>
                           </li>

                           




                       </ul>
                   </li>


               </ul>
               <?php endif; ?>
           </div>
       </div>
       <!-- END: Main Menu-->