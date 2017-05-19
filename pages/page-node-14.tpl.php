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



		<div id="content">
				
					<?php if ($content_top): ?>
			          <div class="region region-content_top">
			            <?php print $content_top; ?>
			          </div> <!-- /#lead -->
			        <?php endif; ?>


				<div id="primary">
				
					<div id="lead">

<script type="text/javascript">
$j(document).ready(function(){
// select #flowplanes and make it scrollable. use circular and navigator plugins
$j("#flowpanes").scrollable({ circular: true,items: '.pane', mousewheel: true, next:'', prev:'' }).navigator({

		// select #flowtabs to be used as navigator
		navi: "#flowtabs",

		// select A tags inside the navigator to work as items (not direct children)
		naviItem: 'a',

		// assign "current" class name for the active A tag inside navigator
		activeClass: 'current',

		// make browser's back button work
		history: false

	});
	
	$j('#flowtabs').addClass('show');
	
	// horizontal scrollables. each one is circular and has its own navigator instance
	$j(".scrollable").scrollable({circular: true});

});
</script>
					
						<div id="slider-container">
							<!-- tab panes -->
							<div id="flowpanes">
							
								<!-- wrapper for scrollable panes for books, movies, music -->
								<div class="panes">
							
									<!-- pane 1 -->
									<div class="pane">
									
										<!-- sub navigator #2 -->
										<a class="prev">Previous</a>
									
										<!-- inner scrollable #1 -->
										<div class="scrollable">
										
											<!-- root element for scrollable items -->
											<div class="items">										
							<?php 
               $recomendations = views_embed_view('bmm_slider', 'block_1', "Featured Books"); 
              print $recomendations; 
?>  

											</div><!-- /items -->		
										</div><!-- /scrollable #1 -->	
										<a class="next">Next</a>
									</div>
									<!-- pane 2 -->
									<div class="pane">
									
										<!-- sub navigator #2 -->
										<a class="prev">Previous</a>
									
										<!-- inner scrollable #2 -->
										<div class="scrollable">
										
											<!-- root element for scrollable items -->
											<div class="items">										
<?php 
               $recomendations = views_embed_view('bmm_slider', 'block_1', "Featured Movies"); 
              print $recomendations; 
?>  


											</div><!-- /items -->	
										</div><!-- /scrollable #2 -->					
										
										<a class="next">Next</a>					
	
									</div>
									<!-- pane 3 -->
									<div class="pane">
									
										<!-- sub navigator #3 -->
										<a class="prev">Previous</a>
									
										<!-- inner scrollable #3 -->
										<div class="scrollable">
										
											<!-- root element for scrollable items -->
											<div class="items">	
																				
<?php 
               $recomendations = views_embed_view('bmm_slider', 'block_1', "Featured Music"); 
              print $recomendations; 
?>  
											</div><!-- /items -->	
												
										</div><!-- /scrollable #3 -->	
										
										<a class="next">Next</a>									
	
									</div>
							
								</div><!-- /panes -->
							
							</div><!-- /flowpanes -->
							
							<ul id="flowtabs">
								<li><a id="t1" href="#slide1" class="current">Books</a></li>
								<li><a id="t2" href="#slide2">Movies</a></li>
								<li><a id="t3" href="#slide3">Music</a></li>
							</ul>							
							
						</div><!-- /slider-container -->	
					
					</div><!-- /lead -->		

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
				

				
	          			<?php print $content; ?>
						
						
				        <?php if ($content_bottom): ?>
				          <div id="content-bottom" class="region region-content_bottom">
				            <?php print $content_bottom; ?>
				          </div> <!-- /#content-bottom -->
				        <?php endif; ?>

					</div><!-- /.primary -->
			
			
			      <?php if ($right): ?>
			        <div class="secondary">
						<div id="sidebar-right-inner" class="region region-right">

			          			<?php print $right; ?>

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


	
	



<!--
	<div id="nav">

		<h4 class="accessibility">Main Navigation</h4>
		<ul>
			<li class="nav-books"><a href="/books-movies-music">Books, Movies, Music</a></li>
			<li class="nav-events"><a href="/events">Events</a></li>
			<li class="nav-kids"><a href="/kids">Kids</a></li>
			<li class="nav-locations"><a href="/locations">Locations</a></li>

			<li class="nav-catalog"><a href="/catalog">Catalog</a></li>
			<li class="nav-genealogy"><a href="/genealogy">Genealogy</a></li>
			<li class="nav-teens"><a href="/teens">Teens</a></li>
			<li class="nav-about"><a href="/about-us">About Us </a></li>

			<li class="nav-online"><a href="/online-resources">Online Resources</a></li>
		</ul>
			
    </div><!-- /#nav -->


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

</body>
</html>
