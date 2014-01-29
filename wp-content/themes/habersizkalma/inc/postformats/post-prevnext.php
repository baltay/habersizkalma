
<!-- Start Previous / Next Post -->

<div class="fb-comments" data-href="<?php echo add_query_arg( $wp->query_string, '', home_url( $wp->request ) ) ?>" data-numposts="5" data-colorscheme="light" width="950"></div>
<?php if(has_tag()) { ?>
	<div class="widget cf widget_tag_cloud">
		<h6 class="force"><?php _e( 'Etiketler', THB_THEME_NAME ); ?></h6>
		<?php $posttags = get_the_tags();
		if ($posttags) {
			foreach($posttags as $tag) {
				echo '<a href="'. get_tag_link($tag->term_id).'" class="tag-link">' . $tag->name . '</a>';
			}
		} ?>
	</div>
<?php } ?>

<?php
	if(get_post_format()!= "gallery" && get_post_format()!="video") 
	{
		$prev_post = get_adjacent_post(false, '', true);
	
		if(!empty($prev_post)) {
			$excerpt = $prev_post->post_content;
			$previd = $prev_post->ID;
			$thumb = get_the_post_thumbnail($previd, 'slider');
			
			echo '<div class="post post-navi hide-on-print prev"><div class="post-gallery">'.$thumb.'<div class="overlay"></div></div><span class="post-prev">Önceki Haber</span><div class="post-title"><h2><a href="' . get_permalink($previd) . '" title="' . $prev_post->post_title . '">' . ShortenText($prev_post->post_title, 50). '</a></h2></div></div>'; 
		}

		$next_post = get_adjacent_post(false, '', false);
		
		if(!empty($next_post)) {
			$excerptnext = $next_post->post_content;
			$nextid = $next_post->ID;
			$thumb = get_the_post_thumbnail($nextid, 'slider');
			
			echo '<div class="post post-navi hide-on-print next"><div class="post-gallery">'.$thumb.'<div class="overlay"></div></div><span class="post-next">Sonraki Haber</span><div class="post-title"><h2><a href="' . get_permalink($nextid) . '" title="' . $next_post->post_title . '">' . ShortenText($next_post->post_title, 50). '</a></h2></div></div>'; 
		}
	}
	
?>
<?php wp_reset_query(); ?>
<!-- End Previous / Next Post -->