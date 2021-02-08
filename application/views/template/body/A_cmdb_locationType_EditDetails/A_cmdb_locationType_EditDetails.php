

<div class="content-wrapper">
<section class="content">
    <?= lookup_navbar(); ?> 
    <h5><i class="fa fa-angle-double-right" aria-hidden="true"></i> Location Type Management</h5>
    <div class="row">

        <div class="col-md-2">
            <div class="form-group">
            <a href="<?=base_url()?>Admin/A_cmdb_locationType_viewlist"><button class="btn btn-success btn-block"> Go To Overview</button></a>
            </div>
        </div>

        <div class="col-md-7">

            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"> <b>Edit Location Type</b> </h3>
              </div>
              <div class="box-body">

                <div class="row">
                    <div class="form-group col-md-8">
                      <label for="exampleInputEmail1">Name</label>
                      <input type='text' class='form-control' name='loctype_name' id='loctype_name'> 
                    </div>
                    
                    <div class="form-group col-md-2">
                        <br>
                        <button type="submit" class="btn btn-danger btn-block" onclick="cancel();">Cancel</button>
                    </div>
                    <div class="form-group col-md-2">
                        <br>
                        <button type="submit" class="btn btn-primary btn-block" onclick="submit();">Submit</button>
                    </div>
                </div>

              </div>
            </div>
        </div>

    </div>
</section>
</div>

<input type="hidden" name="other_id" id="other_id" value="<?= $this->uri->segment('3'); ?>">

<script type="text/javascript">

    $(document).ready(function (){
        details();
    
    });

    function details()
    {
        var other_id= $("#other_id").val();

        var data =  {
                            'other_id':other_id,
                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

        $.ajax({
                    url: '<?= base_url() ?>Admin/A_cmdb_locationType_details',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    beforeSend: function() {
                       
                    },
                    success: function(response){

                        var loctype_name = $("#loctype_name").val(response.location_type);
                    }
              });
    }

    function submit()
    {
            var other_id= $("#other_id").val();
            var loctype_name = $("#loctype_name").val();
            var data =  {
                            "loctype_name" : loctype_name,
                            "other_id" : other_id,
    
                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                        }

            $.ajax({
                    url: "<?= base_url() ?>Admin/A_cmdb_locationType_update",
                    type: "POST",
                    dataType: "html",
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){
                        //alert('Success update location type');
                        //location.reload();

                        var url = "<?= base_url()?>Admin/A_cmdb_locationType_viewlist";
                        window.location.href=url;
                    }
            });

    }

    function cancel()
    {
            location.reload();
    }
</script>