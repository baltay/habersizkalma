<?php $image_id = get_post_thumbnail_id();
			$image_url = wp_get_attachment_image_src($image_id,'full'); $image_url = $image_url[0]; ?>
<div class="post-gallery nolink">
	<?php if(is_single()) {
					the_post_thumbnail('single',array('style' => 'width: 60%;')); 
				} else { 
					the_post_thumbnail('blog',array('style' => 'width: 60%;'));  
				}?>
</div>