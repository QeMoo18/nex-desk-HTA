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
		

		<div class="jumbotron jumbotron-muted">
		<div class="container">
		<div class="col-lg-6">
		<h2>Everything you need to know about Nex-Desk. Search Now!</h2>
		<p class="lead">We can help you to find anything to solve your problem..</p>

		<div class="panel panel-default">
		
		  <div class="panel-body">
		  	<form action="<?= base_url()?>Knowledgebase/result" method="get">
			  	<div class="row">
					<div class="col-lg-2">
						<label>Topic</label>
					</div>
					<div class="col-md-10">
						<input type="text" class="form-control" name="headline" id="headline" list="collection">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-2">
						<label>Category</label>
					</div>
					<div class="col-md-10">
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
				<br>
				<div class="row">
					<div class="col-md-8"></div>
					<div class="col-md-4">
						<button class="btn btn-primary btn-block">Submit</button>
					</div>	
				</div>
			</form>
		  </div>	
		</div>

		
		<br>
		<small>Any question you can contact directly  <a href="#!"><i class="fa fa-phone" aria-hidden="true"></i> 0129551380  </a> | <a href="#!"><i>(Muhammad Al Faiza)</i></a></small>
		</div>
		<div class="col-lg-6">
		    <img class="img-responsive" src="<?= base_url()?>asset/knowlegdebase.png"/>
		</div>
		</div>
		</div>


	</section>
</div>



<datalist id="collection">
<?= datalist_knowledgebase()?>
  <!-- <option value="Internet Explorer">
  <option value="Firefox">
  <option value="Chrome">
  <option value="Opera">
  <option value="Safari"> -->
</datalist>


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