<?php
	define( 'WP_USE_THEMES', false );

	require( '../wp-load.php' );
	//require( '../wp-includes/deprecated.php' );
	//require( '../wp-settings.php' );
	$sitePrefix = 'http://www.f5haber.com/rss/';
	$siteSuffix = '_haber.xml';

	//$cats = array('gundem','ekonomi','spor','magazin','teknoloji','yasam','dunya','siyaset','saglik','kultur_sanat');
	$cats = array('gundem','ekonomi','spor','magazin','teknoloji','yasam','dunya','siyaset','saglik','kultur_sanat');
	
	foreach ($cats as $c) {
		echo '  <a href="crawler.php?cat='.$c.'">'.$c.'</a>  |';
	}

	echo '</br>';
	
	if(isset($_GET['cat']))
	{

		echo '<table>';
		$cat = $_GET['cat'];

		
		$sxml = simplexml_load_file($sitePrefix . $cat . $siteSuffix);
		foreach ($sxml->channel->item as $item) {
			$imageUrl = str_replace('http://img.f5haber.com/s/200x140/2/', '', $item->img);
			if($imageUrl[0]=="/")
				$imageUrl[0] = "";

			$imageUrl = str_replace('http://', '', $imageUrl);


			echo '<tr data-guid="'.$item->guid.'">';
			echo '<td><a class="image" href="http://'.str_replace('http://img.f5haber.com/s/200x140/2/', '', $item->img).'" target="_blank"><img src="http://'.$imageUrl.'" height="140" width="200" /></a></td>';
			echo '<td class="category">'.$item->category.'</td>';
			echo '<td class="title"><a href="'.$item->link.'">'.$item->title.'</a></td>';
			echo '<td class="author">'.$item->author.'</td>';
			echo '<td class="pubdate">'.$item->pubDate.'</td>';
	        $ch = curl_init(); 
	        curl_setopt($ch, CURLOPT_URL, $item->link); 
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	        $output = curl_exec($ch); 

	        $firstDiv = explode('<div class="haberMetni" itemprop="articleBody" >', $output);
	        if(count($firstDiv)>1)
	        {
	        	$div = explode('<span class="haberKaynak">', $firstDiv[1]);
	       		echo '<td><textarea class="content" cols="50" name="content" id="content-'.$item->guid.'">'.$div[0].'</textarea>
	       		<input type="text" placeholder="tags" class="tags" /></td>';	
	        }else{
	        	echo '<td><textarea class="content" id="content-'.$item->guid.'"></textarea></td>';		
	        }

	        $select_cats = wp_dropdown_categories( array( 'echo' => 0 ) );
			$select_cats = str_replace( "name='cat' id=", "name='cat[]' multiple='multiple' style='height:250px;' id=", $select_cats );
	        echo '<td>'.$select_cats.'</td>';
	    	echo '<td><a href="#" onclick="addToSite(\''.$item->guid.'\')">Siteye Ekle</a></td>';	
	        curl_close($ch);  
			echo '<tr>';
		}
		echo '</table>';


	}
	

	
?>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/tinymce/tinymce.min.js"></script>
<script src="js/crawler.js"></script>
