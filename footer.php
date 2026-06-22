<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cio
 */

?>
</main>
<footer class="app-footer">
    <div class="container">
        <div class="app-footer__panel">
            <div class="app-footer__left">
                <a class="app-footer__logo" href="<?php echo esc_url(get_home_url()); ?>">
                    <img src="<?php echo esc_url(get_field('logo', 'options')); ?>" />
                </a>
                <p class="app-footer__text">
                    Your trusted international freight
                    forwarding partner since 2016.
                    Moving 120,000+ tons annually
                    across 150+ countries with FIATA,
                    IATA & ISO 9001 certifications.
                </p>
                <ul class="app-footer__media">
                    <li><a href="#">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_2_713)">
                                    <path d="M13.5 1.5H11.25C10.2554 1.5 9.30161 1.89509 8.59835 2.59835C7.89509 3.30161 7.5 4.25544 7.5 5.25V7.5H5.25V10.5H7.5V16.5H10.5V10.5H12.75L13.5 7.5H10.5V5.25C10.5 5.05109 10.579 4.86032 10.7197 4.71967C10.8603 4.57902 11.0511 4.5 11.25 4.5H13.5V1.5Z" stroke="white" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_2_713">
                                        <rect width="18" height="18" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </a></li>
                    <li><a href="#">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_2_716)">
                                    <path d="M12.75 1.5H5.25C3.17893 1.5 1.5 3.17893 1.5 5.25V12.75C1.5 14.8211 3.17893 16.5 5.25 16.5H12.75C14.8211 16.5 16.5 14.8211 16.5 12.75V5.25C16.5 3.17893 14.8211 1.5 12.75 1.5Z" stroke="white" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12 8.52773C12.0926 9.15191 11.9859 9.78939 11.6953 10.3495C11.4047 10.9096 10.9449 11.3638 10.3812 11.6475C9.81757 11.9312 9.17883 12.0299 8.55583 11.9297C7.93284 11.8294 7.35731 11.5353 6.91112 11.0891C6.46493 10.6429 6.17079 10.0674 6.07054 9.44439C5.9703 8.82139 6.06904 8.18265 6.35274 7.61901C6.63643 7.05537 7.09063 6.59553 7.65073 6.30491C8.21083 6.01428 8.84831 5.90767 9.47249 6.00023C10.1092 6.09464 10.6986 6.39132 11.1538 6.84646C11.6089 7.30159 11.9056 7.89103 12 8.52773Z" stroke="white" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M13.125 4.875H13.1325" stroke="white" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_2_716">
                                        <rect width="18" height="18" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </a></li>
                    <li><a href="#">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 6C13.1935 6 14.3381 6.47411 15.182 7.31802C16.0259 8.16193 16.5 9.30653 16.5 10.5V15.75H13.5V10.5C13.5 10.1022 13.342 9.72064 13.0607 9.43934C12.7794 9.15804 12.3978 9 12 9C11.6022 9 11.2206 9.15804 10.9393 9.43934C10.658 9.72064 10.5 10.1022 10.5 10.5V15.75H7.5V10.5C7.5 9.30653 7.97411 8.16193 8.81802 7.31802C9.66193 6.47411 10.8065 6 12 6Z" stroke="white" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M4.5 6.75H1.5V15.75H4.5V6.75Z" stroke="white" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M3 4.5C3.82843 4.5 4.5 3.82843 4.5 3C4.5 2.17157 3.82843 1.5 3 1.5C2.17157 1.5 1.5 2.17157 1.5 3C1.5 3.82843 2.17157 4.5 3 4.5Z" stroke="white" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a></li>
                    <li><a href="#">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.87501 5.25C1.35107 7.72255 1.35107 10.2774 1.87501 12.75C1.94385 13.0011 2.07686 13.2299 2.26096 13.414C2.44506 13.5981 2.67391 13.7312 2.92501 13.8C6.94758 14.4665 11.0524 14.4665 15.075 13.8C15.3261 13.7312 15.5549 13.5981 15.7391 13.414C15.9232 13.2299 16.0562 13.0011 16.125 12.75C16.6489 10.2774 16.6489 7.72255 16.125 5.25C16.0562 4.99891 15.9232 4.77006 15.7391 4.58595C15.5549 4.40185 15.3261 4.26884 15.075 4.2C11.0524 3.53359 6.94759 3.53359 2.92501 4.2C2.67391 4.26884 2.44506 4.40185 2.26096 4.58595C2.07686 4.77006 1.94385 4.99891 1.87501 5.25Z" stroke="white" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7.5 11.25L11.25 9L7.5 6.75V11.25Z" stroke="white" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a></li>
                </ul>
            </div>
            <div class="app-footer__menu">
                <h4 class="app-footer__headline">Services</h4>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'services',
                        'menu_id' => 'footer-menu',
                        'container_class' => 'app-footer__navigation',
                        // 'menu_class' => 'app-navigation__list',
                    )
                );
                ?>
            </div>
            <div class="app-footer__menu">
                <h4 class="app-footer__headline">Routes</h4>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'routes',
                        'menu_id' => 'footer-menu',
                        'container_class' => 'app-footer__navigation',
                        // 'menu_class' => 'app-navigation__list',
                    )
                );
                ?>
            </div>
            <div class="app-footer__menu">
                <h4 class="app-footer__headline">About</h4>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'about',
                        'menu_id' => 'footer-menu',
                        'container_class' => 'app-footer__navigation',
                        // 'menu_class' => 'app-navigation__list',
                    )
                );
                ?>
            </div>
            <div class="app-footer__right">
                <h4 class="app-footer__headline">Stay Updated</h4>
                <p class="app-footer__text">
                    Monthly logistics insights, route
                    updates & industry news.
                </p>
                <?= do_shortcode('[contact-form-7 id="ab04d42" title="Subscraption Form"]') ?>
            </div>
        </div>
        <div class="app-footer__badges">
            <ul>
                <li>✓ ISO 9001:2015</li>
                <li>✓ FIATA Member</li>
                <li>✓ IATA Certified</li>
                <li>✓ IRU Member</li>
                <li>✓ AEO Status</li>
                <li>✓ GDPR Compliant</li>
            </ul>
        </div>
        <div class="app-footer__aditional-links">
            <p class="copyright">
                © 2026 CIO Logistics. All rights reserved.
            </p>
            <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Cookie Policy</a></li>
                <li><a href="#">Anti-Corruption</a></li>
                <li><a href="#">Sitemap</a></li>
            </ul>
        </div>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>