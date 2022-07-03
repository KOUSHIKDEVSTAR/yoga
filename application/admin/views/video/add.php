 <div class="app-content content ">

     <div class="content-wrapper container-xxl p-0">
         <div class="content-header row">
             <div class="content-header-left col-md-9 col-12 mb-2">
                 <div class="row breadcrumbs-top">
                     <div class="col-12">
                         <ul class="nav nav-pills mb-2">
                        <!-- account -->
                        

                    </ul>
                     </div>
                 </div>
             </div>

         </div>
         <div class="content-body">
             <!-- users list start -->
             <section class="app-user-list">

                 <!-- list and filter start -->
                 <div class="card">
                     <div class="card-body border-bottom">
                         <h4 class="card-title">Add Video Data</h4>

                         <div class="row">
                             <div class="col-md-12">

                                 <a href="<?php echo base_url('Video/index');?>"><button type="button" class="btn btn-primary"
                                         data-bs-toggle="" data-bs-target="">View
                                         </button>
                                 </a>

                             </div>
                         </div>
                         <section id="multiple-column-form">
                             <div class="row">
                                 <div class="col-12">
                                     <div class="card">
                                         <div class="card-header">
                                             <h4 class="card-title"></h4>
                                         </div>
                                         <div class="card-body">
                                             <form class="form" method="POST" action="<?= base_url('Video/store');?>"
                                                 enctype="multipart/form-data">
                                                 <div class="row">
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Title
                                                                 </label>
                                                             <input type="text" id="" class="form-control"
                                                                 placeholder="Title" name="title" required="" />
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Video Type</label>
                                                             <select class="form-select form-select-lg" name="video_type"
                                                                 id="video_type" required="">
                                                                 <option>Choose One</option>
                                                                 <option value="Paid">Paid</option>
                                                                 <option value="UnPaid">UnPaid</option>
                                                             </select>
                                                         </div>
                                                     </div>
                                                    
                                                     <div class="col-md-6 col-12" style="display: none;" id="video_pla_div">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Video Plan</label>
                                                             <select class="form-select form-select-lg" name="video_plan"
                                                                 id="video_plan" required="">
                                                                 <option>Choose One</option>
                                                                 <?php foreach($membership_data as $membership){?>
                                                                    <option value="<?= $membership->memberlist_id;?>"><?= $membership->name;?></option>

                                                                 <?php } ?>
                                                                 
                                                                 
                                                             </select>
                                                         </div>
                                                     </div>
                                                      <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Video Status</label>
                                                             <select class="form-select form-select-lg" name="status"
                                                                 id="selectLarge" required="">
                                                                 <option>Choose One</option>
                                                                 <option value="1">Active</option>
                                                                 <option value="0">Inactive</option>
                                                             </select>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Upload Video</label>
                                                                 <input type="file" class="form-control" name="video_uplod" id="vo_upload" required="">
                                                            
                                                         </div>
                                                     </div>
                                                     
                                                     
                                                     
                                                     <div class="col-12">
                                                         <button type="submit"
                                                             class="btn btn-primary me-1">Submit</button>
                                                         <a href="<?=base_url('Video/index');?>"><button type="button" class="btn btn-outline-secondary">Reset</button></a>
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
    // $("#RolesExpense").addClass('sidebar-group-active open');
    $("#videoList").addClass('active');

});
// $(document).ready(function(e){

//     $('#video_type').on('change',function(){
//         var video = ('#video_type').val();
//         console.log("video",video);

//         if(video == "Paid"){
//             $('#video_pla_div').show();

//         }else{
//              $('#video_pla_div').hide();

//         }


//     });


// });


$(document).ready(function() {
    $('#video_type').on('change',function(e){
        var video_type = $('#video_type').val();
         if(video_type == "Paid"){
            $('#video_pla_div').show();

        }else{
             $('#video_pla_div').hide();

        }

    });
});
</script>