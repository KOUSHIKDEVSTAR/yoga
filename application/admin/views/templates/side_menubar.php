       <!-- BEGIN: Main Menu-->
       
       <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
           <div class="navbar-header">
               <ul class="nav navbar-nav flex-row">
                   <li class="nav-item me-auto"><a class="navbar-brand"
                           href="<?php echo base_url(); ?>/html/ltr/vertical-menu-template/index.html"><span
                               class="brand-logo">
                               <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                   xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                   <defs>
                                       <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%"
                                           y2="89.4879456%">
                                           <stop stop-color="#000000" offset="0%"></stop>
                                           <stop stop-color="#FFFFFF" offset="100%"></stop>
                                       </lineargradient>
                                       <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%"
                                           x2="37.373316%" y2="100%">
                                           <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                           <stop stop-color="#FFFFFF" offset="100%"></stop>
                                       </lineargradient>
                                   </defs>
                                   <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                       <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                           <g id="Group" transform="translate(400.000000, 178.000000)">
                                               <path class="text-primary" id="Path"
                                                   d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                                   style="fill:currentColor"></path>
                                               <path id="Path1"
                                                   d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                                   fill="url(#linearGradient-1)" opacity="0.2"></path>
                                               <polygon id="Path-2" fill="#000000" opacity="0.049999997"
                                                   points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325">
                                               </polygon>
                                               <polygon id="Path-21" fill="#000000" opacity="0.099999994"
                                                   points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338">
                                               </polygon>
                                               <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994"
                                                   points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288">
                                               </polygon>
                                           </g>
                                       </g>
                                   </g>
                               </svg></span>
                           <h2 class="brand-text">Vuexy</h2>
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

                   <li class="nav-item has-sub" id="AccountMainMenu"><a class="d-flex align-items-center" href="#"><i
                               data-feather="settings"></i><span class="menu-item text-truncate"
                               data-i18n="Account Settings">Account Settings</span></a>
                       <ul class="menu-content">
                           <?php if(in_array('updateProfile', $user_permission )) :?>
                           <li id="AccountMenu"><a class="d-flex align-items-center"
                                   href="<?php echo base_url('users/setting/') ?>"><i data-feather="trello"></i><span
                                       class="menu-item text-truncate" data-i18n="Account">Account</span></a>
                           </li>
                           <?php endif; ?>
                           <?php if(in_array('updateSetting', $user_permission )) :?>
                           <li id="siteSetting"><a class="d-flex align-items-center"
                                   href="<?php echo base_url('siteSetting') ?>"> <i data-feather="settings"></i> <span
                                       class="menu-item text-truncate" data-i18n="Security">Site Settings</span></a>
                           </li>
                           <?php endif; ?>
                           <?php if(in_array('createGroup', $user_permission )) :?>
                           <li id="RolesMenu"><a class="d-flex align-items-center"
                                   href="<?php echo base_url('groups') ?>"><i data-feather="cpu"></i><span
                                       class="menu-item text-truncate" data-i18n="Billings &amp; Plans">Roles</span></a>
                           </li>
                           <?php endif; ?>

                           <?php if(in_array('createUser', $user_permission ) || in_array('updateUser', $user_permission ) || in_array('deleteUser', $user_permission ) || in_array('viewUser')) :?>
                           <li class=" nav-item" id="RolesStaff">
                               <a href="<?php echo base_url('staff') ?>">
                                   <i data-feather="users"></i><span class="menu-item text-truncate"
                                       data-i18n="Billings &amp; Plans">Staff</span>
                               </a>
                           </li>
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
                           <li class=" nav-item" id="modeList">
                               <a href="<?php echo base_url('products/modelist') ?>">
                                   <i data-feather="git-branch"></i><span class="menu-item text-truncate"
                                       data-i18n="Billings &amp; Plans">Mode List</span>
                               </a>
                           </li>
                           <?php endif; ?>

                           <li class=" nav-item" id="memberlist">
                               <a href="<?php echo base_url('memberlist') ?>">
                                   <i data-feather="git-branch"></i><span class="menu-item text-truncate"
                                       data-i18n="Billings &amp; Plans">MemberShip List</span>
                               </a>
                           </li>

                           




                       </ul>
                   </li>

                   <?php if(in_array('createProduct', $user_permission) || in_array('updateProduct', $user_permission) || in_array('viewProduct', $user_permission) || in_array('deleteProduct', $user_permission)): ?>
                   <li class="nav-item"  id="mainProductNav">
                       <a href="<?php echo base_url('products') ?>">
                           <i data-feather="git-branch"></i>
                           <span>Products</span>
                           
                       </a>
                       
                   </li>
                   <?php endif; ?>

                   <?php if(in_array('createCustomer', $user_permission ) || in_array('viewCustomer', $user_permission ) || in_array('updateCustomer', $user_permission )) :?>
                           <li class=" nav-item" id="customersList">
                               <a href="<?php echo base_url('customers') ?>">
                                   <i data-feather="users"></i><span class="menu-item text-truncate"
                                       data-i18n="Users &amp; Plans">Customer Management</span>
                               </a>
                           </li>
                           <?php endif; ?>


                           <li class=" nav-item" id="saleslist">
                               <a href="<?php echo base_url('sales') ?>">
                                   <i data-feather="users"></i><span class="menu-item text-truncate"
                                       data-i18n="Sales &amp; Plans">Sales Management</span>
                               </a>
                           </li>

               </ul>
               <?php endif; ?>
           </div>
       </div>
       <!-- END: Main Menu-->