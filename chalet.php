<article class="post" role="article" itemscope itemtype="http://schema.org/Article">


	<nav class="chalet_nav">
	<div class="prev-posts pull-left">
	<?php
	$prev_post = get_previous_post();
	if($prev_post) {
	   $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
	   echo '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class=" ">'. $prev_title . '</a>' . "\n";
			}
	?>
	</div>



	<div class="next-posts pull-right">
	<?php
	$next_post = get_next_post();
	if($next_post) {
	   $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
	   echo '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class=" ">'. $next_title . '</a>' . "\n";
			}
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




<?php

$description = get_post_meta(get_the_id(), 'description', true);

if (!empty($description)) {
?>
<!--
<div class="chalet-description pull-right">
	<?php echo $description; ?>
</div>
-->
<div class="clear"></div>

<?php } ?>






</article>










<?php
    //Get the images ids from the post_metadata
    //$images = get_field('photos', $post->ID);
$images = acf_photo_gallery('photos', $post->ID);

//the_meta();
//var_dump($images); die();


    //Check if return array has anything in it
    if( count($images) ):
        //Cool, we got some data so now let's loop over it
        foreach($images as $image):
            $id = $image['id']; // The attachment id of the media
            $title = $image['title']; //The title
            $caption= $image['caption']; //The caption
            $full_image_url= $image['full_image_url']; //Full size image url
            //$thumb_url = acf_photo_gallery_resize_image($full_image_url, 262, 160); //Resized size to 262px width by 160px height image url
            $thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
            $url= $image['url']; //Goto any link when clicked
            $target= $image['target']; //Open normal or new tab
            $alt = get_field('photo_gallery_alt', $id); //Get the alt which is a extra field (See below how to add extra fields)
            $class = get_field('photo_gallery_class', $id); //Get the class which is a extra field (See below how to add extra fields)
?>
<div class="col-xs-6 col-md-3">
    <div class="thumbnail">
        <a href="<?php echo $full_image_url; ?>" <?php echo ($target == 'true' )? 'target="_blank"': ''; ?> class="foobox" rel="gallery">
            <img src="<?php echo $thumbnail_image_url; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>">
        </a>
    </div>
</div>
<?php endforeach; endif; ?>








          <h1 class="title">
            <a href="<?php the_permalink() ?>">
              Enquire about <?php the_title(); ?>
            </a>
          </h1>
          <div class="post_meta">
            <time class="post_date" datetime="<?php the_time('Y-m-d'); ?>" itemprop="datePublished">
              Please provide your name, email address, and a brief message
	    </time>
          </div>



<?php echo do_shortcode( '[contact-form-7 id="'. get_post_meta(get_the_id(), 'contact', true) .'" title="Contact form 1"]' ); ?>





          <h1 class="title">
            <a href="<?php the_permalink() ?>">
              <?php the_title(); ?> Location
            </a>
          </h1>
          <div class="post_meta">
            <time class="post_date" datetime="<?php the_time('Y-m-d'); ?>" itemprop="datePublished">
              (Location address or landmark)
            </time>
          </div>


<?php 

$location = get_field('location');

if( !empty($location) ):
?>
<div class="acf-map">
	<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
</div>
<?php endif; ?>


