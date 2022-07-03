   <div class="app-content content profile-content">
        <div class="content-wrapper p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="app-user-view-account">
                    <div class="container-xxl">
                        <div class="row">
                            <!-- User Sidebar -->
                            <div class="col-xxl-6 col-xxl-6 col-xxl-6 order-1 order-md-0 offset-xxl-1">
                                 <div class="card container-xxl">
                                    <h4 class="card-header">User's Booking List</h4>
                                    <table class="invoice-table table text-nowrap">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Class Name</th>
                                                <th>Time</th>
                                                <th>Teacher Name</th>
                                                <th>Created On</th>
                                                <th>Status</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                        $this->db->select('sch_booking.*,tbl_schedule_mang.sch_id,tbl_schedule_mang.class_name,tbl_schedule_mang.sc_staff_id,tbl_schedule_mang.class_time,users.firstname,users.lastname,tbl_schedule_mang.created_da,tbl_schedule_mang.created_month');
                                        $this->db->from('sch_booking');
                                        $this->db->join('tbl_schedule_mang','tbl_schedule_mang.sch_id=sch_booking.schedule_id');
                                        $this->db->join('users','users.id=tbl_schedule_mang.sc_staff_id');
                                        $this->db->where('sch_booking.user_bas_id',$this->session->userdata('cust_id'));
                                        $this->db->order_by('sch_booking_id','desc');
                                        $booking_data = $this->db->get()->result();
                                        foreach($booking_data as $booking){?>
                                            <tr>
                                                <td></td>
                                                <td><?= $booking->class_name;?></td>
                                                <td><?= $booking->class_time;?></td>
                                                <td><?= $booking->firstname;?> <?= $booking->lastname;?></td>
                                                <td><?= $booking->added_on;?></td>
                                                <td><?php 
                                                if($booking->created_month == date('m')){

                                                
                                                if($booking->created_da < date('d')){?>
                                                    <span class="badge bg-light-danger">Attended</span>
                                                    <?php }else{?>
                                                        <span class="badge bg-light-success">Yet to Start</span>

                                                    <?php } ?>
                                                <?php }elseif($booking->created_month < date('m')){?>
                                                    <span class="badge bg-light-danger">Attended</span>
                                                <?php }else{ ?>
                                                    <span class="badge bg-light-success">Yet to Start</span>

                                                <?php } ?>
                                                    </td>


                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>











