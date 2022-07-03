 <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="invoice-list-wrapper">
                     <div class="row">
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    
                                    <h2 class="fw-bolder">
                                        <?php 
                                        echo $finview_salary_amount;
                                    ?></h2>
                                    <p class="card-text" style="font-size: 13px;"><span class="badge rounded-pill badge-light-primary">Salary</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    
                                    <h2 class="fw-bolder"><?php 
                                        echo $finview_other_expnse;
                                    ?></h2>
                                    <p class="card-text" style="font-size: 13px;"><span class="badge rounded-pill badge-light-warning">Other Expenses</span></p>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="">
                                    <div class="card-body border-bottom">
                                        <h4 class="card-title">All Expenses

                                        <a href="<?php echo base_url('Schedule_management/finview_add');?>"><button
                                                type="button" class="btn btn-primary" data-bs-toggle=""
                                                data-bs-target="">Add Expense
                                                </button>
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
                                                    <th>Type</th>
                                                    <th>Towards</th>
                                                    <th>Mode</th>
                                                    <th>Tagged To</th>
                                                    <th>Amount</th>
                                                   <!--  <th class="cell-fit">Actions</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(isset($finview_info[0])){
                                                    foreach($finview_info as $fine){?>
                                                        <tr>
                                                            <td><?php
                                                            $date = $dateValue = $fine->fin_date;
                                                             echo $day = date('d', strtotime($date));
                                                             echo ",";

                                                            echo $month = date('M', strtotime($date));

                                                            echo "-";
                                                            echo  $year = date('y', strtotime($date));


                                                            ?></td>
                                                            <td><?= $fine->type;?></td>
                                                            <td><?= $fine->name;?></td>
                                                            <td><?= $fine->mode;?></td>
                                                            <td>
                                                                <?php $this->db->select('firstname,lastname');
                                                                      $this->db->from('users');
                                                                      $this->db->where('id',$fine->tagged_to);
                                                                      $user_res = $this->db->get()->result()?>
                                                                      <?php if(isset($user_res[0])){
                                                                        echo $user_res[0]->firstname; echo $user_res[0]->lastname ;
                                                                    } ?>

                                                                
                                                                


                                                            </td>
                                                            <td><?= $fine->fin_amount;?></td>
                                                        </tr>

                                                   <?php  }
                                                }?>

                                               
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