<?php if (!is_page_template('template-home.php') && !is_page_template('template-home-style2.php') && !is_page_template('template-home-style3.php') && !is_404()) {  ?>
	<?php if(ot_get_option('breadcrumbs') != 'no') { ?>
	<!-- Start Breadcrumbs -->
	<div class="row">
		<div class="twelve columns">
			<div id="breadcrumbs">
				<?php thb_breadcrumb(); ?>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
<?php } ?>
<?php } ?>