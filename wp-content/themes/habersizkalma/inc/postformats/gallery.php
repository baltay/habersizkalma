<?php $image_id = get_post_thumbnail_id();
			$image_url = wp_get_attachment_image_src($image_id,'full'); $image_url = $image_url[0]; ?>
<?php 
			$attachments = get_post_meta($post->ID, 'pp_gallery_slider', TRUE);
			$attachment_array = explode(',', $attachments);
			$caption_array = array();
			$imageIndexId = intval($_GET['imgId']);
	?>



<div class="galleryOldSlider">
		<?php 
			$imageArr = wp_get_attachment_image_src($attachment_array[$imageIndexId],'full') ;
			if(count($attachment_array)!=$imageIndexId+1){
				echo '<a href="'.get_post_permalink().'&imgId='.($imageIndexId+1).'">';				
				echo "<img src='".$imageArr[0]."' />";
				echo '</a>';
			}else{
				$postId = $post->ID;
        		$query = get_blog_posts_related_by_category($post->ID);
        		if ($query->have_posts()){
        			$nextid = $query->posts[0]->ID;
        			echo '<a href="'.get_permalink($nextid).'">';
					echo "<img src='".$imageArr[0]."' />";
					echo '</a>';
        		}
				
			}
		?>
	<div class="galleryNumber">
		<ul>
			<?php 
				$c=1;
				foreach ($attachment_array as $atKey=>$atVal)
				{
					if($imageIndexId==$atKey)
					{
						echo "<li class='active'><a href='".get_post_permalink()."&imgId=".$atKey."'>".($atKey+1)."</a></li>";
					}
					else{
						echo "<li><a href='".get_post_permalink()."&imgId=".$atKey."'>".($atKey+1)."</a></li>";
					}
					
					$c++;					
					if($c==25){
						$c=0;
						echo "<br><br>";
					}
				}
				
			?>
		</ul>
	</div>
</div>

