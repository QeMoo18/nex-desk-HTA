<div class="pageheader hidden-xs">
    <h3><i class="fa fa-user"></i> Asset / Preventive Maintenance / Server</h3>
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
        <h3 class="panel-title">Update Server PPM Activity</h3>
    </div>
    <!--Panel body-->
    <div class="panel-body">

            <form action="<?=base_url()?>Form_PPM/update_List_activity_submit/<?=$this->uri->segment(3)?>" method="POST">
                <input type="hidden" name="type" value="2">
                <div class="row" style="padding-bottom: 10px;">

                    <div class="col-md-6" draggable="true">
                      <label>* Activity Name</label>
                      <input type="text" class="form-control" name="activitiy_name" id="activitiy_name" placeholder="" required>
                    </div>
                </div>

                <div class="row" style="padding-bottom: 10px;">
                    <div class="col-md-6" draggable="true">
                      <label>Description</label>
                      <textarea class="form-control" id="description_activity" name="description_activity" placeholder="" cols="5" rows="5"></textarea>
                    </div>
                </div>

                <div class="row" style="padding-bottom: 10px;">
                    <div class="col-md-6" draggable="true">
                        <label for="selectbasic">* Type PPM</label>
                        <div>
                            <select id="type_ppm" name="type_ppm" class="form-control" required>
                                <option value="Server">Server</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row" style="padding-bottom: 10px;">
                    <div class="col-md-3" draggable="true">
                      <label>* Start Date</label>
                      <input type="text" class="form-control datepicker" name="start_date" id="start_date" placeholder="" required>
                    </div>
                    <div class="col-md-3" draggable="true">
                      <label>* End Date</label>
                      <input type="text" class="form-control datepicker" name="end_date" id="end_date" placeholder="" required>
                    </div>
                </div>


            
                <div class="row">
                    <div class="col-lg-12" style="padding-top: 30px; padding-bottom: 30px;">
                        <input type="hidden" name="id_form" value="21287"><div style="float: left"><button class="btn btn-primary" type="submit">Submit</div>
                    </div>
                </button>


                </div>
            </form>
    </div>
</div>


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
    $(document).ready(function (){
        var id = "<?= $this->uri->segment(3)?>";

        var data =  {
                            "id":id, //declare variable dalam data 
                            "<?php echo $this->security->get_csrf_token_name(); ?>" : "<?php echo $this->security->get_csrf_hash(); ?>"
                    }

        $.ajax({
                    url: "<?= base_url() ?>Form_PPM/List_activity_details", 
                    type: "POST",
                    dataType: "json",
                    data: data,
                    beforeSend: function() {
                       
                    },
                    success: function(response){

                        $("#activitiy_name").val(response.activitiy_name);
                        $("#description_activity").val(response.description_activity);
                        $("#type_ppm").val(response.type_ppm);
                        $("#start_date").val(response.start_date);
                        $("#end_date").val(response.end_date);

                    }
              });
    });
</script>
