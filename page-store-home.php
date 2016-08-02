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
                            <span>94%</span> of users would recommend our themes
                        </div>
                        <!-- /need_event__percentages-item -->

                        <!-- need_event__percentages-item -->
                        <div class="need_event__percentages-item">
                            <span>89%</span> lorem ipsum dolor sit amet
                        </div>
                        <!-- /need_event__percentages-item -->

                        <!-- need_event__percentages-item -->
                        <div class="need_event__percentages-item">
                            <span>95%</span> lorem ipsum dolor
                        </div>
                        <!-- /need_event__percentages-item -->

                    </div>
                    <!-- /need_event__percentages -->

                    <!-- need_event__featured -->
                    <div class="need_event__featured">
                        <span>Featured in</span>

                        <div>
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/featured1.png" width="118" height="30" alt="">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/featured2.png" width="68" height="35" alt="">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/featured3.png" width="50" height="50" alt="">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/featured4.png" width="204" height="30" alt="">
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

<!--                    <!--sorting-->
<!--                    <ul class="sorting">-->
<!--                        --><?php
//                        $terms = get_terms("features");
//                        $count = count($terms);
//                        if ($count > 0) {
//                            foreach ($terms as $term) {
//                                echo '<li>
//                                        <div class="nice-checkbox">
//                                            <input type="checkbox" name="' . $term->slug . '" id="' . $term->slug . '1">
//                                            <label for="' . $term->slug . '1" title="' . $term->name . '">' . $term->name . '</label>
//                                        </div>
//                                    </li>';
//                            }
//                        }
//                        ?>
<!---->
<!--                        -->
<!--                    </ul>-->
<!--                    <!--/sorting-->

                    <ul class="sorting">
                        <li>
                            <div class="nice-checkbox">
                                <input type="checkbox" name="academia" id="academia1">
                                <label for="academia1" title="Academia">Academia</label>
                            </div>
                        </li><li>
                            <div class="nice-checkbox">
                                <input type="checkbox" name="all-themes" id="all-themes1">
                                <label for="all-themes1" title="All Themes">All Themes</label>
                            </div>
                        </li><li>
                            <div class="nice-checkbox">
                                <input type="checkbox" name="annual-meeting" id="annual-meeting1">
                                <label for="annual-meeting1" title="Annual Meeting">Annual Meeting</label>
                            </div>
                        </li><li>
                            <div class="nice-checkbox">
                                <input type="checkbox" name="club-night" id="club-night1">
                                <label for="club-night1" title="Club Night">Club Night</label>
                            </div>
                        </li><li>
                            <div class="nice-checkbox">
                                <input type="checkbox" name="concert" id="concert1">
                                <label for="concert1" title="Concert">Concert</label>
                            </div>
                        </li><li>
                            <div class="nice-checkbox">
                                <input type="checkbox" name="ceonference" id="ceonference1">
                                <label for="ceonference1" title="Conference">Conference</label>
                            </div>
                        </li><li>
                            <div class="nice-checkbox">
                                <input type="checkbox" name="exhibition" id="exhibition1">
                                <label for="exhibition1" title="Exhibition">Exhibition</label>
                            </div>
                        </li><li>
                            <div class="nice-checkbox">
                                <input type="checkbox" name="multiple-events" id="multiple-events1">
                                <label for="multiple-events1" title="Multiple Events">Multiple Events</label>
                            </div>
                        </li><li>
                            <div class="nice-checkbox">
                                <input type="checkbox" name="seminars" id="seminars1">
                                <label for="seminars1" title="Seminars">Seminars</label>
                            </div>
                        </li><li>
                            <div class="nice-checkbox">
                                <input type="checkbox" name="single-event" id="single-event1">
                                <label for="single-event1" title="Single Event">Single Event</label>
                            </div>
                        </li><li>
                            <div class="nice-checkbox">
                                <input type="checkbox" name="single-page" id="single-page1">
                                <label for="single-page1" title="Single Page">Single Page</label>
                            </div>
                        </li><li>
                            <div class="nice-checkbox">
                                <input type="checkbox" name="sports" id="sports1">
                                <label for="sports1" title="Sports">Sports</label>
                            </div>
                        </li><li>
                            <div class="nice-checkbox">
                                <input type="checkbox" name="trade-show" id="trade-show1">
                                <label for="trade-show1" title="Trade Show">Trade Show</label>
                            </div>
                        </li><li>
                            <div class="nice-checkbox">
                                <input type="checkbox" name="workshop" id="workshop1">
                                <label for="workshop1" title="Workshops">Workshops</label>
                            </div>
                        </li>
                    </ul>

                </div>

                <div class="sorting-wrap__item">
                    <span>INTEGRATIONS</span>

                    <ul class="sorting" style="">
                        <li>
                            <div class="nice-checkbox">
                                <input type="checkbox" name="item1" id="item1">
                                <label for="item1" title="Item1">Item1</label>
                            </div>
                        </li>
                        <li>
                            <div class="nice-checkbox">
                                <input type="checkbox" name="item2" id="item2">
                                <label for="item2" title="Item2">Item2</label>
                            </div>
                        </li>
                        <li>
                            <div class="nice-checkbox">
                                <input type="checkbox" name="item3" id="item3">
                                <label for="item3" title="Item3">Item1</label>
                            </div>
                        </li>
                    </ul>

                </div>

                <div class="sorting-wrap__item">
                    <span>SUPPORT</span>

                    <ul class="sorting" style="">
                        <li>
                            <div class="nice-checkbox">
                                <input type="checkbox" name="item4" id="item4">
                                <label for="item4" title="Item4">Item4</label>
                            </div>
                        </li>
                        <li>
                            <div class="nice-checkbox">
                                <input type="checkbox" name="item5" id="item5">
                                <label for="item5" title="Item5">Item5</label>
                            </div>
                        </li>
                        <li>
                            <div class="nice-checkbox">
                                <input type="checkbox" name="item6" id="item6">
                                <label for="item6" title="Item6">Item6</label>
                            </div>
                        </li>
                    </ul>

                </div>

                <div class="sorting-wrap__item">
                    <span>EVENT TYPE</span>

                    <ul class="sorting" style="">
                        <li>
                            <div class="nice-checkbox">
                                <input type="checkbox" name="item7" id="item7">
                                <label for="item7" title="Item7">Item1</label>
                            </div>
                        </li>
                        <li>
                            <div class="nice-checkbox">
                                <input type="checkbox" name="item8" id="item8">
                                <label for="item8" title="Item8">Item8</label>
                            </div>
                        </li>
                        <li>
                            <div class="nice-checkbox">
                                <input type="checkbox" name="item9" id="item9">
                                <label for="item9" title="Item9">Item9</label>
                            </div>
                        </li>
                    </ul>

                </div>

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
