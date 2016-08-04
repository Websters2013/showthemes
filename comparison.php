<?php /* Template Name: Comparison Table */ ?>
<?php get_header(); ?>

<?php
if (have_posts()):
    while (have_posts()) :
        the_post();
        ?>
        <!--comparison-table-->
        <section class="comparison-table comparison-table_2">

            <div class="comparison-title">
                <div class="container">
                    <h1><?php the_title(); ?></h1>
                    <p><?php the_field('page_tagline'); ?></p>
                </div>

            </div>
            <div class="container">
                <div class="smart-wrapper">
                    <div class="smart-pricing">
                        <div class="pricing-tables elegant-style six-colm">
                            <div class="colm even">
                                <div class="colm-list features-list">

                                    <div class="pricing-header">

                                    </div><!-- end .pricing-header section -->
                                    <ul class="title">
                                        <li>
                                            <span>Support</span>
                                        </li>
                                    </ul>
                                    <ul>
                                        <?php
                                        $terms = get_terms('support', array('hide_empty' => false));
                                        if (count($terms) > 0) {
                                            foreach ($terms as $term) {
                                                ?>
                                                <li data-feature="<?php echo $term->name; ?>">
                                                    <span><?php echo $term->name; ?></span>
                                                    <span class="info" title="">
                                                        <span><span><?php echo $term->description; ?></span></span>
                                                    </span>
                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                    <ul class="title">
                                        <li>
                                            <span>Features</span>
                                        </li>
                                    </ul>
                                    <ul>
                                        <?php
                                        $terms = get_terms('features', array('hide_empty' => false));
                                        if (count($terms) > 0) {
                                            foreach ($terms as $term) {
                                                ?>
                                                <li data-feature="<?php echo $term->name; ?>">
                                                    <span><?php echo $term->name; ?></span>
                                                    <span class="info" title="">
                                                        <span><span><?php echo $term->description; ?></span></span>
                                                    </span>
                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                    <ul class="title">
                                        <li>
                                            <span>Integrations</span>
                                        </li>
                                    </ul>
                                    <ul>
                                        <?php
                                        $terms = get_terms('integrations', array('hide_empty' => false));
                                        if (count($terms) > 0) {
                                            foreach ($terms as $term) {
                                                ?>
                                                <li data-feature="<?php echo $term->name; ?>">
                                                    <span><?php echo $term->name; ?></span>
                                                    <span class="info" title="">
                                                        <span><span><?php echo $term->description; ?></span></span>
                                                    </span>
                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div><!-- end .colm-list section -->

                            </div><!-- end .colm section -->

                            <div class="comparison-table__swiper swiper-container">
                                <div class="swiper-wrapper">
                                    <?php
                                    $themes_query = new WP_Query(array(
                                        'post_type'      => 'themes',
                                        'posts_per_page' => -1,
                                        'orderby'        => 'menu_order',
                                        'order'          => 'ASC'
                                    ));
                                    if ($themes_query->have_posts()) {
                                        while ($themes_query->have_posts()) {
                                            $themes_query->the_post();
                                            $theme_only_product_id = get_field('buy_theme_only_cart_id', get_the_ID());
                                            ?>
                                            <div class="swiper-slide">
                                                <div class="colm odd">
                                                    <div class="colm-list">

                                                        <div class="pricing-header header-colored">
                                                            <h3 class="monoblue-top-4" style="font-size: 14px"><?php the_title(); ?></h3>
                                                            <h4 class="monoblue-bottom-2"><span>from $<?php echo intval($theme_only_product->price); ?></span></h4>
                                                            <!--<div class="ribbon-large">-->
                                                            <!--<div class="ribbon-inner ribbon-new">NEW!</div>-->
                                                            <!--</div><!-- end .ribbon-large section -->
                                                        </div>
                                                        <!-- end .pricing-header section -->

                                                        <ul class="title">
                                                            <li>
                                                            </li>
                                                        </ul>
                                                        <ul>
                                                            <?php
                                                            $terms                 = get_terms('support', array('hide_empty' => false));
                                                            if (count($terms) > 0) {
                                                                foreach ($terms as $term) {
                                                                    ?>
                                                                    <li data-feature="<?php echo $term->name; ?>">
                                                                        <?php if (has_term($term->term_id, 'support', $post)) { ?>
                                                                            <span class="check-circle"></span>
                                                                        <?php } ?>
                                                                    </li>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </ul>
                                                        <ul class="title">
                                                            <li></li>
                                                        </ul>
                                                        <ul>
                                                            <?php
                                                            $terms = get_terms('features', array('hide_empty' => false));
                                                            if (count($terms) > 0) {
                                                                foreach ($terms as $term) {
                                                                    ?>
                                                                    <li data-feature="<?php echo $term->name; ?>">
                                                                        <?php if (has_term($term->term_id, 'features', $post)) { ?>
                                                                            <span class="check-circle"></span>
                                                                        <?php } ?>
                                                                    </li>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </ul>
                                                        <ul class="title">
                                                            <li></li>
                                                        </ul>
                                                        <ul>
                                                            <?php
                                                            $terms = get_terms('integrations', array('hide_empty' => false));
                                                            if (count($terms) > 0) {
                                                                foreach ($terms as $term) {
                                                                    ?>
                                                                    <li data-feature="<?php echo $term->name; ?>">
                                                                        <?php if (has_term($term->term_id, 'integrations', $post)) { ?>
                                                                            <span class="check-circle"></span>
                                                                        <?php } ?>
                                                                    </li>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </ul>

                                                        <div class="pricing-footer">
                                                            <button type="button" class="pricing-button monoblue4-btn" onclick="window.location.href = '<?php the_permalink(); ?>"> Buy </button>
                                                        </div>
                                                        <!-- end .pricing-footer section -->

                                                    </div>
                                                    <!-- end .colm-list section -->

                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>

                            <div class="comparison-table__headers">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <?php
                                        $themes_query->rewind_posts();
                                        if ($themes_query->have_posts()) {
                                            while ($themes_query->have_posts()) {
                                                $themes_query->the_post();
                                                $theme_only_product_id = get_field('buy_theme_only_cart_id', get_the_ID());
                                                ?>
                                                <div class="swiper-slide">
                                                    <div class="pricing-header">
                                                        <h3 class="monoblue-top-4"><?php the_title(); ?></h3>
                                                        <h4 class="monoblue-bottom-2"><span>from $<?php echo intval($theme_only_product->price); ?></span></h4>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <!-- Add Arrows -->
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>

                        </div><!-- end .pricing-tables section -->

                    </div><!-- end .smart-pricing section -->

                </div><!-- end .smart-wrapper section -->
            </div>


        </section>
        <!--/comparison-table-->

        <?php
    endwhile;
endif;
?>

<?php
get_footer();
