<?php get_header(); ?>

<?php
if (have_posts()):
    while (have_posts()) :
        the_post();
        ?>
        <!-- case -->
        <section class="case">
            <!-- case__row -->
            <div class="case__row">
                <div class="col col-xs-12">
                    <h1><?php the_title(); ?></h1>
                    <p><?php the_field('page_tagline'); ?></p>
                </div>
                <div class="col col-sm-12">
                    <?php the_content(); ?>
                </div>
            </div>
            <!-- /case__row -->
        </section>
        <!-- /case -->
        <?php
    endwhile;
endif;
?>

<?php
get_footer();
