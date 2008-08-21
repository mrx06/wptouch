<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
<meta name="description" content="<?php bloginfo('description'); ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--
Strict viewport options to control how the content is shown. 
Increase the maximum-scale number to allow for zooming if you wish
-->
<meta name="viewport" content="maximum-scale=1.0 width=device-width initial-scale=1.0 user-scalable=no" />
<!--
This makes the iPhone/iPod touch ask for the same icon the user chooses for a logo to be the bookmark icon as well.
-->
<link rel="apple-touch-icon" href="<?php bloginfo('wpurl'); ?>/wp-content/plugins/wptouch/images/icon-pool/<?php echo bnc_get_title_image(); ?>"/>
<!--
This check to see if advanced JS is enabled in the WPtouch admin.
-->
<?php if (bnc_is_js_enabled()) { ?>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.2.6.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/menu.js" type="text/javascript" charset="utf-8"></script>
<?php } ?>
<!--
Disqus commenting check for Ajax Coms JS Need 
-->
<?php
if  (!function_exists('disqus_recent_comments')) { ?>
<?php if (is_single() && bnc_is_js_enabled()) { ?>
<script src="<?php bloginfo('template_directory'); ?>/js/ajaxcoms.js" type="text/javascript"></script>
<?php } elseif (is_page() && bnc_is_page_coms_enabled()) { ?>
<script src="<?php bloginfo('template_directory'); ?>/js/ajaxcoms.js" type="text/javascript"></script>
<?php } ?>
<?php } ?>
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--
In order to have some dynamic user-selected CSS, we've written the below. 
We could pull it out into a css.php file, but it's just a small block and easy to add or modify this way.
-->
<style type="text/css">
#menubar {
	width: 100%;
	height: 45px;
	background: #<?php echo bnc_get_header_background(); ?> url(<?php bloginfo('template_directory'); ?>/images/head-fade-bk.png) repeat-x;
}
#blogtitle a {
	text-decoration: none;
	font: 21px HelveticaNeue-Bold, sans-serif;
	letter-spacing: -1px;
	position: relative;
	color: #<?php echo bnc_get_header_color(); ?>
}
a {
	text-decoration: none;
	color: #<?php echo bnc_get_link_color(); ?>
}
</style>
</head>
<body>
<!--
////////////////////////////
Alright, before we get rocking and rolling, you want not want to touch this code so much, as it holds everything required for the drop down-menu. Users can customize icons, colors, and the title in the header itself, which doesn't leave much room for changing things yourself. 

That said, if you want to get funky with the look of it, you could always change the way the glossy bar looks, by editing 'menu-bk.png' and 'head-fade-bk.png', both of which are in the default/images/ folder.

We've commented below to let you know what works what, so if you do go messing around, you won't break the functionailty of the customization options we've built (hopefully). If you do want to discard them and hard code something yourself, make sure you include that note with your theme.
////////////////////////////
-->
<div id="menubar">

<!--
This fetches the admin selection logo icon for the header, which is also the bookmark icon
-->
<div  id="blogtitle">
<img src="<?php bloginfo('wpurl'); ?>/wp-content/plugins/wptouch/images/icon-pool/<?php echo bnc_get_title_image(); ?>" alt="" /> <a href="<?php bloginfo('siteurl'); ?>"><?php echo bnc_get_header_title(); ?></a></div>
</div>

<!--
This check to see if they've disabled advanced JS and loads it if not.
The toggles work with JS different ways, one with prototype/scriptaculous, the other with just the document.getelement routine...
-->
	<div id="drop-fade">
	<?php if (bnc_is_js_enabled()) { ?>
		    <a href="javascript:$('#wptouch-search').slideToggle(200);">
		<?php } else { ?>
		    <a href="javascript:document.getElementById('wptouch-search').style.display='block';">
		<?php } ?>
		    <img src="<?php bloginfo('template_directory'); ?>/images/menu/search-touchmenu.png" alt="" />
		</a>
	
	<?php if (bnc_is_js_enabled()) { ?>
		<a href="#" onclick="bnc_load_menu('<?php bloginfo('template_directory'); ?>/menu.php'); ">
		<?php } else { ?>
		<a href="javascript:document.getElementById('dropmenu').style.display='block';">
		<?php } ?>        
		<img src="<?php bloginfo('template_directory'); ?>/images/menu/touchmenu.png" alt="" />
		</a>
	</div>

<!--
Our search dropdown
-->
	<div id="wptouch-search" style="display:none">
		<div id="wptouch-search-inner">
			<form method="get" id="searchform" action="<?php bloginfo('siteurl'); ?>/">
			<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" /> 
			<input name="submit" type="submit" id="ssubmit" tabindex="5" value="Search" />
			<?php if (!bnc_is_js_enabled()) { ?>
			<a class="search-close" href="javascript:document.getElementById('wptouch-search').style.display = 'none';">
			<img src="<?php bloginfo('template_directory'); ?>/images/cross.png" alt="" />
			</a>
			<?php } ?>
			</form>
		</div>
	</div>

	<div id="dropmenu" style="display:none">
        <?php if (!bnc_is_js_enabled()) { ?>
        <?php include('menu.php'); ?>
        <?php } ?>
	</div>

<!--
This just checks if the user is trying to use the theme with anything other than WPtouch, and its not an iPhone/iPod touch
-->
	<?php if (false && function_exists('bnc_is_iphone') && !bnc_is_iphone()) { ?>
		<div class="content post">
		<a href="#" class="h2">Warning</a>
			<div class="mainentry">
			Sorry, this theme is only meant for use with WordPress on Apple's iPhone and iPod Touch.
			</div>
		</div>
  
	<?php get_footer(); ?>
	</body> 
	<?php die; } ?>
	
<!--
This div spacer helps get the alignment are squared up after all the CSS floats
-->		
	<div class="post-spacer">&nbsp;</div>
	
	<!--End of the Header-->
