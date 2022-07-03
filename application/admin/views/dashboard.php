<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Analytics Start -->
            <section id="dashboard-analytics">
                <div class="row match-height">
                    <!-- Greetings Card starts -->
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card card-congratulations">
                            <div class="card-body text-center">
                                <img src="<?php echo base_url(); ?>/app-assets/images/elements/decore-left.png"
                                    class="congratulations-img-left" alt="card-img-left" />
                                <img src="<?php echo base_url(); ?>/app-assets/images/elements/decore-right.png"
                                    class="congratulations-img-right" alt="card-img-right" />
                                <div class="avatar avatar-xl bg-primary shadow">
                                    <div class="avatar-content">
                                        <i data-feather="award" class="font-large-1"></i>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h1 class="mb-1 text-white">Congratulations Owner,</h1>
                                    <p class="card-text m-auto w-75">
                                        You have done <strong>57.6%</strong> more sales today. Check your new badge in
                                        your profile.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Greetings Card ends -->

                    <!-- Subscribers Chart Card starts -->
                    <div class="col-lg-8 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Hi(Admin)</h4>
                                    <div class="d-flex align-items-center">
                                        <p class="card-text me-25 mb-0">Updated One Month Ago</p>
                                    </div>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-primary me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="trending-up" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0"><?= $all_customer_count[0]->all_count;?></h4>
                                                    <p class="card-text font-small-3 mb-0">Customers</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-info me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="user" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0"><?= $total_users;?></h4>
                                                    <p class="card-text font-small-3 mb-0">Users</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-danger me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="box" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">$<?=$finview_expesnse_amount;?></h4>
                                                    <p class="card-text font-small-3 mb-0">Expenses</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-success me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="dollar-sign" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">$<?=$total_sell_cost;?></h4>
                                                    <p class="card-text font-small-3 mb-0">Sales</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                    <div class="col-lg-2 col-6">
                            <div class="card">
                                <div class="card-body pb-50">
                                    <h6>Expenses</h6>
                                    <h4 class="fw-bolder mb-1">$<?=$finview_expesnse_amount;?></h4>
                                    <div class="avatar bg-light-primary p-50 m-0">
                                    <div class="avatar-content">
                                                        <i data-feather="bar-chart" class="avatar-icon"></i>
                                                    </div>
                                                    </div>
                                    <div id="statistics-bar-chart"></div>
                                </div>
                            </div>
                        </div>
                        <!--/ Bar Chart -->

                        <!-- Line Chart - Profit -->
                        <div class="col-lg-2 col-6">
                            <div class="card card-tiny-line-stats">
                                <div class="card-body pb-50">
                                    <h6>Income</h6>
                                    <h2 class="fw-bolder mb-1">$<?= $finview_income_amount;?></h2>
                                    <div class="avatar bg-light-warning p-50 m-0">
                                    <div class="avatar-content">
                                                        <i data-feather="bar-chart-2" class="avatar-icon"></i>
                                                    </div>
                                                    </div>
                                    <div id="statistics-line-chart"></div>
                                </div>
                            </div>
                        </div>
                    <!-- Subscribers Chart Card ends -->

                    <!-- Orders Chart Card starts -->
                    <!-- <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header flex-column align-items-start pb-0">
                                <div class="avatar bg-light-warning p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="package" class="font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="fw-bolder mt-1">38.4K</h2>
                                <p class="card-text">Orders Received</p>
                            </div>
                            <div id="order-chart"></div>
                        </div>
                    </div> -->
                    <!-- Orders Chart Card ends -->
                    <?php /* if($is_admin == true): ?>

                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3><?php echo $total_products ?></h3>

                                    <p>Total Products</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="<?php echo base_url('products/') ?>" class="small-box-footer">More info <i
                                        class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3><?php echo $total_paid_orders ?></h3>

                                    <p>Total Paid Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="<?php echo base_url('orders/') ?>" class="small-box-footer">More info <i
                                        class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3><?php echo $total_users; ?></h3>

                                    <p>Total Users</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-android-people"></i>
                                </div>
                                <a href="<?php echo base_url('users/') ?>" class="small-box-footer">More info <i
                                        class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3><?php echo $total_stores ?></h3>

                                    <p>Total Stores</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-android-home"></i>
                                </div>
                                <a href="<?php echo base_url('stores/') ?>" class="small-box-footer">More info <i
                                        class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <?php endif; */ ?>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <h2 style="text-align: center;">

                            <?php
                                if(isset($schedule_management_curent_date[0]->time_from)){
                                    $date = $dateValue = $schedule_management_curent_date[0]->time_from;



                                    echo $month = date('M', strtotime($date));

                                    echo " ";

                                     echo $date = date('d', strtotime($date));
                                     echo ",";
                                    echo  $year = $schedule_management_curent_date[0]->created_year;
                                }
                                                


                                                ?>



                        </h2>

                        <div class="dataTables_wrapper dt-bootstrap5 no-footer pt-0">
                                        <table class="datatable-project dataTable no-footer dtr-column">
                                            <thead>
                                                <tr>
                                                    <th>Class Name</th>
                                                    <th>Teacher</th>
                                                    <th>Booked</th>
                                                    <th>Branch</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php foreach($schedule_management_curent_date as $current_date){?>
                                                <tr>
                                                   
                                                    <td><?php echo $current_date->class_name;?><br>
                                                        <?php echo $current_date->class_time;?>
                                                    </td>
                                                    <td><?php echo $current_date->firstname ;?>
                                                        <?php echo $current_date->lastname ;?></td>
                                                    <?php $this->db->select('*');
                                                      $this->db->from('sch_booking');
                                                      $this->db->where('schedule_id',$current_date->sch_id);
                                                     $allCount =  $this->db->get()->result();
                                                     ?>




                                                    <td><?php echo count($allCount);?>/<?php echo $current_date->capacity;?>
                                                    </td>

                                                    <td><?= $current_date->name;?></td>
                                                    
                                                </tr>

                                                <?php } ?>


                                            </tbody>
                                        </table>
                                    </div>
                    </div>
                </div>


            </section>
            <!-- Dashboard Analytics end -->

        </div>
    </div>
</div>
<!-- END: Content-->

<script type="text/javascript">
// $(document).ready(function() {
//     $("#dashboardMainMenu").addClass('active');
    
// });
//   // On load Toast
//   setTimeout(function () {
//     toastr['success'](
//       'You have successfully logged in to FitPlus . Now you can start to explore!',
//       '👋 Welcome John Doe!',
//       {
//         closeButton: true,
//         tapToDismiss: false,
        
//       }
//     );
//   }, 2000);
</script>