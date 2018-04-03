<?php
use App\Theme\Page;
use App\Theme\Render;
use App\Theme\WordpressHelper;

$page = new Page;
$render = new Render;
$wordpress = new WordpressHelper;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<title><?= $page->getPageTitle(); ?></title>

		<meta name="theme-color" content="#333">
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<div class="u-l-container">
			<div class="l-site-header">
				<div class="l-site-header__title">
					<?= $render->view('Components/c-site-title', $wordpress->getBlogInfo('title')); ?>
				</div>
				<div class="l-site-header__nav">
					<?= $render->view('Components/c-site-nav'); ?>
				</div>
				<div class="l-site-header__social">
					<?= $render->view('Components/c-site-social'); ?>
				</div>
			</div>
		</div>

		<main role="main">
