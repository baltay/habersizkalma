<aside class="sidebar three columns">
	<?php 
	
		##############################################################################
		# Article Sidebar
		##############################################################################
	
	 	?>
	<?php dynamic_sidebar('single'); ?>
	

	<div class="galleryCaption"></div>	
	<!-- Start Related Posts -->
	<?php global $post; 
		    $postId = $post->ID;
		    $query = get_blog_posts_related_by_taxonomy($post->ID,array(),10); ?>
	<?php if ($query->have_posts()) : ?>
		<div class="headline hide-on-print">
			<h2>
				<?php 
					if(get_the_author_meta('wp_user_level')==2){
						echo "YAZARIN DİĞER KÖŞE YAZILARI";
					} else{
						echo "İLGİLİ HABERLER";
					}
				?>
			</h2></div>
		<div class="row relatedposts hide-on-print">
		  <?php while ($query->have_posts()) : $query->the_post(); ?>             
		    <div class="rightreleated" style="width: 200px;margin: 0 auto;">
		      <article class="post" id="post-<?php the_ID(); ?>">
		        <div class="post-gallery">
		        		<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail('recent'); ?></a>
		        		<?php echo thb_DisplayImageTag(get_the_ID()); ?>
		        </div>
		        <div class="post-title"><h4><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h4></div>     
		      </article>
		    </div>
		    <?php endwhile; ?>
		</div>
	<?php endif; ?>
	<?php wp_reset_query(); ?>
	<!-- End Related Posts -->


	<?php if(get_post_meta($post->ID, 'minigallery', TRUE) == 'yes') { ?>
		<div class="widget cf widget_minigallery" rel="gallery">
			<h6 class="force"><?php _e( 'Mini Galeri', THB_THEME_NAME ); ?></h6>
		<?php 
				$attachments = get_post_meta($post->ID, 'pp_gallery_slider', TRUE);
				$attachment_array = explode(',', $attachments);
		?>
		<?php foreach ($attachment_array as $attachment) : ?>
		    <?php
		    		$attachmentmeta = get_post($attachment);
		        $src = wp_get_attachment_image_src($attachment, array(110, 80)); 
		        $image_url = wp_get_attachment_image_src($attachment,'full'); $image_url = $image_url[0];
		    ?>
        <a href="<?php echo $image_url; ?>" class="enlarge" title="<?php echo $attachmentmeta->post_excerpt; ?>"><img src="<?php echo $src[0]; ?>" /></a>
		<?php endforeach; ?>
		</div>
	<?php } ?>
</aside>