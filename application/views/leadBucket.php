<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('inc/header'); 
    if(!$this->session->userdata('permissions') && $this->session->userdata('permissions')=='' ) {
    ?>

    <style type="text/css">
    .alrtMsg{padding-top: 50px;}
    .alrtMsg i {
        font-size: 60px;
        color: #f1c836;
    }

    </style>
    <div class="container"> 
        <div class="row"> 
            <div class="text-center alrtMsg">
                <i class="fa fa-exclamation-triangle"></i>
                <h3>You Do Not have permission as of now. Please contact your Administration and Request for Permission.</h3>
            </div>
        </div>
    </div>
    <?php
}


    ?>
<body>
     <div class="se-pre-con"></div>
   <div class="page-container">
   <!--/content-inner-->
    <div class="left-content">
       <div class="inner-content">
        <!-- header-starts -->
            <div class="header-section">
                        <!--menu-right-->
                        <div class="top_menu">
                                <!--<div class="main-search">
                                            <form>
                                               <input type="text" value="Search" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Search';}" class="text"/>
                                                <input type="submit" value="">
                                            </form>
                                    <div class="close"><img src="<?php echo base_url()?>assets/images/cross.png" /></div>
                                </div>
                                    <div class="srch"><button></button></div>
                                    <script type="text/javascript">
                                         $('.main-search').hide();
                                        $('button').click(function (){
                                            $('.main-search').show();
                                            $('.main-search text').focus();
                                        }
                                        );
                                        $('.close').click(function(){
                                            $('.main-search').hide();
                                        });
                                    </script>
                            <!--/profile_details-->
                                <div class="profile_details_left">
                                  <?php $this->load->view('notification');?>
                            </div>
                            <div class="clearfix"></div>    
                            <!--//profile_details-->
                        </div>
                        <!--//menu-right-->
                    <div class="clearfix"></div>
                </div>
                    <!-- //header-ends -->
                       <div>
					 
<div class="container">
  
    <div class="page-header">
        <h1><?php echo $heading; ?></h1>
    </div>
    <style>
        
    @media screen and (min-width: 768px) {
      
        .modal-dialog  {
            width:900px;
        }
    }
    .form-group input[type="checkbox"] {
        display: none;
    }
    .form-group input[type="checkbox"] + .btn-group > label span {
        width: 20px;
    }
    .form-group input[type="checkbox"] + .btn-group > label span:first-child {
        display: none;
    }
    .form-group input[type="checkbox"] + .btn-group > label span:last-child {
        display: inline-block;   
    }
    .form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
        display: inline-block;
    }
    .form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
        display: none;   
    }
    tr.highlight_past td.due_date{
        background-color: #cc6666 !important;
    }
    tr.highlight_now td.due_date{
        background-color: #e4b13e !important;
    }
    tr.highlight_future td.due_date{
        background-color: #65dc68 !important;
    }
    #history_table td {
        border: 1px solid #aaa;
        padding: 5px
    }

    .icon .fa{
            background-color: #ffffff00; 
            color:#ff1122;
             font-size:20px;
             padding-right:5px;
        }

    @media (max-width: 991px){
        .priority-7,.priority-8,.priority-13,.priority-14{
			display:none;
		}
        #search_form{
            display:block;
        }
        }
        @media (max-width: 1150px){
            .priority-10, .priority-7,.priority-8,.priority-13,.priority-14{
			display:none;
		}

        }
 
	@media screen and (max-width: 900px) and (min-width: 550px) {
        #search_form{
            display:block;
        }
		.priority-4,.priority-5,.priority-6, .priority-7,.priority-8,.priority-10,.priority-13,.priority-14{
			display:none;
		}
       
	}
	
	@media screen and (max-width: 550px) {
        .priority-4,.priority-5,.priority-6, .priority-7,.priority-8,.priority-10,.priority-13,.priority-14{
			display:none;
		}
        #search_form{
            display:block;
        }
        .icon .fa{
            background-color: #ffffff00; 
            color:#ff1122;
             font-size:16px!important;
            
        }
       
	}
	/* @media screen and (max-width: 384px) {
        #search_form{
            display:block;
        }
        .priority-4,.priority-5,.priority-6, .priority-7,.priority-8,.priority-10,.priority-11{
			display:none;
		}
   
	}  */
	@media screen and (max-width: 300px) {
        .icon .fa{
            background-color: #ffffff00; 
            color:#ff1122;
             font-size:16px!important;
            
        }
        .
        #search_form{
            display:block;
        }
        .priority-4,.priority-5,.priority-6, .priority-7,.priority-8,.priority-10,.priority-11,.priority-13,.priority-14{
			display:none;
		}
   
	}
</style>
    <div>
      <table id="example" class="table table-striped table-bordered dt-responsive"  cellspacing="0" width="100%" >
            <thead>
                <tr> 
                    <th class="priority-3">Source</th>
                    <th> Action </th>
                    <th class="priority-4">Contact Name</th>
                    <th class="priority-5">Contact No</th> 
                    <th class="priority-7">Notes</th>
                    <th class="priority-8">Date</th>
                </tr> 
            </thead>
            <tbody id="table_body">
                <?php if(count($leads)>0){
                    foreach ($leads as $lead) { ?>
                        <tr id="row_<?= $lead->id ?>">  
                            <td class="priority-3"><?= $lead->source ?></td>
                            <td class="priority-2"><button type="button" class="btn btn-success" onclick="window.location='<?php echo site_url("dashboard/commitLead/".$lead->id."/".$lead->source."/".$lead->project_id);?>'">Pick/Commit</button></td>
                            <td class="priority-4"><?= $lead->name ?></td>
                            <td class="priority-5"><?= $lead->phone ?></td> 
                            <td class="priority-6"> 
                                <?= $lead->project ?>
                            </td>  
                            <td class="priority-8"><?= $lead->lead_date ?></td>
                        </tr>
                    <?php }
                }
                else{ ?>
                        <tr>
                            <td colspan='8'>No Leads for Now</td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
        <div style="margin-top: 20px">
             <span class="pull-left"><p>Showing <?php echo ($this->uri->segment(3)) ? $this->uri->segment(3)+1 : 1; ?> to <?= ($this->uri->segment(3)+count($leads)); ?> of <?= $totalRecords; ?> entries</p></span>
              <ul class="pagination pull-right"><?php echo $links; ?></ul> 
        </div>
        </div>

</div>
<br/><br/>
<br/><br/><br/><br/><br/><br/> 
<script type="text/javascript">
    $(document).ready(function() {
        $('#change_callbacks').click(function(){
            $("#self_input").val(($("#self_input").val() == "0")?"1":"0");
            $("#search_form").submit();
        });


    });

    function reset_data(){
        $('#dept').val("");
        $('#project').val("");
        $('#lead_source').val("");
        $('#sub_broker').val("");
        $('#status').val("");
        $('#city').val("");
        <?php
        $this->session->unset_userdata('city_user');
        
        ?>
        $('#user_name').val("");
        $('#searchDate').val("");
        $('#srxhtxt').val("");
        $('#city_user').val("");
        $("#search_form").submit();
    }
    
</script> 
      
                       </div>

                                     <!--footer section start-->
                                        <footer>
                                            <p>&copy <?= date('Y')?> Blisss Realty . All Rights Reserved <!--| Design by <a href="#" target="_blank">Digilance5</a>--></p> 
                                        </footer>
                                    <!--footer section end-->
                                </div>
                            </div>
                <!--//content-inner-->
            <!--/sidebar-menu-->
                <div class="sidebar-menu">
                    <header class="logo"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                    <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>  <span id="logo"> <h1>BLS</h1></span> 
                    <!--<img id="logo" src="" alt="Logo"/>--> 
                  </a> 
                </header>
            <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
            <!--/down-->
                            <div class="down">  
                                      <?php $this->load->view('profile_pic');?>
                                      <span class=" name-caret"><?php echo $this->session->userdata('user_name'); ?></span>
                                       <p><?php echo $this->session->userdata('user_type'); ?></p>
                                     <?php if($this->session->userdata('user_type')=='user')
                                       {?>
                                      <span class="name-caret">RM:</span> <?php echo $this->session->userdata('manager_name'); ?><br>
                                        <?php } ?>
                                    
                                    <ul>
                                    <li><a class="tooltips" href="<?= base_url('dashboard/profile'); ?>"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
                                        <li><a class="tooltips" style=" color: #fdd10c !important; " href="#"><span>Team Size</span><?php if($this->session->userdata("manager_team_size")) echo $this->session->userdata("manager_team_size")?$this->session->userdata("manager_team_size"):''?></a></li>
                                        <li><a class="tooltips" href="<?php echo base_url()?>login/logout"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
                                        </ul>
                                    </div>
                               <!--//down-->
                           <?php $this->load->view('inc/header_nav'); ?>
                              </div>
                              <div class="clearfix"></div>      
                            </div>
                            <script>
                            var toggle = true;
                                        
                            $(".sidebar-icon").click(function() {                
                              if (toggle)
                              {
                                $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                                $("#menu span").css({"position":"absolute"});
                              }
                              else
                              {
                                $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                                setTimeout(function() {
                                  $("#menu span").css({"position":"relative"});
                                }, 400);
                              }
                                            
                                            toggle = !toggle;
                                        });
                            </script>
</body>
</html>