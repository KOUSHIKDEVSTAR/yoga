    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="invoice-list-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="">
                                    <div class="card-body border-bottom">
                                        <h4 class="card-title">Schedule Details

                                            <a href="<?php echo base_url('Schedule_management/add');?>"><button
                                                    type="button" class="btn btn-primary" data-bs-toggle=""
                                                    data-bs-target="">Add
                                                    Schedule</button>
                                            </a>
                                        </h4>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">



                                            <?php if($this->session->flashdata('success')): ?>
                                            <div class="demo-spacing-0">
                                                <div class="alert alert-primary alert-dismissible fade show"
                                                    role="alert">
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
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Class Details</th>
                                                    <!-- <th>Class Name</th>
                                                    <th>Teacher</th> -->
                                                    <th>Medium</th>
                                                    <th>Availability</th>
                                                    <th class="cell-fit">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php foreach($schedule_management_curent_date as $current_date){?>
                                                <tr>
                                                    <td><?php echo $current_date->time_from;?></td>
                                                    <td>
                                                        <div class="d-flex justify-content-center align-items-center">

                                                            <div class="d-flex flex-column">
                                                                <h6 class="user-name text-truncate mb-0">
                                                                    <?php echo $current_date->class_name;?></h6>
                                                                <h6 class="user-name text-truncate mb-0">
                                                                    <?php echo $current_date->firstname ;?>
                                                                    <?php echo $current_date->lastname ;?></h6>
                                                                <small
                                                                    class="text-truncate text-muted"><?php echo $current_date->class_time;?></small>
                                                            </div>
                                                        </div> 
                                                    </td>

                                                        <!-- <td><?php echo $current_date->class_name;?></td>
                                                    <td><?php echo $current_date->firstname ;?>
                                                        <?php echo $current_date->lastname ;?></td> -->

                                                    <td><?php echo $current_date->medium_data ;?></td>
                                                    <?php $this->db->select('*');
                                                      $this->db->from('sch_booking');
                                                      $this->db->where('schedule_id',$current_date->sch_id);
                                                     $allCount =  $this->db->get()->result();
                                                     ?>




                                                    <td><?php echo count($allCount);?>/<?php echo $current_date->capacity;?>
                                                    </td>
                                                    <td><a
                                                            href="<?= base_url('schedule_management/bookingDetails/');?><?=$current_date->sch_id?>">Booking
                                                            Details</a></td>
                                                </tr>

                                                <?php } ?>

                                                <?php foreach($schedule_management as $schedle_mang){?>
                                                <tr>
                                                    <td><?php echo $schedle_mang->created_at;?></td>
                                                    <td>
                                                        <div class="d-flex justify-content-center align-items-center">

                                                            <div class="d-flex flex-column">
                                                                <h6 class="user-name text-truncate mb-0">
                                                                    <?php echo $schedle_mang->class_name;?></h6>
                                                                <h6 class="user-name text-truncate mb-0">
                                                                    <?php echo $schedle_mang->firstname ;?>
                                                                    <?php echo $schedle_mang->lastname ;?></h6>
                                                                <small
                                                                    class="text-truncate text-muted"><?php echo $schedle_mang->class_time;?></small>
                                                            </div>
                                                        </div> 
                                                    </td>
                                                    <!-- <td><?php echo $schedle_mang->class_time;?></td>
                                                    <td><?php echo $schedle_mang->class_name;?></td>
                                                    <td><?php echo $schedle_mang->firstname ;?>
                                                        <?php echo $schedle_mang->lastname ;?></td> -->
                                                    <td><?php echo $schedle_mang->medium_data ;?></td>
                                                    <?php $this->db->select('*');
                                                      $this->db->from('sch_booking');
                                                      $this->db->where('schedule_id',$schedle_mang->sch_id);
                                                     $allCunt =  $this->db->get()->result();
                                                     ?>
                                                    <td><?php echo count($allCunt);?>/<?php echo $schedle_mang->capacity;?>
                                                    </td>
                                                    <td><a
                                                            href="<?= base_url('schedule_management/bookingDetails/');?><?=$schedle_mang->sch_id?>">Booking
                                                            Details</a></td>
                                                </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </section>

            </div>
        </div>
    </div>