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
   
});