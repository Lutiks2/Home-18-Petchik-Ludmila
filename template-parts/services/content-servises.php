<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package businessplus
 */

?>

<li id="post-<?php the_ID(); ?>"<?php post_class(); ?>>
    <div class="services-img">
        <?php the_post_thumbnail(); ?>
    </div>
    <div>
        <a href="<?php the_permalink(); ?>" class="services-title">
            <?php the_title(); ?>
        </a>
        <div class="services-descrip">
            <?php the_content(); ?>
        </div>
    </div>
</li><!-- #post-<?php the_ID(); ?> -->
