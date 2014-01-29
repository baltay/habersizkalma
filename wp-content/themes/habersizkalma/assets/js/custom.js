jQuery(document).ready(function(){
	setTimeout(function(){
			jQuery(".flex-control-paging li a").mouseover(function(){
                 var activeSlide = 'false';
                 if (jQuery(this).hasClass('flex-active')){  
                    activeSlide = 'true';                       
                 }
                 if (activeSlide == 'false'){
                  	jQuery(this).trigger("click"); 
                 }
             });   
	},2000);


    jQuery('.btn-face-share').click(function() {
        var newShareTitle = jQuery(".post-title h1").text();
        var summaryShare = jQuery("meta[property='og:description']").attr("content");
        var img = jQuery("meta[property='og:image']").attr("content");
        //console.log(bigSpan2.attr("data-url"));
        window.open('https://www.facebook.com/sharer/sharer.php?m2w&s=100&p[title]=' + encodeURIComponent(newShareTitle) + '&p[summary]=' + encodeURIComponent(summaryShare) + '&p[url]=' + encodeURIComponent(window.location.href) + '&p[images][0]=' + encodeURIComponent(img), 'facebookShareDialog', 'width=650,height=450'); return false;
    });
   
});