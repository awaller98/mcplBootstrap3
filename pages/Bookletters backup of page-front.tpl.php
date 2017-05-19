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
<body class="front">

<div id="wrapper">
<div id="page">
<div id="page-inner">


    <a name="navigation-top" id="navigation-top"></a>
    <?php if ($primary_links || $secondary_links || $navbar): ?>
      <div id="skip-to-nav"><a href="#navigation"><?php print t('Skip to Navigation'); ?></a></div>
    <?php endif; ?>

    <div id="header">
		<div id="header-inner" class="clear-block">

      <?php if ($logo || $site_name || $site_slogan): ?>
        <div id="logo-title">

          <?php if ($logo): ?>
            <div id="logo"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" id="logo-image" /></a></div>
          <?php endif; ?>

          <?php if ($site_name): ?>
            <?php if ($title): ?>
              <div id="site-name"><strong>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
                <?php print $site_name; ?>
                </a>
              </strong></div>
            <?php else: ?>
              <h1 id="site-name">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
                <?php print $site_name; ?>
                </a>
              </h1>
            <?php endif; ?>
          <?php endif; ?>

          <?php if ($site_slogan): ?>
            <div id="site-slogan"><?php print $site_slogan; ?></div>
          <?php endif; ?>

        </div> <!-- /#logo-title -->
      <?php endif; ?>

      <?php if ($header): ?>
        <!-- div id="header-blocks" class="region region-header" -->
          <?php print $header; ?>
        <!-- /div --> <!-- /#header-blocks -->
      <?php endif; ?>

		
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

		</div>
	</div> <!-- /#header-inner, /#header -->

<div id="main">
	<div id="main-inner" class="clear-block<?php if ($search_box || $primary_links || $secondary_links || $navbar) { print ' with-navbar'; } ?>">

		<div id="content">
		
<script type="text/javascript">
$j(document).ready(function(){
// select #flowplanes and make it scrollable. use circular and navigator plugins
	$j("#flowpanes").scrollable({ circular: true, mousewheel: true }).navigator({

		// select #flowtabs to be used as navigator
		navi: "#flowtabs",

		// select A tags inside the navigator to work as items (not direct children)
		naviItem: 'a',

		// assign "current" class name for the active A tag inside navigator
		activeClass: 'current',

		// make browser's back button work
		history: false,
		loop: false

		});
		
		//.autoscroll({
		//			interval: 3000,
		//			loop: false
		//		});
	
	$j('#flowtabs').addClass('show');

	setTimeout('$j("#flowpanes").scrollable().seekTo(1)',5000);
	setTimeout('$j("#flowpanes").scrollable().seekTo(2)',10000);
	setTimeout('$j("#flowpanes").scrollable().seekTo(3)',15000);

});

</script>
		
		
			<div id="content-inner">
				<div id="lead">
						
					<div id="slider-container">
         
						<!-- tab panes -->
						<div id="flowpanes">
						<!-- wrapper for scrollable items -->
							<div class="items">
									<!-- the items -->
									<?php
									$subject_guide_listings = views_embed_view('index_pages', 'block_2');
									print $subject_guide_listings; 
									?>
											
							</div> <!-- /.items -->
				
						</div><!-- /#flowpanes -->
				
						<ul id="flowtabs" class="navi">
							<li><a id="t1" href="#slide1" class="current">Slide 1</a></li>
							<li><a id="t2" href="#slide2">Slide 2</a></li>
							<li><a id="t3" href="#slide3">Slide 3</a></li>
							<li><a id="t4" href="#slide4">Slide 4</a></li>
						</ul>
				
				
					</div><!-- /#slider-container -->				
				
					<!-- <img src="/sites/all/themes/mcpl/_resources/img/temp-home-lead.jpg" width="940" height="316" alt="Temp Home Lead" /> -->
				</div><!-- /#lead -->


				<div id="primary">
										
							<?php 
								$blogs = views_embed_view('blogs', 'block_2',  $arg);  
								print $blogs; 
							?> 
				

		</div><!-- /primary -->

		<div id="secondary">
			<div class="inner">
				<div class="block">
					
					<?php print $left; ?>

					
					<!-- <div class="content"> -->
					
			   <?php /*
               $module = 'advpoll';
               $delta = 'latest_poll';
               $content = module_invoke($module, 'block', 'display', $delta);
               print $content['content'];
			   */ ?>
					<?php /*
						<form action="poll" method="post">
							<fieldset>
								<legend class="accessibility">Please select an answer</legend>
								
								<h4>What did you think of the film adaptation of Christopher Isherwood's A Single Man?</h4>
								<ul class="check-radio-wrap">
									<li><input type="radio" name="pollID" /> It was better than the book!</li>

									<li><input type="radio" name="pollID" /> Good, but I like the book better.</li>
									<li><input type="radio" name="pollID" /> I haven’t seen the movie.</li>
									<li><input type="radio" name="pollID" /> I haven’t read the book.</li>
								</ul>
								
								<div class="footer">
									<button type="submit" value="Cast your vote">Cast your vote</button>

									<a class="more" href="result">View Results</a>									
								</div><!-- /.footer -->						
										
							</fieldset>
						</form> */ ?>
						
					<!--</div> /.content -->
					
				</div><!-- /.block -->				


				<!-- any box that is a slider/scroller should get the class "scroller" -->
				<div class="block">
				<div class="block-inner">

				<div class="block scroller list-view ">
					<h2><span>Our Staff Suggests</span></h2>
					<div class="content">
											
							<?php 
								$recomendations = views_embed_view('catalog_lists', 'block_7'); 
								print $recomendations; 
							?> 
<div class="footer"><a href="/books-movies-music/staff-recommendations"  class="more view-all">View All</a></div>
<!-- div class="footer"><a href="http://opac.mcpl.lib.mo.us/uhtbin/cgisirsi/x/0/0/57/1/1225/X/BLASTOFF?user_id=WEBSERVER" target="_catalog" class="more view-all">View All</a></div --><!-- /.footer -->

					</div><!-- /.content -->
				</div></div></div><!-- /.block/scroller -->
				
				
				<div class="block">
				<div class="block-inner">

						<h2><span>Award Winners</span></h2>

					<div class="content">
						<ul>
					<?php
						$book_awards = views_embed_view('index_pages', 'block_3');
						print $book_awards; 
					?>
						</ul>
						
						<div class="footer">
							<a href="/books-movies-music/book-awards" class="more view-all">View All <span>award winners</span></a>
						</div><!-- /.footer -->
						
					</div><!-- /.content -->
					</div> <!-- "block-inner" -->

				</div><!-- /.block -->
				
				
			</div><!-- /.inner -->
		</div><!-- /#secondary -->


		<div id="tertiary">
			<div class="inner">
				
				
				<?php 
					$promo =views_embed_view('Promotions', 'block_2');  
					$match1 = '<span class="field-content" >';
					$replace1 = '';
					$promo   = str_replace($match1, $replace1,  $promo );
					$match1 = '</span>';
					$replace1 = '';
					$promo   = str_replace($match1, $replace1,  $promo );
					print $promo; 
				?>


				<?php 
					$promo =views_embed_view('Promotions', 'block_1');  
					$match1 = '<span class="field-content" >';
					$replace1 = '';
					$promo   = str_replace($match1, $replace1,  $promo );
					$match1 = '</span>';
					$replace1 = '';
					$promo   = str_replace($match1, $replace1,  $promo );
					print $promo; 
				?>

				<div class="block block-events">

					<h2><span>Events</span></h2>

					<div class="content">	

						<!-- <ul class="events"> -->
                    <?php 
                       $event_list = date_embed_view('calendar', 'block_1'); 
                       print $event_list; ?>
							<!-- li><a href="#">A Matter of Character</a><span class="date">AUGUST 15, 2010</span></li>
							<li><a href="#">All by My Selves</a><span class="date">AUGUST 17, 2010</span></li>
							<li><a href="#">The Glass Rainbow</a><span class="date">AUGUST 19, 2010</span></li>
							<li><a href="#">61 Hours</a><span class="date">AUGUST 25, 2010</span></li>
							<li><a href="#">Burning Lamp</a><span class="date">AUGUST 30, 2010</span></li -->

						<!--</ul> /title-author -->
					</div>
				</div>		

						
				<div class="cta-newsletter">
					<a href="/online-resources/reading-suggestions">Get Reading Suggestions</a>
				</div><!-- /.cta-newsletter -->
				
								
			</div><!-- /.inner -->
		</div><!-- /#terciary -->


          <?php //print $content; ?>

</div>
	

      <?php if ($search_box || $primary_links || $secondary_links || $navbar): ?>
        <div id="navbar"><div id="navbar-inner" class="clear-block region region-navbar">

          <a name="navigation" id="navigation"></a>

          <?php if ($search_box): ?>
            <div id="search-box">
              <?php print $search_box; ?>
            </div> <!-- /#search-box -->
          <?php endif; ?>

          <?php if ($primary_links): ?>
            <div id="primary" class="clear-block">
              <?php print theme('links', $primary_links); ?>
            </div> <!-- /#primary -->
          <?php endif; ?>

          <?php if ($secondary_links): ?>
            <div id="secondary" class="clear-block">
              <?php print theme('links', $secondary_links); ?>
            </div> <!-- /#secondary -->
          <?php endif; ?>

          <?php print $navbar; ?>

        </div></div> <!-- /#navbar-inner, /#navbar -->
      <?php endif; ?>


	</div></div> <!-- /#content-inner, /#content -->

</div></div>  <!-- /#main-inner, /#main -->

  <!-- /div -->
</div></div> <!-- /#page-inner,/#page -->

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


      </div></div> <!-- /#footer-inner, /#footer -->
    <?php endif; ?>

  <?php if ($closure_region): ?>
    <div id="closure-blocks" class="region region-closure"><?php print $closure_region; ?></div>
  <?php endif; ?>

  <?php print $closure; ?>

</body>
</html>
