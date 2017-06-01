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



<div id="wrapper" class="node-type-interior-2c one-sidebar sidebar-left page-books-movies-music-juvenile-series section-books-movies-music"> <div id="page">
<!--<div id="page-inner"> -->

    <a name="navigation-top" id="navigation-top"></a>


    <div id="header">
    <div id="header-inner" class="clear-block">

                  <!-- div id="header-blocks" class="region region-header" -->
            
<script type="text/javascript">
jQuery(document).ready(function($) {
  $(":input[placeholder]").placeholder();
}); 
</script>

<script type="text/javascript">
// Check for compatibility for "placeholder" text 
function placeholderIsSupported() {var test = document.createElement('input');
    return ('placeholder' in test);}

function sitesearch()
{ 
    if (!placeholderIsSupported())
{
$('#q').attr('value','Find online resources, blogs, etc...');// IE 9 or less
} else {
$('#q').attr('placeholder','Find online resources, blogs, etc...');
}}

function catalogsearch()
{ 
    if (!placeholderIsSupported())
{
$('#q').attr('value','Find books, movies, music and more...');// IE 9 or less
} else {
$('#q').attr('placeholder','Find books, movies, music and more...');
}}

//Clear the search field for IE on click
function clearsearch() 
{
$('#q').attr('value','');
}
</script> 
               <a id="_brand" href="/">
                         <img src="http://www.mymcpl.org/sites/all/themes/mcpl/_resources/img/css/access_logo_color.png" title="Mid-Continent Public Library" alt="Mid-Continent Public Library" height="95px"></a>
               
          <div id="utility">
        
        <ul class="utility">
          <li class="accessibility"><a href="#content" tabindex="1" accesskey="2">Skip to Content</a></li>
          <li class="accessibility"><a href="#navbar" accesskey="3">Skip to Navigation</a></li>
          <li class="accessibility"><a href="#nav-sub">Skip to Section Navigation</a></li>
          <li class="accessibility"><a href="/" accesskey="1">Return to Homepage</a></li>
          <li><div></div>                                        
                                        <a href="https://mymcpl.thankyou4caring.org" title="" target="_blank" class="greenbutton" style="margin-top:2px; margin-left: 10px;">DONATE</a>
                                        <a href="https://mymcpl.bibliocommons.com/dashboard/user_dashboard" title="View your checkouts, holds, and bills" class="bluebutton" style="margin-top:2px; margin-left: 5px;">MY ACCOUNT</a> 
</li>
          
                                        
        </ul>
                     <div class="search-container">

  <ul class="tabs">
    <li class="tab-link current" data-tab="tab-1">Catalog</li>
    <li class="tab-link" data-tab="tab-2">Website</li>
    <li class="tab-link" data-tab="tab-3">Research</li>
    
  </ul>

  <div id="tab-1" class="tab-content current">
    <form action="/srchndlr.php" method="post" id="catalog-search">
      <input type="text" class="search" name="q" placeholder="Find Books, Movies, Music...">
      <input type="hidden" name="search-type" value="catalog">
      <input type="submit" class="search-submit" id="catalog-submit" value="SEARCH">
    </form>
  </div>
  <div id="tab-2" class="tab-content">
     <form action="/srchndlr.php" method="post" id="website-search">
      <input type="text" class="search" name="q" placeholder="Find Databases, Blogs, etc...">
      <input type="hidden" name="search-type" value="website">
       <input type="submit" class="search-submit" id="website-submit" value="SEARCH">
    </form>
  </div>
  <div id="tab-3" class="tab-content">
  <!--<form action="/srchndlr.php" method="post" id="eds-search">
    <input type="text" class="search" name="q" placeholder="Find journal / news articles and more...">
    <input type="hidden" name="search-type" value="eds">
    <input type="submit" class="search-submit" id="EDS-submit" value="SEARCH">
  </form>-->
<form id="eds-search" action="http://search.ebscohost.com/login.aspx" method="get" target="_blank">
  <input name="direct" value="true" type="hidden">
        <input name="scope" value="site" type="hidden">
        <input name="site" value="eds-live" type="hidden">
        <!-- Authentication type -->
        <input name="authtype" value="ip,guest" type="hidden">
    <input name="custid" value="077-414" type="hidden">
        <input name="groupid" value="main" type="hidden">
        <input name="profile" value="eds" type="hidden">
    <!-- Search box and Submit button -->
        <input class="search" name="bquery" value="" type="text" placeholder="Find journal / news articles and more...">
        <input type="submit" class="search-submit" id="EDS-submit" value="SEARCH">
        
</form>
  </div>
  

</div><!-- container -->
    </div><!-- /#utility -->

          <!-- /div --> <!-- /#header-blocks -->
        
    <div id="navbar">

      <h4 class="accessibility">Main Navigation</h4>
       

  <div id="om-maximenu-main-1" class="om-maximenu om-maximenu-bubble om-maximenu-main-menu code-om-u1-24886828">     
            

<div id="om-menu-main-1-ul-wrapper" class="om-menu-ul-wrapper">
  <ul id="om-menu-main-1" class="om-menu">
                  

   
  <li id="om-leaf-om-u1-24886828-1" class="om-leaf first leaf-catalog">   
    <a class="om-link  link-catalog om-autoscroll" href="https://mymcpl.bibliocommons.com/">Catalog</a>     
 
  <div class="om-maximenu-content closed">
    <div class="om-maximenu-top">
      <div class="om-maximenu-top-left"></div>
      <div class="om-maximenu-top-right"></div>
    </div><!-- /.om-maximenu-top --> 
    <div class="om-maximenu-middle">
      <div class="om-maximenu-middle-left">
        <div class="om-maximenu-middle-right">
           

<div class="block block-menu block-menu-id-menu-om-catalog first last">           
    <div class="content"><ul class="menu"><li class="leaf first"><a href="https://mymcpl.bibliocommons.com/" title="" class="om-autoscroll">Online Catalog</a></li>
<li class="leaf"><a href="/about-us/interlibrary-loan" title="" class="om-autoscroll">WorldCat</a></li>
<li class="leaf last"><a href="/catalog/get-card" title="" class=" long om-autoscroll">Apply for a Library Card Online</a></li>
</ul></div>
  </div><!-- /.block -->
          <div class="om-clearfix"></div>
        </div><!-- /.om-maximenu-middle-right --> 
      </div><!-- /.om-maximenu-middle-left --> 
    </div><!-- /.om-maximenu-middle --> 
    <div class="om-maximenu-bottom">
      <div class="om-maximenu-bottom-left"></div>
      <div class="om-maximenu-bottom-right"></div>
    </div><!-- /.om-maximenu-bottom -->  
    <div class="om-maximenu-arrow"></div>
    <div class="om-maximenu-open">
      <input type="checkbox" value="">
      Stay    </div><!-- /.om-maximenu-open -->  
  </div><!-- /.om-maximenu-content -->  
 

      
  </li>
  
    
  

  
          
                  

   
  <li id="om-leaf-om-u1-24886828-2" class="om-leaf leaf-books-movies-music">   
    <a class="om-link  link-books-movies-music om-autoscroll" href="/books-movies-music">Books, Movies, Music</a>     
 
  <div class="om-maximenu-content closed">
    <div class="om-maximenu-top">
      <div class="om-maximenu-top-left"></div>
      <div class="om-maximenu-top-right"></div>
    </div><!-- /.om-maximenu-top --> 
    <div class="om-maximenu-middle">
      <div class="om-maximenu-middle-left">
        <div class="om-maximenu-middle-right">
           

<div class="block block-menu block-menu-id-menu-om-bmm--explore first">           
  <h3 class="title"><a href="/books-movies-music" title="Explore Your Library" class="om-autoscroll">Explore Your Library</a></h3>  <div class="content"><ul class="menu"><li class="leaf first"><a href="/books-movies-music/reading-suggestions" title="" class="om-autoscroll">Reading Suggestions</a></li>
<li class="leaf"><a href="/blog/Books%20Movies%20Music%20" title="" class="om-autoscroll">Blogs</a></li>
<li class="leaf"><a href="/books-movies-music/book-groups" title="" class="om-autoscroll">Book Groups</a></li>
<li class="leaf active-trail"><a href="/books-movies-music/juvenile-series" title="" class=" long active om-autoscroll">Juvenile Series and Sequels</a></li>
<li class="leaf"><a href="/books-movies-music/based-book" title="" class="om-autoscroll">Based on the Book</a></li>
<li class="leaf last"><a href="/online-information/check-library" title="The &quot;Check Library&quot; button lets you know whether a title is available at MCPL from bookstores and other websites across the web." class="om-autoscroll">Check My Library</a></li>
</ul></div>
  </div><!-- /.block -->
 

<div class="block block-menu block-menu-id-menu-om-bmm-download">           
  <h3 class="title"><a href="/books-movies-music/download-stream" title="Download &amp; Stream" class="om-autoscroll">Download &amp; Stream</a></h3>  <div class="content"><ul class="menu"><li class="leaf first"><a href="/books-movies-music/eaudiobooks" title="" class="om-autoscroll">eAudiobooks</a></li>
<li class="leaf"><a href="/books-movies-music/ebooks" title="" class="om-autoscroll">eBooks</a></li>
<li class="leaf"><a href="/books-movies-music/emagazines" title="" class="om-autoscroll">eMagazines</a></li>
<li class="leaf"><a href="/books-movies-music/emovies" title="" class="om-autoscroll">eMovies</a></li>
<li class="leaf last"><a href="/books-movies-music/emusic" title="" class="om-autoscroll">eMusic</a></li>
</ul></div>
  </div><!-- /.block -->
 


<div class="block block-block block-block-id-92 last">           
    <div class="content"><!EMAGAZINES-->
<div class="featured" style="display: block;">
<h2 style="background: none; margin-top: .5em;">Featured</h2>

<p><a href="http://www.mymcpl.org/books-movies-music/emagazines" title="eMagazines"><img style="float: right; margin-left: 10px; margin-right: 10px;" src="http://www.mymcpl.org/_uploaded_resources/feature-magazines.jpg" alt="eMagazines"  /></a></p>

<p>MCPL offers two eMagazine services that allow you access to over 200 popular digital magazines from <em>Time</em> to <em>Rolling Stone</em> and <em>PC World</em> to <em>People</em>.</p>

<p><strong><a href="http://www.mymcpl.org/books-movies-music/emagazines" title="eMagazines">Download a magazine ▶</a></strong></p>
</div></div>
            </div>
          <div class="om-clearfix"></div>
        </div><!-- /.om-maximenu-middle-right --> 
      </div><!-- /.om-maximenu-middle-left --> 
    </div><!-- /.om-maximenu-middle --> 
    <div class="om-maximenu-bottom">
      <div class="om-maximenu-bottom-left"></div>
      <div class="om-maximenu-bottom-right"></div>
    </div><!-- /.om-maximenu-bottom -->  
    <div class="om-maximenu-arrow"></div>
    <div class="om-maximenu-open">
      <input type="checkbox" value="" />
      Stay    </div><!-- /.om-maximenu-open -->  
  </div><!-- /.om-maximenu-content -->  
 
 

      
  </li>
  
    
  

  
          
                  

   
  <li id="om-leaf-om-u1-24886828-3" class="om-leaf leaf-online-information">   
    <a class="om-link  link-online-information om-autoscroll" href="/online-information">Online Information</a>     
 
  <div class="om-maximenu-content closed">
    <div class="om-maximenu-top">
      <div class="om-maximenu-top-left"></div>
      <div class="om-maximenu-top-right"></div>
    </div><!-- /.om-maximenu-top --> 
    <div class="om-maximenu-middle">
      <div class="om-maximenu-middle-left">
        <div class="om-maximenu-middle-right">
           

<div class="block block-block block-block-id-133 first">           
  <h3 class="title">Start Your Research</h3>  <div class="content">       
<!--
==========================================================================================
        START: EDS HTML Only Search Box Functionality
==========================================================================================
-->

<form id="edsSearchBlock" action="http://search.ebscohost.com/login.aspx" method="get" target="_blank" style="/* text-align:center */">
  <input name="direct" value="true" type="hidden">
        <input name="scope" value="site" type="hidden">
        <input name="site" value="eds-live" type="hidden">
        <!-- Authentication type -->
        <input name="authtype" value="ip,guest" type="hidden">
    <input name="custid" value="077-414" type="hidden">
        <input name="groupid" value="main" type="hidden">
        <input name="profile" value="eds" type="hidden">
    <!-- Search box and Submit button -->
        <span id="edsSearchWrapperBlock"><input class="edsSearchBox" id="ebscohostsearchtextBlock" name="bquery" value="" type="text" size="" style="font-size: 1.7em;padding-left:5px;margin:5px;display: inline-block;height: 1.8em;border-radius: 3px;width: 69%;" placeholder="I want to research..." autocomplete="off" onkeyup="autocomp()"></span>
        <input type="submit" value="Find Results" class="ebscohost-search-button bluebutton" style="display: inline-block;">
        
</form>

<!--
==========================================================================================
        END: EDS HTML Only Search Box Functionality
==========================================================================================
-->    

<script type="text/javascript">
$("#ebscohostsearchtextBlock").focus(function() {
      $(".leaf-online-information .om-maximenu-content").addClass('open');
      $(".leaf-online-information").addClass('open');     
      $(".leaf-online-information .om-maximenu-content").removeClass('closed');
    });
$("#ebscohostsearchtextBlock").blur(function() {
        $(".leaf-online-information .om-maximenu-content").removeClass('open');
      $(".leaf-online-information").removeClass('open');      
      $(".leaf-online-information .om-maximenu-content").addClass('closed');
    });

</script>

</div>
  </div><!-- /.block -->
 

<div class="block block-menu block-menu-id-menu-om-onlineinfo--tools">           
  <h3 class="title"><a href="/online-information" title="Research Tools" class="om-autoscroll">Research Tools</a></h3>  <div class="content"><ul class="menu"><li class="leaf first"><a href="/online-information/online-learning" title="" class="om-autoscroll">Online Learning</a></li>
<li class="leaf"><a href="/online-information/research-database" title="" class="om-autoscroll">Research Databases</a></li>
<li class="leaf"><a href="/online-information/web-resources" title="" class="om-autoscroll">Web Resources</a></li>
<li class="leaf"><a href="/genealogy/resources-genealogy-family-history" title="" class="om-autoscroll">Genealogy Tools</a></li>
<li class="leaf last"><a href="/online-information/mobile-apps" title="" class="om-autoscroll">Mobile Apps</a></li>
</ul></div>
  </div><!-- /.block -->
 

<div class="block block-menu block-menu-id-menu-om-onlineinfo--topics">           
  <h3 class="title"><a href="/online-information/subject-guides" title="Popular Topics" class="om-autoscroll">Popular Topics</a></h3>  <div class="content"><ul class="menu"><li class="leaf first"><a href="/online-information/subject-guides/employment-career-guidance" title="" class=" long om-autoscroll">Employment and Career Guidance</a></li>
<li class="leaf"><a href="/online-information/square-one" title="" class=" long om-autoscroll">Small Business &amp; Entrepreneurship</a></li>
<li class="leaf"><a href="/online-information/subject-guides/adult-literacy" title="" class="om-autoscroll">Adult Literacy</a></li>
<li class="leaf"><a href="/online-information/subject-guides/health-wellness" title="" class="om-autoscroll">Health and Wellness</a></li>
<li class="leaf last"><a href="/online-information/subject-guides" title="" class="om-autoscroll">Other Topics &gt;&gt;</a></li>
</ul></div>
  </div><!-- /.block -->
 

<div class="block block-block block-block-id-90 last">           
    <div class="content"><div class="featured" style="display: block;">
<h2 style="background: none; margin-top: .5em;">Featured</h2>

<p><a href="/online-information/research-databases/Genealogy" title="Genealogy Research" class="om-autoscroll"><img style="float: right; margin-left: 10px; margin-right: 10px;" src="http://www.mymcpl.org/_uploaded_resources/feature-computer.jpg" alt="Genealogy Research" width="200"></a></p>

<p>Research your family history with MCPL. We have over 20 high-quality research resources for you to explore to help you dig up the past on your family tree.</p> 

<p><strong><a href="/online-information/research-databases/Genealogy" title="Genealogy Research" class="om-autoscroll">Start researching ▶</a></strong></p></div>
</div>
  </div><!-- /.block -->
          <div class="om-clearfix"></div>
        </div><!-- /.om-maximenu-middle-right --> 
      </div><!-- /.om-maximenu-middle-left --> 
    </div><!-- /.om-maximenu-middle --> 
    <div class="om-maximenu-bottom">
      <div class="om-maximenu-bottom-left"></div>
      <div class="om-maximenu-bottom-right"></div>
    </div><!-- /.om-maximenu-bottom -->  
    <div class="om-maximenu-arrow"></div>
    <div class="om-maximenu-open">
      <input type="checkbox" value="">
      Stay    </div><!-- /.om-maximenu-open -->  
  </div><!-- /.om-maximenu-content -->  
 

      
  </li>
  
    
  

  
          
                  

   
  <li id="om-leaf-om-u1-24886828-4" class="om-leaf leaf-events">   
    <a class="om-link  link-events om-autoscroll" href="/events">Events</a>     
 
  <div class="om-maximenu-content closed">
    <div class="om-maximenu-top">
      <div class="om-maximenu-top-left"></div>
      <div class="om-maximenu-top-right"></div>
    </div><!-- /.om-maximenu-top --> 
    <div class="om-maximenu-middle">
      <div class="om-maximenu-middle-left">
        <div class="om-maximenu-middle-right">
           

<div class="block block-menu block-menu-id-menu-om-events--categories first">           
  <h3 class="title"><a href="/events/subjects/popular" title="Popular Subjects" class="om-autoscroll">Popular Subjects</a></h3>  <div class="content"><ul class="menu"><li class="leaf first"><a href="/events/calendar?et=1984" title="" class="om-autoscroll">Performances</a></li>
<li class="leaf"><a href="/events/calendar?et=48" title="" class="om-autoscroll">Health and Well-Being</a></li>
<li class="leaf"><a href="/events/calendar?et=1998" title="" class="om-autoscroll">Personal Finance</a></li>
<li class="leaf"><a href="/events/calendar?et=2019" title="" class=" long om-autoscroll">Storytimes (Early Literacy)</a></li>
<li class="leaf"><a href="/events/calendar?et=47" title="" class=" long om-autoscroll">Genealogy and Family History</a></li>
<li class="leaf last"><a href="/events/subjects/list" title="" class="om-autoscroll">More Subjects &gt;&gt;</a></li>
</ul></div>
  </div><!-- /.block -->
 

<div class="block block-menu block-menu-id-menu-om-events--all">           
  <h3 class="title"><a href="/events" title="Programs &amp; Classes" class="om-autoscroll">Programs &amp; Classes</a></h3>  <div class="content"><ul class="menu"><li class="leaf first"><a href="/events" title="" class="om-autoscroll">Beyond the Books Magazine</a></li>
<li class="leaf last"><a href="/events/calendar" title="" class="om-autoscroll">Browse All Events</a></li>
</ul></div>
  </div><!-- /.block -->
 

<div class="block block-menu block-menu-id-menu-om-events--agegroups">           
  <h3 class="title"><a href="/events/age-groups" title="Age Groups" class="om-autoscroll">Age Groups</a></h3>  <div class="content"><ul class="menu"><li class="leaf first"><a href="/events/calendar?audience=2234" title="" class="om-autoscroll">Children &amp; Family</a></li>
<li class="leaf"><a href="/events/calendar?audience=2236" title="" class="om-autoscroll">Teens</a></li>
<li class="leaf last"><a href="/events/calendar?audience=2235" title="" class="om-autoscroll">Adults</a></li>
</ul></div>
  </div><!-- /.block -->
 

          <div class="om-clearfix"></div>
        </div><!-- /.om-maximenu-middle-right --> 
      </div><!-- /.om-maximenu-middle-left --> 
    </div><!-- /.om-maximenu-middle --> 
    <div class="om-maximenu-bottom">
      <div class="om-maximenu-bottom-left"></div>
      <div class="om-maximenu-bottom-right"></div>
    </div><!-- /.om-maximenu-bottom -->  
    <div class="om-maximenu-arrow"></div>
    <div class="om-maximenu-open">
      <input type="checkbox" value="">
      Stay    </div><!-- /.om-maximenu-open -->  
  </div><!-- /.om-maximenu-content -->  
 

      
  </li>
  
    
  

  
          
                  

   
  <li id="om-leaf-om-u1-24886828-5" class="om-leaf leaf-special-resources">   
    <a class="om-link  link-special-resources om-autoscroll" href="/about-us/destinations">Special Resources</a>     
 
  <div class="om-maximenu-content closed">
    <div class="om-maximenu-top">
      <div class="om-maximenu-top-left"></div>
      <div class="om-maximenu-top-right"></div>
    </div><!-- /.om-maximenu-top --> 
    <div class="om-maximenu-middle">
      <div class="om-maximenu-middle-left">
        <div class="om-maximenu-middle-right">
           

<div class="block block-menu block-menu-id-menu-om-special--dest first">           
  <h3 class="title"><a href="/about-us/destinations" title="Destinations" class="om-autoscroll">Destinations</a></h3>  <div class="content"><ul class="menu"><li class="leaf first"><a href="/genealogy" title="" class="om-autoscroll">Midwest Genealogy Center</a></li>
<li class="leaf"><a href="/story-center" title="" class="om-autoscroll">Story Center</a></li>
<li class="leaf"><a href="/about-us/library-go" title="" class="om-autoscroll">Library-To-Go</a></li>
<li class="leaf"><a href="/online-information/square-one" title="" class="om-autoscroll">Square One Small Business</a></li>
<li class="leaf last"><a href="/locations" title="" class="om-autoscroll">All Library Locations &gt;&gt;</a></li>
</ul></div>
  </div><!-- /.block -->
 

<div class="block block-menu block-menu-id-menu-om-speclib--services">           
  <h3 class="title"><a href="/about-us/services" title="Services" class="om-autoscroll">Services</a></h3>  <div class="content"><ul class="menu"><li class="leaf first"><a href="/online-information/square-one" title="" class="om-autoscroll">Business Outreach</a></li>
<li class="leaf"><a href="/about-us/library-by-mail" title="" class="om-autoscroll">Library-By-Mail</a></li>
<li class="leaf"><a href="http://events.mymcpl.org/room.php" title="" class="om-autoscroll">Meeting Rooms</a></li>
<li class="leaf"><a href="/about-us/teacher-assistance" title="" class="om-autoscroll">Teacher Assistance</a></li>
<li class="leaf"><a href="http://askus.mymcpl.org/index.php" title="" class="om-autoscroll">Ask a Librarian</a></li>
<li class="leaf last"><a href="/about-us/services" title="" class="om-autoscroll">All Library Services &gt;&gt;</a></li>
</ul></div>
  </div><!-- /.block -->
 

<div class="block block-block block-block-id-89 last">           
    <div class="content"><div class="featured" style="display: block;">
<h2 style="background: none; margin-top: .5em;">Featured</h2>

<p><a href="/events/story-center-series" title="Story Center" class="om-autoscroll"><img style="float: right; margin-left: 10px; margin-right: 10px;" src="http://www.mymcpl.org/_uploaded_resources/feature-storycenter.jpg" alt="Story Center" width="200"></a></p>

<p>The Story Center regularly hosts events for writers, both beginners and advanced. Whether you're still working on an idea or you're already published, the Story Center can help. </p>

<p><strong><a href="/events/story-center-series" title="Story Center" class="om-autoscroll">More about the Story Center ▶</a></strong></p>
</div></div>
  </div><!-- /.block -->
          <div class="om-clearfix"></div>
        </div><!-- /.om-maximenu-middle-right --> 
      </div><!-- /.om-maximenu-middle-left --> 
    </div><!-- /.om-maximenu-middle --> 
    <div class="om-maximenu-bottom">
      <div class="om-maximenu-bottom-left"></div>
      <div class="om-maximenu-bottom-right"></div>
    </div><!-- /.om-maximenu-bottom -->  
    <div class="om-maximenu-arrow"></div>
    <div class="om-maximenu-open">
      <input type="checkbox" value="">
      Stay    </div><!-- /.om-maximenu-open -->  
  </div><!-- /.om-maximenu-content -->  
 

      
  </li>
  
    
  

  
          
                  

   
  <li id="om-leaf-om-u1-24886828-6" class="om-leaf leaf-kids">   
    <a class="om-link  link-kids om-autoscroll" href="/kids">Kids</a>     
 
  <div class="om-maximenu-content closed">
    <div class="om-maximenu-top">
      <div class="om-maximenu-top-left"></div>
      <div class="om-maximenu-top-right"></div>
    </div><!-- /.om-maximenu-top --> 
    <div class="om-maximenu-middle">
      <div class="om-maximenu-middle-left">
        <div class="om-maximenu-middle-right">
           

<div class="block block-menu block-menu-id-menu-om-kids-forkids first">           
  <h3 class="title"><a href="/mcplkids" title="MCPL Kids" class="om-autoscroll">MCPL Kids</a></h3>  <div class="content"><ul class="menu"><li class="leaf first"><a href="/mcplkids/books-and-reading" title="" class="om-autoscroll">Books and Reading</a></li>
<li class="leaf"><a href="/mcplkids/homework-help" title="" class="om-autoscroll">Homework Help</a></li>
<li class="leaf"><a href="/mcplkids/fun-games" title="" class="om-autoscroll">Fun and Games</a></li>
<li class="leaf"><a href="/mcplkids/stories" title="" class="om-autoscroll">Stories</a></li>
<li class="leaf last"><a href="/mcplkids/movies-videos" title="" class="om-autoscroll">Movies and Videos</a></li>
</ul></div>
  </div><!-- /.block -->
 

<div class="block block-menu block-menu-id-menu-om-kids--parents">           
  <h3 class="title"><a href="/kids/parents-and-educators" title="Parents and Educators" class="om-autoscroll">Parents and Educators</a></h3>  <div class="content"><ul class="menu"><li class="leaf first"><a href="/kids/babies-and-toddlers" title="" class="om-autoscroll">Babies and Toddlers</a></li>
<li class="leaf"><a href="/kids/preschoolers" title="" class="om-autoscroll">Preschoolers</a></li>
<li class="leaf"><a href="/kids/early-literacy" title="" class="om-autoscroll">Early Literacy</a></li>
<li class="leaf"><a href="/kids/storytimes-and-childrens-activities" title="" class="om-autoscroll">Storytimes</a></li>
<li class="leaf last"><a href="/kids/homeschoolers" title="" class="om-autoscroll">Homeschoolers</a></li>
</ul></div>
  </div><!-- /.block -->
 

<div class="block block-block block-block-id-88 last">           
    <div class="content"><div class="featured" style="display: block;">
<h2 style="background: none; margin-top: .5em;">Featured</h2>

<p><a href="/kids/homework-help-kids" title="Homework Help" style="font-size: 13px; font-weight: normal;" class="om-autoscroll"><img style="float: right; margin-left: 10px; margin-right: 10px;" src="http://www.mymcpl.org/_uploaded_resources/feature-homework.jpg" alt="Homework Help" width="200"></a></p>

<p>Need some help with your English homework? Maybe a history or science project? Just need some general tutoring help? MCPL's Homework Help area has the resources you need.</p>

<p><strong><a href="/kids/homework-help-kids" title="Homework Help" class="om-autoscroll">Explore Homework Help ?</a></strong></p>
</div></div>
  </div><!-- /.block -->
          <div class="om-clearfix"></div>
        </div><!-- /.om-maximenu-middle-right --> 
      </div><!-- /.om-maximenu-middle-left --> 
    </div><!-- /.om-maximenu-middle --> 
    <div class="om-maximenu-bottom">
      <div class="om-maximenu-bottom-left"></div>
      <div class="om-maximenu-bottom-right"></div>
    </div><!-- /.om-maximenu-bottom -->  
    <div class="om-maximenu-arrow"></div>
    <div class="om-maximenu-open">
      <input type="checkbox" value="">
      Stay    </div><!-- /.om-maximenu-open -->  
  </div><!-- /.om-maximenu-content -->  
 

      
  </li>
  
    
  

  
          
                  

   
  <li id="om-leaf-om-u1-24886828-7" class="om-leaf leaf-teens">   
    <a class="om-link  link-teens om-autoscroll" href="/teens">Teens</a>     
 
  <div class="om-maximenu-content closed">
    <div class="om-maximenu-top">
      <div class="om-maximenu-top-left"></div>
      <div class="om-maximenu-top-right"></div>
    </div><!-- /.om-maximenu-top --> 
    <div class="om-maximenu-middle">
      <div class="om-maximenu-middle-left">
        <div class="om-maximenu-middle-right">
           

<div class="block block-menu block-menu-id-menu-om-teens-resources first">           
  <h3 class="title"><a href="/teens" title="Teen Resources" class="om-autoscroll">Teen Resources</a></h3>  <div class="content"><ul class="menu"><li class="leaf first"><a href="/teens/recommended-books-movies-music-teens" title="" class="om-autoscroll">Books, Movies, Music</a></li>
<li class="leaf"><a href="/teens/homework-help-teens" title="" class="om-autoscroll">Homework Help</a></li>
<li class="leaf"><a href="/events/calendar?audience=2236" title="" class="om-autoscroll">Teen Events</a></li>
<li class="leaf last"><a href="/online-information/subject-guides/teen-health-resources" title="" class="om-autoscroll">Teen Health</a></li>
</ul></div>
  </div><!-- /.block -->
 

<div class="block block-menu block-menu-id-menu-om-teens-create">           
  <h3 class="title"><a href="/teens/teens-create" title="Teens Create" class="om-autoscroll">Teens Create</a></h3>  <div class="content"><ul class="menu"><li class="leaf first"><a href="/teens/creation-stations" title="" class="om-autoscroll">Creation Stations</a></li>
<li class="leaf"><a href="/teens/in-our-own-words" title="" class="om-autoscroll">In Our Own Words</a></li>
<li class="leaf last"><a href="/teens/tag" title="" class="om-autoscroll">Teen Advisory Group (TAG)</a></li>
</ul></div>
  </div><!-- /.block -->
 

<div class="block block-block block-block-id-101 last">           
    <div class="content"><div class="featured" style="display: block;">
<h2 style="background: none; margin-top: .5em;">Featured</h2>

<p><a href="/teens/homework-help-teens" title="Homework Help" style="font-size: 13px; font-weight: normal;" class="om-autoscroll"><img style="float: right; margin-left: 10px; margin-right: 10px;" src="http://www.mymcpl.org/_uploaded_resources/feature-teenhomework.jpg" alt="Homework Help" width="200"></a></p>

<p>Need some help with your English homework? Maybe a history or science project? Just need some general tutoring help? MCPL's Homework Help area has the resources you need.</p>

<p><strong><a href="teens/homework-help-teens" title="Homework Help" class="om-autoscroll">Explore Homework Help ▶</a></strong></p>
</div></div>
  </div><!-- /.block -->
          <div class="om-clearfix"></div>
        </div><!-- /.om-maximenu-middle-right --> 
      </div><!-- /.om-maximenu-middle-left --> 
    </div><!-- /.om-maximenu-middle --> 
    <div class="om-maximenu-bottom">
      <div class="om-maximenu-bottom-left"></div>
      <div class="om-maximenu-bottom-right"></div>
    </div><!-- /.om-maximenu-bottom -->  
    <div class="om-maximenu-arrow"></div>
    <div class="om-maximenu-open">
      <input type="checkbox" value="">
      Stay    </div><!-- /.om-maximenu-open -->  
  </div><!-- /.om-maximenu-content -->  
 

      
  </li>
  
    
  

  
          
                  

   
  <li id="om-leaf-om-u1-24886828-8" class="om-leaf last leaf-about-us">   
    <a class="om-link  link-about-us om-autoscroll" href="/about-us">About Us</a>     
 
  <div class="om-maximenu-content closed">
    <div class="om-maximenu-top">
      <div class="om-maximenu-top-left"></div>
      <div class="om-maximenu-top-right"></div>
    </div><!-- /.om-maximenu-top --> 
    <div class="om-maximenu-middle">
      <div class="om-maximenu-middle-left">
        <div class="om-maximenu-middle-right">
           

<div class="block block-menu block-menu-id-menu-om-about--info first">           
  <h3 class="title"><a href="/about-us" title="Helpful Information" class="om-autoscroll">Helpful Information</a></h3>  <div class="content"><ul class="menu"><li class="leaf first"><a href="/about-us/frequently-asked-questions" title="" class="om-autoscroll">Frequently Asked Questions</a></li>
<li class="leaf"><a href="/about-us/employment-opportunities" title="" class="om-autoscroll">Employment Opportunities</a></li>
<li class="leaf"><a href="/about-us/support-your-library" title="" class="om-autoscroll">Support Your Library</a></li>
<li class="leaf"><a href="/about-us/administrative-headquarters" title="" class="om-autoscroll">Administration</a></li>
<li class="leaf"><a href="/about-us/press-room" title="" class="om-autoscroll">Press Room</a></li>
<li class="leaf"><a href="/about-us/en-espa%C3%B1ol" title="" class="om-autoscroll">En Español</a></li>
<li class="leaf last"><a href="http://www.mymcpl.org/about-us/mission-and-plan" title="" class="om-autoscroll">Mission and Plan</a></li>
</ul></div>
  </div><!-- /.block -->
 

<div class="block block-menu block-menu-id-menu-om-about--connect">           
  <h3 class="title"><a href="/about-us/contact-us" title="Connect" class="om-autoscroll">Connect</a></h3>  <div class="content"><ul class="menu"><li class="leaf first"><a href="/locations" title="" class="om-autoscroll">Locations Map</a></li>
<li class="leaf"><a href="/about-us/locations" title="" class="om-autoscroll">Locations and Hours List</a></li>
<li class="leaf"><a href="http://www.mymcpl.org/about-us/library-stories" title="" class="om-autoscroll">My Library Story</a></li>
<li class="leaf last"><a href="/about-us/contact-us" title="" class="om-autoscroll">Contact Us</a></li>
</ul></div>
  </div><!-- /.block -->
 

<div class="block block-block block-block-id-86 last">           
    <div class="content"><br>
<div class="social" style="width:17em;">
<ul style="margin:0;">
 <li><a href="http://www.facebook.com/mymcpl" target="_blank" title="Join us on Facebook" class="social-facebook om-autoscroll">Facebook</a></li> 
 <li><a href="http://twitter.com/mcplmo" target="_blank" title="Follow us on Twitter" class="social-twitter om-autoscroll">Twitter</a></li>
 <li><a href="http://vimeo.com/channels/185910" target="_blank" title="Vimeo videos" class="social-vimeo om-autoscroll">Vimeo</a></li>
 <li><a href="http://www.pinterest.com/mcplmo" target="_blank" title="See our Pins" class="social-pintrest om-autoscroll">Pintrest</a> </li>
 <li><a href="http://instagram.com/mcplmo" target="_blank" title="Instagram Photos" class="social-instagram om-autoscroll">Instagram</a></li>
 </ul>
</div></div>
  </div><!-- /.block -->
          <div class="om-clearfix"></div>
        </div><!-- /.om-maximenu-middle-right --> 
      </div><!-- /.om-maximenu-middle-left --> 
    </div><!-- /.om-maximenu-middle --> 
    <div class="om-maximenu-bottom">
      <div class="om-maximenu-bottom-left"></div>
      <div class="om-maximenu-bottom-right"></div>
    </div><!-- /.om-maximenu-bottom -->  
    <div class="om-maximenu-arrow"></div>
    <div class="om-maximenu-open">
      <input type="checkbox" value="">
      Stay    </div><!-- /.om-maximenu-open -->  
  </div><!-- /.om-maximenu-content -->  
 

      
  </li>
  
    
  

  
          
      </ul><!-- /#om-menu-[menu name] -->    
</div><!-- /.om-menu-ul-wrapper -->       
  

  
      </div><!-- /#om-maximenu-[menu name] --> 

      </div><!-- /#navbar -->

    </div> <!-- /header-inner -->

    <div id="breadcrumbs">
      <h4 class="accessibility">You are here:</h4>
        <ol><li class="home"><a href="/">Home</a></li><li><a href="/books-movies-music" title="">Books, Movies, Music</a></li> <li class="current"><span>Juvenile Series and Sequels</span></li></ol>   </div><!-- /#breadcrumbs -->

     </div> <!-- /#header-inner, /#header -->


    <div id="content">
        
          

        <div id="primary">

          <div class="primary">

                        



<div id="node-7042" class="node node-type-interior-2c">
  <div class="node-inner">

    
  
  
  
  <!-- <div class="content"> -->
  <!-- <div id="primary"> -->
    
    
    
<a href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4d75518b54bda27a" class="addthis_button"><img style="padding-left:4px;padding-right:4px" align="right" src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" border="0" alt="Share"></a>

      <h1 class="title">Juvenile Series and Sequels</h1>
        
    <?php print render($page['content']); ?>

  
</div></div> <!-- /node-inner, /node -->
           <div id="content-bottom" class="region region-content_bottom">
      <div id="block-webform-client-block-81789" class="block block-webform region-odd even region-count-1 count-6">
  <div class="block-inner">

  
  <div class="content">
    <form action="/forms/helpful" accept-charset="UTF-8" method="post" id="webform-client-form-81789" class="webform-client-form ajax-form ajax-form" enctype="multipart/form-data">
<div><div class="webform-component webform-component-radios webform-container-inline" id="webform-component-was-this-page-helpful"><div class="form-item">
 <label>Was this page helpful?: <span class="form-required" title="This field is required.">*</span></label>
 <div class="form-radios"><div class="form-item" id="edit-submitted-was-this-page-helpful-1-wrapper">
 <label class="option" for="edit-submitted-was-this-page-helpful-1"><input type="radio" id="edit-submitted-was-this-page-helpful-1" name="submitted[was_this_page_helpful]" value="0" class="form-radio"> Yes</label>
</div>
<div class="form-item" id="edit-submitted-was-this-page-helpful-2-wrapper">
 <label class="option" for="edit-submitted-was-this-page-helpful-2"><input type="radio" id="edit-submitted-was-this-page-helpful-2" name="submitted[was_this_page_helpful]" value="1" class="form-radio"> No</label>
</div>
</div>
</div>
</div><div class="webform-component webform-component-radios" id="webform-component-not" style="display: none;"><div class="form-radios"><div class="form-item" id="edit-submitted-not-1-wrapper">
 <label class="option" for="edit-submitted-not-1"><input type="radio" id="edit-submitted-not-1" name="submitted[not]" value="1" class="form-radio">  Not accurate</label>
</div>
<div class="form-item" id="edit-submitted-not-2-wrapper">
 <label class="option" for="edit-submitted-not-2"><input type="radio" id="edit-submitted-not-2" name="submitted[not]" value="2" class="form-radio">  Not enough information</label>
</div>
<div class="form-item" id="edit-submitted-not-3-wrapper">
 <label class="option" for="edit-submitted-not-3"><input type="radio" id="edit-submitted-not-3" name="submitted[not]" value="3" class="form-radio">  Other</label>
</div>
</div></div><div class="webform-component webform-component-textarea" id="webform-component-tell-us-more" style="display: none;"><div class="form-item" id="edit-submitted-tell-us-more-wrapper">
 <label for="edit-submitted-tell-us-more">Tell us more (Optional): </label>
 <div class="resizable-textarea"><span><textarea cols="60" rows="5" name="submitted[tell_us_more]" id="edit-submitted-tell-us-more" class="form-textarea resizable textarea-processed"></textarea><div class="grippie" style="margin-right: 0px;"></div></span></div>
</div>
</div><input type="hidden" name="submitted[currenturl]" id="edit-submitted-currenturl" value="http://www.mymcpl.org/books-movies-music/juvenile-series">
<div class="webform-component webform-component-markup" id="webform-component-script"><script type="text/javascript">
$('#edit-submitted-currenturl').val(document.URL);
</script></div><input type="hidden" name="details[sid]" id="edit-details-sid" value="">
<input type="hidden" name="details[page_num]" id="edit-details-page-num" value="1">
<input type="hidden" name="details[page_count]" id="edit-details-page-count" value="1">
<input type="hidden" name="details[finished]" id="edit-details-finished" value="0">
<input type="hidden" name="form_build_id" id="form-gVBp93ES0tgh2RR2ht952TT8v9sFxSlPlgZ4KICfaPs" value="form-gVBp93ES0tgh2RR2ht952TT8v9sFxSlPlgZ4KICfaPs">
<input type="hidden" name="form_id" id="edit-webform-client-form-81789" value="webform_client_form_81789">
<input type="hidden" name="honeypot_time" id="edit-honeypot-time" value="1491423301">
<div class="honeypot-textfield"><div class="form-item" id="edit-url2-wrapper">
 <label for="edit-url2">Leave this field blank: </label>
 <input type="text" maxlength="128" name="url2" id="edit-url2" size="20" value="" class="form-text">
</div>
</div><div id="edit-actions" class="form-actions form-wrapper"><input type="submit" name="op" id="edit-submit" value="Submit" class="form-submit ajax-trigger">
</div>
</div></form>
  </div>

  
</div></div> <!-- /block-inner, /block -->
      </div> <!-- /#content-bottom -->

</div><!-- /.primary -->

        
      
        </div><!-- /#primary -->

              
                    <div id="secondary">
          <div id="sidebar-left-inner" class="region region-left">

    <?php print render($page['sidebar1']); ?>
                  
      <h2 id="section">Books, Movies, Music</h2>
  
    <div id="nav-sub">
     <h3 class="accessibility">Sectional Navigation</h3>
    <div class="menu-block-1 menu-name-menu-booksmoviesmusic parent-mlid-0 menu-level-1">
  <ul class="menu"><li class="leaf first menu-mlid-1961"><a href="/books-movies-music/based-book" title="Based on the Book">Based on the Book</a></li>
<li class="leaf menu-mlid-1779"><a href="/books-movies-music/book-awards" title="Book Awards">Book Awards</a></li>
<li class="collapsed menu-mlid-1364"><a href="/books-movies-music/book-groups" title="Book Clubs">Book Groups ▼</a></li>
<li class="expanded parent menu-mlid-6854"><a href="/books-movies-music/download-stream" title="Download &amp; Stream">Download &amp; Stream</a><ul class="menu"><li class="leaf first menu-mlid-1381"><a href="/books-movies-music/eaudiobooks" title="Downloadable Audiobooks">eAudiobooks</a></li>
<li class="leaf menu-mlid-2912"><a href="/books-movies-music/ebooks" title="Downloadable eBooks">eBooks</a></li>
<li class="leaf menu-mlid-4415"><a href="/books-movies-music/emagazines" title="Downloadable Magazines">eMagazines</a></li>
<li class="leaf menu-mlid-3104"><a href="/books-movies-music/emovies" title="Streaming Movies">eMovies</a></li>
<li class="leaf last menu-mlid-3020"><a href="/books-movies-music/emusic" title="eMusic">eMusic</a></li>
</ul></li>
<li class="leaf menu-mlid-1976 active active-trail"><span></span><a href="/books-movies-music/juvenile-series" title="Juvenile Series and Sequels" class="active-trail long active"><span></span>Juvenile Series and Sequels</a></li>
<li class="collapsed last menu-mlid-3665"><a href="/books-movies-music/reading-suggestions" title="Reading Suggestions">Reading Suggestions ▼</a></li>
</ul></div>
  </div>

  

<div id="block-block-98" class="block block-block region-even even region-count-2 count-2">
  <div class="block-inner">

      <h2 class="title"><span>Find Your Next Read</span></h2>
  
  <div class="content">
    <div>
<table border="0" align="center" style="margin-left:5px;"><tbody>
<tr>
<td align="left"><h4><a href="/books-movies-music/adrenaline" style="text-decoration: none;">Adrenaline</a></h4></td>
<td align="right"><h4><a href="/books-movies-music/mystery" style="text-decoration: none;">Mystery</a></h4></td>
</tr><tr>
<td><h4><a href="/books-movies-music/fantasy" style="text-decoration: none;">Fantasy</a></h4></td>
<td align="right"><h4><a href="/books-movies-music/nonfiction" style="text-decoration: none;">Nonfiction</a></h4></td>
</tr><tr>
<td><h4><a href="/books-movies-music/fiction" style="text-decoration: none;">Fiction</a></h4></td>
<td align="right"><h4><a href="/books-movies-music/romance" style="text-decoration: none;">Romance</a></h4></td>
</tr><tr>
<td><h4><a href="/books-movies-music/historical-fiction" title="Historical Fiction" style="text-decoration: none;">Historical</a></h4></td>
<td align="right"><h4><a href="/books-movies-music/sci-fi" style="text-decoration: none;">Sci-Fi</a></h4></td>
</tr><tr>
<td><h4><a href="/books-movies-music/horror" title="Horror" style="text-decoration: none;">Horror</a></h4></td>
<td align="right"><h4><a href="/books-movies-music/western" style="text-decoration: none;">Western</a></h4></td>
</tr><tr>
<td><h4><a href="/books-movies-music/inspirational" style="text-decoration: none;">Inspirational</a></h4></td>
<td align="right"><h4><a href="/books-movies-music/womens-fiction" title="Women's Fiction" style="text-decoration: none;">Women's</a></h4></td>
</tr></tbody></table>
</div>  </div>

  
</div></div> <!-- /block-inner, /block -->

<div class="block">
<div class="related-info">
      <h3>Related Information</h3>
  
        <!-- a href="/online-resources/research-databases">Research Databases</a><br />
        <a href="/online-resources/subject-guides">Subject Guides</a -->
        
    <ul class="menu"><li class="leaf first"><a href="/teens/recommended-books-movies-music-teens" title="Books, Movies, Music for Teens" class=" long">Books, Movies, Music for Teens</a></li>
<li class="leaf"><a href="/kids/books-and-more-kids" title="Books and More for Kids">Books and More for Kids</a></li>
<li class="leaf"><a href="/kids/books-and-more-preschoolers" title="Books and More for Preschoolers" class=" long">Books and More for Preschoolers</a></li>
<li class="leaf"><a href="/kids/books-and-more-babies-and-toddlers" title="Books and More for Babies and Toddlers">Books and More for Babies</a></li>
<li class="leaf last"><a href="http://www.mymcpl.org/online-resources/research-databases/Books%20and%20Reading" title="Books and Reading Databases" class=" long">Books and Reading Databases</a></li>
</ul>
  </div>
</div><div id="block-block-3" class="block block-block region-even even region-count-4 count-4"><div class="block-inner">

  

    <div class="view view-Promotions view-id-Promotions view-display-id-block_1 view-dom-id-1">
    
  
  
      <div class="view-content">
        <div class="views-row views-row-1 views-row-odd views-row-first">
      
  <div class="views-field-field-image-one-fid">
                <span class="field-content"><div class="ad">
<a href="http://www.mymcpl.org/about-us/future">
<img class="imagefield imagefield-field_image_one" width="208" height="101" title="Event" alt="Special Event" src="http://www.mymcpl.org/_uploaded_resources/Library_future.jpg?1488828065">
</a>
</div>
  </span></div>
  </div>
  <div class="views-row views-row-2 views-row-even views-row-last">
      
  <div class="views-field-field-image-one-fid">
                <span class="field-content"><div class="ad">
<a href="http://www.mymcpl.org/books-movies-music/based-book">
<img class="imagefield imagefield-field_image_one" width="208" height="101" title="Event" alt="Special Event" src="http://www.mymcpl.org/_uploaded_resources/basedonthebook.jpg?1286370938">
</a>
</div>
  </span></div>
  </div>
    </div>
  
  
  
  
  
  
</div> 

  
</div></div> <!-- /block-inner, /block -->
<div id="block-block-4" class="block block-block region-odd odd region-count-5 count-5">
  <div class="block-inner">

  
  <div class="content">
    <div class="cta-newsletter"><a href="/books-movies-music/reading-suggestions" title="Reading Suggestions">Get Reading Suggestions</a></div>
  </div>

  
</div></div> <!-- /block-inner, /block -->

          </div>
        </div> <!-- /#sidebar-left-inner, /#sidebar-left -->
            
</div> <!--  /#content -->

<!-- </div></div> --><!-- /#page-inner-->

</div> <!-- /#page  -->
</div><!-- /#wrapper -->



          <div id="footer"><div id="footer-inner" class="region region-footer">

        
        
<div class="cols">
    <h4 class="accessibility">Popular Links</h4>
    <div class="col">
      <h5>Services</h5>
      <ul>
                                <li><a href="/newcard">Apply for a Library Card Online</a></li>                               
                                <li><a href="http://events.mymcpl.org/room.php">Meeting Rooms</a></li>                               
                                <li><a href="/about-us/interlibrary-loan">Interlibrary Loan</a></li>
                                <li><a href="/about-us/library-by-mail">Library-By-Mail (Homebound)</a></li>
                                <li><a href="/about-us/teacher-assistance">Teacher Assistance</a></li>
        <li><a href="/kids/daycare-school-visits">Daycare and School Visits</a></li>
        <li><a href="/about-us/voter-registration">Voter Registration</a></li>
        <li><a href="/about-us/services/mobile-print">Mobile Device Printing</a></li>                                
                                <li><a href="/about-us/services">All Services &gt;&gt;</a></li>



        </ul>
    </div><!-- /.col -->
    
    <div class="col">
      <h5>Blogs</h5>
      <ul>
        <li><a href="/blog">All</a></li>
                                <li><a href="/blog/Books Movies Music">Books, Movies, Music</a></li>
                                <li><a href="/blog/Front Page">Front Page</a></li>   
        <li><a href="/blog/Genealogy">Genealogy</a></li>
                                <li><a href="/blog/Homeschool">Homeschool</a></li>
                                <li><a href="/blog/Teens">Teens</a></li>
                                <li><a href="/online-resources/rss-feeds">RSS Feeds</a></li>
      </ul>
    </div><!-- /.col -->
    
    <div class="col">
      <h5>Help/FAQs</h5>      
      <ul>
                                                                <li><a href="/about-us/locations">Locations and Hours</a></li>
                                                                <li><a href="/about-us/employment-opportunities">Employment Opportunities</a></li>
                                                                <li><a href="/about-us/frequently-asked-questions">Get a Card</a></li>
                                                                <li><a href="/about-us/frequently-asked-questions">Help With My Account</a></li>
                                                                <li><a href="http://askus.mymcpl.org/index.php">Ask a Librarian</a></li>
                                                                <li><a href="/about-us/en-espanol">En Español</a></li>
                                                                <li><a href="/about-us/frequently-asked-questions#Does the library offer Wi-Fi access if I bring in my laptop? Answer">Wi-Fi Access</a></li>
                                                                <li><a href="/about-us/contact-us">Contact Us</a></li>
                                                                <li><a href="/about-us/privacy-policy" alt="Privacy Policy">Privacy Policy</a></li>
                                                                <li><a href="/about-us/support-your-library" alt="Support Your Library">Support Your Library</a></li>
                                                           
      </ul>
    </div><!-- /.col -->

    <div class="col social">
      <h5>Stay Connected</h5>
      <ul>
<!-- http://www.facebook.com/pages/Independence-MO/Mid-Continent-Public-Library/113650577272?ref=sgm&__a=4 -->
        <li><a href="http://www.facebook.com/mymcpl" class="social-facebook" target="_blank" title="Join us on Facebook">Facebook</a></li>
        <li><a href="http://twitter.com/mcplmo" class="social-twitter" target="_blank" title="Follow us on Twitter">Twitter</a></li>
        <li><a href="http://vimeo.com/channels/185910" class="social-vimeo" target="_blank" title="Vimeo videos">Vimeo</a></li>
        <li><a href="http://www.pinterest.com/mcplmo" class="social-pintrest" target="_blank" title="See our Pins">Pintrest</a>
                                </li><li><a href="http://instagram.com/mcplmo" class="social-instagram" target="_blank" title="Instagram Photos">Instagram</a>
</li>
      </ul>


<a href="http://www.mymcpl.org/about-us/feedback"><img src="http://www.mymcpl.org/_uploaded_resources/talktous_bottom.gif" width="134" height="45"></a>

<h5><br><br>Sharing Tools</h5>

<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a href="https://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4d75518b54bda27a" class="addthis_button_compact at300m"><span class="at-icon-wrapper" style="background-color: rgb(255, 101, 80); line-height: 16px; height: 16px; width: 16px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" title="More" alt="More" style="width: 16px; height: 16px;" class="at-icon at-icon-addthis"><g><path d="M18 14V8h-4v6H8v4h6v6h4v-6h6v-4h-6z" fill-rule="evenodd"></path></g></svg></span>Share</a>
<a class="addthis_button_email addthis_button_preferred_1 at300b" target="_blank" title="Email" href="#"><span class="at-icon-wrapper" style="background-color: rgb(132, 132, 132); line-height: 16px; height: 16px; width: 16px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" title="Email" alt="Email" style="width: 16px; height: 16px;" class="at-icon at-icon-email"><g><g fill-rule="evenodd"></g><path d="M27 22.757c0 1.24-.988 2.243-2.19 2.243H7.19C5.98 25 5 23.994 5 22.757V13.67c0-.556.39-.773.855-.496l8.78 5.238c.782.467 1.95.467 2.73 0l8.78-5.238c.472-.28.855-.063.855.495v9.087z"></path><path d="M27 9.243C27 8.006 26.02 7 24.81 7H7.19C5.988 7 5 8.004 5 9.243v.465c0 .554.385 1.232.857 1.514l9.61 5.733c.267.16.8.16 1.067 0l9.61-5.733c.473-.283.856-.96.856-1.514v-.465z"></path></g></svg></span></a>
<a class="addthis_button_facebook addthis_button_preferred_2 at300b" title="Facebook" href="#"><span class="at-icon-wrapper" style="background-color: rgb(59, 89, 152); line-height: 16px; height: 16px; width: 16px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" title="Facebook" alt="Facebook" style="width: 16px; height: 16px;" class="at-icon at-icon-facebook"><g><path d="M22 5.16c-.406-.054-1.806-.16-3.43-.16-3.4 0-5.733 1.825-5.733 5.17v2.882H9v3.913h3.837V27h4.604V16.965h3.823l.587-3.913h-4.41v-2.5c0-1.123.347-1.903 2.198-1.903H22V5.16z" fill-rule="evenodd"></path></g></svg></span></a>
<a class="addthis_button_twitter addthis_button_preferred_3 at300b" title="Twitter" href="#"><span class="at-icon-wrapper" style="background-color: rgb(29, 161, 242); line-height: 16px; height: 16px; width: 16px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" title="Twitter" alt="Twitter" style="width: 16px; height: 16px;" class="at-icon at-icon-twitter"><g><path d="M27.996 10.116c-.81.36-1.68.602-2.592.71a4.526 4.526 0 0 0 1.984-2.496 9.037 9.037 0 0 1-2.866 1.095 4.513 4.513 0 0 0-7.69 4.116 12.81 12.81 0 0 1-9.3-4.715 4.49 4.49 0 0 0-.612 2.27 4.51 4.51 0 0 0 2.008 3.755 4.495 4.495 0 0 1-2.044-.564v.057a4.515 4.515 0 0 0 3.62 4.425 4.52 4.52 0 0 1-2.04.077 4.517 4.517 0 0 0 4.217 3.134 9.055 9.055 0 0 1-5.604 1.93A9.18 9.18 0 0 1 6 23.85a12.773 12.773 0 0 0 6.918 2.027c8.3 0 12.84-6.876 12.84-12.84 0-.195-.005-.39-.014-.583a9.172 9.172 0 0 0 2.252-2.336" fill-rule="evenodd"></path></g></svg></span></a>
<a class="addthis_button_google_plusone at300b" g:plusone:count="false"><div class="google_plusone_iframe_widget" style="width: 90px; height: 25px;"><span><div id="___plusone_0" style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 24px; height: 15px;"><iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 24px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 15px;" tabindex="0" vspace="0" width="100%" id="I0_1491423373621" name="I0_1491423373621" src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&amp;count=false&amp;size=small&amp;hl=en-US&amp;origin=http%3A%2F%2Fwww.mymcpl.org&amp;url=http%3A%2F%2Fwww.mymcpl.org%2Fbooks-movies-music%2Fjuvenile-series&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en.vrtHTaKzzso.O%2Fm%3D__features__%2Fam%3DAQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCPZ4_lNJTiQfZtzIuOJSmTiSF6J9A#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh&amp;id=I0_1491423373621&amp;parent=http%3A%2F%2Fwww.mymcpl.org&amp;pfname=&amp;rpctoken=35414362" data-gapiattached="true" title="+1"></iframe></div></span></div></a>
<a href="https://pinterest.com/mcplmo/"><img src="https://passets-cdn.pinterest.com/images/small-p-button.png" width="16" height="16" alt="Pinterest" title="Pinterest" style="padding-left:2px"></a>
<div class="atclear"></div></div>
<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
<script type="text/javascript" src="https://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4d75518b54bda27a"></script>
<!-- AddThis Button END -->

    </div><!-- /.col social -->   
    
    <p>© 1995-2016 Mid-Continent Public Library. All rights reserved.</p>

  </div><!-- /.cols -->



            

              </div></div><div id="_atssh" style="visibility: hidden; height: 1px; width: 1px; position: absolute; top: -9999px; z-index: 100000;"><iframe id="_atssh333" title="AddThis utility frame" src="http://s7.addthis.com/static/sh.0d19417fd0a004d73df6a35b.html#rand=0.07450962740514822&amp;iit=1491423373416&amp;tmr=load%3D1491423373292%26core%3D1491423373357%26main%3D1491423373407%26ifr%3D1491423373422&amp;cb=0&amp;cdn=0&amp;md=0&amp;kw=&amp;ab=-&amp;dh=www.mymcpl.org&amp;dr=http%3A%2F%2Fwww.mymcpl.org%2F&amp;du=http%3A%2F%2Fwww.mymcpl.org%2Fbooks-movies-music%2Fjuvenile-series&amp;href=http%3A%2F%2Fwww.mymcpl.org%2Fbooks-movies-music%2Fjuvenile-series&amp;dt=Juvenile%20Series%20and%20Sequels%20%7C%20mymcpl.org%20-%20Mid-Continent%20Public%20Library&amp;dbg=0&amp;cap=tc%3D0%26ab%3D0&amp;inst=1&amp;jsl=33&amp;prod=undefined&amp;lng=en&amp;ogt=&amp;pc=men&amp;pub=ra-4d75518b54bda27a&amp;ssl=0&amp;sid=58e5508d3160843d&amp;srpl=1&amp;srf=0.01&amp;srx=1&amp;ver=300&amp;xck=0&amp;xtr=0&amp;og=&amp;csi=undefined&amp;rev=v7.11.0-wp&amp;ct=1&amp;xld=1&amp;xd=1" style="height: 1px; width: 1px; position: absolute; top: 0px; z-index: 100000; border: 0px; left: 0px;"></iframe></div><style id="service-icons-0"></style> <!-- /#footer-inner, /#footer -->
    
      <div id="closure-blocks" class="region region-closure"><div id="block-block-68" class="block block-block region-odd odd region-count-1 count-9">
  <div class="block-inner">

  
  <div class="content">
    <div class="oo_feedback_float" style="right: 10px;" onclick="document.feedback.submit()">
<span class="accessibility">Screen reader users: Please switch to forms mode for this link.</span>

<div class="olUp" tabindex="0">Feedback</div>
<div class="olOver"><span>Click to<br>leave a<br> comment</span></div>
<div class="oo_transparent"></div>
</div>
<script type="text/javascript">
//Show or hide alternate text in the feedback float box
$(".oo_feedback_float").hover(
     function () {
    $(".olUp").fadeOut(200).hide();
    $(".olOver").fadeIn(200).show();
   },
 function () {
    $(".olUp").fadeIn(100).show();
    $(".olOver").fadeOut(200).hide();
    }
);
</script>

       <script type="text/javascript">
         window.onload=function(){
         document.getElementById('url').value = document.URL;
         }
       </script>

<form id="feedback" name="feedback" method="post" action="/about-us/feedback">
<input type="hidden" name="url" id="url" value="http://www.mymcpl.org/books-movies-music/juvenile-series">
</form>  </div>

  
</div></div> <!-- /block-inner, /block -->
</div>
  
  <script type="text/javascript">
<!--//--><![CDATA[//><!--
var _gaq = _gaq || [];_gaq.push(["_setAccount", "UA-10778993-2"]);var pluginUrl = 
 '//www.google-analytics.com/plugins/ga/inpage_linkid.js';
_gaq.push(['_require', 'inpage_linkid', pluginUrl]);_gaq.push(["_trackPageview"]);(function() {var ga = document.createElement("script");ga.type = "text/javascript";ga.async = true;ga.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";var s = document.getElementsByTagName("script")[0];s.parentNode.insertBefore(ga, s);})();
//--><!]]>
</script>



<iframe name="oauth2relay712645282" id="oauth2relay712645282" src="https://accounts.google.com/o/oauth2/postmessageRelay?parent=http%3A%2F%2Fwww.mymcpl.org&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en.vrtHTaKzzso.O%2Fm%3D__features__%2Fam%3DAQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCPZ4_lNJTiQfZtzIuOJSmTiSF6J9A#rpctoken=1865993141&amp;forcesecure=1" tabindex="-1" aria-hidden="true" style="width: 1px; height: 1px; position: absolute; top: -100px;"></iframe> 