<?php $image_id = get_post_thumbnail_id();
			$image_url = wp_get_attachment_image_src($image_id,'full'); $image_url = $image_url[0]; ?>
<?php 
			$attachments = get_post_meta($post->ID, 'pp_gallery_slider', TRUE);
			$attachment_array = explode(',', $attachments);
			$caption_array = array();
			$imageIndexId = intval($_GET['imgId']);
	?>



<div class="galleryOldSlider">
	<a href='<?php echo get_post_permalink()."&imgId=".($imageIndexId+1) ?>'>
		<img src="<?php echo wp_get_attachment_image_src($attachment_array[$imageIndexId],'full')[0]; ?>"/>
	</a>
	<div class="galleryNumber">
		<ul>
			<?php 
				foreach ($attachment_array as $atKey=>$atVal){
					if($imageIndexId==$atKey)
					{
						echo "<li class='active'><a href='".get_post_permalink()."&imgId=".$atKey."'>".($atKey+1)."</a></li>";
					}else{
						echo "<li><a href='".get_post_permalink()."&imgId=".$atKey."'>".($atKey+1)."</a></li>";
					}
				}
				
			?>
		</ul>
	</div>
</div>

<!--
<div class="post-gallery flex-start flex galleryFlex" data-after="afterCallback" data-startat="<?php echo intval($_GET['i'])==0 ? 0 : intval($_GET['i'])-1; ?>">
	<ul class="slides">
	
	<?php foreach ($attachment_array as $attachment) : ?>
	    
	    <?php
	    		if(is_single()) {
	    			$src = wp_get_attachment_image_src( $attachment, 'single');
					} else {
	        	$src = wp_get_attachment_image_src( $attachment, 'blog'); 
	        }
	        $image_url = wp_get_attachment_image_src($attachment,'full'); $image_url = $image_url[0];
	        array_push($caption_array,get_post_field('post_excerpt', $attachment));
	    ?>
	    <li>
	        <img
	        src="<?php echo $src[0]; ?>" 
	        />
	    </li>
	<?php endforeach; ?>
	</ul>
</div>
<script type="text/javascript">
	jQuery(function(){
		var indexIsDefined = false;
		jQuery.each(window.location.search.split('&'),function(i,x){
			if(x.replace(/=[\d+]/g,"")=='i'){
				indexIsDefined = true;
			}
		});
		if(!indexIsDefined)
		{
			var newUrl = window.location.origin + window.location.pathname + window.location.search + "?gallery=1&i=1";
			window.history.pushState({"html":"","pageTitle":"Resim"},"title", newUrl);
			setCaption(captions[0]);
		}else
		{
			setCaption(captions[<?php echo intval($_GET['i'])-1 ?>]);
		}


	})
	window.slideImages = '<?php echo $attachments ?>'.split(',');
	var captions = <?php echo json_encode($caption_array); ?>;
	function afterCallback( e ){
		var newUrl = window.location.origin + window.location.pathname + window.location.search.replace(/i=\d+/g, "i=" + (parseInt(e.currentSlide)+1));
		setCaption(captions[e.currentSlide]);
	    window.history.pushState({"html":"","pageTitle":"Resim"},"title", newUrl);
	}

	function setCaption(text)
	{
		jQuery("aside.sidebar .galleryCaption").html('<h4>' + text + '</h4>');
	}
</script>
-->
