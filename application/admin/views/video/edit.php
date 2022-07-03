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
                         <h4 class="card-title">Edit Video Data</h4>

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
                                             <form class="form" method="POST" action="<?= base_url('Video/update');?>"
                                                 enctype="multipart/form-data">
                                                 <div class="row">
                                                     <input type="hidden" name="id" value="<?= $edit_data[0]->videos_id;?>" required=""/>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label" for="city-column">Title
                                                                 </label>
                                                             <input type="text" id="" class="form-control"
                                                                 placeholder="Title" name="title" value="<?= $edit_data[0]->videos_title;?>" required="" />
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12" >
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Video Type</label>
                                                             <select class="form-select form-select-lg" name="video_type"
                                                                 id="video_type" required="">
                                                                 <option>Choose One</option>
                                                                 <option value="Paid" <?php if($edit_data[0]->videos_type=="Paid"){echo "selected";};?>>Paid</option>
                                                                 <option value="UnPaid" <?php if($edit_data[0]->videos_type=="UnPaid"){echo "selected";};?>>UnPaid</option>
                                                             </select>
                                                         </div>
                                                     </div>
                                                    
                                                     <div class="col-md-6 col-12" id="video_pla_div">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Video Plan</label>
                                                             <select class="form-select form-select-lg" name="video_plan"
                                                                 id="video_plan" required="">
                                                                 <option>Choose One</option>
                                                                 <?php foreach($membership_data as $membership){?>
                                                                    <option value="<?= $membership->memberlist_id;?>" <?php if($edit_data[0]->video_plan== $membership->memberlist_id){echo "selected";};?>><?= $membership->name;?></option>

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
                                                                 <option value="1"<?php if($edit_data[0]->status=="1"){echo "selected";};?>>Active</option>
                                                                 <option value="0" <?php if($edit_data[0]->status=="0"){echo "selected";};?>>Inactive</option>
                                                             </select>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-1">
                                                             <label class="form-label"
                                                                 for="first-name-column">Upload Video</label>
                                                                 <input type="file" class="form-control" name="video_uplod" id="vo_upload">
                                                                 <input type="hidden" class="form-control" name="old_video_uplod" id="vo_upload" value="<?= $edit_data[0]->video_file;?>" required="">
                                                                  
                                                            
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
$(document).ready(function() {
     var video_type = $('#video_type').val();
         if(video_type == "Paid"){
            $('#video_pla_div').show();

        }else{
             $('#video_pla_div').hide();

        }
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