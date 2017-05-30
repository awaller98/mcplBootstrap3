/*
	
	Project Name Global Javascript Functions
	By  - ISITE Design

*/

// jquery no conflict. use $j or jQuery outside of ready function
//var $j = jQuery.noConflict(); 

// jQuery document ready
jQuery(function($) {

	// JS enabled
	$('html').addClass('js');
	
	// Few setups for IE6
	if(document.all){
		//add class to drop downs and buttons 
	    $('#nav li, button').hover(
			function() { $(this).addClass('over'); },
			function() { $(this).removeClass('over'); }
	    );
	}// if document.all
	
	// we need a span for the active page in the left nav and drupal is being fussy. 
	$('#nav-sub .active').prepend('<span></span>');
	
	/* login pull down*/
	$('#login-global').hide();
	$('#sign-in-link').click(function() { 
		if($('#footer+#login-global').length > 0){
			$('#login-global').prependTo("body");
		}
		$('#login-global').slideToggle(500); 
		$('#card_number_id').focus();
		return false;
	});

	//list-thumb-switcher
	$('.list-thumb-switcher-REMOVED-FOR-NOW').each(function() {
		var toggler = '<ul class="list-thumb-toggler"><li class="list-view"><a href="#">List View</a></li><li class="thumb-view"><a href="#">Thumbnail View</a></li></ul>',
			$wrap = $(this);
			
			$wrap.prepend(toggler);
			
			$('.list-thumb-toggler a').click(function() {
				if ($(this).parent('li').attr('class') == "list-view") {
					$wrap.removeClass('thumb-view').addClass('list-view');
				} else{
					$wrap.addClass('thumb-view').removeClass('list-view');
				}
				
				return false;
			});
	});
	
	//search box label, populates title attribute as a label
	$('input[title]').each(function() {
	  if($(this).val() === '') {
	   $(this).val($(this).attr('title')); 
	  }
	  
	  $(this).focus(function() {
	   if($(this).val() === $(this).attr('title')) {
		$(this).val('').addClass('focused'); 
	   }
	  });
	  
	  $(this).blur(function() {
	   if($(this).val() === '') {
		$(this).val($(this).attr('title')).removeClass('focused'); 
	   }
	  });
	 });
	
});// document ready


// application logic
function mediaHovers(){
	/* temp action */
	$j(".media-listing a img").hover(
	function(){
		$j(this).parent('a').next('.media-meta').show();
	},	
	function(){
		$j(this).parent('a').next('.media-meta').hide();		
	}
	);
}

// jQuery plugins


// etc


// clean console.log
function cl(){ if(window.console&&window.console.firebug) { var args = [].splice.call(arguments,0); console.log(args.join(" ")); } }//cl()
// example: cl("If you use cl() instead of console.log(), it won't break IE when you forget to take it out.");


// IE6 fixes
// make sure IE has the abbr and acronym tag
if(document.all){
	document.createElement("abbr");
	document.createElement("acronym");
}
// prevent IE6 flicker
try { document.execCommand('BackgroundImageCache', false, true); } catch(e) {}