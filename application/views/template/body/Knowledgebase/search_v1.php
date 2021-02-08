<script type="text/javascript" src="<?=base_url()?>asset_admin/bower_components/ckeditor/ckeditor.js"></script>



<div class="content-wrapper">
	<section class="content">
		<?= lookup_navbar(); ?> 
			
		<div class="container">
		    <h1>Knowledge Base Management	</h1>
		</div>

		<div class="jumbotron jumbotron-muted">
		<div class="container">
		<div class="col-lg-6">
		<h2>Everything you need to know about Nex-Desk. Search Now!</h2>
		<p class="lead">We can help you to find anything to solve your problem or <b><a href="<?= base_url()?>Knowledgebase/filter">Filter By Attribute</a></b>..</p>


		<form action="<?= base_url()?>Knowledgebase/result" method="get">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Write something.." list="browsers" id="headline" name="headline">
				<span class="input-group-btn">
				<input type="hidden" name="category" id="category">
				<button type="submit" class="btn btn-primary" type="button">Search Now </button>
				</span>
			</div>
		</form>
		
			<?= button_add_knowlegdebased() ?>

		
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



<datalist id="browsers">
<?= datalist_knowledgebase()?>
  <!-- <option value="Internet Explorer">
  <option value="Firefox">
  <option value="Chrome">
  <option value="Opera">
  <option value="Safari"> -->
</datalist>