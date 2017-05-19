<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title><?php echo $pageTitle; ?></title>

	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />

	<meta name="author" content="ISITE Design" />
	<link rel="shortcut icon" href="favicon.ico" />

   	<link rel="stylesheet" type="text/css" media="all" href="css/global.css" />
	<link rel="stylesheet" type="text/css" media="print" href="css/print.css" />

	<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.tools.min.js"></script>
	<script type="text/javascript" src="js/global.js"></script>

</head>

<body class="<?php echo $bodyClass; ?>">

<div id="wrapper">

	<div id="header">
		<div id="header-inner">
			
			<a id="brand" href="/">Mid-Content Public Library</a>
			
			<div id="utility">
				
				<ul class="utility">
					<li><a class="accessibility" href="#content" tabindex="1" accesskey="2">Skip to Content</a></li>
					<li><a class="accessibility" href="#nav" accesskey="3">Skip to Navigation</a></li>
					<li><a class="accessibility" href="#nav-sub">Skip to Section Navigation</a></li>
					<li><a class="accessibility" href="/" accesskey="1">Return to Homepage</a></li>
					<li><a href="#login-global" id="sign-in-link">Sign in to MyMCPL</a></li>
					<li><a href="myaccount.php">View My Account</a></li>
				</ul>
		
				<form action="search" method="post" id="global-search">
					<fieldset>
						<legend class="accessibility">Search</legend>
				
						<ul>
							<li>
								<label for="q" class="accessibility">Enter Your Search Terms</label>
								<input type="text" name="q" value="" id="q" />
							</li>
							<li class="check-radio-wrap">
								<p>
									<span>Search the </span> 
									<label>	<input id="catalog" name="search-type" type="radio" /> Catalog</label>
									<span> or search this</span> 
									<label><input id="website" name="search-type" type="radio" /> Website</label><span>?</span>
								</p>
							</li>
						</ul>
				
						<button type="submit" value="go">Go</button>
			
					</fieldset>
				</form>
		</div><!-- /#utility -->
			
		</div><!-- /#header-inner -->
		
		<div id="breadcrumbs">
			<h4 class="accessibility">You are here:</h4>
			
			<ol>
				<li class="home"><a href="#">Home</a></li>
				<li><a href="#">Parent Page</a></li>
				<li class="current"><span>Current Page Title</span></li>
			</ol>
		</div><!-- /#breadcrumbs -->
		
	</div><!-- /header -->

	<div id="content">
		<?php echo $pageContent; ?>

		<div id="nav">

			<h4 class="accessibility">Main Navigation</h4>
			<ul>
				<li class="nav-books"><a href="#" class="on">Books, Movies, Music</a></li>
				<li class="nav-events"><a href="#">Events</a></li>
				<li class="nav-kids"><a href="#">Kids</a></li>
				<li class="nav-locations"><a href="#">Locations</a></li>

				<li class="nav-catalog"><a href="#">Catalog</a></li>
				<li class="nav-genealogy"><a href="#">Genealogy</a></li>
				<li class="nav-teens"><a href="#">Teens</a></li>
				<li class="nav-about"><a href="#">About Us </a></li>

				<li class="nav-online"><a href="#">Online Resources</a></li>
			</ul>
			
			<script type="text/javascript" charset="utf-8">
				
				/* 
				
					temp for style testing. remove me! 
				
				*/
				if(!$j('body').is('.front')){
					//$j('#nav li:eq(0) a').addClass('on');
				}
				
				$j('#nav a').click(function() {
					var $this = $j(this),
						tc	= $this.parent('li').attr('class'),
						tcClean = tc.substring(4),
						$on	= $j("#nav").find('.on'),
						oc	= $on.parent('li').attr('class'),
						ocClean 	= oc.substring(4);
						
					$on.removeClass('on');
					$j(this).addClass('on');
					$j('body').removeClass('page-'+ocClean).addClass('page-'+tcClean);
					
					return false;
				});
				/*
					/END REMOVE ME
				*/
				
			</script>
			
		</div><!-- /#nav -->

	</div><!-- /content -->
</div><!-- /wrapper -->


<div id="footer">
	<div class="cols">
		<h4 class="accessibility">Popular Links</h4>
		<div class="col">
			<h5>Collections</h5>
			<ul>
				<li><a href="#">Magazine &amp; Journal Archives</a></li>
				<li><a href="#">Children</a></li>
				<li><a href="#">Juvenile &amp; Young Adult</a></li>
				<li><a href="#">Special Collections</a></li>
			</ul>
		</div><!-- /.col -->
		
		<div class="col">
			<h5>Services</h5>
			<ul>
				<li><a href="#">Homebound Services</a></li>
				<li><a href="#">School Visits</a></li>
				<li><a href="#">Daycare &amp; Childcare Providers</a></li>
			</ul>
		</div><!-- /.col -->
		
		<div class="col">
			<h5>Visitors</h5>			
			<ul>
				<li><a href="#">Locations and Directions</a></li>
				<li><a href="#">Visiting MCPL</a></li>
			</ul>
		</div><!-- /.col -->

		<div class="col social">
			<h5>Stay Connected</h5>
			<ul>
				<li><a href="#" class="social-facebook">Facebook</a></li>
				<li><a href="#" class="social-twitter">Twitter</a></li>
				<li><a href="#" class="social-youtube">Youtube</a></li>
				<li><a href="#" class="social-flickr">Flickr</a></li>
			</ul>
		</div><!-- /.col social -->		
		
		<p>&copy; 1995-2010 Mid-Continent Public Library. All rights reserved.</p>

	</div><!-- /.cols -->
	
	
</div> <!-- /footer -->





<div id="login-global">
	<div id="login-global-inner">
		
		<div id="login-info">
			<h3>MyMCPL Sign in</h3>
			<p>Sign in with the following patron information to place holds and check your MCPL account.</p>
		</div><!-- /.login-info -->
	
		<form action="sign-in" method="post" id="login-form">
			<fieldset>
				<legend class="accessibility">Sign in to MCPL with your Card ID and Birthdate</legend>
				<ul>
					<li>
						<label for="card_number_id">Card Number ID</label>
						<input type="text" name="card_number_id" value="" id="card_number_id" />
						<span class="pattern">20000012315678</span>
					</li>

					<li>
						<label for="birth_date">Birth Date</label>
						<input type="text" name="birth_date" value="" id="birth_date" />
						<span class="pattern">mmddyyyy</span>
					</li>
				</ul>
				<button type="submit" value="go">Go</button>
			</fieldset>
		</form>

	</div><!-- /#login-global-inner -->	
</div><!-- /#login-global -->

</body>
</html>