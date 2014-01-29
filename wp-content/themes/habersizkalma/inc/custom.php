<?php

function get_tag_ID($tag_name) {
	$tag = get_term_by('name', $tag_name, 'post_tag');
	if ($tag) {
	return $tag->term_id;
	} else {
	return 0;
	}
}

?>