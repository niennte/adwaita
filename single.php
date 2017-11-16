<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */
echo "hi"; die();
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
<p>test 2 !!!</p>
<?php

if ( get_query_var('paged') ) $paged = get_query_var('paged');  
if ( get_query_var('page') ) $paged = get_query_var('page');

$query = new WP_Query( array( 'post_type' => 'chalet') );
?>


        <?php while ($query->have_posts()) : $query->the_post(); ?>

            <?php get_template_part( 'chalet', get_post_format() ); ?>

        <?php endwhile; wp_reset_postdata(); ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
