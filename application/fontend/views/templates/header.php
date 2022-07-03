<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">

<!-- BEGIN: Head-->



<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">

    <meta name="description"
        content="FitPlus  admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">

    <meta name="keywords"
        content="admin template, FitPlus  admin template, dashboard template, flat admin template, responsive admin template, web app">

    <meta name="author" content="PIXINVENT">

    <title>FitPlus - Simplest Scheduler, Studio Manager for Gym, Yoga, Pilates, Barre </title>

    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>admin/app-assets/images/ico/apple-icon-120.png">

    <link rel="shortcut icon" type="image/x-icon"
        href="<?php echo base_url(); ?>admin/app-assets/images/ico/favicon.ico">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/app-assets/css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/app-assets/css/bootstrap-extended.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/app-assets/css/colors.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/app-assets/css/components.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/app-assets/css/themes/dark-layout.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/app-assets/vendors/css/charts/apexcharts.css>
    <link rel=" stylesheet" type="text/css"
        href="<?php echo base_url(); ?>admin/app-assets//css/plugins/charts/chart-apex.css">

    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url(); ?>admin/app-assets/css/themes/bordered-layout.css">

    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url(); ?>admin/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->

    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url(); ?>admin/app-assets/css/core/menu/menu-types/vertical-menu.css">

    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url(); ?>admin/app-assets/css/plugins/forms/form-validation.css">

    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url(); ?>admin/app-assets/css/pages/authentication.css">
    <link rel="stylesheet" type="text/css"
        href=".<?php echo base_url(); ?>admin/app-assets/css/pages/app-ecommerce.css">

    
   
    <!-- END: Page CSS-->
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/app-assets/css/pages/app-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/app-assets/css/plugins/forms/pickers/form-pickadate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/app-assets/css/plugins/forms/form-wizard.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/app-assets/css/plugins/extensions/ext-component-toastr.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/app-assets/css/plugins/forms/form-number-input.css">
    <!-- END: Page CSS-->
    <!-- BEGIN: Custom CSS-->
 <!-- BEGIN: Vendor CSS-->
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/app-assets/vendors/css/forms/wizard/bs-stepper.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/app-assets/vendors/css/extensions/toastr.min.css">
    <!-- END: Vendor CSS-->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/assets-admin/css/style.css"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/assets/css/style.css">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- END: Custom CSS-->
    
<!-- <script src="<?php echo base_url(); ?>admin/assets/pwabuilder-sw.js"></script> -->
<link rel="manifest" href="<?php echo base_url(); ?>/manifest.json" />

<script type="module">
import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';
const el = document.createElement('pwa-update');
document.body.appendChild(el);
</script>
</head>

<header class="custome-header">

    <div class="container-fluid">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <div class="header-logo">

                    <div class="header-logo-wraper">

                        <a class="brand-logo" href="<?php echo base_url();?>">
                            <img src="<?php echo base_url();?>admin/app-assets/images/logo/logo.png"
                                style="height: 30px;">


                            <h2 class="brand-text text-primary ms-1">MyStudio</h2>

                        </a>

                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="header-btms">

                    <ul>



                        <?php if($this->session->userdata('cust_email')){?>




                        <li><a href="<?php echo base_url('profile/booking');?>"><span class="text">Schedule</span><span
                                    class="icon"><i data-feather="calendar"></i></span></a></li>
                        <li><a href="<?php echo base_url('memberlist');?>"><span class="text">Subscription </span><span
                                    class="icon"><i data-feather="command"></i></span></a></li>

                        <li><a href="<?php echo base_url('Productlist');?>"><span class="text">My Store</span><span
                                    class="icon"> <i data-feather="columns"></i></span></a></li>

                        <li><a href="<?php echo base_url('profile');?>"><span class="text">Profile </span><span
                                    class="icon"><i data-feather="user"></i></span></a></li>
                        <?php }else{?>


                        <li><a href="<?php echo base_url();?>"><span class="text">Schedule</span><span class="icon"><i
                                        data-feather="calendar"></i></span></a></li>
                        <li><a href="<?php echo base_url('memberlist');?>"><span class="text">Subscription </span><span
                                    class="icon"><i data-feather="command"></i></span></a></li>
                        <li><a href="<?php echo base_url('Productlist');?>"><span class="text">My Store</span><span
                                    class="icon"> <i data-feather="columns"></i></span></a></li>

                        <li><a href="<?php echo base_url('login');?>"><span class="text">Login</span><span class="icon">
                                    <i data-feather="user"></i></span></a></li>



                        <?php } ?>



                    </ul>

                </div>

            </div>

        </div>

    </div>

</header>

<!-- END: Head -->