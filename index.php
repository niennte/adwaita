<?php
get_header();
?>

    <!-- Posts Area -->
    <main class="posts_area">

<?php
//if ( get_query_var('paged') ) $paged = get_query_var('paged');
//if ( get_query_var('page') ) $paged = get_query_var('page');
//$query = new WP_Query( array( 'post_type' => 'chalet', 'paged' => $paged ) );
?>


      
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article class="post" role="article" itemscope itemtype="http://schema.org/Article">
          <h1 class="title">
            <a href="<?php the_permalink() ?>">
              <?php the_title(); ?>
            </a>
          </h1>
          <div class="post_meta">
            <time class="post_date" datetime="<?php the_time('Y-m-d'); ?>" itemprop="datePublished">
              <?php the_time(__('F j, Y')); ?>
            </time>
          </div>
          <div class="postcontent_list" itemprop="articleBody" data-type-cleanup="true">

          <?php the_content('Read More &raquo;'); ?>

          </div>
        </article>

      <?php endwhile; endif; ?>
      
      <div class="nav_links">
        <?php posts_nav_link(); ?>
      </div>


    </main>

    <!-- Footer -->
    <footer class="site_footer">
      2014 ©  Copyright Creative Little Journal. All rights reserved.
    </footer>

  </div>

  <!-- End blog display -->

<?php wp_footer(); ?>
</body>
</html>

