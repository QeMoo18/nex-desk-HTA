<div class="pageheader hidden-xs">
    <h3><i class="fa fa-search"></i> Knowledge Base Management </h3>
    <div class="breadcrumb-wrapper">
        <span class="label" style="padding-right: 0px;"><i class="fa fa-cog" aria-hidden="true" style="border: 2px solid #f2f7f8;padding-right: 0px;"></i></span>
        <ol class="breadcrumb">
            <li> <a href="<?=base_url()?>Knowledgebase/form"> Add Knowledge Base </a> </li>
            <li> <a href="<?=base_url()?>Knowledgebase/list_form"> List Knowledge Base </a> </li>
        </ol>
    </div>
</div>


<script type="text/javascript" src="<?=base_url()?>asset_admin/bower_components/ckeditor/ckeditor.js"></script>

<style type="text/css">
	.well-recommend {
	    min-height: 20px;
	    padding: 19px;
	    margin-bottom: 20px;
	    background-color: #ffd6d69e;
	    border: 1px solid #e3e3e3;
	    border-radius: 4px;
	    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
	    box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
	}
</style>

<div class="content-wrapper">
	<section class="content">
	

		<div class="jumbotron jumbotron-muted">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="well">
						<h2><span id="headline">Router Problem</span></h2>
						<div id="issue" class="font-smaller">
 							asdasd
						</div>
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col-lg-12">
					<p class="lead">We can help you to find anything to solve your problem <b><a href="<?= base_url()?>Knowledgebase/filter">Search again..</a></b>..</p>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="well-recommend">
						<p>Read another topic..</p>
						<ul id="Knowledgebase_recommend">
						  <?= Knowledgebase_recommend($this->uri->segment(3))?>
						</ul>  
					</div>
				</div>
			</div>

		</div>


	</section>
</div>


<script type="text/javascript">

	$(document).ready(function (){
		details();
	
	});

	function details()
	{
		var id= "<?= $this->uri->segment(3)?>"

		var data =  {
		                    'id':id,
		                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
		            }

        $.ajax({
                    url: '<?= base_url() ?>Knowledgebase/Knowledgebase_details',
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    beforeSend: function() {
                       
                    },
                    success: function(response){
                    	var id = response.id;
                    	var id_kb = response.id_kb;
                    	var headline = response.headline;
                    	var category = response.category;
                    	var topic = response.topic;

                    	$("#headline").html(headline);
                    	$("#issue").html(topic);

                    }
              });
	}
</script>


<style type="text/css">
	.jumbotron p {
	    margin-bottom: 15px;
	    
	    font-family: Arial, Helvetica, sans-serif;
    	font-size: 12px;
	}
</style>

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