/*
 * 
 * Disable top level menu items in the main menu for better compatibility with touch devices.
 * 
 * 
 */
function is_touch_device() {
  /*return 'ontouchstart' in window // works on most browsers 
      || 'onmsgesturechange' in window; // works on ie10*/
   var userAg = navigator.userAgent; 
   return true == (("ontouchstart" in window || window.DocumentTouch && document instanceof DocumentTouch)&& !((userAg.indexOf("Chrome") != -1) && ((navigator.appVersion.indexOf("Win")!=-1) || (navigator.appVersion.indexOf("Mac")!=-1))));  
};

$(document).ready(function() { 
	
	/* If mobile browser, prevent click on parent nav item from redirecting to URL */
	if(is_touch_device()) {	

		$('#om-menu-main-1 .om-leaf > a').attr('href' ,'#');
		/*$('#om-menu-main-1 li h3').each(function (index, elem) {
			/* Option 1: Use this to modify the href on the <a> to # */
			/*$(elem).prev('a').attr('href' ,'#');*/	
			
			/* OR Option 2: Use this to keep the href on the <a> intact but prevent the default action */
			/*$(elem).prev('a').click(function(event) {
  				event.preventDefault();
			});
		});*/
	}
	
});