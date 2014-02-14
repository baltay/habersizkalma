<?php 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

define( 'WP_USE_THEMES', false );  
require( '../wp-blog-header.php' ); # adjust your path
	// Initialize the post ID to -1. This indicates no action has been taken.
$post_id = -1;

// Setup the author, slug, and title for the post
$author_id 	= 1;
$title 		=	$_POST['title'];
$content 	=	$_POST['content'];
$imageUrl 	=	$_POST['image'];
$categoryIds=	$_POST['categoryIds'];
$tags 		=	$_POST['tags'];
// If the page doesn't already exist, then create it
if( get_page_by_title( $title ) == null ) {

	// Set the page ID so that we know the page was created successfully
	$post_id = wp_insert_post(
		array(
			'comment_status'	=>	'closed',
			'ping_status'		=>	'closed',
			'post_author'		=>	$author_id,
			//'post_name'		=>	wp_unique_post_slug( sanitize_title( $title ) ),
			'post_title'		=>	wp_strip_all_tags($title),
			'post_content'		=> $content,
			'post_status'		=>	'draft', //'publish', //draft
			'post_type'		=>	'post'
		)
	);

	$date = getdate();
	$file = "../wp-content/uploads/crawl/".$date["0"].basename($imageUrl);
	file_put_contents($file, file_get_contents($imageUrl));
	//add_post_meta($post_id, '_wp_attached_file', "crawl/".$date["0"].basename($imageUrl));
	$wp_filetype = wp_check_filetype( basename($file), null );
	$attachment = array(
	    'post_mime_type' => $wp_filetype['type'],
	    'post_title'     => sanitize_file_name( basename($file) ),
	    'post_content'   => '',
	    'post_status'    => 'inherit'
	);
	
	$attach_id = wp_insert_attachment( $attachment, $file, $post_id );
	
	require_once(ABSPATH . 'wp-admin/includes/image.php');

	$attach_data = wp_generate_attachment_metadata( $attach_id, $file );

	wp_update_attachment_metadata( $attach_id, $attach_data );

	set_post_thumbnail( $post_id, $attach_id );

	$cats = explode(',', $categoryIds);
	foreach($cats as $key => $val){
	    if(is_numeric($val)){
	        $cats[$key] = (int) $val;
	    }
	}


	wp_set_object_terms( $post_id, $cats, 'category');
	
	wp_set_object_terms( $post_id, $tags, 'post_tag', true );
	
	echo "OK";
// Otherwise, we'll stop and set a flag
} else {

    // Arbitrarily use -2 to indicate that the page with the title already exists
    $post_id = -2;
    echo "EXISTS";
} // end if
 ?>