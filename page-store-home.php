<?php
/**
 * Template Name: Store Home
 */
?>
<?php get_header(); ?>

<?php
$themes    = get_posts(array(
    'post_type'      => 'themes',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC'));
$video_url = 'http://www.youtube.com/embed/Op2vuGW9boE';
$q         = strtoupper(filter_input(INPUT_GET, 'q', FILTER_SANITIZE_SPECIAL_CHARS));

//query_posts('pagename=store');

while (have_posts()) : the_post();
    ?>
    <!--need_event-->
    <section id="hero" class="need_event">
        <?php //the_content(); ?>

        <div class="video_container">
            <div>
                <h1>need <?php echo empty($q) ? 'an event website?' : "a <strong>$q</strong> ?"; ?></h1>
                <p>LOOK NO FURTHER</p>

                <!-- need_event__percentages -->
                <div class="need_event__percentages">

                    <!-- need_event__percentages-item -->
                    <div class="need_event__percentages-item">
                        <span>6000</span> Customers Worldwide
                    </div>
                    <!-- /need_event__percentages-item -->

                    <!-- need_event__percentages-item -->
                    <div class="need_event__percentages-item">
                        <span>9</span> Amazing Templates
                    </div>
                    <!-- /need_event__percentages-item -->

                    <!-- need_event__percentages-item -->
                    <div class="need_event__percentages-item">
                        <span>100%</span> Made by Event Professionals
                    </div>
                    <!-- /need_event__percentages-item -->

                </div>
                <!-- /need_event__percentages -->

                <!-- need_event__featured -->
                <div class="need_event__featured">
                    <span>Featured in</span>

                    <div>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/athemes.png" width="116" height="35" alt="">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/cool.png" width="82" height="35" alt="">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/wp-premium.png" width="185" height="35" alt="">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/sourcewp.png" width="108" height="35" alt="">
                    </div>

                </div>
                <!-- /need_event__featured -->

            </div>
            <div class="need_event__video">
                <button class="play" data-video="<iframe src='<?php echo $video_url; ?>' frameborder='0' allowfullscreen></iframe>">watch video</button>
            </div>
        </div>
        <!-- video_container -->

        <!-- hero__caption -->
        <div class="hero__caption">
            <div class="container">
                <p>Our Premium Event WordPress Themes give you the all in one solution for a sparkling event. Awesome events
                    around the world use our Event WordPress Themes.</p>
                <a href="#theme-list" class="btn btn_black">VIEW OUR THEMES</a>
                <a href="<?php echo home_url('wordpress-premium-event-themes'); ?>" class="btn btn_black btn_buy_all_themes">BUY ALL THEMES</a>
            </div>
        </div>
        <!-- /hero__caption -->

    </section>
    <!--/need_event-->

    <?php
endwhile;
wp_reset_query();
?>

<!--theme List-->
<section id="theme-list" data-action="<?php echo get_stylesheet_directory_uri(); ?>/php/themes.php">

    <div class="theme-list__wrap">
        <!--container-->
        <div class="container">
            <?php
            query_posts('pagename=store');
            if (have_posts()):
                while (have_posts()) : the_post();
                    the_field('our_themes_content');
                endwhile;
            endif;
            wp_reset_query();
            ?>

            <div class="sorting-wrap">

                <div class="sorting-wrap__item">
                    <span>FEATURES</span>

                    <ul class="sorting">
                        <?php
                        $terms = get_terms('features', array('hide_empty' => false));
                        if (count($terms) > 0) {
                            foreach ($terms as $term) {
                                ?>
                                <li>
                                    <div class="nice-checkbox">
                                        <input type="checkbox" name="<?php echo $term->slug; ?>" id="<?php echo $term->slug; ?>">
                                        <label for="<?php echo $term->slug; ?>" title="<?php echo $term->name; ?>"><?php echo $term->name; ?></label>
                                    </div>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>

                </div>

                <div class="sorting-wrap__item">
                    <span>INTEGRATIONS</span>

                    <ul class="sorting" style="">
                        <?php
                        $terms = get_terms('integrations', array('hide_empty' => false));
                        if (count($terms) > 0) {
                            foreach ($terms as $term) {
                                ?>
                                <li>
                                    <div class="nice-checkbox">
                                        <input type="checkbox" name="<?php echo $term->slug; ?>" id="<?php echo $term->slug; ?>">
                                        <label for="<?php echo $term->slug; ?>" title="<?php echo $term->name; ?>"><?php echo $term->name; ?></label>
                                    </div>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>

                </div>

                <div class="sorting-wrap__item">
                    <span>EVENT TYPE</span>

                    <ul class="sorting">
                        <?php
                        $terms = get_terms('event_types', array('hide_empty' => false));
                        if (count($terms) > 0) {
                            foreach ($terms as $term) {
                                ?>
                                <li>
                                    <div class="nice-checkbox">
                                        <input type="checkbox" name="<?php echo $term->slug; ?>" id="<?php echo $term->slug; ?>">
                                        <label for="<?php echo $term->slug; ?>" title="<?php echo $term->name; ?>"><?php echo $term->name; ?></label>
                                    </div>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>

                </div>

                <a href="<?php echo home_url('comparison-table'); ?>" class="btn btn_blue">Compare All</a>

            </div>

            <div class="sorting-labels">

                <input type="hidden" class="sorts-name">

            </div>

        </div>
        <!--/container-->
        <div class="themes">
            <?php
            $column_count = 1;
            query_posts('post_type=themes&posts_per_page=-1&orderby=menu_order&order=ASC');
            if (have_posts()):
                while (have_posts()):
                    the_post();
                    $terms      = get_the_terms($post->ID, 'features');
                    $terms_list = '';
                    foreach ($terms as $term) {
                        $terms_list .= $term->slug . ' ';
                        unset($term);
                    }
                    $home_image = get_field('home_image');
                    $demo_link  = get_field('demo_link'); // used to check if it's a bundle or not
                    $theme_link = !empty($demo_link) ? get_permalink() : home_url('wordpress-premium-event-themes');
                    ?>
                    <!--column-->
                    <div class="column <?php echo $terms_list; ?> column<?php echo $column_count; ?>">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/browser-bar.png" alt="<?php the_title(); ?>"/>
                        <a class="thumbnail" href="<?php echo $theme_link; ?>">
                            <?php //the_post_thumbnail('theme'); ?>
                            <img src="<?php echo $home_image['url']; ?>" alt="<?php echo get_the_title($themes[$i]); ?>" />
                            <?php if (get_field('new') === true) { ?>
                                <span class="new"><?php _e('new', 'showthemes'); ?></span>
                            <?php } ?>
                            <div>
                                <span class="btn btn_grey" href="<?php the_permalink(); ?>"><?php _e('FEATURES', 'showthemes'); ?></span>
                            </div>
                        </a>
                        <div class="content">
                            <div>
                                <h3><a title="<?php the_title(); ?>" href="<?php echo $theme_link; ?>"><?php the_title(); ?></a></h3>
                                <?php if (!empty($demo_link)) { ?>
                                    <a href="<?php echo $demo_link; ?>" class="btn btn_red"><?php _e('DEMO', 'showthemes'); ?></a>
                                <?php } else { ?>
                                    <a href="<?php echo $theme_link; ?>" class="btn btn_red"><?php _e('BUY NOW', 'showthemes'); ?></a>
                                <?php } ?>
                            </div>
                            <?php the_field('sorting_excerpt'); ?>
                        </div>
                    </div>
                    <?php
                    if ($column_count == 3) {
                        $column_count = 1;
                    } else {
                        $column_count++;
                    }
                endwhile;
                wp_reset_query();
            endif;
            ?>
        </div>
    </div>
</section>
<!--/theme-list-->

<?php
get_footer();
