<?php
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, "http://www.f5haber.com/ajanshaber/basbakan-erdogan-aygun-den-25-bin-lira-tazminat-haberi-4479018/"); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 

        $firstDiv = explode('<div class="haberMetni" itemprop="articleBody" >', $output);
       	$div = explode('<span class="haberKaynak">', $firstDiv[1]);
       	echo $div[0];
        curl_close($ch);  
?>