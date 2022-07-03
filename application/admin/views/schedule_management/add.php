 <div class="app-content content ">

     <div class="content-wrapper container-xxl p-0">
         <div class="content-header row">


         </div>
         <div class="content-body">
             <!-- users list start -->
             <section class="app-user-list">

                 <!-- list and filter start -->
                 <div class="card">
                     <div class="card-body border-bottom">
                         <h4 class="card-title">Add Schedule Details

                         <a href="<?php echo base_url('schedule_management');?>"><button type="button"
                                         class="btn btn-primary" data-bs-toggle="" data-bs-target="">View All
                                     </button>
                                 </a>
                         </h4>

                         <div class="row">
                             
                         </div>
                         <section id="multiple-column-form">
                             <div class="row">
                                 <div class="col-12">
                                     <div class="card">
                                         
                                         <div class="card-body">
                                             <form class="form" method="POST" action="<?= base_url('schedule_management/store');?>"
                                                 enctype="multipart/form-data">
                                                 <div class="row">
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Class Name</label>
                                                                 <input type="text" name="class_name" placeholder="Class Name" class="form-control" id="class_name;" required="">

                                            
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Description
                                                             </label>
                                                             <input type="text" id="" class="form-control"
                                                                 placeholder="Description" name="desc" required="" />
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Image</label>
                                                             <input type="file" id="" class="form-control"
                                                                 placeholder="Price" name="sc_image" />

                                                         </div>
                                                     </div>
                                                    
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="first-name-column">Branch
                                                                 </label>
                                                             <select class="form-select form-select-lg"
                                                                 name="branch_id" id="selectLarge" required="">
                                                                 <option  value="">Choose One</option>
                                                                 <?php foreach($branch_type as $branch){?>
                                                                 <option value="<?=$branch->id;?>"><?= $branch->name;?>
                                                                 </option>

                                                                 <?php } ?>

                                                             </select>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="first-name-column">Teacher
                                                                 </label>
                                                             <select class="form-select form-select-lg"
                                                                 name="staff_id" id="selectLarge" required>
                                                                 <option  value="">Choose One</option>
                                                                 <?php foreach($staff_data as $staff){?>
                                                                 <option value="<?=$staff->id;?>"><?= $staff->firstname;?> <?= $staff->lastname;?>
                                                                 </option>

                                                                 <?php } ?>

                                                             </select>
                                                         </div>
                                                     </div>


                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Capacity
                                                             </label>
                                                             <input type="number" id="" class="form-control"
                                                                 placeholder="Capacity" name="capacity"required />
                                                         </div>
                                                     </div>

                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Duration (Minute )
                                                             </label>
                                                             <input type="number" id="" class="form-control"
                                                                 placeholder="Duration (Minute )" name="duration" required/>
                                                         </div>
                                                     </div>


                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Medium
                                                             </label>
                                                              <select class="form-select form-select-lg"
                                                                 name="medium_data" id="medium_data" required>
                                                                 <option value="">Choose One</option>
                                                                 <option value="Offline">Offline</option>
                                                                 <option value="Online">Online</option>
                                                             </select>
                                                         </div>
                                                     </div>

                                                     <div class="row mb-1" style="display:none;" id="online_div">
                                                         <div class="col-md-6 mb-1 col-12">
                                                             <label class="form-label">ZOOM Id</label>
                                                             <input type="text" name="zoom_id" placeholder="ZOOM Id" class="form-control">
                                                         </div>
                                                         <div class="col-md-6 mb-1 col-12">
                                                             <label class="form-label">ZOOM Password</label>
                                                             <input type="text" name="zoom_password" placeholder="ZOOM Password" class="form-control">
                                                         </div>
                                                         <div class="col-md-12 mb-1 col-12">
                                                             <label class="form-label">Google Meet Link</label>
                                                              <input type="text" name="google_meet_link" placeholder="Google Meet Link" class="form-control">
                                                         </div>
                                                     </div>


                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Time From
                                                             </label>
                                                             <input type="date" id="" class="form-control"
                                                                 placeholder="Time From" name="time_from" required />
                                                         </div>
                                                     </div>
                                                       <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Time To
                                                             </label>
                                                             <input type="date" id="" class="form-control"
                                                                 placeholder="Time To" name="time_to" required />
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Class Time
                                                             </label>
                                                             <input type="time" id="" class="form-control"
                                                                 placeholder="Time To" name="class_time" required />
                                                         </div>
                                                     </div>
                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label class="form-label" for="city-column">Exclude Days
                                                        </label><br>
                                                        <input class="form-check-input" type="checkbox" name="excluded_days[]" id="inlineCheckbox1" value="Monday"/>Monday &nbsp;&nbsp;

                                                        <input class="form-check-input" type="checkbox" name="excluded_days[]" id="inlineCheckbox1" value="Tuesday"/>Tuesday &nbsp;&nbsp;

                                                        <input class="form-check-input" type="checkbox" name="excluded_days[]" id="inlineCheckbox1" value="Wednesday"/>Wednessday &nbsp;&nbsp;

                                                        <input class="form-check-input" type="checkbox" name="excluded_days[]" id="inlineCheckbox1" value="Thursday"/>Thursday &nbsp;&nbsp;<br>

                                                        <input class="form-check-input" type="checkbox" name="excluded_days[]" id="inlineCheckbox1" value="Friday"/>Friday &nbsp;&nbsp;

                                                        <input class="form-check-input" type="checkbox" name="excluded_days[]" id="inlineCheckbox1" value="Saturday"/>Saturday &nbsp;&nbsp;

                                                        <input class="form-check-input" type="checkbox" name="excluded_days[]" id="inlineCheckbox1" value="Sunday"/>Sunday &nbsp;&nbsp;
                                                        
                                                    </div>
                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label class="form-label" for="city-column">Booking Allowed Before Days
                                                            </label>
                                                        <input type="number" id="" class="form-control"
                                                                 placeholder="Booking Allowed Before Days" required name="booking_allowed_time" />
                                                    </div>
                                                     </div>
                                                     <div class="mb-1">
                                                             <label class="form-label" for="city-column">Customer Group
                                                             </label>
                                                             <select class="form-select form-select-lg select2"
                                                                 name="customer_group[]" id="selectLarge" required multiple="">
                                                                 <option>Choose One</option>
                                                                 <?php foreach($memberlist_details as $member){?>
                                                                 <option value="<?=$member->memberlist_id;?>"><?= $member->name;?>
                                                                 </option>

                                                                 <?php } ?>

                                                             </select>
                                                         </div>
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Cancelation Policy
                                                             </label>
                                                             <textarea class="form-control" name="cancelation_policy"></textarea>
                                                             
                                                         </div>
                                                     </div>
                                                     <div class="col-12">
                                                         <button type="submit"
                                                             class="btn btn-primary me-1">Submit</button>
                                                         <a href="<?=base_url('');?>"><button type="button"
                                                                 class="btn btn-outline-secondary">Reset</button></a>
                                                     </div>
                                                 </div>
                                             </form>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </section>
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
    $("#mainProductNav").addClass('active');

});
 </script>
 <script type="text/javascript">
$(document).ready(function() {
    $('#medium_data').on('change',function(e){
        var medium_data = $('#medium_data').val();
        if(medium_data == "Online"){
            $('#online_div').show();
        }else{
            $('#online_div').hide();
        }

    });
});
 </script>
