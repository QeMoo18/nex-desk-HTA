<div class="pageheader hidden-xs">
    <h3><i class="fa fa-user"></i>List PPM Activity : <?= get_name_activity($this->session->userdata('id_activity'))?></h3>
    <div class="breadcrumb-wrapper">
        <span class="label" style="padding-right: 0px;"><i class="fa fa-cog" aria-hidden="true" style="border: 2px solid #f2f7f8;padding-right: 0px;"></i></span>
        <ol class="breadcrumb">
            <li> <a href="<?=base_url()?>Form_PPM/Main_PPM"> Dashboard </a> 
        </ol>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function (){

        if("<?= $this->session->userdata('id_activity')?>"==''){
            alert('Sorry , we cannot recognize your form activity !');
            window.location.href="<?= base_url()?>Form_PPM/List_activity_server";
        } 

    });
</script>

<div class="panel">
    <!--Panel heading-->
    <div class="panel-heading ui-sortable-handle">
        <div class="col-md-4" style="padding-left: 7px; padding-top: 30px;">
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
    <!--Panel body-->
    <div class="panel-body">


            <div class="row" style="padding-bottom: 30px;">
                <div class="col-md-1" style="padding-left: 0px;">
                    <select class="form-control" name="">
                        <option value="">10</option>      
                        <option value="">20</option>      
                        <option value="">30</option>      
                        <option value="">40</option>       
                        <option value="">50</option>       
                    </select>
                </div>
                <div class="col-md-1" style="padding-left: 0px;"></div>
                <div class="col-md-2" style="padding-left: 0px;">


                </div>
                <div class="col-md-2" style="padding-left: 0px;">
                  <select class="form-control" name="">
                    <option value="">-- Type Devices --</option>    
                    <option value="Desktop">Desktop</option>   
                    <option value="Notebook">Laptop</option>   
                    <option value="Printer">Printer</option>   
                    <option value="Scanner">Scanner</option>  
                  </select>
                </div>
                
                <div class="col-md-2" style="padding-left: 0px;">
                  <select class="form-control" name="">
                    <option value="">-- Department --</option>     
                    <?= getAllLoc()?> 
                  </select>
                </div>
                <div class="col-md-2" style="padding-left: 0px;">
                  <select class="form-control" name="">
                    <option value="">-- Status --</option>      
                    <option value="Not Yet">Not Yet</option>   
                    <option value="Performed">Performed</option>   
                    <option value="Verified">Verified</option>   
                    <option value="Endorsed">Endorsed</option>    
                    <option value="Endorsed & Send">Endorsed & Send</option> 
                  </select>
                </div>

                <div class="col-md-2">
                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div>
            </div>



    		<div class="table table-responsive">
		         <table class="table">
		            <thead class="thead-dark">
		               <tr>
                          <th></th>
		                  <th>Hostname</th>
		                  <th>Description</th>
		                  <th>Type</th>
		                  <th>Department</th>
		                  <th>Location</th>
                          <th>Acknowledge</th>
                          <th>Perform Date</th>
                          <th>Status</th>
                          <th>Print</th>
		               </tr>
		            </thead>
		            <?php  foreach($result as $data){ ?>

                        
		            <tbody>
		               <tr>
                          <td>
                                <!-- <a href="<?= base_url()?>Form_PPM/List_activity_workstation_update/<?= $data["id"]?>">Update</a> -->
                                <?php 
                                    $type = $data['type'];
                                    $ppm_id = $this->session->userdata('id_activity');
                                 ?>
                                <?php if($type=='Server(Physical)'){
                                        $type='Physical';
                                      } else if('Server(Virtual)'){
                                        $type='Virtual';
                                      } else {
                                        $type='Storage';
                                      }
                                ?>

                                <?php 
                                    $hostname = $data['name'];
                                    $hostname = bin2hex($hostname);
                                    $ppm_id = bin2hex($ppm_id);
                                    $type = bin2hex($type);


                                    //decrypt
                                    //$hostname = hex2bin($hostname);
                                    //$ppm_id = hex2bin($ppm_id);
                                    //$type = hex2bin($type);

                                ?>

                                <a href="<?= base_url()?>Form_PPM/PPM_Form_Server_Storage?hostname=<?= $hostname?>&ppm_id=<?= $ppm_id?>&type=<?= $type?>"><i class="fa fa-edit"></i></a>

                                | <input type="checkbox" value="<?= $data['name']?>" class="" name="sendEmail_PPM[]">
                          </td>
		                  <td> 
		                     <?=  $data["name"]; ?>
		                  </td>
		                  <td> 
		                     <?=  $data["description"]; ?>
		                  </td>
		                  <td> 
		                     <?=  $data["type"]; ?>
		                  </td>
		                  <td> 
		                     <?=  $data["location"]; ?>
		                  </td>
		                  <td> 
		                     <?= $data["location"]; ?>
		                  </td>
		                  <td> 
                            <?php 
                                $ppm_id = $this->session->userdata('id_activity');
                                $hostname = $data['name'];
                            ?>
                            <?= ppm_2_ackowledge($ppm_id,$hostname); ?>
                          </td>
                          <td> 
                            <?php 
                                $ppm_id = $this->session->userdata('id_activity');
                                $hostname = $data['name'];
                            ?>
                            <?= ppm_2_date($ppm_id,$hostname); ?>
                          </td>
                          <td> 
                            <?php 
                                $ppm_id = $this->session->userdata('id_activity');
                                $hostname = $data['name'];
                                if(!empty(ppm_2_date($ppm_id,$hostname))){
                                    echo 'Performed';
                                } else {
                                    echo 'Not Yet';
                                }
                            ?>
                          </td>
                          <td> 
                            <?php 
                                $ppm_id = $this->session->userdata('id_activity');
                                $hostname = $data['name'];
                                if(!empty(ppm_2_date($ppm_id,$hostname))){
                                    $id_number = "'".ppm_2_id_number($ppm_id,$hostname)."'";
                                    echo '<a onclick="printIcon('.$id_number.')"><i class="fa fa-print"></i></a>';
                                } else {
                                    echo '';
                                }
                            ?>
                          </td>
		               </tr>
		               <?php } ?>
		               <?php if(empty($result)){ ?>
		               <tr>
		                  <td></td>
                          <td>No Data</td>
                          <td>No Data</td>
                          <td>No Data</td>
                          <td>No Data</td>
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
	      	<div class="" style="padding-top: 30px; float: right; padding-bottom: 30px;padding-right: 0px;">
                <div class="col-md-6" style="padding-bottom: 10px;">
                    <input type="text" class="form-control" placeholder="Name" name="" style="width: 200px;" list="users">
                </div>
                <div class="col-md-6" style="padding-bottom: 10px;">
                            <button class="btn btn-primary">Send Email</button>
                        
                </div>
            </div>
            <br><br>
            <div style='margin-top: 30px;  padding-right: 30px;'>
                <?= $pagination; ?>
            </div>

    </div>
</div>


<datalist id="users">
  <?= lookup_customer_user_datalist()?>
</datalist>


<script type="text/javascript">
    function printIcon(id)
    {
        $('#pdf_data').attr('action', '<?= base_url()?>Form_PPM/PDF_Computer/'+id);
        $("#submit").trigger('click');
    }
</script>

<form action="" method="post" id="pdf_data">
    <button type="submit" id="submit" style="display: none">Submit</button>
</form>



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