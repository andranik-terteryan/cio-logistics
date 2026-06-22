<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cio
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- Fonts -->

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
	<?php
	$theme_url = get_stylesheet_directory_uri();

	$favicon_path = $theme_url . '/assets/favicon_io';
	?>
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url($favicon_path); ?>/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url($favicon_path); ?>/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url($favicon_path); ?>/favicon-16x16.png">
	<link rel="manifest" href="<?php echo esc_url($favicon_path); ?>/site.webmanifest">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<header class="app-header">
			<div class="app-header__top">
				<div class="container">
					<div class="app-header__top-panel header-top-actions">
						<?php if (have_rows('top_contacts', 'options')): ?>
							<ul class="header-top-actions__list">
								<?php while (have_rows('top_contacts', 'options')): the_row();

								?>
									<li class="header-top-actions__item">

										<a href="<?= get_sub_field('link_url', 'options') ?>">
											<span class="header-top-actions__icon">
												<?= get_sub_field('link_icon', 'options') ?>
											</span>
											<?= get_sub_field('link_text', 'options') ?>
										</a>
									</li>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>
						<div class="lang">
							<?php
							if (function_exists('pll_the_languages')) {
								$languages = pll_the_languages(array('raw' => 1));

								foreach ($languages as $lang) {
									$slug = strtoupper($lang['slug']);
									$active_class = $lang['current_lang'] ? 'is-active' : '';

									echo '<a href="' . esc_url($lang['url']) . '" class="lang__btn ' . $active_class . '">';
									echo esc_html($slug);
									echo '</a>';
								}
							} else {
								echo '<a href="#" class="lang__btn is-active">EN</a>';
								echo '<a href="#" class="lang__btn">RU</a>';
								echo '<a href="#" class="lang__btn">HY</a>';
							}
							?>
						</div>
						<div class="header-top-actions__customer">
							<a href="<?= get_field('top_right_link_url', 'options') ?>">
								<span class="icon">
									<?= get_field('top_right_link_icon', 'options') ?>
								</span>
								<?= get_field('top_right_link_text', 'options') ?>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="app-header__main-panel">
					<div class="app-header__brand">
						<a href="<?php echo esc_url(get_home_url()); ?>">
							<img src="<?php echo esc_url(get_field('logo', 'options')); ?>" />
						</a>
					</div>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'container' => 'nav',
							'container_class' => 'app-header__navigation app-navigation',
							'menu_class'     => 'app-navigation__list',
						)
					);
					?>
					<div class="app-header__actions">
						<div class="search-block">
							<div class="search-block__icon">
								<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M8.25 14.25C11.5637 14.25 14.25 11.5637 14.25 8.25C14.25 4.93629 11.5637 2.25 8.25 2.25C4.93629 2.25 2.25 4.93629 2.25 8.25C2.25 11.5637 4.93629 14.25 8.25 14.25Z" stroke="#0F1B24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M15.75 15.75L12.525 12.525" stroke="#0F1B24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								</svg>

							</div>
						</div>
						<button class="primary-button primary-button--outlined">
							<span>Track Shipment</span>

						</button>
						<button class="primary-button primary-button--filled">Get Quote →</button>
					</div>
					<div class="hamburger">
						<div class="hamburger__item"></div>
					</div>
				</div>
			</div>

		</header>

		<main class="wrapper">