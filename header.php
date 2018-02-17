<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package businessplus
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header id="masthead" class="site-header"
        style="background: url('<?php echo get_theme_mod('set_background'); ?>') no-repeat center/cover">
    <div class="line">
        <div class="container">
            <div class="heading clearfix">
                <div class="site-branding">
                    <h1 class="logo">
                        <a href="#"><?php the_custom_logo() ?></a>
                    </h1>
                    <div class="number"><?php echo get_theme_mod('tel_number'); ?></div>
                </div>
                <nav class="main-nav">
                    <a class="menu-bat" href="#">
                        <span class="fa fa-bars"></span>
                    </a>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'header',
//                'menu_id' => 'Header menu',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'menu_class' => 'welcome-list clearfix',
                    ));
                    ?>
                </nav>
            </div>
        </div>
    </div>
    <div class="container welcome">
        <p class="greeting"><?php echo get_theme_mod('greeting'); ?></p>
        <h2 class="site-name"><?php bloginfo('name'); ?></h2>
        <p class="site-descrip"><?php bloginfo('description'); ?></p>
        <a class="button"
           href="<?php echo get_theme_mod('url_button'); ?>"
            style="background: <?php echo get_theme_mod('header_button_color'); ?>">
            <?php echo get_theme_mod('text_button'); ?>
        </a>
    </div>


</header><!-- #masthead -->

<!--<div id="content" class="site-content">-->
