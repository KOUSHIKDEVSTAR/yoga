<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-12 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                   <!-- header section -->
                   <?php if($this->session->flashdata('success')): ?>
                            <div class="demo-spacing-0">
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <div class="alert-body d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-info me-50">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="12" y1="16" x2="12" y2="12"></line>
                                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                        </svg>
                                        <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>

                            <?php elseif($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                <div class="alert-body d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-info me-50">
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
            </div>

        </div>
        <?php //echo "<pre>"; print_r($site_data);?>
        <div class="content-body">
            <!-- Basic Horizontal form layout section start -->
            
            <!-- Basic Horizontal form layout section end -->

             <section id="basic-horizontal-layouts">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Vided Details</h4>
                            </div>
                            <div class="container">
                               
                                <a href="<?= base_url('Video/add');?>"><button type="button" class="btn btn-primary">Add</button></a>
                     

                            </div>
                            
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table text-nowrap text-center">
                                        <thead>
                                            <tr>
                                                <th>Sl No.</th>
                                                <th>Title</th>
                                                <th>Type</th>
                                                <th>Plan</th>
                                                <th>Video</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if(isset($video_data[0])){
                                                $i=0;
                                            foreach($video_data as $data){

                                                $this->db->select('*');
                                                $this->db->from('membership_list mls');
                                                $this->db->where('mls.memberlist_id',$data->video_plan);
                                                $memberlist = $this->db->get()->result();
                                                $i++;?>
                                                <tr>
                                                    <td><?= $i;?></td>
                                                <td><?= $data->videos_title ;?></td>
                                                <td><?= $data->videos_type;?></td>
                                                <td><?php if(isset($memberlist[0])){
                                                    echo $memberlist[0]->name;
                                                }?></td>
                                                <td>
                                                    <video width="320" height="240" controls>
                                                      <source src="<?=base_url('uploads/video/');?><?= $data->video_file;?>" type="video/mp4">
                                                    <!--   <source src="movie.ogg" type="video/ogg"> -->
                                                      Your browser does not support the video tag.
                                                    </video>
                                                    </td>
                                                <td><?php if($data->status == 1){
                                                    echo "Active";
                                                    }else{
                                                    echo "InActive";
                                                    }?>
                                                        
                                                </td>
                                                <td>
                                                   
                                                    <a href="<?= base_url('Video/edit/');?><?=$data->videos_id;?>"><i
                                                             data-toggle="tooltip" data-placement="top" title="Edit"
                                                             data-feather="edit"></i></a>
                                                    
                                                </td>
                                            </tr>

                                            <?php } } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                 

                    
                </div>
            </section>
            <!-- Basic Horizontal form layout section start -->
           
            <!-- Basic Horizontal form layout section end -->

            

        </div>
    </div>
</div>
<!-- END: Content-->
<script type="text/javascript">
$(document).ready(function() {
    // $("#RolesExpense").addClass('sidebar-group-active open');
    $("#videoList").addClass('active');

});
</script>