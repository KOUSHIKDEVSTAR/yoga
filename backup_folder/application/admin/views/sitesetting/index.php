<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <ul class="nav nav-pills mb-2">
                            <!-- account -->
                            <?php if(in_array('updateProfile', $user_permission )): ?>
                            <li class="nav-item">
                                <a class="nav-link " href="<?php echo base_url('users/setting/') ?>">
                                    <i data-feather="user" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Account</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if(in_array('updateSetting', $user_permission)): ?>
                            <!-- security -->
                            <li class="nav-item">
                                <a class="nav-link active" href="<?php echo base_url('siteSetting') ?>">
                                    <i data-feather="lock" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Site Settings</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if(in_array('createGroup', $user_permission) || in_array('viewGroup', $user_permission)): ?>
                            <!-- billing and plans -->
                            <li class="nav-item">
                                <a class="nav-link " href="<?php echo base_url('groups') ?>">
                                    <i data-feather="bookmark" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Roles</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if(in_array('createUser', $user_permission) || in_array('viewUser', $user_permission)): ?>
                            <!-- billing and plans -->
                            <li class="nav-item ">
                                <a class="nav-link " href="<?php echo base_url('staff') ?>">
                                    <i data-feather="users" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Staff</span>
                                </a>
                            </li>
                            <?php endif; ?>

                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <?php //echo "<pre>"; print_r($site_data);?>
        <div class="content-body">
            <!-- Basic Horizontal form layout section start -->
            <section id="basic-horizontal-layouts">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Logo Set</h4>
                            </div>
                            <div class="card-body">
                                <form class="form form-horizontal" method="POST"
                                    action="<?= base_url('staff/profile_img_update/');?>" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">

                                                    <label class="col-form-label" for="first-name">Site Logo</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <img src="<?php echo base_url('app-assets/images/logo/');?><?=  $site_data[0]->setting_value;?>"
                                                        id="account-upload-img" class="uploadedAvatar rounded me-50"
                                                        alt="profile image" height="100" width="100" />
                                                    <input type="hidden" value="<?=  $site_data[0]->setting_value; ?>"
                                                        name="old_site_logo_value">
                                                    <input type="hidden" value="<?=  $site_data[0]->setting_data; ?>"
                                                        name="site_logo_data">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="file" id="company-column" class="form-control"
                                                        name="site_logo" placeholder="Company" />

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="email-id">Fav Icon(.ICO
                                                        file)</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <img src="<?php echo base_url('app-assets/images/logo/');?><?=  $site_data[1]->setting_value; ;?>"
                                                        id="account-upload-img" class="uploadedAvatar rounded me-50"
                                                        alt="profile image" height="100" width="100" />
                                                    <input type="hidden" value="<?=  $site_data[1]->setting_value; ;?>"
                                                        name="old_site_fav_value">
                                                    <input type="hidden" value="<?=  $site_data[1]->setting_data; ?>"
                                                        name="site_logo_data">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="file" id="company-column" class="form-control"
                                                        name="site_fav" placeholder="Company" />

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-9 offset-sm-6">
                                             <button type="submit" class="btn btn-primary">Save Changes</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Company Information</h4>
                            </div>
                            <div class="card-body">
                            <?php echo validation_errors(); ?>
                                <form class="form form-horizontal" action="<?php echo base_url('company/update'); ?>" method="post">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="first-name">Company Name</label>
                                                </div>
                                                <div class="col-sm-9">
                                                <input type="text" class="form-control" id="company_name"
                                                name="company_name" placeholder="Enter company name"
                                                value="<?php echo $company_data['company_name'] ?>" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="first-name">Site Url</label>
                                                </div>
                                                <div class="col-sm-9">
                                                <input type="text" class="form-control" id="company_name"
                                                name="address" placeholder="Enter Site Url"
                                                value="<?php echo $company_data['address'] ?>" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="email-id">Currency</label>
                                                </div>
                                                <div class="col-sm-9">
                                                <select class="form-control" id="currency" name="currency">
                                                <option value="">~~SELECT~~</option>

                                                <?php foreach ($currency_symbols as $k => $v): ?>
                                                <option value="<?php echo trim($k); ?>" <?php if($company_data['currency'] == $k) {
                                                        echo "selected";
                                                    } ?>><?php echo $k ?></option>
                                                <?php endforeach ?>
                                            </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </section>
            <!-- Basic Horizontal form layout section end -->

            <!-- Basic Horizontal form layout section start -->
            <section id="basic-horizontal-layouts">
                <div class="row">

                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Site SMTP</h4>
                            </div>
                            <div class="card-body">
                                <form class="form form-horizontal">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="first-name">Site Name</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="first-name"
                                                        value="<?=  $site_data[2]->setting_value; ;?>"
                                                        class="form-control" name="fname" placeholder="First Name" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="email-id">Site Url</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="email" id="email-id"
                                                        value="<?=  $site_data[3]->setting_value; ;?>"
                                                        class="form-control" name="email-id" placeholder="Email" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-9 offset-sm-3">
                                            <button type="reset" class="btn btn-primary me-1">Submit</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                   

                </div>
            </section>
            <!-- Basic Horizontal form layout section end -->



        </div>
    </div>
</div>
<!-- END: Content-->
<script type="text/javascript">
$(document).ready(function() {
    $("#AccountMainMenu").addClass('sidebar-group-active open');
    $("#siteSetting").addClass('active');

});
</script>