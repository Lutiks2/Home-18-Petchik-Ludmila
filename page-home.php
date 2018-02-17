<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package businessplus
 */

get_header(); ?>
    <section class="wrap clearfix">
        <div class="heading-section about">
            <h3><?php echo get_theme_mod('about_heading'); ?></h3>
            <span><?php echo get_theme_mod('about_description'); ?></span>
        </div>
        <div class="about-main">
            <p><?php echo get_theme_mod('about_text'); ?></p>
            <a class="button"
               href="<?php echo get_theme_mod('about_url_button'); ?>"
               style="background: <?php echo get_theme_mod('about_button_color'); ?>">
                <?php echo get_theme_mod('about_text_button'); ?>
            </a>
        </div>
    </section>
    <section class="services" style="background: <?php echo get_theme_mod('backgr_color'); ?>">
        <div class="wrap clearfix">
        <div class="heading-section">
            <h3><?php echo get_theme_mod('services_heading'); ?></h3>
            <span><?php echo get_theme_mod('services_description'); ?></span>
        </div>
        <div class="services-main">
            <ul class="services-list clearfix">
                <?php
                $args = [
                    'post_type' => 'service',
                    'order' => 'ASC',
                ];
                query_posts($args);
                while (have_posts()) : the_post();
                    get_template_part('template-parts/services/content', 'servises');
                endwhile;
                ?>
            </ul>
            <a class="button"
               href="<?php echo get_theme_mod('services_url_button'); ?>"
               style="background: <?php echo get_theme_mod('services_button_color'); ?>">
                <?php echo get_theme_mod('services_text_button'); ?>
            </a>
        </div>
        </div>
    </section>
<?php

get_footer();
