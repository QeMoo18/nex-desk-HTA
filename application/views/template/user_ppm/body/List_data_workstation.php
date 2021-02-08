<div class="pageheader hidden-xs">
    <h3><i class="fa fa-file"></i> List PPM Activity : <?= get_name_activity($this->session->userdata('q'))?></h3>
    <div class="breadcrumb-wrapper">
        <span class="label" style="padding-right: 0px;"><i class="fa fa-cog" aria-hidden="true" style="border: 2px solid #f2f7f8;padding-right: 0px;"></i></span>
        <ol class="breadcrumb">
            <li> <a href="<?=base_url()?>Form_PPM/Main_PPM"> Dashboard </a> 
        </ol>
    </div>
</div>

<!-- <script type="text/javascript">
    $(document).ready(function (){

        if("<?= $this->session->userdata('id_activity')?>"==''){
            alert('Sorry , we cannot recognize your form activity !');
            window.location.href="<?= base_url()?>Form_PPM/List_activity_workstation";
        } 

    });
</script> -->

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

        <form action="<?= base_url()?>Form_PPM/Form_PPM_Client_Acknowlege" method="post" id="id_form">

            <input type="hidden" name="hidden_ppm_id" value="<?= $this->session->userdata('q')?>">
            <input type="hidden" name="hidden_user_id" value="<?= $this->session->userdata('u')?>">

    		<div class="table table-responsive">
		         <table class="table">
		            <thead class="thead-dark">
		               <tr>
                          <th><input type="checkbox" id="checkall" name="checkall" value=""></th>
		                  <th>Hostname</th>
		                  <th>Description</th>
		                  <th>Type</th>
                          <th>Perform Date</th>
                          <th>Status</th>
		                  <th></th>
		               </tr>
		            </thead>
		            <?php  foreach($result as $data){ ?>

                        
		            <tbody>
		               <tr>
		                  <td>
                            <input type="checkbox"  name="id_number[]" value="<?=  $data["id_number"]; ?>">
                          </td>
                          <td> 
                             <?=  $data["hostname"]; ?>
                          </td>
                          <td> 
                             <?=  $data["hostname"]; ?>
                          </td>
                          <td> 
                             <?=  $data["ppm_device"]; ?>
                          </td>
                          <td> 
                            <?php 
                                $ppm_id = $data['type_ppm_activity'];
                                $hostname = $data['hostname'];
                            ?>
                            <?= ppm_2_date($ppm_id,$hostname); ?>
                          </td>
                          <td> 
                            <?php 
                                $ppm_id = $data['type_ppm_activity'];
                                $hostname = $data['hostname'];
                            ?>
                            <?= ppm_2_status($ppm_id,$hostname); ?>
                          </td>
                          <td>
                                <!-- <a href="<?= base_url()?>Form_PPM/List_activity_workstation_update/<?= $data["id"]?>">Update</a> -->

                                <?php 
                                    $type = $data['ppm_device'];
                                    $ppm_id =  $data['type_ppm_activity'];
                                    
                                    $hostname = $data['hostname'];
                                    $hostname = bin2hex($hostname);
                                    $ppm_id = bin2hex($ppm_id);
                                    $type = bin2hex($type);


                                    //decrypt
                                    //$hostname = hex2bin($hostname);
                                    //$ppm_id = hex2bin($ppm_id);
                                    //$type = hex2bin($type);
                                    //var_dump($data["ppm_device"]);
                                ?>

                                <?php if(($data["ppm_device"]=='Computer')||($data["ppm_device"]=='Desktop')){ ?>
                                    <a href="<?= base_url()?>Form_PPM/User_Computer?hostname=<?= $hostname?>&ppm_id=<?= $ppm_id?>&type=<?= $type?>"><i class="fa fa-edit"></i></a>
                                <?php } ?>


                                <?php if(($data["ppm_device"]=='Laptop')||($data["ppm_device"]=='laptop')||($data["ppm_device"]=='Notebook')||($data["ppm_device"]=='notebook')){ ?>
                                    <a href="<?= base_url()?>Form_PPM/User_Notebook?hostname=<?= $hostname?>&ppm_id=<?= $ppm_id?>&type=<?= $type?>"><i class="fa fa-edit"></i></a>
                                <?php } ?>


                                <?php if(($data["ppm_device"]=='Printer')||($data["ppm_device"]=='printer')){ ?>
                                    <a href="<?= base_url()?>Form_PPM/User_PPM_Form_Printer?hostname=<?= $hostname?>&ppm_id=<?= $ppm_id?>&type=<?= $type?>"><i class="fa fa-edit"></i></a>
                                <?php } ?>


                                <?php if(($data["ppm_device"]=='Scanner')||($data["ppm_device"]=='scanner')){ ?>
                                    <a href="<?= base_url()?>Form_PPM/User_Scanner?hostname=<?= $hostname?>&ppm_id=<?= $ppm_id?>&type=<?= $type?>"><i class="fa fa-edit"></i></a>
                                <?php } ?>

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
		               </tr>
		               <?php } ?>
		            </tbody>
		         </table>


	      	</div>

            <div class="" style="padding-top: 30px; float: right; padding-bottom: 30px;padding-right: 30px;">
                <div class="col-md-6" style="padding-bottom: 10px;"></div>
                <div class="col-md-6" style="padding-bottom: 10px;">
                    <button class="btn btn-primary" onclick="acknowledge(); return false;">Acknowledge</button>
                        
                </div>
            </div>
            <br><br>
	      	<div style='margin-top: 30px;  padding-right: 30px;'>
	         	<?= $pagination; ?>
	      	</div>
        </form>

    </div>


    <datalist id="users">
      <?= lookup_customer_user_datalist()?>
    </datalist>

    
</div>



<script type="text/javascript">
    function send_email()
    {
        var ppm_id = "<?= $this->session->userdata('id_activity');?>";
        var user_find = $("#user_find").val();
        if(user_find){
            var data = 
                        {   'ppm_id':ppm_id,
                            'user_find':user_find,
                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                        }

                    
            $.ajax({
                    url: '<?= base_url() ?>Form_PPM/Workstation_Send_Email',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                        alert("Data Saved !");
                        location.reload();
                    }
            });
        } 
    }
</script>



<script type="text/javascript">
    function printIcon(id)
    {
        $('#pdf_data').attr('action', '<?= base_url()?>Form_PPM/PDF_Computer/'+id);
        $("#submit").trigger('click');
    }

    function printIcon2(id)
    {
        $('#pdf_data').attr('action', '<?= base_url()?>Form_PPM/PDF_Hardware/'+id);
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


<script type="text/javascript">

        $("a").each(function() {
            var c = $(this).attr('href');
            console.log(c);
            if(c=='<?= base_url()?>Form_PPM/Form_PPM_Client_Work#'){
                //$(this).attr("href", "<?= base_url()?>Form_PPM/Form_PPM_Client_Work" + "/1");
            } else{
                <?php if(!empty($this->session->userdata('ppm_id'))){ ?>
                    $(this).attr("href", $(this).attr('href') + "?q=<?= $_GET['q']?>&u=<?= $_GET['u']?>");
                <?php } else { ?>
                    $(this).attr("href", $(this).attr('href') + "?q=<?= $this->session->userdata('q');?>&u=<?= $this->session->userdata('u');?>");
                <?php } ?>
                
            }
           
        });



        // Listen for click on toggle checkbox
        $('#checkall').click(function(event) {   
            if(this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;                        
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;                       
                });
            }
        });



        function acknowledge()
        {
            $("#id_form").submit();
        }

</script>