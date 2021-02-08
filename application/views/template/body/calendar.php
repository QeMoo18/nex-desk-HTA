


<link rel="stylesheet" href='<?= base_url()?>asset_calendar_note/fullcalendar.min.css' rel='stylesheet'/>
<link rel="stylesheet" href='<?= base_url()?>asset_calendar_note/fullcalendar.print.min.css' rel='stylesheet' media='print'/>
<script src='<?= base_url()?>asset_calendar_note/moment.min.js'></script>

<script src='<?= base_url()?>asset_calendar_note/fullcalendar.min.js'></script>

<style>
  
  .fc-view {
    background-color: cornsilk;
  }

  #contain {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>

<div class="content-wrapper">

	<section class="content">
		
		<?php $module = $this->session->userdata('idModule'); 
          //var_dump($module); 
    ?>
		


    <div class="row">

      <div id="js_code"> </div>

      <div class="col-md-12">

          <div id="contain">
            <div id='calendar'></div>
          </div>


      </div>

    </div>



    </section>
</div>



<script>

  $(document).ready(function() {

    my_event();
    function my_event()
    {
        
        var data =  {       
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

        $.ajax({
                    url: '<?= base_url() ?>Dashboard/calendar_data', //create nama function delete controller
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(response){

                        $("#js_code").html(response);

                    }
            });
    }

    

  });

</script>