<?php
	set_time_limit (0);

	$sitePrefix = 'http://www.f5haber.com/rss/';
	$siteSuffix = '_haber.xml';

	//$cats = array('gundem','ekonomi','spor','magazin','teknoloji','yasam','dunya','siyaset','saglik','kultur_sanat');
	$cats = array('gundem','ekonomi','spor','magazin');
	
	echo '<table>';
	foreach ($cats as $cat) {
		
		$sxml = simplexml_load_file($sitePrefix . $cat . $siteSuffix);
		foreach ($sxml->channel->item as $item) {
			echo '<tr>';
			echo '<td><a href="http://'.str_replace('http://img.f5haber.com/s/200x140/2/', '', $item->img).'" target="_blank"><img src="http://'.str_replace('http://img.f5haber.com/s/200x140/2/', '', $item->img).'" height="140" width="200" /></a></td>';
			echo '<td>'.$item->category.'</td>';
			echo '<td><a href="'.$item->link.'">'.$item->title.'</a></td>';
			echo '<td>'.$item->author.'</td>';
	        $ch = curl_init(); 
	        curl_setopt($ch, CURLOPT_URL, $item->link); 
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	        $output = curl_exec($ch); 

	        $firstDiv = explode('<div class="haberMetni" itemprop="articleBody" >', $output);
	        if(count($firstDiv)>1)
	        {
	        	$div = explode('<span class="haberKaynak">', $firstDiv[1]);
	       		echo '<td><textarea cols="50" style="height:200px;">'.$div[0].'</textarea></td>';	
	        }else{
	        	echo '<td><textarea></textarea></td>';		
	        }
	        curl_close($ch);  
			echo '<td><input type="text" placeholder="tags" /></td>';
			echo '<tr>';
		}
	}
	echo '</table>';

	
?>