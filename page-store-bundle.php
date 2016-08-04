<?php
/* Template Name: Themes Bundle */
get_header();
?>

<?php
if (have_posts()):
    while (have_posts()) :
        the_post();
        $image = get_field('hero_image');
        $themes_count = wp_count_posts('themes', 'readable');
        $bundle_product = new WC_Product(9643);
        ?>
        <!--hero-bundle-->
        <section class="hero-bundle">
            <div class="container video_container">
                <h1><?php the_field('title'); ?></h1>
                <p>
                    <?php the_field('tagline'); ?>
                </p>
                <!-- buy-themes -->
                <section class="buy-themes">
                    <!-- container -->
                    <div class="buy-themes__wrap">
                        <!-- buy-themes__inner -->
                        <div class="buy-themes__inner">
                            <!-- buy-themes__item -->
                            <div class="buy-themes__item">
                                <div>
                                    <span><?php echo ($themes_count->publish - 1); ?> themes</span>
                                    <span>$<?php echo intval($bundle_product->price); ?></span>
                                </div>
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
                            </div>
                            <!-- /buy-themes__item -->
                        </div>
                        <!-- /buy-themes__inner -->
                    </div>
                    <!-- /container -->
                </section>
                <!-- /buy-themes -->
            </div>
        </section>
        <!--/hero-bundle-->

        <!-- inside-bundle -->
        <section class="inside-bundle">
            <!-- inside-bundle__wrap -->
            <div class="inside-bundle__wrap">
                <h2>WHAT’S INSIDE THE BUNDLE</h2>
                <?php
                $theme_only_product_id = get_field('buy_theme_only_cart_id');
                $theme_support_product_id = get_field('buy_theme_support_cart_id');
                $single_option = false;
                if (empty($theme_only_product_id) || empty($theme_support_product_id)) {
                    $single_option = true;
                }
                $theme_only_product = new WC_Product(9643);
                $theme_support_product = new WC_Product(9644);
                ?>
                <!-- inside-bundle__inner -->
                <ul class="inside-bundle__inner">
                    <?php if (!empty($theme_only_product_id)) { ?>
                        <li>
                            <!-- inside-bundle__item-header -->
                            <div class="inside-bundle__item-header">
                                <div>
                                    <h3>BUY ALL THEMES</h3>
                                </div>
                            </div>
                            <!-- /inside-bundle__item-header -->
                            <!-- inside-bundle__item-price -->
                            <div class="inside-bundle__item-price">
                                <div>
                                    <?php echo intval($theme_only_product->price); ?> USD
                                </div>
                                <div>
                                    <?php the_field('buy_themes_only_discount_message'); ?>
                                </div>
                            </div>
                            <!-- /inside-bundle__item-price -->
                            <!-- inside-bundle__item-list -->
                            <div class="inside-bundle__item-list">
                                <ul>
                                    <li>Includes all our themes</li>
                                    <li><span>Tutorials, Video Tutorials and FAQsljkljljl</span></li>
                                    <li><span>Updates and Bug Fixes for a Year</span></li>
                                </ul>
                                <a href="<?php echo do_shortcode('[add_to_cart_url sku="' . get_field('buy_theme_only_cart_id') . '"]'); ?>" class="btn btn_red">Buy Now</a>
                            </div>
                            <!-- /inside-bundle__item-list -->
                        </li>
                    <?php } ?>
                    <?php if (!empty($theme_support_product_id)) { ?>
                        <li>
                            <!-- inside-bundle__item-header -->
                            <div class="inside-bundle__item-header ">
                                <div>
                                    <!--most-popular-->
                                    <span class="most-popular">
                                        MOST POPULAR
                                    </span>
                                    <!--/most-popular-->
                                    <h3>
                                        BUY ALL THEMES
                                        plus <span>1 year support</span>
                                    </h3>
                                </div>
                            </div>
                            <!-- /inside-bundle__item-header -->
                            <!-- inside-bundle__item-price -->
                            <div class="inside-bundle__item-price">
                                <div class="only">
                                    <?php echo intval($theme_support_product->price); ?> USD
                                </div>
                                <div>
                                    <?php the_field('buy_themes_support_discount_message'); ?>
                                </div>
                            </div>
                            <!-- /inside-bundle__item-price -->
                            <!-- inside-bundle__item-list -->
                            <div class="inside-bundle__item-list">
                                <ul>
                                    <li>Includes all our themes</li>
                                    <li><span>Tutorials, Video Tutorials and FAQs</span></li>
                                    <li><span>Updates and Bug Fixes for a Year</span></li>
                                    <li><span>Ticket Based Support Portal</span></li>
                                </ul>
                                <a href="<?php echo do_shortcode('[add_to_cart_url sku="' . get_field('buy_theme_support_cart_id') . '"]'); ?>" class="btn btn_red">Buy Now</a>
                            </div>
                            <!-- /inside-bundle__item-list -->
                        </li>
                    <?php } ?>
                </ul>
                <!-- /inside-bundle__inner -->
                <!-- inside-bundle -->
                <div class="inside-bundle__read-more">
                    <div>
                        Please read our <a href="<?php bloginfo('url'); ?>/terms">Terms of sale</a> &amp; <a title="Terms of support" href="<?php echo home_url('support-reference'); ?>">Support Guide</a>
                    </div>
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo('name'); ?>" height="63" width="168">
                    </a>
                </div>
                <!-- /inside-bundle -->
            </div>
            <!-- /inside-bundle__wrap -->
        </section>
        <!-- /inside-bundle -->
        <?php
    endwhile;
endif;

get_footer();
