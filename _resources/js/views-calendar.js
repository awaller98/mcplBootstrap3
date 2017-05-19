
$jq(document).ready(function() {
	/*
	 * 
	 * config bootstrap Datepicker
	 */
	  $jq('#datepicker.input-date').datepicker({
	     //   format: "M d, yyyy",
	        todayBtn: "linked",
	        clearBtn: true,
	        autoclose: true,
	        todayHighlight: true
	    });
	
	/*
	 * 
	 * Update the hidden "views" exposed date filter
	 */
	
	$jq('#date').change(function() {
	$jq('input:radio[name="defined_date"]').prop('checked', false);
	var date = $jq(this).val();
	 var from = date.split("/");
	/*var date    = new Date(from[2], from[0], from[1]);
	    yr      = date.getFullYear();
	    month   = date.getMonth() < 10 ? '0' + date.getMonth() : date.getMonth();
	    day     = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate();*/
	    
	    yr = from[2];
	   month = from[0];
	   day = from[1];
	    
	    if ($(this).val() == '') {
			newStartDate = '';
		 }	else {
			newStartDate = yr + '-' + month + '-' + day;
			}
	
		console.log(newStartDate);
			$jq("#edit-date-filter-value-date").val(newStartDate);
	  });

	$jq('input:radio[name="defined_date"]').change(function(){
	        if ($jq(this).is(':checked')) {
	  			var value = $(this).val();
	  			$jq('.datepicker .clear').trigger('click');
	  			$jq('#date').val(value); 
	  			
	  			
	  			var startDate = $jq('#date').val();
	 			var from = startDate.split("/");
				/*var date    = new Date(from[2], from[0], from[1]);
				console.log(date);
				    yr      = date.getFullYear();
				    month   = date.getMonth() < 10 ? '0' + date.getMonth() : date.getMonth();
				    day     = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate();*/
				    
				   yr = from[2];
				   month = from[0];
				   day = from[1];
	    			newStartDate = yr + '-' + month + '-' + day;
					console.log(newStartDate);
	  			$jq("#edit-date-filter-value-date").val(newStartDate); 
	  				  
	    }
	});
	
	$jq('#edit-keyword').attr('placeholder', 'Search for...')
	$jq('#edit-submit-calendar-new').attr('value', 'Find')
	

	$jq('#secondary select, input#edit-keyword').addClass('form-control');
	$jq('.date-views-filter-wrapper').parent('.views-widget').hide();
	
	$jq('.views-exposed-form input.form-submit').addClass('btn btn-primary');
	
	

	
	// Create the "clear Filters" button if it doesn't already exist	
	var clearButton = '<a  id="clearButton" style="margin-left:10px;" class=\"form-submit btn btn-default\">Clear filters</a>';
	
	if ($jq('#clearButton').length == 0){
	$jq('.views-exposed-form .form-submit').after(clearButton);  
	} 

	// Clear button - Set all filter values to default and submit the changes
	$jq('#views-exposed-form-calendar-new-page-1 #clearButton').click(function() {
	        
	       resetForm();
	        
	        $jq('#edit-submit-calendar-new').click();
	});

	// auto-submit filter changes
	$jq('#views-exposed-form-calendar-new-page-1 input, #views-exposed-form-calendar-new-page-1 select ').change(function() {
		$jq('input#edit-submit-calendar-new').click() ;  
	
	}); 
  
  // Clear the exposed filters on a clean page load with no get variables
	 getVars =  getUrlVars();
	 if ($jq.isEmptyObject(getVars)) {
	 		resetForm();
	 		console.log('form was reset');
 	} else {
 		resetForm();
 		console.log('the form was reset');
 		$jq('.views-exposed-form select#edit-lib option[value="'+getUrlVars()["lib"]+'"]').prop("selected", true);
 		$jq('.views-exposed-form select#edit-audience option[value="'+getUrlVars()["audience"]+'"]').prop("selected", true);
 		$jq('.views-exposed-form select#edit-et option[value="'+getUrlVars()["et"]+'"]').prop("selected", true);
 		if (!$jq.isEmptyObject(getUrlVars()["keyword"])) {
 			$jq('.views-exposed-form input#edit-keyword').val(unescape(getUrlVars()["keyword"]));
		}
 		//$jq('.views-exposed-form select#edit-audience option[value="'+getUrlVars()["audience"]+'"]').prop("selected", true);
 	}
  
  

  
  
});

// A function to clear the Exposed filters
function resetForm() {
  	$jq('.views-exposed-form select').val('All');		
    $jq('.views-exposed-form input:text').val('');
	$jq('.views-exposed-form input:radio').prop('checked', false);
	getTodayFormatted();
	
	$jq('.views-exposed-form #edit-date-filter-value-date').val(today);
  }
  
function getUrlVars() {
	var vars = {};
	var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
	vars[key] = value;
	});
	return vars;
}

function getTodayFormatted() {
	var d = new Date();

		var day = d.getDate()  < 10 ? '0' + d.getDate()  : d.getDate();
		
		var month = (d.getMonth() + 1) < 10 ? '0' + (d.getMonth() + 1) : (d.getMonth() + 1);
		
		var yr = d.getFullYear();

        today = yr + '-' + month + '-' + day;
}
