/* main js file*/
jQuery(document).ready(function($) {
	$('a.menu-toggler').on("click",function(e){
			$('nav.header-menu').toggleClass('display');
			
	});	
});