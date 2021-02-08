<div class="pageheader hidden-xs">
    <h3><i class="fa fa-list"></i> List Ticket : Status View </h3>
    <div class="breadcrumb-wrapper">
        <span class="label" style="padding-right: 0px;"><i class="fa fa-cog" aria-hidden="true" style="border: 2px solid #f2f7f8;padding-right: 0px;"></i></span>
        <ol class="breadcrumb">
            <li> <a href="<?=base_url()?>Ticket/CreateTicket_Phone"> Create Ticket </a> </li>
            <li> <a href="<?=base_url()?>Ticket/Ticket_StatusView"> Ticket Status </a> </li>
            <li> <a href="<?=base_url()?>Ticket/MS_Overview_Open"> Master Status </a> </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="content-wrapper">
    	<section class="content">
    		<div class="row">
    			<div class="col-md-12">

    				<div class="box box-success">
    		          <div class="box-header with-border">
    		            <h3 class="box-title"> <b><i class="fa fa-list-alt" aria-hidden="true"></i> List Ticket By Status</b></h3>
    		          </div>
    		          <div class="box-body" style="padding-bottom: 30px;">
    		          	<table id="mytable2" class="table table-bordered table-striped">
    		            	<thead>
    		            		<tr>
    						    	<th>Ticket No</th>     
    							
    						    	<th>Subject</th>   

                                    <th>Category</th>       
    							     
    						    	<th>State</th>        
    							    
                                    <th>State Type</th>
     

    						    	<th>Ages</th>        
    							
    							
    						    	<th>Owner</th>  

                                    <th><center>Status</center></th>

                                    <th>Responsible</th>

                                    <th>Changed</th>         
    				
    							</tr>
    						</thead>
    						<tbody id="dataList">	       
                                <?php 
                                foreach($result as $data){
                                ?>
                                <tr>
                                    <?php 
                                        $id = $data['id_ticket']; 
                                        $idt = "'".$id."'";
                                    ?>
                                    <td><a style="cursor: pointer;" onclick="detailTicket(<?= $idt ?>);"><?= $data['id_ticket']?></a></td>
                                    <td><?= $data['title']?></td>
                                    <td><?= $data['category']?></td>
                                    <td><?= $data['status_ticket']?></td>
                                    <td><?= $data['current_state']?></td>
                                    <td>
                                        <?php 
                                            $date = $data['created_date'];
                                            $hour = floor($date/3600);
                                            $minute = floor(($date/3600)%60);
                                            $second = floor($date%60);
                                            $age = $hour.':'.$minute;
                                            echo $age;
                                        ?>
                                    </td>
                                    <td><?= $data['ticket_owner']?></td>
                                    <td><?php 
                                            $status = $data['status_lock'];

                                            $id_no = "'".$data['id_no']."'";

                                            if($status==0){
                                                $status='<center><a onclick="detailTicket('.$id_no.');" title="Unlock ticket"><i class="fa fa-unlock" aria-hidden="true"></i></a></center>';
                                            } else {
                                                $status='<center><a onclick="confirm_lock('.$id_no.')" title="Lock Ticket"><i class="fa fa-lock" aria-hidden="true"></i></a></center>';
                                            }

                                            echo $status;
                                        ?>
                                        
                                    </td>
                                    <td><?= $data['ticket_responsibilty']?></td>
                                    <td>
                                        <?php 
                                            $date = $data['updated_date'];
                                            $hour = floor($date/3600);
                                            $minute = floor(($date/3600)%60);
                                            $second = floor($date%60);
                                            $age = $hour.':'.$minute;
                                            echo $age;
                                        ?>
                                        
                                    </td>
                                </tr>
                                <?php } ?>
    				        </tbody>
    			        </table>
    				  </div>
    				</div>
    			</div>
    			<!-- <div class="col-md-3 hidden-xs">
                    <div class="col-md-11"> <?//= lookup_widget(); ?> </div>
                    <div class="col-md-1"> </div>
                </div> -->
    		</div>
    	</section>
    </div>
</div>



<style type="text/css">

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

    .pageheader .fa, .pageheader .glyphicon {
        font-size: 12px;
        margin-right: 5px;
        padding: 6px 7px;
        border: 2px solid #124f76;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
    }

    .pageheader h3 {
        font-size: 15px;
        color: #165a84;
        letter-spacing: -.5px;
        margin: 0;
    }

    .pageheader .breadcrumb-wrapper .label {
        color: #165a84;
        text-transform: uppercase;
        font-weight: 400;
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



</style>



<script type="text/javascript">
    function detailTicket(id)
    {
        //alert(id);
        var id_sort_hidden = $("#id_sort_hidden").val();
        var base_url = "<?= base_url()?>";
        // window.location.href = base_url+'Ticket/Ticket_DetailTicket/'+id+'/'+id_sort_hidden;
        window.location.href = base_url+'Ticket/Ticket_DetailTicket/'+id;
    }



    function confirm_lock(id_ticket)
    {

        var txt;
        var r = confirm("Are you sure to unlock ?");
        if (r == true) {
          txt = "You pressed OK!";
          inactive_lock(id_ticket)
        } else {
          txt = "You pressed Cancel!";
        }
    }


    function inactive_lock(id_ticket)
    {
        var data =  {       
                                'id_ticket':id_ticket,
                                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                            }

        $.ajax({
                    url: '<?= base_url() ?>Admin/inactive_lock', //create nama function delete controller
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                        load_data();
                    }
              })
    }
</script>


<input type="hidden" name="id_sort_hidden" id="id_sort_hidden">