<aside class="single-meta">
	<!--
	<div class="author">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 70); ?>
		<strong><?php the_author_posts_link(); ?></strong>
		<p><?php the_author_meta('description'); ?></p>
	</div>
	-->
	<!--
	<ul class="meta-list">
		<?php if (ot_get_option('disablelike') == 'no') { ?>
		<li><?php echo thb_printLikes(get_the_ID()); ?> <?php _e( 'Likes', THB_THEME_NAME ); ?></li>
		<?php } ?>
		<li><?php comments_popup_link('<i class="fa fa-comment-o"></i> 0 Comments', '<i class="fa fa-comment-o"></i> 1 Comment', '<i class="fa fa-comment-o"></i> % Comments', 'postcommentcount', '<i class="fa fa-comment-o"></i> Comments Disabled'); ?></li>
		<li><a href="#" onclick="window.print(); return false;"><i class="fa fa-print"></i> <?php _e( 'Print', THB_THEME_NAME ); ?></a></li>
	</ul>
	-->

	
</aside>