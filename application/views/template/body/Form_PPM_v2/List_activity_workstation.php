<div class="pageheader hidden-xs">
    <h3><i class="fa fa-user"></i> Asset / Preventive Maintenance / Workstation</h3>
    <div class="breadcrumb-wrapper">
        <span class="label" style="padding-right: 0px;"><i class="fa fa-cog" aria-hidden="true" style="border: 2px solid #f2f7f8;padding-right: 0px;"></i></span>
        <ol class="breadcrumb">
            <li> <a href="<?=base_url()?>Form_PPM/Main_PPM"> Dashboard </a> 
        </ol>
    </div>
</div>

<div class="panel">
    <!--Panel heading-->
    <div class="panel-heading ui-sortable-handle">
        <h3 class="panel-title">Workstation PPM Activity</h3>
    </div>
    <!--Panel body-->
    <div class="panel-body">


    		<div class="row">

        		<div class="col-md-2" style="padding-bottom: 10px; padding-right: 0px; ">
        			<a href="<?= base_url()?>Form_PPM/List_activity_workstation_add	"><button class="btn btn-primary btn-block">Add Data</button></a>
        		</div>
        		<div class="col-md-6"></div>
    			<div class="col-md-4" style="padding-left: 0px;">
        			<form method="post" action="<?= base_url()?><?= $this->uri->segment(1)?>/<?= $this->uri->segment(2)?>" id="form_reset">
            			<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                          <div class="input-group">
                            <input type="text" class="form-control" name="search" id="btn_search" placeholder="Find Something" value="<?= $this->session->userdata('search')?>">
                            <input type="hidden" name="submit" value="submit">
                            <div class="input-group-btn">
                              <button class="btn btn-primary" type="submit">
                                <i class="material-icons">search</i>
                              </button>
                            </div>
                          </div>
                    </form>
        		</div>

    		</div>


    		<div class="table table-responsive">
		         <table class="table">
		            <thead class="thead-dark">
		               <tr>
		                  <th>Activity Name</th>
		                  <th>Description</th>
		                  <th>Type PPM</th>
		                  <th>Start Date</th>
		                  <th>End Date</th>
		               </tr>
		            </thead>
		            <?php  foreach($result as $data){ ?>
		            <tbody>
		               <tr>
		                  <td> 
                                <a onclick="save_session_page('<?= $data["id"]?>');" style="color: #000; font-size: 12px; cursor: pointer;">
    		                     <?php 
    		                        $activitiy_name =  $data["activitiy_name"]; 
    		                        if (filter_var($activitiy_name, FILTER_VALIDATE_URL)) {
    		                        ?>
    		                     <img src="<?= $data["activitiy_name"]; ?>" style="width: 200px;">
    		                     <?php
    		                        } else {
    		                        	echo $data["activitiy_name"];
    		                        }
    		                        ?>
                                </a>
		                  </td>
		                  <td> 
                                <a onclick="save_session_page('<?= $data["id"]?>');" style="color: #000; font-size: 12px; cursor: pointer;">
    		                     <?php 
    		                        $description_activity =  $data["description_activity"]; 
    		                        if (filter_var($description_activity, FILTER_VALIDATE_URL)) {
    		                        ?>
    		                     <img src="<?= $data["description_activity"]; ?>" style="width: 200px;">
    		                     <?php
    		                        } else {
    		                        	echo $data["description_activity"];
    		                        }
    		                        ?>
                                </a>
		                  </td>
		                  <td> 
                                <a onclick="save_session_page('<?= $data["id"]?>');" style="color: #000; font-size: 12px; cursor: pointer;">
    		                     <?php 
    		                        $type_ppm =  $data["type_ppm"]; 
    		                        if (filter_var($type_ppm, FILTER_VALIDATE_URL)) {
    		                        ?>
    		                     <img src="<?= $data["type_ppm"]; ?>" style="width: 200px;">
    		                     <?php
    		                        } else {
    		                        	echo $data["type_ppm"];
    		                        }
    		                        ?>
                                </a>
		                  </td>
		                  <td> 
                            <a onclick="save_session_page('<?= $data["id"]?>');" style="color: #000; font-size: 12px; cursor: pointer;">
    		                     <?php 
    		                        $start_date =  $data["start_date"]; 
    		                        if (filter_var($start_date, FILTER_VALIDATE_URL)) {
    		                        ?>
    		                     <img src="<?= $data["start_date"]; ?>" style="width: 200px;">
    		                     <?php
    		                        } else {
    		                        	echo $data["start_date"];
    		                        }
    		                        ?>
                            </a>
		                  </td>
		                  <td> 
                             <a onclick="save_session_page('<?= $data["id"]?>');" style="color: #000; font-size: 12px; cursor: pointer;">
		                     <?php 
		                        $end_date =  $data["end_date"]; 
		                        if (filter_var($end_date, FILTER_VALIDATE_URL)) {
		                        ?>
		                     <img src="<?= $data["end_date"]; ?>" style="width: 200px;">
		                     <?php
		                        } else {
		                        	echo $data["end_date"];
		                        }
		                        ?>
                              </a>
		                  </td>
		               </tr>
		               <?php } ?>
		               <?php if(empty($result)){ ?>
		               <tr>
		                  <td>No Data</td>
		                  <td>No Data</td>
		                  <td>No Data</td>
		                  <td>No Data</td>
		                  <td>No Data</td>
		               </tr>
		               <?php } ?>
		            </tbody>
		         </table>
	      	</div>
	      	<div style='margin-top: 30px; float: right; padding-right: 30px;'>
	         	<?= $pagination; ?>
	      	</div>

    </div>
</div>


<script type="text/javascript">
    function save_session_page(id)
    {
        window.location.href="<?= base_url()?>Form_PPM/data_workstation/"+id;
    }
</script>





<style type="text/css">

    .pageheader {
        padding: 13px;
        position: relative;
        /* background: #ffffff; */
        background: linear-gradient(to right, rgb(222, 227, 228) 10%, rgb(31, 112, 162) 100%);
        background: -moz-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 112, 162) 100%);
        background: -webkit-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 112, 162) 100%);
        background: linear-gradient(to right, rgb(222, 227, 228) 10%, rgb(222, 227, 228) 100%);
        margin: -20px -5px 22px -5px;
        /* padding: 35px 15px 100px 20px; */
        color: #353535;
        box-shadow: 0 1px 2px 0 rgb(232, 232, 232);
        padding-left: 30p;
    }

    .pageheader .fa, .pageheader .glyphicon {
        font-size: 12px;
        margin-right: 5px;
        padding: 6px 7px;
        border: 2px solid #122f76;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
    }

    .pageheader h3 {
        font-size: 15px;
        color: #165a82;
        letter-spacing: -.5px;
        margin: 0;
    }

    .pageheader .breadcrumb-wrapper .label {
        color: #165a82;
        text-transform: uppercase;
        font-weight: 200;
        display: inline-block;
    }


    .pageheader .breadcrumb li a {
        color: #165983;
    }

    .pageheader .breadcrumb li.active {
        color: #175b86;
    }

    .pageheader .breadcrumb-wrapper {
        position: absolute;
        top: 15px;
        right: 25px;
    }

    .pageheader {
        padding: 13px;
        position: relative;
        /* background: #ffffff; */
        background: linear-gradient(to right, rgb(242, 247, 248) 10%, rgb(31, 114, 162) 100%);
        background: -moz-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 114, 162) 100%);
        background: -webkit-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 114, 162) 100%);
        background: linear-gradient(to right, rgb(242, 247, 248) 10%, rgb(242, 247, 248) 100%);
        margin: -20px -5px 24px -5px;
        /* padding: 35px 15px 100px 20px; */
        color: #353535;
        box-shadow: 0 1px 2px 0 rgb(234, 234, 234);
        padding-left: 30p;
    }
</style>