<article class="post" role="article" itemscope itemtype="http://schema.org/Article">


    <?php
    // Navigation between posts.
    ?>
    <nav class="chalet_nav">
        <div class="prev-posts pull-left">
            <?php
            $prev_post = get_previous_post();
            if ($prev_post) {
                $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
                echo '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title . '" class=" ">' . $prev_title . '</a>' . "\n";
            }
            ?>
        </div>


        <div class="next-posts pull-right">
            <?php
            $next_post = get_next_post();
            if ($next_post) {
                $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
                echo '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title . '" class=" ">' . $next_title . '</a>' . "\n";
            }
            ?>
        </div>
    </nav>


    <?php
    // Post title.
    ?>
    <h1 class="title">
        <a href="<?php the_permalink() ?>">
            <?php the_title(); ?>
        </a>
    </h1>

    <div class="post_meta">
        <time class="post_date" datetime="<?php the_time('Y-m-d'); ?>" itemprop="datePublished">
            <?php /*the_time(__('F j, Y'));*/ ?>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit
        </time>
    </div>



    <div class="w3-row">
        <div class="w3-col m6 w3-center w3-padding-large">
            <!--
            <p><b><i class="fa fa-user w3-margin-right"></i>Photos:</b></p><br>
            -->
            
            <?php
            // Gallery.
            ?>
            <div class="postcontent_list" itemprop="articleBody" data-type-cleanup="true">
                <?php the_content('Read More &raquo;'); ?>
            </div>

        </div>

        <!-- Hide this text on small devices -->
        <div class="w3-col m6 w3-hide-small w3-padding-large">
            <p><b><i class="fa fa-user w3-margin-right"></i>Description:</b></p><br>

            <?php
            // Description.

            $description = get_post_meta(get_the_id(), 'description', true);

            if (!empty($description)) {
                ?>

                <div class="chalet-description pull-right">
                    <?php echo $description; ?>
                </div>
                <div class="clear"></div>

            <?php } ?>

        </div>
    </div>

</article>



<?php
// Contact form.

$contactFormId = get_post_meta(get_the_id(), 'contact', true);
if (!empty($contactFormId)): ?>

<h1 class="title">
    Enquire about <?php the_title(); ?>
</h1>
<div class="post_meta">
    <time class="post_date" datetime="<?php the_time('Y-m-d'); ?>" itemprop="datePublished">
        Please provide your name, email address, and a brief message
    </time>
</div>

<?php echo do_shortcode('[contact-form-7 id="' . $contactFormId . '" title="Contact form 1"]'); ?>
<?php endif; ?>

<?php
// Map.

$location = get_field('location');

if (!empty($location)): ?>

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

    <div class="acf-map">
        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
    </div>
<?php endif; ?>

