<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php if(is_home()) bloginfo('name'); else wp_title(''); ?></title>
    <?php wp_head(); ?>


    <meta name="viewport" content="width=device-width">
</head>
<body <?php body_class(); ?>>

	<header id="header" class="">
		<nav>
			<div>
				<h1>T-shirts</h1>
			</div>
			<ul>
				<li>
					<a href="<?php echo esc_url( '/' ); ?>" title="">
						Home
					</a>
				</li>
				<li>
					<a href="<?php echo esc_url( '/shop' ); ?>" title="">
						Shop
					</a>
				</li>
				<li>
					<a href="<?php echo esc_url( '/cart' ); ?>" title="">
						Cart
					</a>
				</li>
			</ul>
		</nav>
	</header>
	<!-- /header -->