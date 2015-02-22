<!DOCTYPE HTML>
<html>
<head>
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
	<meta http-equiv="content-type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta name="description" content="<?php bloginfo( 'description' ); ?>" />
	<meta name="keywords" content="" />
	<link href='http://fonts.googleapis.com/css?family=Arimo:400,700' rel='stylesheet' type='text/css'>

	<?php wp_head(); ?>
</head>
<body class="homepage">

<!-- Header -->
<div id="header">
	<div class="container">

		<!-- Logo -->
		<div id="logo">
			<h1><a href="#">Iridium</a></h1>
			<span>Design by TEMPLATED</span>
		</div>

		<!-- Nav -->
		<nav id="nav" class="site-navigation" role="navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'main-menu',
					'menu_class' => 'site-menu',
					'container'       => '',
				)
			);
			?>
		</nav>
	</div>
</div>

<!-- Main -->
<div id="main">
	<div class="container">
		<div class="row">