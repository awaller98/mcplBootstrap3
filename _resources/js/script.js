$(document).ready(function() {

  	
  	/*
  	 * 
  	 * Animate plus / minus icons for accordian menus
  	 */
  	$('.collapse').on('show.bs.collapse', function(){
		$(this).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-minus");
		}).on('hide.bs.collapse', function(){
		$(this).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("glyphicon-plus");
		});
	
	// Prevent Double-click on webform submit buttons
	$(".webform-client-form").submit(function (e) {
		$("#edit-actions input#edit-submit").attr("disabled", true);
		return true;
	});
	  	
   // Tab box functionality for search box - AMW
	var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE " );
    var msie11 = ua.indexOf("Trident/" );
    
	$('ul.tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
    	
    	if (msie > 0 || msie11 > 0) // If is Internet Explorer, don't focus, it breaks the placeholder text
    		{
    			return;
    			console.log("IE");
    		}
  		else {$('.current input[name=q]').focus();}
	})
	if (msie > 0 || msie11 > 0) // If is Internet Explorer, don't focus, it breaks the placeholder text
    		{
    			return;
    		}
  		else {$('.current input[name=q]').focus();}

});

