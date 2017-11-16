<article class="post" role="article" itemscope itemtype="http://schema.org/Article">


	<nav class="chalet_nav">
	<div class="prev-posts pull-left">
	<?php
	$prev_post = get_previous_post();
	if($prev_post) {
	   $prevThumb = wp_get_attachment_image_src(get_post_thumbnail_id($prev_post->ID, 'full'));
	   $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));



	   echo '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class=" ">'. $prev_title . '</a>' . "\n";


echo '<img src="'. $prevThumb[0] .'">';

			}
	?>
	</div>



	<div class="next-posts pull-right">
	<?php
	$next_post = get_next_post();


	if($next_post) {
	   $nextThumb = wp_get_attachment_image_src(get_post_thumbnail_id($next_post->ID, 'full'));
	   $next_title = strip_tags(str_replace('"', '', $next_post->post_title));


	   echo '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class=" ">' . $next_title .'</a>' . "\n";
			}


echo '<img src="'. $nextThumb[0] .'">';


	?>
	</div>
	</nav>


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

