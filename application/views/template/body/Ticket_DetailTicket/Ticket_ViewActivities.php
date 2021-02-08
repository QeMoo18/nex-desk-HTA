<script type="text/javascript" src="<?=base_url()?>asset_admin/bower_components/ckeditor/ckeditor.js"></script>

<div class="pageheader hidden-xs">
    <h3><i class="fa fa-ticket"></i> View Case</h3>
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
	<div class="col-md-12">

		<div class="panel">
                                    <!--Panel heading-->
                                    <div class="panel-heading">
                                        <h3 class="panel-title font-small">View Case : Ticket#<?= $this->uri->segment(3)?> - <?= subject_note($this->uri->segment(3)) ?></h3>
                                    </div>
                                    <!--Panel body-->
                                    <div class="panel-body">
                                        <div class="timeline">
                                            <?= view_case($this->uri->segment(3))?>
                                        </div>
                                    </div>
                                </div>

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


    /* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}


.tab-base .nav-tabs {
    border: 0;
    background: #0d4063;
}


.btn-success {
    background-color: #ffffff;
    border-color: #ffffff;
}



.nav-section>li>.section, .nav-section>li>a {
    position: relative;
    margin: 0;
    text-align: center;
    padding-right: 0px; 
    padding-left: 5px; 
    padding-top: 0px; 
    padding-bottom: 0px; 
}



.font-date{
	font-size: 8px;
  	font-family: Roboto Slab, 'Open Sans', Arial, sans-serif;
}

</style>


<script type="text/javascript">

  function view_all_state()
  {

    $("html, body").animate({ scrollTop: 0 }, "slow");
     
   //$("#topmen").scrollTop();
    get_view_all_state();
    return false;
  }

  function get_view_all_state()
  {
    var id = "<?= $this->uri->segment(3); ?>";
    var data = 
                    {
                      'id':id,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ticket/view_all_state',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                              //alert(response);
                              $("#list").html(response);
                              $("#modal-fullscreen").modal('show');
                            }
                          });

    }


    function remote(ip)
    {

          var data =  {       
                                  'ip':ip,
                                  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                              }

          $.ajax({
                      url: '<?= base_url() ?>Admin/remoteComputer', //create nama function delete controller
                      type: 'POST',
                      dataType: 'html',
                      data: data,
                      beforeSend: function() {

                      },
                      success: function(response){
                          

                          //connect node js
                          var socket = io.connect('http://localhost:8787');

                          var username = ip;
                          socket.emit('new_client', username);
                          document.title = username + ' - ' + document.title;

                          // When a message is received it's inserted in the page
                          socket.on('message', function(data) {
                              insertMessage(data.username, data.message)
                          })


                          var message = "<?= getenv('COMPUTERNAME'); ?>";
                          socket.emit('message', message);
                          insertMessage(username, message);

                          // Adds a message to the page
                          function insertMessage(username, message) {
                              $('#chat_zone').prepend('<p><strong>' + username + '</strong> ' + message + '</p>');
                          }


                      }
              });


          

    }




</script>
