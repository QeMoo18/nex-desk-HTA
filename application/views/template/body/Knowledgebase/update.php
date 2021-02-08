<div class="pageheader hidden-xs">
    <h3><i class="fa fa-search"></i> Knowledge Base Management </h3>
    <div class="breadcrumb-wrapper">
        <span class="label" style="padding-right: 0px;"><i class="fa fa-cog" aria-hidden="true" style="border: 2px solid #f2f7f8;padding-right: 0px;"></i></span>
        <ol class="breadcrumb">
            <li> <a href="<?=base_url()?>Knowledgebase/form"> Add Knowledge Base </a> </li>
            <li> <a href="<?=base_url()?>Knowledgebase/search"> Search Knowledge Base </a> </li>
        </ol>
    </div>
</div>


<script type="text/javascript" src="<?=base_url()?>asset_admin/bower_components/ckeditor/ckeditor.js"></script>

<div class="content-wrapper">
<section class="content">
	<div class="row">


		<div class="col-md-12">

			<div class="box box-success">
	          <div class="box-header with-border">
	            <h3 class="box-title"> <b>Edit Topic/Issue</b> </h3>
	          </div>
	          <div class="box-body">


	          			<form action="<?= base_url()?>Knowledgebase/update_data/<?= $this->uri->segment(3)?>" method="post">
				          	<div class="row">
								<div class="form-group col-md-3">
					              <label for="exampleInputEmail1">Headline Knowledge</label>
					              <input type='text' class='form-control' name='headline' id='headline'> 
					            </div>
								<div class="form-group col-md-3">
					              <label for="exampleInputEmail1">Category</label>
					              <select class="form-control" name="category" id="category">
					              	<option value="">--Select Category--</option>
					              	<option value="Article">Article</option>
					              	<option value="Tutorial">Tutorial</option>
					              	<option value="Computer">Computer</option>
					              	<option value="Hardware">Hardware</option>
					              	<option value="Software">Software</option>
					              	<option value="Network">Network</option>
					              	<option value="Technical">Technical</option>
					              	<option value="Management">Management</option>
					              	<option value="Other">Other</option>
					              </select>
					            </div>

					        </div>

					        <div class="row">
								<div class="RichTextField col-md-12">
				                  <label for="exampleInputEmail1">Contain (<i>Write something issue or topic..</i>)</label>
				                  <!-- <textarea rows="4" class='form-control' name='tp_text' id='tp_text'> </textarea>  -->

				                  <textarea class="ckeditor" name="html_link_content" id="ckedtor" placeholder=""></textarea>
				                </div>
					        </div>
					        <input type="hidden" name="id_update" id='id_update'>
					        <hr>
					        <div class="row" style="padding-bottom: 30px;">
					        	<div class="col-md-10"></div>
					            <div class="form-group col-md-2">
					            	<br>
					            	<button type="submit" class="btn btn-primary btn-block" onclick="submit();">Submit</button>
					            </div>
					        </div>
					    </form>

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

                    	$("#id_update").val(id);
                    	$("#headline").val(headline);
                    	$("#category").val(category);
                    	//$("#topic").val(topic);
                    	var editor = CKEDITOR.instances['ckedtor'];
                    	editor.setData(topic);

                    }
              });
	}
</script>


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