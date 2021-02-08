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

<div class="row">
	<div class="content-wrapper">
		<section class="content">
			<?= lookup_navbar(); ?> 
				

			<div class="jumbotron jumbotron-muted">
			<div class="container">
			<div class="col-lg-6">
			<h2>Everything you need to know about Appku. Search Now!</h2>
			<p class="lead">We can help you to find anything to solve your problem or <b><a href="<?= base_url()?>Knowledgebase/filter">Filter By Attribute</a></b>..</p>


			<form action="<?= base_url()?>Knowledgebase/result" method="get">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Write something.." list="browsers" id="headline" name="headline">
					<span class="input-group-btn">
					<input type="hidden" name="category" id="category">
					<button type="submit" class="btn btn-primary" type="button" style="height: 27px;">Search Now </button>
					</span>
				</div>
			</form>
			

			
			
			</div>
			<div class="col-lg-6">
			    <img class="img-responsive" src="<?= base_url()?>asset/knowlegdebase.png"/>
			    

			</div>
			</div>
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