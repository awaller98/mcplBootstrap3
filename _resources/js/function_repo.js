/*

	ISITE Function Library
	
	Don't use this file as is. Take the parts you want and either paste into your global.js	or
	create a separate script file if need be. Including in global.js is likely the better solution.

	Seriously. Don't use this whole file. But add to it as you see fit.

	Three parts:
	
		1. @jQuery snippets and plugins
			
			- @getScript dev_utils
			- @inputClear Plugin
			- @inputSetter Plugin -- inputClear using the label as value + options
			- @validateinputsetter -- validatation extension for use with inputSetter
			- @minHeight -- $.support.minHeight extension plugin
			- @charactersRemaining Plugin
			- @breakingNonSpace Plugin
			- @external -- open external links not on current domain in new window
			- @printer -- empower print link - fire browser print dialog
			- @sitemapexpander -- expand/collapse uls and trees and such with an added button for doing it
			- @tableHovers plugin -- makes row and column hovering on tables
			- @tabs -- generic tab style nav
			- @shuffler -- shuffle the contents of a container to fake ajax/db interactions
			- @changeText -- update text somewhere else.
			- @or -- $("something").or("default").dothischain()
			- @accessibilityReset -- remove all the image replacement if user has images or colors disabled in browser
			- @maxHeight -- get the max height of a set of elements
			- @faq -- basic expand/collapse dl
			- @scoundrels -- email deobfuscation from ROT13

		2. @Misc. useful both with or without jQuery
		
			- @cookie functions
			- @flicker -- prevent ie6 flicker background
			- @remotefileload -- load files in IE without an ajax request, ex: bgiframe loading
			- @isValidEmailAddress -- email validation
			
		3. @non-jQuery related items
		
			- @DOMutils
			- @getElementsByClass
			- @toggle on/off
			- @insertAfter
			- @inArray
			- @document.ready

*/


// 1. @jQuery -------------------------------------------------------------------------------------------------


// @getScript
// external holder of all things dev utilizeable. remove for production
// this is a nice bit for development or testing things without actually adding a script tag to the HTML head element
$.getScript("_resources/js/dev_utils.js",function(){ /* stuff to do once this is loaded, call a function in it for example */ });
// end getScript


/*
	
	@inputClear
	apply automatic input clearing to the search input - add as needed
	$("#searchform input").inputClear();

*/
jQuery.fn.inputClear = function() {
	return this.focus(function() {
		if( this.value == this.defaultValue ) {
			this.value = "";
		}
	}).blur(function() {
		if( !this.value.length ) {
			this.value = this.defaultValue;
		}
	});
};

// end inputClear


/*

	12.19.08 - pdf
	
	@inputSetter
	Input Setter
	pull label and insert as field. clear with click.	
	optional lower param if == 1, string toLowerCase	

	ex: $("#sitesearch input").inputSetter(1); // makes default text lowercase
		$("#sitesearch input").inputSetter(); // no lowercasing

	see custom validation for jquery.validation.js below

*/

jQuery.fn.inputSetter = function(lower) {	
	return this.each(function() {
		var $input = jQuery(this);
		var $label = jQuery("label[for='"+$input.attr("id")+"']");
		var labeltext = lower && lower==1 ? $label.text().toLowerCase() : $label.text();
		$label.hide();	
		$input.val(labeltext);		
		$input.focus(function() { if (this.value == labeltext) { this.value = ""; }	})
			  .blur(function() { if (!this.value.length) { this.value = labeltext; } });		
	});
};

// end inputSetter


// @validateinputsetter
// custom validation method for jquery.validation.js. use with inputSetter to validate fields as required but not equal to the label (default value)
// may need to change where to look for the label depending on particular html
jQuery.validator.addMethod("notEqualTo", function(value, element, param) {
	return $(element).val()!=$(element).prev("label").text();
}, "error");

// end validation


/*

	@minHeight
	03.10.09 - pdf
	
	Extend $.support to test for minHeight
	
	Seems to be working. Be sure to test in the required browsers just to be sure.
	
	returns boolean
	
	Usage:
	$.support.minHeight();
	
	Note that is slightly different than the other $.support objects which do not require the ().

*/

jQuery.extend(jQuery.support, {
	minHeight : function() {
		var id = "minheightsupport" + (new Date).getTime();
		$("<div></div>").attr("id",id).css({height:"1px",minHeight:"2px",overflow:"hidden",border:"none",padding:"0",margin:"0"}).appendTo("body");
		var correctheight = document.getElementById(id).offsetHeight==2;
		$("#"+id).remove();
		return correctheight;
	}
});

//. end support.minHeight



/*
	
	@charactersRemaining jQuery Plugin
	
	7.7.08 - pdf
	
	xtof wrote some character counting codes for QZ. Here's a plugin version of it.

	This attaches a count-down style character counter to any text area. There can be any number of 
	these on a page as long as they are all uniquely id'd (which is as it should be). The "for" 
	attribute must be specified, and the function takes the max limit information from the label -
	place it within the label, in a span, like this: 
	
	<label class="charactersremaining" for="mytextareaid"><span>250</span> characters remaining</label>

	in your js:
	
	$(".charactersremaining").charactersRemaining();
	
	Note: an input/textarea can have more than one label. So the real label can be used for real labelness, 
	plus a second label for character counting

*/

jQuery.fn.charactersRemaining = function() {
	
    // prevent elem has no properties error
    if (this.length === 0) { return(this); }	
	
	function cr($obj) {
		var counter = {			
			$target	 	: $("#"+$obj.attr('for')),
			$span		: $obj.find("span:first"),
			maxvalue 	: $obj.children('span:first').text(),
			remaining	: null,
			
			init : function() {
				counter.remaining = counter.maxvalue - counter.$target.val().length;
				counter.$span.text(counter.remaining);
				counter.$target.bind("keyup keydown",counter.tally);			
			},
			
			tally : function() {								
				if (counter.$target.val().length > counter.maxvalue) { 
					counter.$target.val(counter.$target.val().substring(0, counter.maxvalue));
				}
				counter.$span.text(counter.maxvalue - counter.$target.val().length);				
			}			
		};
		// init the counter
		counter.init($obj);
	};	
	// return jquery - create new cr instance
	return this.each(function() {
		new cr(jQuery(this));		
	});		
};

// end charactersRemaining



/*
	
	@breakingNonSpace
	
	Careful -- this seems broken with the latest jQuery...
	
	10.03.08 - pdf
	
	Breaking Non-Space
	
	Insert either &#8203; character or <wbr> tag for < IE7 to allow line
	break in the middle of email address, url, etc.
	
	apply bnsp to choosen elements.
	takes optional array of characters to break at which replaces the defaults,
	just be careful of regex special characters: $("a").bnsp(["$","domain"]);
	$(".bnsp a").bnsp();
	$(".bnsp li").bnsp(["sis","best","name"]);

*/

jQuery.fn.bnsp = function(options) {	
	// if array of characters, use it. else use default set.
	var c = options || ["@","/"];	
	// set bnsp entity based on browser support
	var b = jQuery.browser.msie && jQuery.browser.version < 7 ? "<wbr>" : "&#8203;";	
	// loop and return
	return this.each(function() {		
		var $this = jQuery(this); // store $(this) for use inside another function		
		// loop through each item in character array
		jQuery.each(c, function() {
			var rx = new RegExp(this,'g'); // create new regex object with current character
			$this.html($this.html().replace(rx,this+b)); // replace character with itself + nbsp entity
		}); // end array loop		
	});// end return
}; // end bnsp

// end breakingNonSpace



// @external
// External link popper	
// checks href against current domain. If not matching and href contains http://, target blank it

$('a[href^=http://]').not('[href*='+window.location.host+']').attr('target','_blank');

// end External link popper



// @printer
// empower print
$("a.print").click(function(){ window.print(); return false; });



// @sitemapexpander
// 07.01.09 pdf
// expand/collapse ul tree. nice for sitemappy situations. See example here:
// http://fed.isitedesign.us/content/pacificorp/pacificpower/ut-13.html
// Two parts:

// in yer document.ready():
enableTree("div.sitemap ul");

// elsewhere with all your program logic/functions:
// create open/close tree. receives ul.
var enableTree = function(el) {

	// hide children and set up css
	$(el).addClass("expander").find("li li ul").hide();
	
	// insert the button to open/close and attach click event
	$("li li",el).each(function(){                                                                                                          
		if($("li",this).length>0) {
			$(this).prepend('<a class="btn" href="#">+</a>');
			$("a.btn",this).click(function(){                                                                                                                                                     
				var textinsert = $(this).text() == "+" ? "-" : "+";
				$(this).text(textinsert).toggleClass("open").parent("li").find("ul:first").slideToggle("fast");                                                                
				return false;                                       
			});
		}              
	});           
};




// @tableHovers Plugin
// 07.13.09 pdf
// makes row and column hovering for tables
// usage: $('table').tableHovers();
// all the functions are public so can be customized. bad?

(function($) {

	// plugin definition
	$.fn.tableHovers = function(options) {				
		// return and iterate		
		return this.each(function() {			
			if(this.tagName == "TABLE") {								  
				// row hover
				$('tbody tr',this).bind('mouseenter mouseleave', $.fn.tableHovers.rowHover);				
				// row focus
				$('tbody th a',this).bind('focus blur', $.fn.tableHovers.rowFocus); 				
				// column hover
				$('td,th',this).bind('mouseenter', $.fn.tableHovers.columnHover); 			
				// clear table
				$(this).bind('mouseleave', $.fn.tableHovers.clearTable);
				$('tbody th',this).bind('mouseenter', $.fn.tableHovers.clearTable);								  
			}			
		});	
	};
	
	$.fn.tableHovers.cache = {};
	
	$.fn.tableHovers.rowHover = function(e) {		
		$(this)[((e.type == 'mouseenter') ? 'add' : 'remove') + 'Class']('over');		
	};	
	
	$.fn.tableHovers.rowFocus = function(e) {
		$(this).parents('tr')[((e.type == 'focus') ? 'add' : 'remove') + 'Class' ]('over');
	};

	$.fn.tableHovers.columnHover = function(e) {
		var $this 	= $(this),
			$tr 	= $this.parents('tr'),
			$table 	= $this.parents('table'),
			td_i 	= $('td,th',$tr).index($this),
			table_i = $('table',$("body")).index($table);
		if($.fn.tableHovers.cache.index!=td_i) {			
			// remove current "over" classes
			$('td,th',$table).removeClass('over');			
			// reset index
			$.fn.tableHovers.cache.index = td_i;			
			// class the index
			if($.fn.tableHovers.cache["$"+table_i+"_"+td_i]){
				$.fn.tableHovers.cache["$"+table_i+"_"+td_i].addClass('over');		
			} else {			
				$.fn.tableHovers.cache["$"+table_i+"_"+td_i] = $();				
				$('tr',$table).each(function(i){				
					$.fn.tableHovers.cache["$"+table_i+"_"+td_i] = $.fn.tableHovers.cache["$"+table_i+"_"+td_i].add($('td:eq('+(td_i-1)+'),th:eq('+td_i+')',this));											 
				});				
				$.fn.tableHovers.cache["$"+table_i+"_"+td_i].addClass('over');
			}		
		}
	};
	
	$.fn.tableHovers.clearTable = function(e) {
		var $parent = this.tagName == "TABLE" ? $(this) : $(this).parents("table");		
		$('td',$parent).removeClass('over');
		$.fn.tableHovers.cache.index = null;
	};

})(jQuery);

/**
 * @tabs Plugin
 * 7.16.09 Will and Paul
 * Creates tabs style content switching.
 * 
 * Add class="default" to the anchor in the html to trigger that tab or call the plugin with an index.
 * HTML class takes precedence over index argument
 *
 * 1. HTML
 * expects html like this:
 * 
 * <ul class="tabs">
 * 		<li><a href="#pane1">Pane 1</a></li>
 * 		<li><a href="#pane2">Pane 2</a></li>
 * </ul>
 * <div id="pane1">Hi</div>
 * <div id="pane2">Mom</div>
 * 
 * 2. JS
 * $('.tabs').IX_tabs();
 * $('.tabs').IX_tabs(3); // click the forth tab (index starts at 0)
 *  
 * NOTE: that the jQuery selector can be anything, class is not needed.
 * 
 * 3. CSS
 * think this'll work. untested. -will
 * 
 * .tabs	{overflow: hidden; margin: 0; padding: 0; list-style-type: none;}
 * .tabs a	{border: 1px solid #ccc; border-bottom: none; display:block; float:left; margin-right:3px; padding:3px;}
 * 
 */

// generic tab builder
jQuery.fn.IX_tabs = function(tab) {	
	return this.each(function() {
		var $container = jQuery(this), 
			$tabs = jQuery("a", this),
	 		panes = new Array();

		$tabs.each(function () {
			var $this = jQuery(this);

			// using the href to make the collection of panes			
			var pane = $this.attr('href');
			if (pane.indexOf("#") != 0) {
				return true;
			};
		 	panes.push(pane);

			$this.bind("click", function(){
				//build the jq selector. cheap.
				jQuery(panes.join(",")).hide();

				//do some class switching
				$container.find('.active').removeClass('active');
				$this.parent("li").addClass("active");

				jQuery(pane).show();
				return false;
			});
		});
		
		// set which tab to show
		// if .default is available, get its index and set it. else, check for a tab index passed in or set to 0
		var show = jQuery('a.default',$container).length ? $tabs.index(jQuery('a.default')) : tab || 0;
		
		// optionally, use this to make tabs hashable. Note: doesn't make clicking the tabs hashable, only provides for linking directly to them
		// urltab = the hash in the url
		// show = if urltab isn't empty or a default link is checked, decide which of those two is true: if urltab, set it, otherwise set to a.default. If neither, set to tab or  0
		// this means the url hash is more important than the default class set in the html
		// 
		// var urltab = window.location.hash;
		// var show = urltab != "" || jQuery('a.default',$container).length ? urltab != "" ? $tabs.index(jQuery('a[href='+urltab+']')) : $tabs.index(jQuery('a.default')) : tab || 0;
		
		// this line is pretty gross, but cheap
		// make sure the tab we think we can show is actually there. if so, click it. else click the first tab
		$tabs.eq(show).length ? $tabs.eq(show).click() : $tabs.eq(0).click();
	});
};



/**
 * @shuffler
 * fake search results hocus pocus. 
 * made for faking search results on the foodhub prototype but could be cleaned up for some other bizarre purpose.	
 * 
 * can only shuffle the container's immediate children
 * 
 * example
 * $('ul#my-list').shuffleResults("li"); 
 * 
 * CSS is something like...
 *  .loader{
 *  	background: transparent url(/_resources/img/css/ajax-loader.gif) 0 0 no-repeat;
 *  	margin: 1em 240px;
 *  	padding: 0;
 *  	height: 35px;
 *  	text-indent: -9999em;
 *  }
 */

jQuery.fn.IX_shuffler = function(shufflee) {	
	return this.each(function() {
		var $wrap = jQuery(this);
		var $shufflewhat = jQuery($wrap).find(shufflee).not(shufflee+" "+shufflee); // save the children!
		var shuffled = shuffle($shufflewhat);
		
		
		//fade and height junk needs to be an option				
		//don't jump! only needed if fades
		var curHeight = $wrap.css("height");
		$wrap.css("height", curHeight);

		//fades nonsense
		jQuery($shufflewhat).fadeOut(300,function(){
			//could extend to include var htmlElement and var loadingText
			var loader = '<h2 class="loader">Loading...</h2>';
			$wrap.html(loader);
			$wrap.find("h2").fadeTo(500, 1, function(){
				jQuery($shufflewhat).show();
				$wrap.html(shuffled);
			});
		});

		// the hard work.
		function shuffle(o){ //v1.0
			for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
			return o;
		};
	});
}; // shuffleResults()


/**
 * @changeText
 * update text somewhere else.
 * 
 * grabs the text from the object and copy's it into something else.  used to show a preview, udpate a message/button...	
 * 
 * used a lot during foodhub prototyping.
 *
 */

jQuery.fn.changeText = function(updatee) {	
	return this.each(function() {
		var newText = $(this).text();
		$(updatee).text(newText);
	});
};


// @or
// 09.09.09 pdf
// $("something").or("default").dothischain()
// some selector, if it returns zero results, use some other default selector instead
jQuery.fn.or = function(s) { return $(this).length ? $(this) : $(s); };


// @accessibilityReset
// 12.15.09 pdf
/*
	Remove all the image replacements if user has colors or images disabled
	Attaches a specified CSS file to head if needed.

	1. do resetBackgrounds(); in document ready statement
	2. validate against element known to contain a background image
	
	Example of what might be included in CSS:
	
	#nav a,.hdr,.btn,.ir { height: auto !important; text-indent: 0 !important; width: auto !important; }
	
	Recommended to include link in accessibility menu to also trigger inclusion of this stylesheet

*/
var resetBackgrounds = function() {
	if(!$j('#accessibility-reset-styles').length && $j('body').css("background-image") == "none") {
		$j('head').append('<link id="accessibility-reset-styles" rel="stylesheet" type="text/css" media="all" href="_resources/css/accessibility-reset.css" />');	
	}	
};

// end @accessibilityReset



// @maxHeight
// 01.8.10
// receives a jQuery object. Returns the height of the tallest element
var maxHeight = function($els) {
	var h = 0;
	$els.each(function(){
		h = h < parseInt($(this).height()) ? parseInt($(this).height()) : h;						   
	});		
	return h;		
}

// end @maxHeight



// @faq
// 01.26.10 pdf
// receives a dl
// inserts +/- for collapsing and a show all/hide all link
/*

Example HTML:
<dl class="collapsible">
	<dt>Item one</dt>
	<dd><p>Item one sub content</p></dd>
	<dt>Item two</dt>
	<dd>
		<p>Item two sub content</p>
		<p>
			Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.
		</p>
	</dd>
	<dt>Item three has a longer title that will wrap to the next line to check for proper indenting of said line.</dt>
	<dd><p>Item three sub content</p></dd>
	<dt>Item four</dt>
	<dd>
		<img src="_resources/img/content/fpo-tertiary.jpg" alt="FPO" />
		<p>Item four sub content</p>
	</dd>
</dl>

Example CSS -- NOTE: .js class for JS only styles:
.js dl.collapsible 		{ margin: 0 0 0 1em; }
.js dl.collapsible dt 	{ text-indent: -1.1em; margin-left: 1.1em; }
dl.collapsible dt 		{ font-weight: bold; margin: 0; }
	dl.collapsible dt a				{ color: #111; outline: none; text-decoration: none; display: inline-block; }
	dl.collapsible dt a span 		{ color: #76271a; }
	dl.collapsible dt a:hover,
	dl.collapsible dt a:hover span,
	dl.collapsible dt a:focus,
	dl.collapsible dt a:focus span	{ color: #666; }
dl.collapsible dd 		{ padding: 0 0 .75em 0; }
dt span.state			{ font-family: "Courier New", Courier, monospace; font-size: 1.3em; }

*/
jQuery.fn.IX_faq = function() {	
	return this.each(function() {							  
		jQuery(this).find("dd").hide();
		jQuery(this).find("dt").prepend('<span class="state">+</span> ').wrapInner('<a href="#"></a>').click(function(){
			var textinsert = jQuery("span.state",this).text() == "+" ? "-" : "+";
			jQuery(this).toggleClass("open").next("dd").slideToggle("fast").end().find("span.state").text(textinsert);	
			return false;
		});			
		var showtext = { show : "Show All", hide : "Hide All" };
		jQuery('<a class="revealer show" href="#">'+showtext.show+'</a>').insertBefore(this).click(function(){		
			var action = jQuery(this).is(".show");
			jQuery(this).next("dl.collapsible").find(action ? "dt:not(.open)" : "dt.open").click().end().end().toggleClass("show").toggleClass("action-hide").text(showtext[action ? "hide" : "show"]);	
			return false;
		});
	});
};

// end @faq



// @scoundrels
// 01.27.10 pdf
// http://www.alistapart.com/articles/gracefulemailobfuscation/
// http://github.com/jaz303/jquery-grab-bag/blob/master/javascripts/jquery.text-effects.js
/*
	
	Converts a ROT13'd href attribute to a mailto: link. Ideally some server awesomeness is
	used to redirect the ROT13 path to a contact form or captcha or something for non JS users
	
	usage:	
	<a rel="nofollow" href="c/asdf+asdf+pbz">contact [at] something</a>
	$('a').scoundrels();
	
*/
$.fn.scoundrels = function() {
	this.each(function() {
		$(this).attr('href','mailto:'+$(this).attr('href').replace(/.*c\/([a-z0-9._%-]+)\+([a-z0-9._%-]+)\+([a-z.]+)/ig, function(chr,p1,p2,p3) {
			function replacer(str) {
				return str.replace(/[a-z0-9]/ig,function(chr) {
					var cc = chr.charCodeAt(0);
					if (cc >= 65 && cc <= 90) cc = 65 + ((cc - 52) % 26);
					else if (cc >= 97 && cc <= 122) cc = 97 + ((cc - 84) % 26);
					else if (cc >= 48 && cc <= 57) cc = 48 + ((cc - 43) % 10);
					return String.fromCharCode(cc);
				});
			}
			return replacer(p1) + '@' + replacer(p2) + '.' + replacer(p3); 		
		}));
	});
	return this;
};

// end @scoundrels



// end 1. jQuery




// 2. @Misc. useful both with or without jQuery -------------------------------------------------------------------------------------------------

// @cookie
// Cookies get/set/delete
// there is also a jQuery cookie plugin that does more magic but seems to usually be overkill
function getCookie( name ) {
	var start = document.cookie.indexOf( name + "=" );
	var len = start + name.length + 1;
	if ( ( !start ) && ( name != document.cookie.substring( 0, name.length ) ) ) { return null;	}
	if ( start == -1 ) return null;
	var end = document.cookie.indexOf( ";", len );
	if ( end == -1 ) end = document.cookie.length;
	return unescape( document.cookie.substring( len, end ) );
}
function setCookie( name, value, expires, path, domain, secure ) {
	var today = new Date();
	today.setTime( today.getTime() );
	if ( expires ) { expires = expires * 1000 * 60 * 60 * 24; }
	var expires_date = new Date( today.getTime() + (expires) );
	document.cookie = name+"="+escape( value ) +
		( ( expires ) ? ";expires="+expires_date.toGMTString() : "" ) + //expires.toGMTString()
		( ( path ) ? ";path=" + path : "/" ) +
		( ( domain ) ? ";domain=" + domain : "" ) +
		( ( secure ) ? ";secure" : "" );
}
function deleteCookie( name, path, domain ) {
	if ( getCookie( name ) ) document.cookie = name + "=" +
			( ( path ) ? ";path=" + path : "/") +
			( ( domain ) ? ";domain=" + domain : "" ) +
			";expires=Thu, 01-Jan-1970 00:00:01 GMT";
}
// end cookies

// @flicker
// prevent ie6 flicker
try { document.execCommand('BackgroundImageCache', false, true); } catch(e) {}


// @remotefileload
// fix elements over selects z-index issue
// load script without ajax to avoid ActiveX requirement
function loadScript(src, callback) {
	var script = document.createElement("script");		
	if(script.attachEvent) {
		script.attachEvent("onreadystatechange",
		function() { loadScript.callbackIE(callback); });
	}
	script.src = src;
	document.getElementsByTagName("head")[0].appendChild(script);
}
loadScript.callbackIE = function(callback) {
	var target = window.event.srcElement;
	if(target.readyState == "loaded")
	callback.call(target);
};		
callback = function() { $("#nav ul, some-selector").bgiframe(); };

loadScript("_resources/js/jquery.bgiframe.min.js", callback);

// remotefileload


// @isValidEmailAddress
// 
// example:
// if(isValidEmailAddress(theEnteredEmailAddy) != true) { tell em there's an error }
// returns true if email is valid.
//
function isValidEmailAddress(emailAddress) {
	var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	return pattern.test(emailAddress);
}


// end 2. Misc




// 3. @non-jQuery -------------------------------------------------------------------------------------------------
// If you have jQuery on the page already, stop now. You don't want this stuff.

// @DOMutils
// get/add/remove/event from dustin diaz
var Dom = {
  get: function(el) {
    if (typeof el === 'string') {
      return document.getElementById(el);
    } else {
      return el;
    }
  },
  add: function(el, dest) {
    var el = this.get(el);
    var dest = this.get(dest);
    dest.appendChild(el);
  },
  remove: function(el) {
    var el = this.get(el);
    el.parentNode.removeChild(el);
  }
  };
  var Event = {
  add: function() {
    if (window.addEventListener) {
      return function(el, type, fn) {
        Dom.get(el).addEventListener(type, fn, false);
      };
    } else if (window.attachEvent) {
      return function(el, type, fn) {
        var f = function() {
          fn.call(Dom.get(el), window.event);
        };
        Dom.get(el).attachEvent('on' + type, f);
      };
    }
  }()
 };
// end DOM utils


// @getElementsByClass
function getElementsByClass(searchClass,node,tag) {
	var classElements = new Array();
	if ( node == null )
		node = document;
	if ( tag == null )
		tag = '*';
	var els = node.getElementsByTagName(tag);
	var elsLen = els.length;
	var pattern = new RegExp("(^|\s)"+searchClass+"(\s|$)");
	for (i = 0, j = 0; i < elsLen; i++) {
		if ( pattern.test(els[i].className) ) {
			classElements[j] = els[i];
			j++;
		}
	}
	return classElements;
}
// end getElementsByClass


// @toggle on/off
function toggle(obj) {
	var el = document.getElementById(obj);
	el.style.display = (el.style.display != 'none' ? 'none' : '' );
}
// end toggle


// @insertAfter
// Jeremy Keith does insertAfter
function insertAfter(newElement,targetElement) {
	var parent = targetElement.parentNode;
	if (parent.lastChild == targetElement) {
		parent.appendChild(newElement);
	} else {
		parent.insertBefore(newElement,targetElement.nextSibling);	
	}
}
// end insert after



// @inArray by EmbiMEDIA
Array.prototype.inArray = function (value) {
	var i;
	for (i=0; i < this.length; i++) {
		if (this[i] === value) {
			return true;
		}
	}
	return false;
};
// end inArray



// @document.ready
// Like jQuery's document.ready but without the jQuery.
// no need for this if using jQuery
var ISITE = function() {	
	// pretend it's $() and add some action
	console.log("The document is loaded. Manipulate its face off!", document.getElementsByTagName("*"));
};
// end document ready


// keep the rest or else no onload will fire
// the big init()
function init() {
	if (arguments.callee.done) return;
	arguments.callee.done = true;
	if (_timer) clearInterval(_timer);
	ISITE();
};

/* Dean Edwards window.onload */
/* for Mozilla */
if (document.addEventListener) {
   document.addEventListener("DOMContentLoaded", init, false);
}

// for Internet Explorer (using conditional comments)
/*@cc_on @*/
/*@if (@_win32)
document.write("<scr" + "ipt id=__ie_onload defer src=javascript:void(0)><\/script>");
var script = document.getElementById("__ie_onload");
script.onreadystatechange = function() {
	if (this.readyState == "complete") {
		init(); // call the onload handler
	}
};
/*@end @*/

if (/WebKit/i.test(navigator.userAgent)) { // sniff
	var _timer = setInterval(function() {
		if (/loaded|complete/.test(document.readyState)) {
			init(); // call the onload handler
		}
	}, 10);
}

/* for other browsers */
window.onload = init;


/* alt version needs some testing http://www.kryogenix.org/days/2007/09/26/shortloaded

(function(i) {var u =navigator.userAgent;var e=/*@cc_on!@*/
		  
		  /* remove this comment --------------------
		  
		  false; var st =
setTimeout;if(/webkit/i.test(u)){st(function(){var dr=document.readyState;
if(dr=="loaded"||dr=="complete"){i()}else{st(arguments.callee,10);}},10);}
else if((/mozilla/i.test(u)&&!/(compati)/.test(u)) || (/opera/i.test(u))){
document.addEventListener("DOMContentLoaded",i,false); } else if(e){     (
function(){var t=document.createElement('doc:rdy');try{t.doScroll('left');
i();t=null;}catch(e){st(arguments.callee,0);}})();}else{window.onload=i;}})(init);
*/

// end document.ready

