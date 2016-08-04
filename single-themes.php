<?php get_header(); ?>

<?php
$q = strtoupper(filter_input(INPUT_GET, 'q', FILTER_SANITIZE_SPECIAL_CHARS));
if (have_posts()):
    while (have_posts()) :
        the_post();
        $hero_left_image         = get_field('hero_left_image');
        $hero_left_mobile_image  = get_field('hero_left_mobile_image');
        $hero_right_image        = get_field('hero_right_image');
        $hero_background_color   = get_field('hero_background_color');
        $hero_menu_color         = get_field('hero_menu_color');
        $feature1_image_main     = get_field('theme_feature_1_screenshot');
        $feature2_image_main     = get_field('theme_feature_2_screenshot');
        $feature3_image_main     = get_field('theme_feature_3_screenshot');
        $feature1_image_comments = get_field('theme_feature_1_comments');
        $feature2_image_comments = get_field('theme_feature_2_comments');
        $feature3_image_comments = get_field('theme_feature_3_comments');
        $theme_only_product_id   = get_field('buy_theme_only_cart_id');
        $theme_only_product      = get_product_by_sku($theme_only_product_id);
        ?>
        <!--hero_bundle-->
        <section class="hero-bundle meet-vertoh" style="background-color: <?php echo $hero_background_color; ?>">
            <div>
                <div style="background-image: url(<?php echo $hero_left_mobile_image['url']; ?>);">

                    <h1><?php the_title(); ?></h1>
                    <?php
                    if (empty($q)) {
                        the_field('theme_hero_content', false, false);
                    } else {
                        echo '<p>' . get_the_title() . " is the perfect <strong>$q</strong>" . '</p>';
                    }
                    ?>
                    <!-- meet-vertoh__links -->
                    <div class="meet-vertoh__links">
                        <a class="btn btn_red" href="#theme-pricing">BUY NOW</a>
                        <a class="btn btn_black" href="<?php the_field('demo_link'); ?>">LIVE DEMO</a>
                    </div>
                    <!-- /meet-vertoh__links -->

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
                <div class="hero-bundle__price">
                    <div class="hero-bundle__cost">
                        <span>Only</span>
                        <div style="color:<?php echo $hero_menu_color; ?>">$<?php echo intval($theme_only_product->price); ?></div>
                    </div>
                    <img src="<?php echo $hero_right_image['url']; ?>" alt="<?php the_title(); ?>"/>
                </div>
                <div class="hero-bundle__bg" style="background-image: url(<?php echo $hero_left_image['url']; ?>);"></div>
            </div>

            <!-- meet-vertoh__about -->
            <div class="meet-vertoh__about">
                <p>
                    <?php the_field('large_tagline'); ?>
                </p>
            </div>
            <!-- /meet-vertoh__about -->

        </section>
        <!--/hero_bundle-->

        <script type="text/javascript">

            jQuery(document).ready(function () {

                jQuery.each(jQuery('#main-menu .menu-item'), function (i, el) {
                    jQuery(el).css('color', '<?php echo $hero_menu_color; ?>');
                });

            });

        </script>

        <?php if ($post->ID == 14718 || $post->ID == 15430) { ?>
            <!-- our-features -->
            <section class="our-features">
                <!-- our-features__wrap -->
                <div class="our-features__wrap">
                    <h2 class="our-features__title">One click Facebook and Eventbrite import</h2>
                    <!-- our-features__pic -->
                    <div class="our-features__pic our-features__pic_tickets">
                        <img src="http://www.showthemes.com/wp-content/uploads/2016/05/facebook-eventbrite-import.png" width="802" height="416" alt="One Click Import from Facebook and Eventbrite"/>
                    </div>
                    <!-- /our-features__pic -->
                </div>
                <!-- /our-features__wrap -->
                <!-- our-features__line -->
                <div class="our-features__line">
                    <!-- case -->
                    <div class="case">
                        <!-- case__row -->
                        <div class="case__row our-features__list">
                            <div class="col col-sm-4 col-xs-12">
                                <h3>Facebook Import</h3>
                                <p>Easily import event information such as date and time, name, venue and photos of the event in one click.</p>
                            </div>
                            <div class="col col-sm-4 col-xs-12">
                                <h3>Eventbrite Import</h3>
                                <p>If you use Eventbrite you can quickly import your ticket price, description and status. Also easily pull event information such as date, time and venue.</p>
                            </div>
                            <div class="col col-sm-4 col-xs-12">
                                <h3>Facebook Who is Coming</h3>
                                <p>Just add your Facebook Event Id and easily display RSVPs and pictures of who is attending your event. A great networking booster.</p>
                            </div>
                        </div>
                        <!-- /case__row -->
                    </div>
                    <!-- /case -->
                </div>
                <!-- /our-features__line -->
            </section>
            <!-- /our-features -->
        <?php } ?>

        <!-- our-features -->
        <section class="our-features">
            <!-- our-features__wrap -->
            <div class="our-features__wrap">
                <h2 class="our-features__title"><?php the_field('theme_feature_1_heading'); ?></h2>
                <!-- our-features__pic -->
                <div class="our-features__pic our-features__pic_tickets">
                    <img src="<?php echo $feature1_image_main['url']; ?>" width="802" height="416" alt="<?php echo $feature1_image_main['alt']; ?>"/>
                    <?php if (!empty($feature1_image_comments['url'])) { ?>
                        <img src="<?php echo $feature1_image_comments['url']; ?>" width="859" height="160" alt="<?php echo $feature1_image_comments['alt']; ?>" class="our-features__pic_hide"/>
                    <?php } ?>
                </div>
                <!-- /our-features__pic -->
            </div>
            <!-- /our-features__wrap -->
            <!-- our-features__line -->
            <div class="our-features__line">
                <!-- case -->
                <div class="case">
                    <!-- case__row -->
                    <div class="case__row our-features__list">
                        <div class="col col-sm-4 col-xs-12">
                            <?php the_field('theme_feature_1_callout1'); ?>
                        </div>
                        <div class="col col-sm-4 col-xs-12">
                            <?php the_field('theme_feature_1_callout2'); ?>
                        </div>
                        <div class="col col-sm-4 col-xs-12">
                            <?php the_field('theme_feature_1_callout3'); ?>
                        </div>
                    </div>
                    <!-- /case__row -->
                </div>
                <!-- /case -->
            </div>
            <!-- /our-features__line -->
        </section>
        <!-- /our-features -->
        <!-- our-features -->
        <section class="our-features our-features_management">
            <!-- our-features__wrap -->
            <div class="our-features__wrap">
                <h2 class="our-features__title"><?php the_field('theme_feature_2_heading'); ?></h2>
                <!-- our-features__pic -->
                <div class="our-features__pic our-features__pic_management">
                    <img src="<?php echo $feature2_image_main['url']; ?>" width="732" height="513" alt="<?php echo $feature2_image_main['alt']; ?>"/>
                    <?php if (!empty($feature2_image_comments['url'])) { ?>
                        <img src="<?php echo $feature2_image_comments['url']; ?>" width="929" height="299" alt="<?php echo $feature2_image_comments['alt']; ?>" class="our-features__pic_hide_3"/>
                    <?php } ?>
                </div>
                <!-- /our-features__pic -->
            </div>
            <!-- /our-features__wrap -->
            <!-- our-features__line -->
            <div class="our-features__line">
                <!-- case -->
                <div class="case">
                    <!-- case__row -->
                    <div class="case__row our-features__list">
                        <div class="col col-sm-4 col-xs-12">
                            <?php the_field('theme_feature_2_callout'); ?>
                        </div>
                        <div class="col col-sm-4 col-xs-12">
                            <?php the_field('theme_feature_2_callout2'); ?>
                        </div>
                        <div class="col col-sm-4 col-xs-12">
                            <?php the_field('theme_feature_2_callout3'); ?>
                        </div>
                    </div>
                    <!-- /case__row -->
                </div>
                <!-- /case -->
            </div>
            <!-- /our-features__line -->
        </section>
        <!-- /our-features -->
        <!-- our-features -->
        <section class="our-features our-features_promo">
            <!-- our-features__wrap -->
            <div class="our-features__wrap">
                <h2 class="our-features__title"><?php the_field('theme_feature_3_heading'); ?></h2>
                <!-- our-features__pic -->
                <div class="our-features__pic our-features__pic_promo">
                    <img src="<?php echo $feature3_image_main['url']; ?>" width="953" height="481" alt="<?php echo $feature3_image_main['alt']; ?>"/>
                    <?php if (!empty($feature3_image_comments['url'])) { ?>
                        <img src="<?php echo $feature3_image_comments['url']; ?>" width="959" height="614" alt="<?php echo $feature3_image_comments['alt']; ?>" class="our-features__pic_hide_4"/>
                    <?php } ?>
                </div>
                <!-- /our-features__pic -->
            </div>
            <!-- /our-features__wrap -->
            <!-- our-features__line -->
            <div class="our-features__line">
                <!-- case -->
                <div class="case">
                    <!-- case__row -->
                    <div class="case__row our-features__list">
                        <div class="col col-sm-4 col-xs-12">
                            <?php the_field('theme_feature_3_callout1'); ?>
                        </div>
                        <div class="col col-sm-4 col-xs-12">
                            <?php the_field('theme_feature_3_callout2'); ?>
                        </div>
                        <div class="col col-sm-4 col-xs-12">
                            <?php the_field('theme_feature_3_callout3'); ?>
                        </div>
                    </div>
                    <!-- /case__row -->
                </div>
                <!-- /case -->
            </div>
            <!-- /our-features__line -->
        </section>
        <!-- /our-features -->
        <!-- love-features -->
        <section class="love-features">
            <h2 class="love-features__title">OTHER FEATURES YOU’LL LOVE</h2>
            <!-- love-features__list -->

            <div class="case love-features__list">

                <?php if ($post->ID == 14718 || $post->ID == 15430) { ?>
                    <!-- case__row -->
                    <div class="case__row" data-animation="fadeInLeft">
                        <div class="col col-sm-6 col-xs-12">
                            <div class="love-features__inner">
                                <img src="http://www.showthemes.com/wp-content/uploads/2016/05/facebook-import.png" width="387" height="225" alt="1 Click Import from Facebook" />
                            </div>
                        </div>
                        <div class="col col-sm-6 col-xs-12">
                            <div class="love-features__inner">
                                <h4 class="love-features__subTitle">1 Click Import from Facebook</h4>
                                <p>Import all your vital data and RSVP from your Facebook event in a brisk. Create your event once and manage it on Fudge 2.0</p>
                            </div>
                        </div>
                    </div>
                    <!-- /case__row -->
                    <!-- case__row -->
                    <div class="case__row" data-animation="fadeInRight">
                        <div class="col col-sm-6 col-xs-12">
                            <div class="love-features__inner">
                                <img src="http://www.showthemes.com/wp-content/uploads/2016/05/eventribe-import.png" width="387" height="225" alt="Import Your tickets from Eventbrite" />
                            </div>
                        </div>
                        <div class="col col-sm-6 col-xs-12">
                            <div class="love-features__inner">
                                <h4 class="love-features__subTitle">Import Your tickets from Eventbrite</h4>
                                <p>If you use Eventbrite to sell tickets you can now import them with one click to your Website. Import ticket status but also venue, date and time. What a time saver!</p>
                            </div>
                        </div>
                    </div>
                    <!-- /case__row -->
                <?php } ?>

                <?php for ($i = 1; $i <= 12; $i++) { ?>
                    <?php
                    if (get_field("feature_{$i}_content")) {
                        $featured_image = get_field("feature_{$i}_thumbnail");
                        ?>
                        <!-- case__row -->
                        <div class="case__row" data-animation="fadeIn<?php
                        if ($i % 2 == 0)
                            echo 'Left';
                        else
                            echo 'Right';
                        ?>">
                            <div class="col col-sm-6 col-xs-12">
                                <div class="love-features__inner">
                                    <img src="<?php echo $featured_image; ?>" width="387" height="225" alt="" /><?php /* echo $featured_image['alt']; */ ?>
                                </div>
                            </div>
                            <div class="col col-sm-6 col-xs-12">
                                <div class="love-features__inner">
                                    <h4 class="love-features__subTitle"><?php the_field("feature_{$i}_title"); ?></h4>
                                    <?php the_field("feature_{$i}_description"); ?>
                                </div>
                            </div>
                        </div>
                        <!-- /case__row -->
                    <?php } ?>
                <?php } ?>
            </div>
            <!-- /love-features__list -->
        </section>
        <!-- /love-features -->

        <?php
    endwhile;
endif;
get_footer();
