<?php

/**
 * Template Name: Home
 *
 * @package WordPress
 */
get_header()
?>
<section class="hero-section" style="background-image: url(<?= esc_url(get_field('hero_section_background')) ?>);">
    <div class="container">
        <div class="hero-section__main-panel">
            <div class="hero-section__descs">
                <?php if (have_rows('hero_section_badges')): ?>
                    <ul class="hero-section__badges badges">
                        <?php while (have_rows('hero_section_badges')): the_row(); ?>
                            <li class="badges__item"><?php the_sub_field('badge_label') ?></li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>

                <?php if (get_field('section_title_hero')): ?>
                    <h1 class="hero-section__title">
                        <?php the_field('section_title_hero'); ?>
                    </h1>
                <?php endif; ?>

                <?php if (get_field('section_description_hero')): ?>
                    <p class="hero-section__desc">
                        <?php the_field('section_description_hero') ?>
                    </p>
                <?php endif; ?>

                <div class="hero-section__actions">

                    <?php if (get_field('filled_button_text')): ?>
                        <button class="primary-button primary-button--filled">
                            <span><?php the_field('filled_button_text') ?></span>
                        </button>
                    <?php endif; ?>

                    <?php if (get_field('outlined_button_text')): ?>
                        <button class="primary-button primary-button--outlined hero-section__button">
                            <span>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_2_24)">
                                        <path d="M9.45075 16.3492C10.8457 15.1447 15 11.2448 15 7.5C15 5.9087 14.3679 4.38258 13.2426 3.25736C12.1174 2.13214 10.5913 1.5 9 1.5C7.4087 1.5 5.88258 2.13214 4.75736 3.25736C3.63214 4.38258 3 5.9087 3 7.5C3 11.2448 7.15425 15.1447 8.54925 16.3492C8.67921 16.447 8.8374 16.4998 9 16.4998C9.1626 16.4998 9.32079 16.447 9.45075 16.3492Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M9 9.75C10.2426 9.75 11.25 8.74264 11.25 7.5C11.25 6.25736 10.2426 5.25 9 5.25C7.75736 5.25 6.75 6.25736 6.75 7.5C6.75 8.74264 7.75736 9.75 9 9.75Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_2_24">
                                            <rect width="18" height="18" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <?php the_field('outlined_button_text') ?>
                            </span>
                        </button>
                    <?php endif; ?>
                </div>

                <?php if (get_field('trusted_by_title')): ?>
                    <h3 class="hero-section__small-title">
                        <?php the_field('trusted_by_title') ?>
                    </h3>
                <?php endif; ?>

                <?php if (have_rows('trusted_by_lables')): ?>
                    <ul class="hero-section__brand-listing">
                        <?php while (have_rows('trusted_by_lables')): the_row(); ?>
                            <li><?php the_sub_field('label') ?></li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>

            </div>
            <div class="calculator">
                <p class="calculator__subtitle"><?php the_field('calculator_headline') ?></p>
                <div class="calculator__grid">

                    <?php if (have_rows('fields')): ?>
                        <?php while (have_rows('fields')): the_row(); ?>
                            <div class="field">
                                <label class="field__label" for="<?php the_sub_field('field_id') ?>"><?php the_sub_field('field_label') ?></label>
                                <select class="field__select" id="<?php the_sub_field('field_id') ?>">
                                    <?php if (have_rows('fields_group')): ?>
                                        <?php while (have_rows('fields_group')): the_row(); ?>
                                            <option value="<?php the_sub_field('option_value') ?>"><?php the_sub_field('option_label') ?></option>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <div class="slider">
                        <div class="slider__header">
                            <label class="slider__label" for="weight">Gross Weight</label>
                            <span class="slider__value" id="weight-val">500 kg</span>
                        </div>
                        <input class="slider__input" type="range" id="weight" min="10" max="25000" step="10" value="500">
                    </div>

                    <div class="slider">
                        <div class="slider__header">
                            <label class="slider__label" for="volume">Volume</label>
                            <span class="slider__value" id="volume-val">2 CBM</span>
                        </div>
                        <input class="slider__input" type="range" id="volume" min="0.1" max="80" step="0.1" value="2">
                    </div>

                </div>
                <div class="result" id="result">
                    <p class="result__label"><?php the_field('calculator_result_headline') ?></p>
                    <p class="result__price" id="price-range">USD $780 – $953</p>

                    <div class="result__transit">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                            <rect x="3" y="4" width="18" height="18" rx="2" />
                            <line x1="16" y1="2" x2="16" y2="6" />
                            <line x1="8" y1="2" x2="8" y2="6" />
                            <line x1="3" y1="10" x2="21" y2="10" />
                        </svg>
                        Transit Time:&nbsp;<strong id="transit-time">35–45 days</strong>
                    </div>

                    <hr class="result__divider">

                    <div class="result__lines">
                        <div class="result__line">
                            <span>Base Freight Charge:</span>
                            <span class="result__line-value" id="base-charge">$736</span>
                        </div>
                        <div class="result__line">
                            <span>Estimated Customs Handling:</span>
                            <span class="result__line-value" id="customs-fee">$150</span>
                        </div>
                        <div class="result__line">
                            <span>Cargo Insurance (Optional):</span>
                            <span class="result__line-value" id="insurance-fee">$42</span>
                        </div>
                    </div>

                    <button class="primary-button primary-button--filled"><?php the_field('result_button_text') ?></button>

                    <p class="result__disclaimer">
                        <svg width="9" height="12" viewBox="0 0 9 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.06666 6.3502C7.06666 8.11687 5.83 9.00021 4.36013 9.51254C4.28316 9.53862 4.19955 9.53737 4.1234 9.50901C2.65 9.00021 1.41333 8.11687 1.41333 6.3502V3.87687C1.41333 3.78316 1.45056 3.69329 1.51682 3.62703C1.58308 3.56076 1.67295 3.52354 1.76666 3.52354C2.47333 3.52354 3.35666 3.09954 3.97146 2.56247C4.04632 2.49852 4.14154 2.46338 4.24 2.46338C4.33845 2.46338 4.43367 2.49852 4.50853 2.56247C5.12686 3.10307 6.00666 3.52354 6.71333 3.52354C6.80704 3.52354 6.89691 3.56076 6.96318 3.62703C7.02944 3.69329 7.06666 3.78316 7.06666 3.87687V6.3502Z" stroke="#0199F8" stroke-width="0.706667" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M3.17999 5.99695L3.88666 6.70362L5.29999 5.29028" stroke="#0199F8" stroke-width="0.706667" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <?php the_field('result_buttom_desc') ?>
                    </p>
                </div>
            </div>

            <?php if (get_field('trusted_by_title')): ?>
                <h3 class="hero-section__small-title mobile--visible">
                    <?php the_field('trusted_by_title') ?>
                </h3>
            <?php endif; ?>

            <?php if (have_rows('trusted_by_lables')): ?>
                <ul class="hero-section__brand-listing mobile--visible">
                    <?php while (have_rows('trusted_by_lables')): the_row(); ?>
                        <li><?php the_sub_field('label') ?></li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="red-banner">
    <div class="container">
        <div class="red-banner__panel">
            <h3 class="red-banner__title">
                Live Rates:USD 385 AMD · EUR 420 AMD
            </h3>
            <button class="red-banner__action">
                💬 Talk to Expert
            </button>
        </div>
    </div>
</section>

<section class="section-partners">
    <h3 class="section-partners__title">
        THEY TRUST US
    </h3>
    <?php if (have_rows('partners_slider')): ?>
        <div class="swiper partners">
            <div class="swiper-wrapper">
                <?php while (have_rows('partners_slider')): the_row(); ?>
                    <div class="swiper-slide">
                        <div class="partners__image">
                            <img loading="lazy" src="<?php the_sub_field('partners_image') ?>" />
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
</section>

<section class="section-blog">
    <div class="container">
        <div class="section-blog__descs">
            <h4 class="section-small-headline section-blog__subheadline">
                What We Move
            </h4>
            <h2 class="section-headline section-blog__headline">
                Moving Your Products Across All
                Borders
            </h2>
            <p class="section-description section-blog__description">
                Comprehensive freight forwarding solutions tailored to your industry, cargo type, and
                timeline — from a single package to full charter operations.
            </p>
        </div>
        <?php

        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 6,
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC',
        );

        $posts_query = new WP_Query($args);

        if ($posts_query->have_posts()) : ?>
            <div class="section-blog__posts">
                <?php while ($posts_query->have_posts()) : $posts_query->the_post(); ?>

                    <article data-aos="fade-up"
                        data-aos-anchor-placement="top-center" id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                        <div class="post-card__content">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-card__thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <h2 class="post-card__title">
                                <?php the_title(); ?>
                            </h2>

                            <div class="post-card__excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            <a class="post-card__permalink" href="<?php the_permalink(); ?>">Learn More

                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.08334 4.08325H9.91668V9.91659" stroke="#EC1C28" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M4.08334 9.91659L9.91668 4.08325" stroke="#EC1C28" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>

                            <?php if (get_field('post_icon')): ?>
                                <div class="post-card__icon">
                                    <img src=" <?php the_field('post_icon') ?>" alt="Icon">
                                </div>
                            <?php endif; ?>
                        </div>

                    </article>

                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p><?php esc_html_e('No posts found.', 'text-domain'); ?></p>
        <?php
        endif;

        wp_reset_postdata();
        ?>
        <div class="section-blog__action">
            <button class="primary-button primary-button--outlined">
                <span>
                    See all 14+ services →
                </span>

            </button>
        </div>

    </div>
</section>

<section class="track-section">
    <div class="track-section__container">
        <div class="track-section__descs">
            <h4 class="section-small-headline">
                Track Shipment
            </h4>
            <h2 class="section-headline">
                Real-time Cargo Tracking
            </h2>
            <p class="section-description">
                Enter your tracking identifier below to check current transit steps.
            </p>
        </div>
        <div class="tracker">

            <div class="tracker__header">
                <div class="tracker__header__search">
                    <div class="tracker__header__input-wrap">
                        <input
                            class="tracker__header__input"
                            id="trackingInput"
                            type="text"
                            placeholder="Enter tracking number..."
                            aria-label="Tracking number"
                            autocomplete="off"
                            spellcheck="false">
                    </div>
                    <button class="primary-button primary-button--filled" id="trackBtn">
                        Track Shipment
                    </button>
                    <p class="tracker__header__error-msg" id="errorMsg" role="alert"></p>

                </div>
                <p class="tracker__description">
                    💡 Try entering: <span>CIO-CN-9042 </span>or <span>CIO-DE-3029</span> to see realistic tracking workflows.
                </p>
            </div>

            <div class="tracker__skeleton" id="skeleton" aria-hidden="true">
                <div class="skeleton-line skeleton-line--title"></div>
                <div class="skeleton-line skeleton-line--meta"></div>
                <div class="skeleton-steps">
                    <div class="skeleton-step">
                        <div class="skeleton-step__dot"></div>
                        <div class="skeleton-step__lines">
                            <div class="skeleton-line skeleton-line--step skeleton-line--medium"></div>
                            <div class="skeleton-line skeleton-line--step skeleton-line--short"></div>
                        </div>
                    </div>
                    <div class="skeleton-step">
                        <div class="skeleton-step__dot"></div>
                        <div class="skeleton-step__lines">
                            <div class="skeleton-line skeleton-line--step skeleton-line--medium"></div>
                            <div class="skeleton-line skeleton-line--step skeleton-line--short"></div>
                        </div>
                    </div>
                    <div class="skeleton-step">
                        <div class="skeleton-step__dot"></div>
                        <div class="skeleton-step__lines">
                            <div class="skeleton-line skeleton-line--step skeleton-line--medium"></div>
                            <div class="skeleton-line skeleton-line--step skeleton-line--short"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tracker__body" id="trackerBody" aria-live="polite">

                <div class="tracker__body__title-row">
                    <h2 class="tracker__body__title">Shipment Status: <span id="shipmentId"></span></h2>
                    <span class="tracker__body__badge" id="statusBadge"></span>
                </div>

                <div class="tracker__body__meta">
                    <div>
                        <p class="tracker__body__meta__label">Route</p>
                        <p class="tracker__body__meta__value" id="metaRoute"></p>
                    </div>
                    <div>
                        <p class="tracker__body__meta__label">ETA / Delivery</p>
                        <p class="tracker__body__meta__value" id="metaEta"></p>
                    </div>
                    <div>
                        <p class="tracker__body__meta__label">Weight</p>
                        <p class="tracker__body__meta__value" id="metaWeight"></p>
                    </div>
                    <div>
                        <p class="tracker__body__meta__label">Transport Mode</p>
                        <p class="tracker__body__meta__value" id="metaMode"></p>
                    </div>
                </div>


                <ul class="tracker__body__timeline" id="timeline" aria-label="Shipment timeline"></ul>

            </div>

        </div>
    </div>
</section>

<section class="our-result">
    <div class="container">
        <div class="our-result__descs">
            <h4 class="section-small-headline">
                Why CIO Logistics
            </h4>
            <h2 class="section-headline our-result__headline">
                Numbers That Build Trust
            </h2>
            <p class="section-description our-result__desc">
                Real metrics from our 9-year track record serving 150+ countries with measurable, on-
                time delivery performance.
            </p>
        </div>
        <div class="our-result__main">
            <div
                data-aos="fade-up"
                data-aos-anchor-placement="top-center"
                class="our-result__widget result-widget">
                <div class="result-widget__content">
                    <h3 class="result-widget__title">
                        120K+
                    </h3>
                    <p class="result-widget__desc">
                        Tons Shipped Annually
                    </p>
                </div>
            </div>
            <div
                data-aos="fade-up"
                data-aos-delay="200"
                data-aos-anchor-placement="top-center"
                class="our-result__widget result-widget">
                <div class="result-widget__content">
                    <h3 class="result-widget__title">
                        9+
                    </h3>
                    <p class="result-widget__desc">
                        Years of Experience
                    </p>
                </div>
            </div>
            <div
                data-aos="fade-up"
                data-aos-delay="400"
                data-aos-anchor-placement="top-center"
                class="our-result__widget result-widget">
                <div class="result-widget__content">
                    <h3 class="result-widget__title">
                        98.6%
                    </h3>
                    <p class="result-widget__desc">
                        On-Time Delivery
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="shiping-routes">
    <div class="container">
        <div class="shiping-routes__descs">
            <h4 class="section-small-headline">
                Global Trade Lanes
            </h4>
            <h2 class="section-headline">
                Where We Ship — Corridors That
                Move Your Business
            </h2>
            <p class="section-description">
                Explore our most popular freight routes. Each route includes optimized transit times,
                customs expertise, and dedicated coordinators.ƒ
            </p>
        </div>
        <div class="shiping-routes__main">
            <div class="shiping-routes__area">
                <div class="shiping-routes__panel">
                    <svg width="606" height="303" viewBox="0 0 606 303" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_2_1128)">
                            <path d="M37.8807 75.7456H189.372V189.364H37.8807V75.7456Z" stroke="white" stroke-opacity="0.03" stroke-width="0.757455" />
                            <path d="M212.095 60.5962H378.736V151.491H212.095V60.5962Z" stroke="white" stroke-opacity="0.03" stroke-width="0.757455" />
                            <path d="M393.885 75.7451H568.099V227.236H393.885V75.7451Z" stroke="white" stroke-opacity="0.03" stroke-width="0.757455" />
                            <path d="M0.00805664 151.491H605.972" stroke="white" stroke-opacity="0.03" stroke-width="0.757455" stroke-dasharray="3.79 3.79" />
                            <path d="M302.99 0V302.982" stroke="white" stroke-opacity="0.03" stroke-width="0.757455" stroke-dasharray="3.79 3.79" />
                            <path d="M469.631 151.491C424.183 141.392 378.736 138.867 333.288 143.916" stroke="white" stroke-opacity="0.2" stroke-width="1.13618" stroke-dasharray="3.03 3.03" />
                            <path d="M318.139 98.4692C323.189 113.618 328.239 128.768 333.288 143.917" stroke="white" stroke-opacity="0.2" stroke-width="1.13618" stroke-dasharray="3.03 3.03" />
                            <path d="M242.394 106.043C272.692 111.093 302.99 123.718 333.289 143.916" stroke="white" stroke-opacity="0.2" stroke-width="1.13618" stroke-dasharray="3.03 3.03" />
                            <path d="M136.35 121.193C201.996 100.994 267.642 108.569 333.288 143.916" stroke="white" stroke-opacity="0.2" stroke-width="1.13618" stroke-dasharray="3.03 3.03" />
                            <path d="M363.587 174.215C353.487 164.115 343.388 154.016 333.288 143.917" stroke="white" stroke-opacity="0.2" stroke-width="1.13618" stroke-dasharray="3.03 3.03" />
                            <path d="M333.288 153.006C338.308 153.006 342.378 148.937 342.378 143.917C342.378 138.897 338.308 134.827 333.288 134.827C328.268 134.827 324.199 138.897 324.199 143.917C324.199 148.937 328.268 153.006 333.288 153.006Z" fill="#EC1C28" fill-opacity="0.4" />
                            <path d="M333.288 148.462C335.798 148.462 337.833 146.427 337.833 143.917C337.833 141.407 335.798 139.372 333.288 139.372C330.778 139.372 328.744 141.407 328.744 143.917C328.744 146.427 330.778 148.462 333.288 148.462Z" fill="#EC1C28" />
                            <path class="location" id="location__china" d="M469.63 155.278C471.722 155.278 473.417 153.583 473.417 151.491C473.417 149.399 471.722 147.704 469.63 147.704C467.538 147.704 465.843 149.399 465.843 151.491C465.843 153.583 467.538 155.278 469.63 155.278Z" fill="white" />
                            <path class="location" id="location__russia" d="M318.139 102.256C320.231 102.256 321.926 100.561 321.926 98.4689C321.926 96.3773 320.231 94.6816 318.139 94.6816C316.047 94.6816 314.352 96.3773 314.352 98.4689C314.352 100.561 316.047 102.256 318.139 102.256Z" fill="white" />
                            <path class="location" id="location__germany" d="M242.394 109.831C244.485 109.831 246.181 108.135 246.181 106.044C246.181 103.952 244.485 102.256 242.394 102.256C240.302 102.256 238.606 103.952 238.606 106.044C238.606 108.135 240.302 109.831 242.394 109.831Z" fill="white" />
                            <path class="location" id="location__usa" d="M136.35 124.98C138.442 124.98 140.137 123.285 140.137 121.193C140.137 119.101 138.442 117.406 136.35 117.406C134.258 117.406 132.563 119.101 132.563 121.193C132.563 123.285 134.258 124.98 136.35 124.98Z" fill="white" />
                            <path class="location" id="location__uae" d="M363.586 178.002C365.678 178.002 367.374 176.306 367.374 174.215C367.374 172.123 365.678 170.427 363.586 170.427C361.495 170.427 359.799 172.123 359.799 174.215C359.799 176.306 361.495 178.002 363.586 178.002Z" fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_2_1128">
                                <rect width="605.98" height="302.982" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <div class="shiping-routes__info route-info">
                        <h4 class="route-info__title">🇨🇳 China → Armenia</h4>
                        <ul class="route-info__list">
                            <li>
                                <span>Modes: </span>Sea, Air
                            </li>
                            <li>
                                <span>TRansit: </span>Sea, Air
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="shiping-routes__footer">
                    <p class="shiping-routes__location">
                        Yerevan Headquarters
                    </p>
                    <p class="shiping-routes__hint">
                        Hover destination points to see transit stats
                    </p>
                </div>
            </div>
            <div class="shiping-routes__listing">
                <ul>
                    <li>
                        🇨🇳 China → Armenia
                        <p>Sea 35-45d · Rail 18-22d · Air 5-7d</p>
                    </li>
                    <li>
                        🇷🇺 Russia → Armenia
                        <p>Road 7-10d · Rail 12-14d</p>
                    </li>
                    <li>
                        🇩🇪 Germany → Armenia
                        <p>
                            Road 10-14d · Air 3-5d
                        </p>
                    </li>
                </ul>
                <button class="primary-button primary-button--outlined shiping-routes__action">
                    <span>
                        Explore all 25+ routes
                    </span>
                </button>
            </div>
        </div>
    </div>
</section>

<section class="section-expertise">
    <div class="container">
        <div class="section-expertise__descs">
            <h4 class="section-small-headline">
                Industry Expertise
            </h4>
            <h2 class="section-headline section-expertise__headline">
                Tailored Logistics for Every Sector
            </h2>
            <p class="section-description section-expertise__desc">
                Vertical-specific expertise means optimized routes, compliant handling, and dedicated
                industry specialists for your supply chain.
            </p>
        </div>
        <div class="section-expertise__panel">
            <div class="expertise-widget">
                <div class="expertise-widget__icon">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_2_308)">
                            <path d="M28 10.6667C27.9995 10.1991 27.8761 9.73978 27.6421 9.33492C27.408 8.93005 27.0717 8.59385 26.6667 8.36003L17.3333 3.0267C16.9279 2.79265 16.4681 2.66943 16 2.66943C15.5319 2.66943 15.0721 2.79265 14.6667 3.0267L5.33333 8.36003C4.92835 8.59385 4.59197 8.93005 4.35795 9.33492C4.12392 9.73978 4.00048 10.1991 4 10.6667V21.3334C4.00048 21.801 4.12392 22.2603 4.35795 22.6651C4.59197 23.07 4.92835 23.4062 5.33333 23.64L14.6667 28.9734C15.0721 29.2074 15.5319 29.3306 16 29.3306C16.4681 29.3306 16.9279 29.2074 17.3333 28.9734L26.6667 23.64C27.0717 23.4062 27.408 23.07 27.6421 22.6651C27.8761 22.2603 27.9995 21.801 28 21.3334V10.6667Z" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M4.35999 9.27979L16 16.0131L27.64 9.27979" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M16 29.44V16" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                            <path opacity="0.3" d="M16 7.3335L22.6667 10.6668L16 14.0002L9.33334 10.6668L16 7.3335Z" fill="#EC1C28" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                            <path opacity="0.7" d="M2.66666 13.3335H7.99999" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                            <path opacity="0.7" d="M1.33334 17.3335H5.33334" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_2_308">
                                <rect width="32" height="32" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <h3 class="expertise-widget__headline">
                    E-commerce
                </h3>
                <p class="expertise-widget__desc">
                    Marketplace fulfillment
                </p>
            </div>
            <div class="expertise-widget">
                <div class="expertise-widget__icon">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.9428 12.0671L9.40034 19.6096C7.83824 21.1717 7.83824 23.7043 9.40034 25.2664C10.9624 26.8285 13.4951 26.8285 15.0572 25.2664L22.5997 17.7239C24.1618 16.1618 24.1618 13.6292 22.5997 12.0671C21.0376 10.505 18.5049 10.505 16.9428 12.0671Z" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 20L20 12" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path opacity="0.2" d="M16 2.6665C16 5.8491 17.2643 8.90135 19.5147 11.1518C21.7652 13.4022 24.8174 14.6665 28 14.6665C28 21.3332 16 29.3332 16 29.3332C16 29.3332 4 21.3332 4 14.6665C7.1826 14.6665 10.2348 13.4022 12.4853 11.1518C14.7357 8.90135 16 5.8491 16 2.6665Z" fill="#EC1C28" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M16 8V16M12 12H20" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                </div>
                <h3 class="expertise-widget__headline">
                    Pharmaceutical
                </h3>
                <p class="expertise-widget__desc">
                    GDP cold chain
                </p>
            </div>
            <div class="expertise-widget">
                <div class="expertise-widget__icon">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.66667 20H7.33334L9.33334 16H22.6667L24.6667 20H29.3333V24H2.66667V20Z" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9.33333 15.9998L10.6667 10.6665H21.3333L22.6667 15.9998" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9.33333 27.3332C11.1743 27.3332 12.6667 25.8408 12.6667 23.9998C12.6667 22.1589 11.1743 20.6665 9.33333 20.6665C7.49238 20.6665 6 22.1589 6 23.9998C6 25.8408 7.49238 27.3332 9.33333 27.3332Z" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M22.6667 27.3332C24.5076 27.3332 26 25.8408 26 23.9998C26 22.1589 24.5076 20.6665 22.6667 20.6665C20.8257 20.6665 19.3333 22.1589 19.3333 23.9998C19.3333 25.8408 20.8257 27.3332 22.6667 27.3332Z" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9.33333 25.3332C10.0697 25.3332 10.6667 24.7362 10.6667 23.9998C10.6667 23.2635 10.0697 22.6665 9.33333 22.6665C8.59695 22.6665 8 23.2635 8 23.9998C8 24.7362 8.59695 25.3332 9.33333 25.3332Z" fill="white" fill-opacity="0.85" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M22.6667 25.3332C23.4031 25.3332 24 24.7362 24 23.9998C24 23.2635 23.4031 22.6665 22.6667 22.6665C21.9303 22.6665 21.3333 23.2635 21.3333 23.9998C21.3333 24.7362 21.9303 25.3332 22.6667 25.3332Z" fill="white" fill-opacity="0.85" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M16 16C16.5304 16 17.0391 15.7893 17.4142 15.4142C17.7893 15.0391 18 14.5304 18 14C18 13.4696 17.7893 12.9609 17.4142 12.5858C17.0391 12.2107 16.5304 12 16 12C15.4696 12 14.9609 12.2107 14.5858 12.5858C14.2107 12.9609 14 13.4696 14 14C14 14.5304 14.2107 15.0391 14.5858 15.4142C14.9609 15.7893 15.4696 16 16 16Z" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <h3 class="expertise-widget__headline">
                    Automotive
                </h3>
                <p class="expertise-widget__desc">
                    JIT & OEM parts
                </p>
            </div>
            <div class="expertise-widget">
                <div class="expertise-widget__icon">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 2.6665V13.3332C16 14.0404 16.281 14.7187 16.781 15.2188C17.2811 15.7189 17.9594 15.9998 18.6667 15.9998" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M16 16.0002C15.2927 16.0002 14.6145 15.7192 14.1144 15.2191C13.6143 14.719 13.3333 14.0407 13.3333 13.3335" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7.99998 18.6665H24L26.6666 26.6665H5.33331L7.99998 18.6665Z" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M19.3333 16H12.6667C12.2985 16 12 16.2985 12 16.6667V18C12 18.3682 12.2985 18.6667 12.6667 18.6667H19.3333C19.7015 18.6667 20 18.3682 20 18V16.6667C20 16.2985 19.7015 16 19.3333 16Z" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11.4278 24.2798L11.3498 22.6592L14.2531 19.5998H15.8131L13.1958 22.4165L12.4158 23.2485L11.4278 24.2798ZM10.1711 25.6665V19.5998H11.5665V25.6665H10.1711ZM14.3225 25.6665L12.1645 23.0232L13.0831 22.0265L15.9605 25.6665H14.3225ZM19.1773 25.7705C18.6977 25.7705 18.2557 25.6954 17.8513 25.5452C17.4526 25.3892 17.1031 25.1696 16.8026 24.8865C16.508 24.6034 16.2768 24.2712 16.1093 23.8898C15.9475 23.5085 15.8666 23.0896 15.8666 22.6332C15.8666 22.1767 15.9475 21.7578 16.1093 21.3765C16.2768 20.9952 16.5108 20.6629 16.8113 20.3798C17.1117 20.0967 17.4642 19.8801 17.8686 19.7298C18.2731 19.5738 18.718 19.4958 19.2033 19.4958C19.7406 19.4958 20.2231 19.5854 20.6506 19.7645C21.084 19.9436 21.448 20.2036 21.7426 20.5445L20.8413 21.3765C20.6217 21.1454 20.382 20.9749 20.122 20.8652C19.862 20.7496 19.5788 20.6918 19.2726 20.6918C18.978 20.6918 18.7093 20.7381 18.4666 20.8305C18.224 20.9229 18.0131 21.0558 17.834 21.2292C17.6606 21.4025 17.5248 21.6076 17.4266 21.8445C17.3342 22.0814 17.288 22.3443 17.288 22.6332C17.288 22.9163 17.3342 23.1763 17.4266 23.4132C17.5248 23.6501 17.6606 23.8581 17.834 24.0372C18.0131 24.2105 18.2211 24.3434 18.458 24.4358C18.7006 24.5283 18.9664 24.5745 19.2553 24.5745C19.5326 24.5745 19.8013 24.5312 20.0613 24.4445C20.3271 24.3521 20.5842 24.1989 20.8326 23.9852L21.63 24.9992C21.3006 25.2476 20.9164 25.4383 20.4773 25.5712C20.044 25.7041 19.6106 25.7705 19.1773 25.7705ZM21.63 24.9992L20.3473 24.8172V22.5378H21.63V24.9992Z" fill="#EC1C28" />
                    </svg>
                </div>
                <h3 class="expertise-widget__headline">
                    Heavy Machinery
                </h3>
                <p class="expertise-widget__desc">
                    Project cargo
                </p>
            </div>
            <div class="expertise-widget">
                <div class="expertise-widget__icon">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 22.6665C4 19.4839 5.26428 16.4317 7.51472 14.1812C9.76516 11.9308 12.8174 10.6665 16 10.6665C19.1826 10.6665 22.2348 11.9308 24.4853 14.1812C26.7357 16.4317 28 19.4839 28 22.6665V23.9998H4V22.6665Z" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M16 11.3335C17.1046 11.3335 18 10.4381 18 9.3335C18 8.22893 17.1046 7.3335 16 7.3335C14.8954 7.3335 14 8.22893 14 9.3335C14 10.4381 14.8954 11.3335 16 11.3335Z" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M2.66666 26.6665H29.3333" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path opacity="0.3" d="M16 17.3331C18 17.3331 19.3333 18.6664 19.3333 19.9998C19.3333 21.3331 18 22.6664 16 22.6664C14 22.6664 12.6667 21.3331 12.6667 19.9998C12.6667 18.6664 14 16.6664 16 17.3331Z" fill="#EC1C28" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M16 17.3332C14 15.3332 14 12.6665 16 10.6665C18 12.6665 18 15.3332 16 17.3332Z" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                </div>
                <h3 class="expertise-widget__headline">
                    Food & Perishables
                </h3>
                <p class="expertise-widget__desc">
                    Reefer & HACCP
                </p>
            </div>
            <div class="expertise-widget">
                <div class="expertise-widget__icon">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 26.6667H24L17.3333 9.33333V4H14.6667V9.33333L8 26.6667Z" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 4H20" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M10 21.3335H22" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="2.67 1.33" />
                        <path opacity="0.8" d="M13.3333 17.3333L18.6667 22.6667M16 16L21.3333 21.3333" stroke="#EC1C28" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <h3 class="expertise-widget__headline">
                    Chemical
                </h3>
                <p class="expertise-widget__desc">
                    ADR/IMDG/DGR
                </p>
            </div>
            <div class="expertise-widget">
                <div class="expertise-widget__icon">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.6667 13.3335H5.99999C5.63181 13.3335 5.33333 13.632 5.33333 14.0002V27.3335C5.33333 27.7017 5.63181 28.0002 5.99999 28.0002H12.6667C13.0349 28.0002 13.3333 27.7017 13.3333 27.3335V14.0002C13.3333 13.632 13.0349 13.3335 12.6667 13.3335Z" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M26 8H16.6667C16.2985 8 16 8.29848 16 8.66667V27.3333C16 27.7015 16.2985 28 16.6667 28H26C26.3682 28 26.6667 27.7015 26.6667 27.3333V8.66667C26.6667 8.29848 26.3682 8 26 8Z" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9.33333 17.3335V24.0002" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="2.67 2.67" />
                        <path d="M20 12V24" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="2.67 2.67" />
                        <path d="M22.6667 12V24" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="2.67 2.67" />
                        <path opacity="0.6" d="M4 4H25.3333V14.6667L20 9.33333M9.33333 4V9.33333" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                </div>
                <h3 class="expertise-widget__headline">
                    Construction
                </h3>
                <p class="expertise-widget__desc">
                    Bulk & project
                </p>
            </div>
            <div class="expertise-widget">
                <div class="expertise-widget__icon">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22 8H10C8.89543 8 8 8.89543 8 10V22C8 23.1046 8.89543 24 10 24H22C23.1046 24 24 23.1046 24 22V10C24 8.89543 23.1046 8 22 8Z" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 4V8M16 4V8M20 4V8M12 24V28M16 24V28M20 24V28M4 12H8M4 16H8M4 20H8M24 12H28M24 16H28M24 20H28" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path opacity="0.3" d="M18 13.3335H14C13.6318 13.3335 13.3333 13.632 13.3333 14.0002V18.0002C13.3333 18.3684 13.6318 18.6668 14 18.6668H18C18.3682 18.6668 18.6666 18.3684 18.6666 18.0002V14.0002C18.6666 13.632 18.3682 13.3335 18 13.3335Z" fill="#EC1C28" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M16 13.3335V18.6668M13.3333 16.0002H18.6666" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <h3 class="expertise-widget__headline">
                    Electronics
                </h3>
                <p class="expertise-widget__desc">
                    High-value secure
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section-delivery">
    <div class="container">
        <div class="section-delivery__descs">
            <h4 class="section-small-headline">
                Industry Expertise
            </h4>
            <h2 class="section-headline">
                Tailored Logistics for Every Sector
            </h2>
            <p class="section-description">
                Vertical-specific expertise means optimized routes, compliant handling, and dedicated
                industry specialists for your supply chain.
            </p>
        </div>
        <div class="section-delivery__main">
            <ul class="section-delivery__steps steps-listing">
                <li class="steps-listing__item">
                    <div class="steps-listing__info">
                        <h3 class="steps-listing__headline">
                            <span class="steps-listing__num">#1</span>
                            Submit Request
                        </h3>
                        <p class="steps-listing__desc">Share cargo details via form, email, or call</p>
                    </div>
                    <div class="steps-listing__icon">
                        <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M32.6667 20.9998C32.6667 22.2375 32.175 23.4245 31.2998 24.2997C30.4246 25.1748 29.2377 25.6665 28 25.6665H14L4.66666 34.9998V9.33317C4.66666 8.09549 5.15832 6.90851 6.03349 6.03334C6.90866 5.15817 8.09565 4.6665 9.33332 4.6665H28C29.2377 4.6665 30.4246 5.15817 31.2998 6.03334C32.175 6.90851 32.6667 8.09549 32.6667 9.33317V20.9998Z" stroke="#0F1B24" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M42 21H46.6667C47.9044 21 49.0913 21.4917 49.9665 22.3668C50.8417 23.242 51.3333 24.429 51.3333 25.6667V51.3333L42 42H28C26.7623 42 25.5753 41.5083 24.7002 40.6332C23.825 39.758 23.3333 38.571 23.3333 37.3333V35" stroke="#0F1B24" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="animated-line">
                        <div class="left-side"></div>
                        <div class="right-side"></div>
                    </div>
                </li>
                <li class="steps-listing__item">
                    <div class="steps-listing__info">
                        <h3 class="steps-listing__headline">
                            <span class="steps-listing__num">#2</span>
                            Receive Quote
                        </h3>
                        <p class="steps-listing__desc">Personalized pricing within 2 hours</p>
                    </div>
                    <div class="steps-listing__icon">
                        <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M42 4.6665H14C11.4227 4.6665 9.33334 6.75584 9.33334 9.33317V46.6665C9.33334 49.2438 11.4227 51.3332 14 51.3332H42C44.5773 51.3332 46.6667 49.2438 46.6667 46.6665V9.33317C46.6667 6.75584 44.5773 4.6665 42 4.6665Z" stroke="#0F1B24" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M18.6667 14H37.3333" stroke="#0F1B24" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M37.3333 32.6665V41.9998" stroke="#0F1B24" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M37.3333 23.3335H37.3567" stroke="#0F1B24" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M28 23.3335H28.0233" stroke="#0F1B24" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M18.6667 23.3335H18.69" stroke="#0F1B24" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M28 32.6665H28.0233" stroke="#0F1B24" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M18.6667 32.6665H18.69" stroke="#0F1B24" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M28 42H28.0233" stroke="#0F1B24" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M18.6667 42H18.69" stroke="#0F1B24" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </div>
                    <div class="animated-line">
                        <div class="left-side"></div>
                        <div class="right-side"></div>
                    </div>
                </li>
                <li class="steps-listing__item">
                    <div class="steps-listing__info">
                        <h3 class="steps-listing__headline">
                            <span class="steps-listing__num">#3</span>
                            Documentation
                        </h3>
                        <p class="steps-listing__desc">We handle customs & paperwork</p>
                    </div>
                    <div class="steps-listing__icon">
                        <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.33334 51.3332H42C43.2377 51.3332 44.4247 50.8415 45.2998 49.9663C46.175 49.0912 46.6667 47.9042 46.6667 46.6665V16.3332L35 4.6665H14C12.7623 4.6665 11.5753 5.15817 10.7002 6.03334C9.82501 6.90851 9.33334 8.09549 9.33334 9.33317V18.6665" stroke="#0F1B24" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M32.6667 4.6665V13.9998C32.6667 15.2375 33.1583 16.4245 34.0335 17.2997C34.9087 18.1748 36.0956 18.6665 37.3333 18.6665H46.6667" stroke="#0F1B24" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7 35.0002L11.6667 39.6668L21 30.3335" stroke="#0F1B24" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="animated-line">
                        <div class="left-side"></div>
                        <div class="right-side"></div>
                    </div>
                </li>
                <li class="steps-listing__item">
                    <div class="steps-listing__info">
                        <h3 class="steps-listing__headline">
                            <span class="steps-listing__num">#4</span>
                            Transit
                        </h3>
                        <p class="steps-listing__desc">Pickup → Move → Delivery with live updates</p>
                    </div>
                    <div class="steps-listing__icon">
                        <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M32.6667 42.0002V14.0002C32.6667 12.7625 32.175 11.5755 31.2998 10.7003C30.4247 9.82516 29.2377 9.3335 28 9.3335H9.33333C8.09565 9.3335 6.90867 9.82516 6.0335 10.7003C5.15833 11.5755 4.66666 12.7625 4.66666 14.0002V39.6668C4.66666 40.2857 4.9125 40.8792 5.35008 41.3167C5.78767 41.7543 6.38116 42.0002 7 42.0002H11.6667" stroke="#0F1B24" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M35 42H21" stroke="#0F1B24" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M44.3333 41.9998H49C49.6188 41.9998 50.2123 41.754 50.6499 41.3164C51.0875 40.8788 51.3333 40.2853 51.3333 39.6665V31.1498C51.3324 30.6203 51.1514 30.1069 50.82 29.6938L42.7 19.5438C42.4818 19.2706 42.2049 19.0498 41.8899 18.898C41.5749 18.7461 41.2297 18.667 40.88 18.6665H32.6667" stroke="#0F1B24" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M39.6667 46.6668C42.244 46.6668 44.3333 44.5775 44.3333 42.0002C44.3333 39.4228 42.244 37.3335 39.6667 37.3335C37.0893 37.3335 35 39.4228 35 42.0002C35 44.5775 37.0893 46.6668 39.6667 46.6668Z" stroke="#0F1B24" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M16.3333 46.6668C18.9107 46.6668 21 44.5775 21 42.0002C21 39.4228 18.9107 37.3335 16.3333 37.3335C13.756 37.3335 11.6667 39.4228 11.6667 42.0002C11.6667 44.5775 13.756 46.6668 16.3333 46.6668Z" stroke="#0F1B24" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </div>
                    <div class="animated-line">
                        <div class="left-side"></div>
                        <div class="right-side"></div>
                    </div>
                </li>
                <li class="steps-listing__item">
                    <div class="steps-listing__info">
                        <h3 class="steps-listing__headline">
                            <span class="steps-listing__num">#5</span>
                            Confirm
                        </h3>
                        <p class="steps-listing__desc">Tracking proof of delivery & invoicing</p>
                    </div>
                    <div class="steps-listing__icon">
                        <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M37.3333 37.3332L42 41.9998L51.3333 32.6665" stroke="#0F1B24" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M49 23.3333V18.6666C48.9992 17.8482 48.7831 17.0445 48.3736 16.336C47.964 15.6275 47.3754 15.0391 46.6667 14.6299L30.3333 5.2966C29.6239 4.88702 28.8192 4.67139 28 4.67139C27.1808 4.67139 26.3761 4.88702 25.6667 5.2966L9.33333 14.6299C8.62461 15.0391 8.03595 15.6275 7.62641 16.336C7.21687 17.0445 7.00084 17.8482 7 18.6666V37.3333C7.00084 38.1516 7.21687 38.9554 7.62641 39.6639C8.03595 40.3724 8.62461 40.9608 9.33333 41.3699L25.6667 50.7033C26.3761 51.1129 27.1808 51.3285 28 51.3285C28.8192 51.3285 29.6239 51.1129 30.3333 50.7033L35 48.0433" stroke="#0F1B24" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M17.5 9.96338L38.5 21.98" stroke="#0F1B24" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7.67667 16.3335L28 28.0002L48.3233 16.3335" stroke="#0F1B24" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M28 51.3333V28" stroke="#0F1B24" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="case-studies">
    <div class="container">
        <div class="case-studies__descs">
            <h4 class="section-small-headline">
                Real Results
            </h4>
            <h2 class="section-headline">
                Case Studies — How We Deliver
            </h2>
            <p class="section-description">
                Real client challenges, real solutions, measurable outcomes. Each story is verified and
                published with client permission.
            </p>
        </div>

        <div class="case-studies__main">
            <div class="case-studies__widget case-studie-widget">
                <div class="case-studie-widget__badge">
                    OVERSIZED
                </div>
                <h3 class="case-studie-widget__headline">
                    Almaty → Yerevan: 14-ton Industrial
                    Press
                </h3>
                <p class="case-studie-widget__desc">
                    Engineered route through Caspian via Aktau,
                    coordinated 3 customs authorities, delivered on
                    schedule.
                </p>
                <div class="case-studie-widget__footer case-metrics">
                    <div class="case-metrics__group">
                        <p class="case-metrics__top">Transit Time</p>
                        <p class="case-metrics__bottom case-metrics__bottom--red">14 Days</p>
                    </div>
                    <div class="case-metrics__group">
                        <p class="case-metrics__top">Door-to-door</p>
                        <p class="case-metrics__bottom case-metrics__bottom--blue">14 Days</p>
                    </div>
                </div>
            </div>
            <div class="case-studies__widget case-studie-widget">
                <div class="case-studie-widget__badge">
                    PHARMA
                </div>
                <h3 class="case-studie-widget__headline">
                    Frankfurt → Yerevan: GDP Cold-Chain
                    Pharma
                </h3>
                <p class="case-studie-widget__desc">
                    Temperature-controlled (2-8°C) shipment with
                    24/7 monitoring, full GDP compliance, zero
                    excursions.
                </p>
                <div class="case-studie-widget__footer case-metrics">
                    <div class="case-metrics__group">
                        <p class="case-metrics__top">Temp Compliance</p>
                        <p class="case-metrics__bottom case-metrics__bottom--blue">100% GDP</p>
                    </div>
                    <div class="case-metrics__group">
                        <p class="case-metrics__top">Transit Time</p>
                        <p class="case-metrics__bottom case-metrics__bottom--red">4 Days</p>
                    </div>
                </div>
            </div>
            <div class="case-studies__widget case-studie-widget">
                <div class="case-studie-widget__badge">
                    E-COMMERCE
                </div>
                <h3 class="case-studie-widget__headline">
                    Shanghai → Yerevan: 40ft LCL
                    Consolidation
                </h3>
                <p class="case-studie-widget__desc">
                    Recurring weekly consolidation for online retailer,
                    customs pre-clearance, last-mile to 12 cities in
                    Armenia.
                </p>
                <div class="case-studie-widget__footer case-metrics">
                    <div class="case-metrics__group">
                        <p class="case-metrics__top">Shipping cost</p>
                        <p class="case-metrics__bottom case-metrics__bottom--blue">-32% vs air</p>
                    </div>
                    <div class="case-metrics__group">
                        <p class="case-metrics__top">Schedule</p>
                        <p class="case-metrics__bottom case-metrics__bottom--red">Weekly</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-testimonials">
    <div class="container">
        <div class="section-testimonials__descs">
            <h4 class="section-small-headline">
                Client Feedback
            </h4>
            <h2 class="section-headline section-testimonials__headline">
                What Our Clients Say
            </h2>
            <div class="section-testimonials__rates">
                <div class="stars">
                    <span></span><span></span><span></span><span></span><span></span>
                </div>
                <p class="section-testimonials__subheadline">
                    4.9 / 5.0
                    <span>
                        (247 verified reviews)
                    </span>
                </p>
            </div>
        </div>
        <div class="section-testimonials__main">
            <div class="testimonial-widget">
                <p class="testimonial-widget__text">
                    “We have been working with this transport
                    company for a year now. Our cargo is not
                    the simplest and non-standard in size. The
                    CIO team solves everything, helps with
                    everything. Special thanks to manager Eteri
                    Tsatryan.”
                </p>
                <h3 class="testimonial-widget__author">
                    Olga Postnikova
                </h3>
                <p class="testimonial-widget__position">
                    Yandex Reviews · Verified
                </p>
            </div>
            <div class="testimonial-widget">
                <p class="testimonial-widget__text">
                    “We have been working with this transport
                    company for a year now. Our cargo is not
                    the simplest and non-standard in size. The
                    CIO team solves everything, helps with
                    everything. Special thanks to manager Eteri
                    Tsatryan.”
                </p>
                <h3 class="testimonial-widget__author">
                    Olga Postnikova
                </h3>
                <p class="testimonial-widget__position">
                    Yandex Reviews · Verified
                </p>
            </div>
            <div class="testimonial-widget">
                <p class="testimonial-widget__text">
                    “We have been working with this transport
                    company for a year now. Our cargo is not
                    the simplest and non-standard in size. The
                    CIO team solves everything, helps with
                    everything. Special thanks to manager Eteri
                    Tsatryan.”
                </p>
                <h3 class="testimonial-widget__author">
                    Olga Postnikova
                </h3>
                <p class="testimonial-widget__position">
                    Yandex Reviews · Verified
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section-faq">
    <div class="section-faq__container">
        <h4 class="section-small-headline">
            Common Questions
        </h4>
        <h2 class="section-headline ">
            Frequently Asked Questions
        </h2>
        <p class="section-description">
            Answers to what clients ask most often. Can't find your question? Reach out to our team
            directly.
        </p>
        <div class="section-faq__main">
            <div class="section-faq__list">
                <div class="section-faq__item">
                    <button class="section-faq__trigger">
                        <span class="section-faq__question">What is your typical transit time?</span>
                        <span class="section-faq__icon"></span>
                    </button>
                    <div class="section-faq__panel">
                        <div class="section-faq__content">
                            <p>Our standard transit time is typically 14 days for door-to-door deliveries, depending on the custom clearance protocols of the destination country.</p>
                        </div>
                    </div>
                </div>

                <div class="section-faq__item">
                    <button class="section-faq__trigger">
                        <span class="section-faq__question">Are your shipments 100% GDP compliant?</span>
                        <span class="section-faq__icon"></span>
                    </button>
                    <div class="section-faq__panel">
                        <div class="section-faq__content">
                            <p>Yes, all medical and temperature-sensitive shipments follow strict Good Distribution Practice (GDP) guidelines to ensure absolute compliance and product safety.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-certification">
    <div class="container">
        <div class="section-certification__descs">
            <h4 class="section-small-headline">
                Verified & Compliant
            </h4>
            <h2 class="section-headline ">
                Certifications & Industry
                Memberships
            </h2>
            <p class="section-description">
                Every certificate is clickable, verifiable, and current. Compliance you can trust for your
                supply chain.
            </p>
        </div>
        <div class="section-certification__main">
            <div class="certification-widget">
                <div class="certification-widget__icon">
                    <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M32 62C48.5685 62 62 48.5685 62 32C62 15.4315 48.5685 2 32 2C15.4315 2 2 15.4315 2 32C2 48.5685 15.4315 62 32 62Z" stroke="#EC1C28" stroke-width="2" stroke-dasharray="4 2" />
                        <path d="M32 58C46.3594 58 58 46.3594 58 32C58 17.6406 46.3594 6 32 6C17.6406 6 6 17.6406 6 32C6 46.3594 17.6406 58 32 58Z" fill="#0F1B24" />
                        <path d="M14.7656 30V24.4H16.0616V30H14.7656ZM19.2306 30.096C18.7826 30.096 18.3532 30.0373 17.9426 29.92C17.5319 29.7973 17.2012 29.64 16.9506 29.448L17.3906 28.472C17.6306 28.6427 17.9132 28.784 18.2386 28.896C18.5692 29.0027 18.9026 29.056 19.2386 29.056C19.4946 29.056 19.6999 29.032 19.8546 28.984C20.0146 28.9307 20.1319 28.8587 20.2066 28.768C20.2812 28.6773 20.3186 28.5733 20.3186 28.456C20.3186 28.3067 20.2599 28.1893 20.1426 28.104C20.0252 28.0133 19.8706 27.9413 19.6786 27.888C19.4866 27.8293 19.2732 27.776 19.0386 27.728C18.8092 27.6747 18.5772 27.6107 18.3426 27.536C18.1132 27.4613 17.9026 27.3653 17.7106 27.248C17.5186 27.1307 17.3612 26.976 17.2386 26.784C17.1212 26.592 17.0626 26.3467 17.0626 26.048C17.0626 25.728 17.1479 25.4373 17.3186 25.176C17.4946 24.9093 17.7559 24.6987 18.1026 24.544C18.4546 24.384 18.8946 24.304 19.4226 24.304C19.7746 24.304 20.1212 24.3467 20.4626 24.432C20.8039 24.512 21.1052 24.6347 21.3666 24.8L20.9666 25.784C20.7052 25.6347 20.4439 25.5253 20.1826 25.456C19.9212 25.3813 19.6652 25.344 19.4146 25.344C19.1639 25.344 18.9586 25.3733 18.7986 25.432C18.6386 25.4907 18.5239 25.568 18.4546 25.664C18.3852 25.7547 18.3506 25.8613 18.3506 25.984C18.3506 26.128 18.4092 26.2453 18.5266 26.336C18.6439 26.4213 18.7986 26.4907 18.9906 26.544C19.1826 26.5973 19.3932 26.6507 19.6226 26.704C19.8572 26.7573 20.0892 26.8187 20.3186 26.888C20.5532 26.9573 20.7666 27.0507 20.9586 27.168C21.1506 27.2853 21.3052 27.44 21.4226 27.632C21.5452 27.824 21.6066 28.0667 21.6066 28.36C21.6066 28.6747 21.5186 28.9627 21.3426 29.224C21.1666 29.4853 20.9026 29.696 20.5506 29.856C20.2039 30.016 19.7639 30.096 19.2306 30.096ZM25.2121 30.096C24.7695 30.096 24.3588 30.024 23.9801 29.88C23.6068 29.736 23.2815 29.5333 23.0041 29.272C22.7321 29.0107 22.5188 28.704 22.3641 28.352C22.2148 28 22.1401 27.616 22.1401 27.2C22.1401 26.784 22.2148 26.4 22.3641 26.048C22.5188 25.696 22.7348 25.3893 23.0121 25.128C23.2895 24.8667 23.6148 24.664 23.9881 24.52C24.3615 24.376 24.7668 24.304 25.2041 24.304C25.6468 24.304 26.0521 24.376 26.4201 24.52C26.7935 24.664 27.1161 24.8667 27.3881 25.128C27.6655 25.3893 27.8815 25.696 28.0361 26.048C28.1908 26.3947 28.2681 26.7787 28.2681 27.2C28.2681 27.616 28.1908 28.0027 28.0361 28.36C27.8815 28.712 27.6655 29.0187 27.3881 29.28C27.1161 29.536 26.7935 29.736 26.4201 29.88C26.0521 30.024 25.6495 30.096 25.2121 30.096ZM25.2041 28.992C25.4548 28.992 25.6841 28.9493 25.8921 28.864C26.1055 28.7787 26.2921 28.656 26.4521 28.496C26.6121 28.336 26.7348 28.1467 26.8201 27.928C26.9108 27.7093 26.9561 27.4667 26.9561 27.2C26.9561 26.9333 26.9108 26.6907 26.8201 26.472C26.7348 26.2533 26.6121 26.064 26.4521 25.904C26.2975 25.744 26.1135 25.6213 25.9001 25.536C25.6868 25.4507 25.4548 25.408 25.2041 25.408C24.9535 25.408 24.7215 25.4507 24.5081 25.536C24.3001 25.6213 24.1161 25.744 23.9561 25.904C23.7961 26.064 23.6708 26.2533 23.5801 26.472C23.4948 26.6907 23.4521 26.9333 23.4521 27.2C23.4521 27.4613 23.4948 27.704 23.5801 27.928C23.6708 28.1467 23.7935 28.336 23.9481 28.496C24.1081 28.656 24.2948 28.7787 24.5081 28.864C24.7215 28.9493 24.9535 28.992 25.2041 28.992ZM32.7718 30.096C32.4784 30.096 32.1958 30.064 31.9238 30C31.6518 29.936 31.4171 29.84 31.2198 29.712L31.6998 28.76C31.8544 28.8667 32.0198 28.9413 32.1958 28.984C32.3718 29.0213 32.5558 29.04 32.7478 29.04C33.2278 29.04 33.6091 28.8933 33.8918 28.6C34.1798 28.3067 34.3238 27.872 34.3238 27.296C34.3238 27.2 34.3211 27.0933 34.3158 26.976C34.3104 26.8587 34.2971 26.7413 34.2758 26.624L34.6278 26.96C34.5371 27.168 34.4091 27.344 34.2438 27.488C34.0784 27.6267 33.8864 27.7333 33.6678 27.808C33.4491 27.8773 33.2038 27.912 32.9318 27.912C32.5744 27.912 32.2491 27.84 31.9558 27.696C31.6678 27.552 31.4358 27.3493 31.2598 27.088C31.0891 26.8267 31.0038 26.52 31.0038 26.168C31.0038 25.784 31.0971 25.4533 31.2838 25.176C31.4758 24.8987 31.7318 24.6853 32.0518 24.536C32.3771 24.3813 32.7344 24.304 33.1238 24.304C33.6411 24.304 34.0864 24.4107 34.4598 24.624C34.8331 24.8373 35.1211 25.1493 35.3238 25.56C35.5264 25.9653 35.6278 26.472 35.6278 27.08C35.6278 27.7253 35.5051 28.272 35.2598 28.72C35.0198 29.168 34.6864 29.5093 34.2598 29.744C33.8331 29.9787 33.3371 30.096 32.7718 30.096ZM33.2198 26.944C33.4064 26.944 33.5718 26.9093 33.7158 26.84C33.8651 26.7653 33.9798 26.664 34.0598 26.536C34.1398 26.408 34.1798 26.264 34.1798 26.104C34.1798 25.944 34.1398 25.8027 34.0598 25.68C33.9851 25.552 33.8758 25.4533 33.7318 25.384C33.5878 25.3093 33.4118 25.272 33.2038 25.272C33.0171 25.272 32.8544 25.3067 32.7158 25.376C32.5771 25.44 32.4678 25.536 32.3878 25.664C32.3078 25.7867 32.2678 25.9333 32.2678 26.104C32.2678 26.36 32.3531 26.5653 32.5238 26.72C32.6998 26.8693 32.9318 26.944 33.2198 26.944ZM38.6495 30.096C38.1908 30.096 37.7802 29.984 37.4175 29.76C37.0548 29.5307 36.7695 29.2 36.5615 28.768C36.3535 28.336 36.2495 27.8133 36.2495 27.2C36.2495 26.5867 36.3535 26.064 36.5615 25.632C36.7695 25.2 37.0548 24.872 37.4175 24.648C37.7802 24.4187 38.1908 24.304 38.6495 24.304C39.1135 24.304 39.5242 24.4187 39.8815 24.648C40.2442 24.872 40.5295 25.2 40.7375 25.632C40.9455 26.064 41.0495 26.5867 41.0495 27.2C41.0495 27.8133 40.9455 28.336 40.7375 28.768C40.5295 29.2 40.2442 29.5307 39.8815 29.76C39.5242 29.984 39.1135 30.096 38.6495 30.096ZM38.6495 29C38.8682 29 39.0575 28.9387 39.2175 28.816C39.3828 28.6933 39.5108 28.4987 39.6015 28.232C39.6975 27.9653 39.7455 27.6213 39.7455 27.2C39.7455 26.7787 39.6975 26.4347 39.6015 26.168C39.5108 25.9013 39.3828 25.7067 39.2175 25.584C39.0575 25.4613 38.8682 25.4 38.6495 25.4C38.4362 25.4 38.2468 25.4613 38.0815 25.584C37.9215 25.7067 37.7935 25.9013 37.6975 26.168C37.6068 26.4347 37.5615 26.7787 37.5615 27.2C37.5615 27.6213 37.6068 27.9653 37.6975 28.232C37.7935 28.4987 37.9215 28.6933 38.0815 28.816C38.2468 28.9387 38.4362 29 38.6495 29ZM44.0792 30.096C43.6205 30.096 43.2099 29.984 42.8472 29.76C42.4845 29.5307 42.1992 29.2 41.9912 28.768C41.7832 28.336 41.6792 27.8133 41.6792 27.2C41.6792 26.5867 41.7832 26.064 41.9912 25.632C42.1992 25.2 42.4845 24.872 42.8472 24.648C43.2099 24.4187 43.6205 24.304 44.0792 24.304C44.5432 24.304 44.9539 24.4187 45.3112 24.648C45.6739 24.872 45.9592 25.2 46.1672 25.632C46.3752 26.064 46.4792 26.5867 46.4792 27.2C46.4792 27.8133 46.3752 28.336 46.1672 28.768C45.9592 29.2 45.6739 29.5307 45.3112 29.76C44.9539 29.984 44.5432 30.096 44.0792 30.096ZM44.0792 29C44.2979 29 44.4872 28.9387 44.6472 28.816C44.8125 28.6933 44.9405 28.4987 45.0312 28.232C45.1272 27.9653 45.1752 27.6213 45.1752 27.2C45.1752 26.7787 45.1272 26.4347 45.0312 26.168C44.9405 25.9013 44.8125 25.7067 44.6472 25.584C44.4872 25.4613 44.2979 25.4 44.0792 25.4C43.8659 25.4 43.6765 25.4613 43.5112 25.584C43.3512 25.7067 43.2232 25.9013 43.1272 26.168C43.0365 26.4347 42.9912 26.7787 42.9912 27.2C42.9912 27.6213 43.0365 27.9653 43.1272 28.232C43.2232 28.4987 43.3512 28.6933 43.5112 28.816C43.6765 28.9387 43.8659 29 44.0792 29ZM47.9416 30V24.88L48.5016 25.44H46.8216V24.4H49.2376V30H47.9416Z" fill="white" />
                        <path d="M25.4451 42V41.37L27.0651 39.84C27.1931 39.724 27.2871 39.62 27.3471 39.528C27.4071 39.436 27.4471 39.352 27.4671 39.276C27.4911 39.2 27.5031 39.13 27.5031 39.066C27.5031 38.898 27.4451 38.77 27.3291 38.682C27.2171 38.59 27.0511 38.544 26.8311 38.544C26.6551 38.544 26.4911 38.578 26.3391 38.646C26.1911 38.714 26.0651 38.82 25.9611 38.964L25.2531 38.508C25.4131 38.268 25.6371 38.078 25.9251 37.938C26.2131 37.798 26.5451 37.728 26.9211 37.728C27.2331 37.728 27.5051 37.78 27.7371 37.884C27.9731 37.984 28.1551 38.126 28.2831 38.31C28.4151 38.494 28.4811 38.714 28.4811 38.97C28.4811 39.106 28.4631 39.242 28.4271 39.378C28.3951 39.51 28.3271 39.65 28.2231 39.798C28.1231 39.946 27.9751 40.112 27.7791 40.296L26.4351 41.562L26.2491 41.208H28.6191V42H25.4451ZM30.8201 42.072C30.4761 42.072 30.1681 41.988 29.8961 41.82C29.6241 41.648 29.4101 41.4 29.2541 41.076C29.0981 40.752 29.0201 40.36 29.0201 39.9C29.0201 39.44 29.0981 39.048 29.2541 38.724C29.4101 38.4 29.6241 38.154 29.8961 37.986C30.1681 37.814 30.4761 37.728 30.8201 37.728C31.1681 37.728 31.4761 37.814 31.7441 37.986C32.0161 38.154 32.2301 38.4 32.3861 38.724C32.5421 39.048 32.6201 39.44 32.6201 39.9C32.6201 40.36 32.5421 40.752 32.3861 41.076C32.2301 41.4 32.0161 41.648 31.7441 41.82C31.4761 41.988 31.1681 42.072 30.8201 42.072ZM30.8201 41.25C30.9841 41.25 31.1261 41.204 31.2461 41.112C31.3701 41.02 31.4661 40.874 31.5341 40.674C31.6061 40.474 31.6421 40.216 31.6421 39.9C31.6421 39.584 31.6061 39.326 31.5341 39.126C31.4661 38.926 31.3701 38.78 31.2461 38.688C31.1261 38.596 30.9841 38.55 30.8201 38.55C30.6601 38.55 30.5181 38.596 30.3941 38.688C30.2741 38.78 30.1781 38.926 30.1061 39.126C30.0381 39.326 30.0041 39.584 30.0041 39.9C30.0041 40.216 30.0381 40.474 30.1061 40.674C30.1781 40.874 30.2741 41.02 30.3941 41.112C30.5181 41.204 30.6601 41.25 30.8201 41.25ZM33.717 42V38.16L34.137 38.58H32.877V37.8H34.689V42H33.717ZM36.8466 42.072C36.5546 42.072 36.2646 42.034 35.9766 41.958C35.6926 41.878 35.4486 41.766 35.2446 41.622L35.6286 40.878C35.7886 40.994 35.9726 41.086 36.1806 41.154C36.3926 41.222 36.6066 41.256 36.8226 41.256C37.0666 41.256 37.2586 41.208 37.3986 41.112C37.5386 41.016 37.6086 40.882 37.6086 40.71C37.6086 40.602 37.5806 40.506 37.5246 40.422C37.4686 40.338 37.3686 40.274 37.2246 40.23C37.0846 40.186 36.8866 40.164 36.6306 40.164H35.5566L35.7726 37.8H38.3346V38.58H36.1206L36.6246 38.136L36.4746 39.822L35.9706 39.378H36.8586C37.2746 39.378 37.6086 39.436 37.8606 39.552C38.1166 39.664 38.3026 39.818 38.4186 40.014C38.5346 40.21 38.5926 40.432 38.5926 40.68C38.5926 40.928 38.5306 41.158 38.4066 41.37C38.2826 41.578 38.0906 41.748 37.8306 41.88C37.5746 42.008 37.2466 42.072 36.8466 42.072Z" fill="#EC1C28" />
                    </svg>
                </div>
                <h3 class="certification-widget__headline">
                    ISO 9001:2015
                </h3>
                <p class="certification-widget__desc">
                    Quality Management
                </p>
            </div>
            <div class="certification-widget">
                <div class="certification-widget__icon">
                    <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M32 60C47.464 60 60 47.464 60 32C60 16.536 47.464 4 32 4C16.536 4 4 16.536 4 32C4 47.464 16.536 60 32 60Z" stroke="#0199F8" stroke-width="2" />
                        <path d="M14 32C14 18 50 18 50 32C50 46 14 46 14 32Z" stroke="#0199F8" stroke-dasharray="2 1" />
                        <path d="M32 4V60" stroke="#0199F8" />
                        <path d="M4 32H60" stroke="#0199F8" />
                        <path d="M49 24H15C13.3431 24 12 25.3431 12 27V37C12 38.6569 13.3431 40 15 40H49C50.6569 40 52 38.6569 52 37V27C52 25.3431 50.6569 24 49 24Z" fill="#0F1B24" stroke="#0199F8" stroke-width="1.5" />
                        <path d="M20.4804 35V29.4H24.7124V30.44H21.7764V35H20.4804ZM21.6804 32.96V31.92H24.3684V32.96H21.6804ZM25.5898 35V29.4H26.8858V35H25.5898ZM27.4788 35L29.9748 29.4H31.2548L33.7588 35H32.3988L30.3508 30.056H30.8628L28.8068 35H27.4788ZM28.7268 33.8L29.0708 32.816H31.9508L32.3028 33.8H28.7268ZM35.2185 35V30.456H33.4265V29.4H38.3065V30.456H36.5145V35H35.2185ZM37.9866 35L40.4826 29.4H41.7626L44.2666 35H42.9066L40.8586 30.056H41.3706L39.3146 35H37.9866ZM39.2346 33.8L39.5786 32.816H42.4586L42.8106 33.8H39.2346Z" fill="white" />
                    </svg>
                </div>
                <h3 class="certification-widget__headline">
                    FIATA Member
                </h3>
                <p class="certification-widget__desc">
                    Freight Forwarders
                </p>
            </div>
            <div class="certification-widget">
                <div class="certification-widget__icon">
                    <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M32 4C16.5 4 4 16.5 4 32C4 47.5 16.5 60 32 60C47.5 60 60 47.5 60 32" stroke="#0199F8" stroke-width="2" stroke-linecap="round" />
                        <path d="M10 24H54M6 32H58M10 40H54" stroke="#0199F8" stroke-opacity="0.4" />
                        <path d="M24 10C24 10 18 20 18 32C18 44 24 54 24 54M40 10C40 10 46 20 46 32C46 44 40 54 40 54" stroke="#0199F8" stroke-opacity="0.4" />
                        <path d="M46 24H18C15.7909 24 14 25.7909 14 28V36C14 38.2091 15.7909 40 18 40H46C48.2091 40 50 38.2091 50 36V28C50 25.7909 48.2091 24 46 24Z" fill="#0F1B24" stroke="#EC1C28" stroke-width="1.5" />
                        <path d="M21.9145 35V28.7H23.3725V35H21.9145ZM24.0396 35L26.8476 28.7H28.2876L31.1046 35H29.5746L27.2706 29.438H27.8466L25.5336 35H24.0396ZM25.4436 33.65L25.8306 32.543H29.0706L29.4666 33.65H25.4436ZM32.7468 35V29.888H30.7308V28.7H36.2208V29.888H34.2048V35H32.7468ZM35.8609 35L38.6689 28.7H40.1089L42.9259 35H41.3959L39.0919 29.438H39.6679L37.3549 35H35.8609ZM37.2649 33.65L37.6519 32.543H40.8919L41.2879 33.65H37.2649Z" fill="white" />
                    </svg>
                </div>
                <h3 class="certification-widget__headline">
                    IATA Certified
                </h3>
                <p class="certification-widget__desc">
                    Air Cargo Agent
                </p>
            </div>
            <div class="certification-widget">
                <div class="certification-widget__icon">
                    <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M54 16H10C6.68629 16 4 18.6863 4 22V42C4 45.3137 6.68629 48 10 48H54C57.3137 48 60 45.3137 60 42V22C60 18.6863 57.3137 16 54 16Z" fill="#0F1B24" stroke="#0199F8" stroke-width="2" />
                        <path d="M18.5155 36V24.8H21.1075V36H18.5155ZM23.7655 36V24.8H28.5495C30.1068 24.8 31.3175 25.1627 32.1815 25.888C33.0455 26.6027 33.4775 27.5947 33.4775 28.864C33.4775 29.696 33.2802 30.416 32.8855 31.024C32.4908 31.6213 31.9308 32.08 31.2055 32.4C30.4802 32.72 29.6162 32.88 28.6135 32.88H25.2055L26.3575 31.744V36H23.7655ZM30.8855 36L28.0855 31.936H30.8535L33.6855 36H30.8855ZM26.3575 32.032L25.2055 30.816H28.4695C29.2695 30.816 29.8668 30.6453 30.2615 30.304C30.6562 29.952 30.8535 29.472 30.8535 28.864C30.8535 28.2453 30.6562 27.7653 30.2615 27.424C29.8668 27.0827 29.2695 26.912 28.4695 26.912H25.2055L26.3575 25.68V32.032ZM40.5071 36.192C38.9178 36.192 37.6751 35.7493 36.7791 34.864C35.8831 33.9787 35.4351 32.7147 35.4351 31.072V24.8H38.0271V30.976C38.0271 32.0427 38.2458 32.8107 38.6831 33.28C39.1205 33.7493 39.7338 33.984 40.5231 33.984C41.3125 33.984 41.9258 33.7493 42.3631 33.28C42.8005 32.8107 43.0191 32.0427 43.0191 30.976V24.8H45.5791V31.072C45.5791 32.7147 45.1311 33.9787 44.2351 34.864C43.3391 35.7493 42.0965 36.192 40.5071 36.192Z" fill="white" />
                        <path d="M12 44H52" stroke="#EC1C28" stroke-width="3" stroke-linecap="round" />
                    </svg>
                </div>
                <h3 class="certification-widget__headline">
                    IRU Member
                </h3>
                <p class="certification-widget__desc">
                    Road Transport
                </p>
            </div>
            <div class="certification-widget">
                <div class="certification-widget__icon">
                    <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M32 4L52 14V38C52 50 42 57 32 60C22 57 12 50 12 38V14L32 4Z" fill="#0F1B24" stroke="#0199F8" stroke-width="2" />
                        <path d="M32 44C38.6274 44 44 38.6274 44 32C44 25.3726 38.6274 20 32 20C25.3726 20 20 25.3726 20 32C20 38.6274 25.3726 44 32 44Z" stroke="#EC1C28" stroke-dasharray="3 2" />
                        <path d="M22.016 35L24.896 28.7H25.553L28.433 35H27.731L25.085 29.087H25.355L22.709 35H22.016ZM23.15 33.317L23.348 32.777H27.011L27.209 33.317H23.15ZM29.4752 35V28.7H33.7952V29.276H30.1412V34.424H33.9302V35H29.4752ZM30.0692 32.084V31.517H33.3992V32.084H30.0692ZM38.2321 35.054C37.7581 35.054 37.3171 34.976 36.9091 34.82C36.5071 34.658 36.1561 34.433 35.8561 34.145C35.5621 33.851 35.3311 33.512 35.1631 33.128C35.0011 32.738 34.9201 32.312 34.9201 31.85C34.9201 31.388 35.0011 30.965 35.1631 30.581C35.3311 30.191 35.5621 29.852 35.8561 29.564C36.1561 29.27 36.5071 29.045 36.9091 28.889C37.3111 28.727 37.7521 28.646 38.2321 28.646C38.7061 28.646 39.1441 28.727 39.5461 28.889C39.9481 29.045 40.2961 29.267 40.5901 29.555C40.8901 29.843 41.1211 30.182 41.2831 30.572C41.4511 30.962 41.5351 31.388 41.5351 31.85C41.5351 32.312 41.4511 32.738 41.2831 33.128C41.1211 33.518 40.8901 33.857 40.5901 34.145C40.2961 34.433 39.9481 34.658 39.5461 34.82C39.1441 34.976 38.7061 35.054 38.2321 35.054ZM38.2321 34.46C38.6101 34.46 38.9581 34.397 39.2761 34.271C39.6001 34.139 39.8791 33.956 40.1131 33.722C40.3531 33.482 40.5391 33.206 40.6711 32.894C40.8031 32.576 40.8691 32.228 40.8691 31.85C40.8691 31.472 40.8031 31.127 40.6711 30.815C40.5391 30.497 40.3531 30.221 40.1131 29.987C39.8791 29.747 39.6001 29.564 39.2761 29.438C38.9581 29.306 38.6101 29.24 38.2321 29.24C37.8541 29.24 37.5031 29.306 37.1791 29.438C36.8551 29.564 36.5731 29.747 36.3331 29.987C36.0991 30.221 35.9131 30.497 35.7751 30.815C35.6431 31.127 35.5771 31.472 35.5771 31.85C35.5771 32.222 35.6431 32.567 35.7751 32.885C35.9131 33.203 36.0991 33.482 36.3331 33.722C36.5731 33.956 36.8551 34.139 37.1791 34.271C37.5031 34.397 37.8541 34.46 38.2321 34.46Z" fill="white" />
                        <path d="M32 10L32.5 12H34.5L33 13L33.5 15L32 14L30.5 15L31 13L29.5 12H31.5L32 10Z" fill="#EC1C28" />
                    </svg>
                </div>
                <h3 class="certification-widget__headline">
                    AEO Status
                </h3>
                <p class="certification-widget__desc">
                    Customs Trusted
                </p>
            </div>
        </div>
    </div>
</section>

<section class="industry-news">
    <div class="container">
        <h4 class="section-small-headline">
            Latest Insights
        </h4>
        <h2 class="section-headline ">
            Industry News, Guides & Case Studies
        </h2>
        <p class="section-description">
            Stay updated on regulations, routes, and best practices from CIO Logistics specialists.
        </p>
        <div class="industry-news__panel">
            <div class="news-widget">
                <p class="news-widget__badge">
                    Guide
                </p>
                <h3 class="news-widget__title">
                    Complete Guide to Incoterms 2020 for
                </h3>
                <p class="news-widget__desc">
                    Understanding EXW, FOB, CIF, DDP and which
                    one fits your supply chain best.
                </p>
                <div class="news-widget__footer">
                    <p class="news-widget__metric">
                        By Armen Ghazaryan
                    </p>
                    <p class="news-widget__metric">
                        8 min read
                    </p>
                </div>
            </div>
            <div class="news-widget">
                <p class="news-widget__badge">
                    Regulatory Update
                </p>
                <h3 class="news-widget__title">
                    New EAEU Customs Procedures
                    Taking Effect Q3 2026
                </h3>
                <p class="news-widget__desc">
                    What Armenian importers need to know about
                    updated documentation requirements and
                    digital filing.
                </p>
                <div class="news-widget__footer">
                    <p class="news-widget__metric">
                        By Gor Hovhannisyan
                    </p>
                    <p class="news-widget__metric">
                        5 min read
                    </p>
                </div>
            </div>
            <div class="news-widget">
                <p class="news-widget__badge">
                    Case Study
                </p>
                <h3 class="news-widget__title">
                    How We Cut a Retailer's China→AM
                    Costs by 32%
                </h3>
                <p class="news-widget__desc">
                    How We Cut a Retailer's China→AM
                    Costs by 32%
                </p>
                <div class="news-widget__footer">
                    <p class="news-widget__metric">
                        CIO Team
                    </p>
                    <p class="news-widget__metric">
                        6 min read
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-us">
    <div class="container">
        <div class="contact-us__descs">
            <h4 class="section-small-headline">
                Get in Touch
            </h4>
            <h2 class="section-headline ">
                Ready to Move Your Cargo? Let's Talk.
            </h2>
            <p class="section-description">
                Choose the channel that works best for you. Our team responds within 2 hours during
                business days and 24/7 for emergencies.
            </p>
        </div>
        <div class="contact-us__panel">
            <a href="tel:+(374) 95 211 121" class="contact-us__widget contact-widget">
                <div class="contact-widget__icon">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25.6667 19.7398V23.2398C25.668 23.5647 25.6014 23.8863 25.4713 24.184C25.3411 24.4817 25.1502 24.749 24.9108 24.9686C24.6713 25.1883 24.3887 25.3555 24.0809 25.4596C23.7731 25.5637 23.4469 25.6024 23.1233 25.5731C19.5333 25.183 16.0848 23.9563 13.055 21.9915C10.2361 20.2002 7.84623 17.8103 6.055 14.9915C4.08331 11.9479 2.85629 8.48261 2.47334 4.87645C2.44418 4.55383 2.48252 4.22867 2.58592 3.92168C2.68932 3.61469 2.8555 3.33259 3.0739 3.09335C3.29229 2.8541 3.55811 2.66295 3.85443 2.53206C4.15074 2.40118 4.47107 2.33343 4.795 2.33312H8.295C8.86119 2.32755 9.41009 2.52805 9.83939 2.89724C10.2687 3.26644 10.5491 3.77914 10.6283 4.33979C10.7761 5.45986 11.05 6.55964 11.445 7.61812C11.602 8.0357 11.6359 8.48952 11.5429 8.92581C11.4498 9.36211 11.2337 9.76258 10.92 10.0798L9.43834 11.5615C11.0992 14.4823 13.5175 16.9006 16.4383 18.5615L17.92 17.0798C18.2372 16.7661 18.6377 16.5499 19.074 16.4569C19.5103 16.3638 19.9641 16.3978 20.3817 16.5548C21.4402 16.9498 22.5399 17.2237 23.66 17.3715C24.2267 17.4514 24.7443 17.7369 25.1143 18.1735C25.4843 18.6102 25.6809 19.1676 25.6667 19.7398Z" stroke="#EC1C28" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <h3 class="contact-widget__title">Call Us</h3>
                <p class="contact-widget__info">+(374) 95 211 121</p>
            </a>
            <a href="tel:+(374) 95 211 121" class="contact-us__widget contact-widget">
                <div class="contact-widget__icon">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.4458 2.67705C13.497 2.57375 13.5759 2.4868 13.6739 2.42601C13.7718 2.36522 13.8847 2.33301 14 2.33301C14.1153 2.33301 14.2282 2.36522 14.3261 2.42601C14.4241 2.4868 14.503 2.57375 14.5542 2.67705L17.2492 8.13588C17.4267 8.49518 17.6888 8.80603 18.0129 9.04175C18.337 9.27747 18.7135 9.43102 19.11 9.48922L25.137 10.3712C25.2512 10.3878 25.3585 10.4359 25.4467 10.5103C25.535 10.5846 25.6007 10.6822 25.6364 10.7919C25.672 10.9017 25.6763 11.0192 25.6487 11.1312C25.6211 11.2433 25.5626 11.3453 25.48 11.4259L21.1213 15.6702C20.8339 15.9503 20.6188 16.2961 20.4946 16.6778C20.3705 17.0595 20.3409 17.4656 20.4085 17.8612L21.4375 23.8579C21.4577 23.972 21.4453 24.0895 21.4019 24.197C21.3585 24.3045 21.2858 24.3976 21.192 24.4657C21.0982 24.5338 20.9871 24.5742 20.8715 24.5823C20.7559 24.5903 20.6403 24.5657 20.538 24.5112L15.1503 21.6786C14.7953 21.4921 14.4004 21.3948 13.9994 21.3948C13.5985 21.3948 13.2035 21.4921 12.8485 21.6786L7.462 24.5112C7.35972 24.5654 7.2443 24.5897 7.12886 24.5815C7.01343 24.5733 6.90261 24.5329 6.80901 24.4648C6.71542 24.3967 6.64281 24.3038 6.59944 24.1965C6.55606 24.0892 6.54367 23.9719 6.56367 23.8579L7.5915 17.8624C7.6594 17.4666 7.62998 17.0602 7.5058 16.6783C7.38161 16.2964 7.16638 15.9504 6.87867 15.6702L2.52 11.4271C2.4367 11.3466 2.37766 11.2443 2.34963 11.132C2.32159 11.0196 2.32568 10.9016 2.36143 10.7914C2.39718 10.6813 2.46315 10.5834 2.55183 10.5089C2.64051 10.4344 2.74832 10.3863 2.863 10.3701L8.88884 9.48922C9.2858 9.43147 9.66279 9.27812 9.98735 9.04237C10.3119 8.80662 10.5743 8.49553 10.752 8.13588L13.4458 2.67705Z" stroke="#25D366" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                </div>
                <h3 class="contact-widget__title">WhatsApp</h3>
                <p class="contact-widget__info">Chat instantly</p>
            </a>
            <a href="mailTo:info@ciologistics.com" class="contact-us__widget contact-widget">
                <div class="contact-widget__icon">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.5 2.33301H7.00001C6.38117 2.33301 5.78767 2.57884 5.35009 3.01643C4.9125 3.45401 4.66667 4.0475 4.66667 4.66634V23.333C4.66667 23.9518 4.9125 24.5453 5.35009 24.9829C5.78767 25.4205 6.38117 25.6663 7.00001 25.6663H21C21.6188 25.6663 22.2123 25.4205 22.6499 24.9829C23.0875 24.5453 23.3333 23.9518 23.3333 23.333V8.16634L17.5 2.33301Z" stroke="#0199F8" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M16.3333 2.33301V6.99967C16.3333 7.61851 16.5792 8.21201 17.0168 8.64959C17.4543 9.08718 18.0478 9.33301 18.6667 9.33301H23.3333" stroke="#0199F8" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11.6667 10.5H9.33333" stroke="#0199F8" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M18.6667 15.167H9.33333" stroke="#0199F8" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M18.6667 19.833H9.33333" stroke="#0199F8" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <h3 class="contact-widget__title">Email</h3>
                <p class="contact-widget__info">info@ciologistics.com</p>
            </a>
            <a href="#" class="contact-us__widget contact-widget">
                <div class="contact-widget__icon">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.6666 24.5V22.1667C18.6666 20.929 18.175 19.742 17.2998 18.8668C16.4246 17.9917 15.2377 17.5 14 17.5H6.99998C5.7623 17.5 4.57532 17.9917 3.70015 18.8668C2.82498 19.742 2.33331 20.929 2.33331 22.1667V24.5" stroke="#0088CC" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M10.5 12.8333C13.0773 12.8333 15.1666 10.744 15.1666 8.16667C15.1666 5.58934 13.0773 3.5 10.5 3.5C7.92265 3.5 5.83331 5.58934 5.83331 8.16667C5.83331 10.744 7.92265 12.8333 10.5 12.8333Z" stroke="#0088CC" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M25.6667 24.4997V22.1664C25.6659 21.1324 25.3218 20.1279 24.6883 19.3107C24.0548 18.4935 23.1678 17.9099 22.1667 17.6514" stroke="#0088CC" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M18.6667 3.65137C19.6705 3.90839 20.5602 4.49218 21.1956 5.31073C21.831 6.12927 22.1758 7.136 22.1758 8.1722C22.1758 9.2084 21.831 10.2151 21.1956 11.0337C20.5602 11.8522 19.6705 12.436 18.6667 12.693" stroke="#0088CC" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <h3 class="contact-widget__title">Telegram</h3>
                <p class="contact-widget__info">@ciologistics</p>
            </a>
        </div>
    </div>
</section>

<section class="map-section">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3047.219414052198!2d44.50668077608772!3d40.20418196854815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406abd420a039281%3A0xa17a4f7686410de4!2sCio%20Logistics%20LLC!5e0!3m2!1sru!2sam!4v1782043695679!5m2!1sru!2sam" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<?php get_footer() ?>