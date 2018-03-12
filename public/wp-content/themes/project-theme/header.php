<?php
	use Theme\Bootstrap\Helpers;
	use Theme\Bootstrap\Render;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<title><?= Helpers::getPageTitle(); ?></title>

		<meta name="theme-color" content="#333">
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div class="l-site">
			<header class="l-site__header">
				<div class="l-header">
					<div class="l-header__bar">
						<div class="l-header__logo">
							<?php // .c-logo goes here ?>
						</div>
					</div>
					<div class="l-header__menu-trigger">
						<div class="c-hamburger js-hamburger">
					    	<span class="c-hamburger__bar"></span>
						</div>
					</div>
					<div class="l-header__nav">
						<?= Render::view('Components/c-nav'); ?>
					</div>
				</div>
			</header>

			<main class="l-site__main">
