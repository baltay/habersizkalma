<?php get_header(); ?>
<div class="row">
<section class="nine columns">
  <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
  	<article <?php post_class('post'); ?> id="post-<?php the_ID(); ?>">
  		
		  <?php
		    // The following determines what the post format is and shows the correct file accordingly
		    $format = get_post_format();
		    if ($format) {
		    get_template_part( 'inc/postformats/'.$format );
		    } else {
		    get_template_part( 'inc/postformats/standard' );
		    }
		  ?>
		  <div class="post-title single">
		  	<aside><?php echo thb_DisplaySingleCategory(true); ?></aside>
		  	<h1><?php the_title(); ?></h1>
		  </div>
		  <aside class="post-meta">
		  	<ul>
		  		<!--
		  		
		  		-->
		  		<li>&nbsp; <?php echo get_the_date('F j, Y'); ?></li>
		  		<!-- Start Share -->
		  		<?php
		  			if(get_the_author_meta("wp_user_level")==2)
		  			{
						echo "<li><strong>". the_author_posts_link()."</strong></li>";
		  			};
		  		?>
		  	</ul>
		  	<aside id="sharethispost" class="sharethispost cf hide-on-print">
				<div class="btn-face-share"><a href="#">Facebook'ta Paylaş</a></div>
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style" style="height:200px;">
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal"></a>
				<a class="addthis_counter addthis_pill_style"></a>
				</div>
				<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
				<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5231852374d13ac5"></script>
				<!-- AddThis Button END -->

				<a href="#" class="sharenow"><?php _e( 'Share This Article', THB_THEME_NAME ); ?> <i class="fa fa-plus"></i></a>
			</aside>
			<!-- End Share -->
		  </aside>
		  <div class="post-content">
		  	<?php get_template_part( 'inc/postformats/post-meta' ); ?>
		  	<?php the_content(); ?>
		  	<?php if ( is_single()) { wp_link_pages(); } ?>
		  </div>
			  
  	</article>
  <?php endwhile; ?>
  	<?php get_template_part( 'inc/postformats/post-review' ); ?>
  <?php else : ?>
    <p><?php _e( 'Please add posts from your WordPress admin page.', THB_THEME_NAME ); ?></p>
  <?php endif; ?>
  	<?php get_template_part( 'inc/postformats/post-prevnext' ); ?>
  	<?php get_template_part( 'inc/postformats/post-related' ); ?>
  	<?php get_template_part( 'inc/postformats/post-endbox' ); ?>
  	<!-- Start #comments -->
  	<section id="comments" class="cf">
  	  <?php comments_template('', true ); ?>
  	</section>
  	<!-- End #comments -->
</section>
  <?php get_sidebar('single'); ?>
</div>
<?php get_footer(); ?>