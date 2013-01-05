<!doctype html>

<html>
	<head>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,600italic,300,600" type="text/css" />
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/screen.css" type="text/css" media="screen" />

		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<?php wp_deregister_script('jquery'); ?>

		<?php wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js', 				array(), null, true); ?>
		<?php wp_enqueue_script('flexslider', get_bloginfo('template_directory') . '/js/flexslider/jquery.flexslider.js',	array('jquery'), null, true); ?>
		<?php wp_enqueue_script('functions',  get_bloginfo('template_directory') . '/js/functions.js', 						array('jquery'), null, true); ?>

		<?php if (is_singular()) wp_enqueue_script('comment-reply'); ?>

		<!--[if lt IE 9]>
			<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
		<div id="page">
			<header>
				<hgroup>
					<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
					<h2><?php bloginfo('description'); ?></h2>
				</hgroup>
				
				<nav class="main">
					<ul id="nav">
						<li class="left"></li>
						<?php wp_list_pages('title_li='); ?>
						<li><div class="subscribe"><a href="<?php bloginfo('rss2_url'); ?>">Subscribe</a></div></li>
						<li class="right"></li>
					</ul>
				</nav>
				
				<?php get_template_part('searchform'); ?>

				<div class="clearer"></div>
			</header>