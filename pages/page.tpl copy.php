<?php
// $Id: page.tpl.php,v 1.14.2.10 2009/11/05 14:26:26 johnalbin Exp $

/**
 * @file page.tpl.php
 *
 * Theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the theme is located in, e.g. themes/garland or
 *   themes/garland/minelli.
 * - $is_front: TRUE if the current page is the front page. Used to toggle the mission statement.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE tag.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $body_classes: A set of CSS classes for the BODY tag. This contains flags
 *   indicating the current layout (multiple columns, single column), the current
 *   path, whether the user is logged in, and so on.
 * - $body_classes_array: An array of the body classes. This is easier to
 *   manipulate then the string in $body_classes.
 * - $node: Full node object. Contains data that may not be safe. This is only
 *   available if the current page is on the node's primary url.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been disabled.
 * - $primary_links (array): An array containing primary navigation links for the
 *   site, if they have been configured.
 * - $secondary_links (array): An array containing secondary navigation links for
 *   the site, if they have been configured.
 *
 * Page content (in order of occurrance in the default page.tpl.php):
 * - $left: The HTML for the left sidebar.
 *
 * - $breadcrumb: The breadcrumb trail for the current page.
 * - $title: The page title, for use in the actual HTML content.
 * - $help: Dynamic help text, mostly for admin pages.
 * - $messages: HTML for status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the view
 *   and edit tabs when displaying a node).
 *
 * - $content: The main content of the current Drupal page.
 *
 * - $right: The HTML for the right sidebar.
 *
 * Footer/closing data:
 * - $feed_icons: A string of all feed icons for the current page.
 * - $footer_message: The footer message as defined in the admin settings.
 * - $footer : The footer region.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic content.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

<head>
  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <?php print $styles; ?>
  <link href="/sites/all/themes/mcpl/_resources/css/print.css" rel="stylesheet" type="text/css" media="print" />  
 <!-- PreLoad jQuery and bootstrap JS and set noConflict-->
 <script type="text/javascript" src="/sites/all/themes/mcplBootstrap3/_resources/js/jquery-1.11.3.min.js"></script> 
 <script type="text/javascript" src="/sites/all/themes/mcplBootstrap3/_resources/js/bootstrap.js"></script>
 <script type="text/javascript" src="/sites/all/themes/mcplBootstrap3/_resources/js/bootstrap-datepicker.js"></script>
 <script type="text/javascript" src="/sites/all/themes/mcplBootstrap3/_resources/lightslider-master/dist/js/lightslider.js?i"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.2.19/js/lightgallery-all.min.js"></script>
  <script>
	// Put jQuery 1.11.3 into noConflict mode.
	var $jq = jQuery.noConflict(true);
</script>
  <?php print $scripts; ?>
  
</head>
<body class="page-interior <?php //print $section; ?> <?php print $body_classes; ?>">
<div id="wrapper" class="<?php print $body_classes; ?>"> <?php //printing body classes to fix ie6 bug where two classes can't be called on the same element. eg. .kids-section.two-sidebars ?>
<div id="page">
<!--<div id="page-inner"> -->

    <a name="navigation-top" id="navigation-top"></a>


    <div id="header">
		<div id="header-inner" class="clear-block">

	      <?php if ($header): ?>
	        <!-- div id="header-blocks" class="region region-header" -->
	          <?php print $header; ?>
	        <!-- /div --> <!-- /#header-blocks -->
	      <?php endif; ?>

		<div id="navbar">

			<h4 class="accessibility">Main Navigation</h4>
			<?php print $main_menu_tree; ?>

	    </div><!-- /#navbar -->

		</div> <!-- /header-inner -->

		<div id="breadcrumbs">
			<h4 class="accessibility">You are here:</h4>
				<?php print url_breadcrumbs(); ?>
		</div><!-- /#breadcrumbs -->

     </div> <!-- /#header-inner, /#header -->

<?php if ($content_top): ?>
			          <div class="region region-content_top">
			            <?php print $content_top; ?>
			          </div> <!-- /#lead -->
			        <?php endif; ?>
			        
		<div id="content">
				
					


				<div id="primary">

					<div class="primary">

				        <?php if ($breadcrumb ||  $tabs || $help || $messages): ?>
				          <div id="content-header">
				            <?php //print $breadcrumb; ?>
				            <?php if ($title): ?>
				              <!--h1 class="title"><?php print $title; ?></h1 -->
				            <?php endif; ?>
				            <?php print $messages; ?>
				            <?php if ($tabs): ?>
				              <div class="tabs"><?php print $tabs; ?></div>
				            <?php endif; ?>
				            <?php print $help; ?>
				          </div> <!-- /#content-header -->
				        <?php endif; ?>
				
<?php

$uri_request_id = $_SERVER['REQUEST_URI'];
$urlexplode = explode("?", $uri_request_id);
$url = explode("/",$urlexplode[0]);
//print_r ($url);

if ($url[2] == "term" || $url[2] == "web-resources"){ // || $url[3] == "websites-kids"){
//taxonomy_get_parents($tid, $key = 'tid')
if( $url[2] == "web-resources"){
 $my_vid =13;
 $title = "Web Resources";
 $basepath = "/online-resources/web-resources";
if($url[3]){
 $myparent = $url[3];

}else{ //$url[2] == "web-resources"
 $myparent = 0;
}
}else{ //$url[2] == "web-resources"
 $my_vid = 14;
 $title = "Websites for Kids";
 $basepath = "/kids/school-age-kids/websites-kids";
if($url[4]){
 $myparent = $url[4];

}else{ //$url[2] == "web-resources"
 $myparent = 0;
}
}


$current_term = taxonomy_get_term($myparent, $reset = FALSE);

if ($myparent){
	
	$parents = taxonomy_get_parents_all($myparent, $key = 'tid');
	$z = 0;
	foreach ($parents as $parent) { 
			$newtrail =   "<a href=\"$basepath/".$parent->tid."\">".$parent->name."</a>";
		if ($z){
				$mytrail =   $newtrail."  | ".$mytrail;
		}else{
		  $mytrail = $newtrail;
		}
			$z++;
	}
	$mytrail =   "<a href=\"$basepath\">$title</a> | ".$mytrail;
	print "<a href='http://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4d75518b54bda27a' 
        class='addthis_button'><img style='padding-left:4px;padding-right:4px' align='right'
        src='http://s7.addthis.com/static/btn/v2/lg-share-en.gif' 
        width='125' height='16' border='0' alt='Share' /></a><h1>$title</h1>";
	print $mytrail;
}else{
	print "<a href='http://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4d75518b54bda27a' 
        class='addthis_button'><img style='padding-left:4px;padding-right:4px' align='right'
        src='http://s7.addthis.com/static/btn/v2/lg-share-en.gif' 
        width='125' height='16' border='0' alt='Share' /></a><h1>$title</h1>";
}


//print "<h1>".$current_term->name."</h1>";
$tree = taxonomy_get_tree($my_vid, $parent = $myparent, $depth = -1, $max_depth = 1);

$termcount = count($tree);

$i = 0;
$middle = ($termcount - ($termcount % 2)) / 2;
//if (($termcount % 2) != 0){$middle--;}
//print $middle;
print "<table width=670 class=\"webresources\"><tr><td width=50% valign=top>";
foreach ($tree as $branch) { 
	if ($i == $middle){ print "</td><td width=50% valign=top>"; };
	
	//outer array should be top elements $littlebranch->name $branch->tid $littlebranch->tid.

	print "<a href=\"$basepath/".$branch->tid."\"><h4>".$branch->name."</h4></a>"; 
	$tree2 = taxonomy_get_tree(13, $parent = $branch->tid, $depth = -1, $max_depth = 1);
	$end = count($tree2);
	$z = 1;
	foreach ($tree2 as $littlebranch) {
		print "<a href=\"$basepath/".$littlebranch->tid."\">".$littlebranch->name."</a>"; 
		if ($z < $end){print ' | ';}else{ print ' <br /> ';}
		//print $end." - ".$z."<br>";
		$z++;
	} 
	
	print "<p>";
	$i++;
}
print "</td></tr></table>";
}
?>

<?php print $content; ?>
     <?php if ($content_bottom): ?>
      <div id="content-bottom" class="region region-content_bottom">
      <?php print $content_bottom; ?>
      </div> <!-- /#content-bottom -->
<?php endif; ?>

</div><!-- /.primary -->

   <?php 
if ($right || ($url[2] == "subject-guides" && $url[3]) ): ?>
   <div class="secondary">
   <div id="sidebar-right-inner" class="region region-right">
   <?php
     if ($url[2] == "subject-guides"){
 		if ($event_types){ ?>
     <div class="block-inner">
     <h2 class="title"><span>Events</span></h2>
     <div class="content">
<?php 
   $event_list = date_embed_view('calendar', 'block_6',  array(), array('all', $event_types));
   print $event_list;
?>

</div> 
</div> <br /><!-- /block-inner, /block -->
<?php } // end events
 	if ($content_provided_by){ ?>
     <div class="block-inner">
     <h2 class="title"><span>Content Provided By</span></h2>
     <div class="content">
     <?php print $content_provided_by; ?>
</div> 
</div> <!-- /block-inner, /block -->
<?php  } //end provided by ?>

<?php      }else{ 
    print $right; 
 }?>


			        	</div>
					</div> <!-- /.secondary -->
			      <?php endif; ?>
			
			
				</div><!-- /#primary -->

          		<?php // print $navbar; ?>

		      	<?php if ($left): ?>
				<div id="secondary">
					<div id="sidebar-left-inner" class="region region-left">

		          		<?php print $left; ?>

					</div>
				</div> <!-- /#sidebar-left-inner, /#sidebar-left -->
		      	<?php endif; ?>

</div> <!--  /#content -->

<!-- </div></div> --><!-- /#page-inner-->

</div> <!-- /#page  -->
</div><!-- /#wrapper -->



    <?php if ($footer || $footer_message): ?>
      <div id="footer"><div id="footer-inner" class="region region-footer">

        <?php if ($footer_message): ?>
          <div id="footer-message"><?php print $footer_message; ?></div>
        <?php endif; ?>

        <?php print $footer; ?>

		<?php //get the svn rev to post on the site during dev.
			if(file_exists('.svn/entries')){
				$svn = File('.svn/entries');
				$svnrev = $svn[3];
				unset($svn);
			}	
		 ?>
		<?php if (!empty($svnrev)): ?>
				<h2 style="font-size: 12px; position: absolute;">MCPL <span style="color: #555;">Development Alpha v.<?php if(!empty($svnrev)){ echo $svnrev;}else{echo "unknown";} ?></span> </h2>
		<?php endif; ?>
		

        <?php if ($feed_icons): ?>
          <div class="feed-icons"><?php print $feed_icons; ?></div>
        <?php endif; ?>
      </div></div> <!-- /#footer-inner, /#footer -->
    <?php endif; ?>

  <?php if ($closure_region): ?>
    <div id="closure-blocks" class="region region-closure"><?php print $closure_region; ?></div>
  <?php endif; ?>

  <?php print $closure; ?>
  <script>
  $('a').filter(function() {
   return this.hostname && this.hostname !== location.hostname;
}).addClass("external");
</script>

</body>
</html>
