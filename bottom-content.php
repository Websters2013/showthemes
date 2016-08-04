<?php
if (!is_page_template('page-store-bundle.php')) {
    $query5 = new WP_Query('pagename=store');
    if ($query5->have_posts()) {
        while ($query5->have_posts()) {
            $query5->the_post();

            $buy_themes_image = get_field('buy_themes_image');
            $themes_count     = wp_count_posts('themes', 'readable');
            $bundle_product   = new WC_Product(9643);
            ?>
            <!-- buy-themes -->
            <section class="buy-themes">
                <!-- container -->
                <div class="buy-themes__wrap">
                    <!-- buy-themes__inner -->
                    <div class="buy-themes__inner">
                        <h3><?php the_field('buy_themes_title'); ?></h3>
                        <!-- buy-themes__item -->
                        <div class="buy-themes__item">
                            <div>
                                <span><?php echo ($themes_count->publish - 1); ?> themes</span>
                                <span>$<?php echo intval($bundle_product->price); ?></span>
                            </div>
                            <img src="<?php echo $buy_themes_image['url']; ?>" alt="<?php echo $buy_themes_image['alt']; ?>" />
                        </div>
                        <!-- /buy-themes__item -->
                        <a class="btn btn_black" href="<?php echo home_url('wordpress-premium-event-themes'); ?>">BUY NOW</a>
                    </div>
                    <!-- /buy-themes__inner -->
                </div>
                <!-- /container -->
            </section>
            <!-- /buy-themes -->
            <?php
        }
    }
    wp_reset_postdata();
}
?>

<!-- hcustomers -->
<section id="happy-customers" class="hcustomers">
    <!-- hcustomers__happy -->
    <div class="hcustomers__happy">
        <div class="container">
            <h2>what others say</h2>
            <?php
            $query3 = new WP_Query('pagename=store');
            if ($query3->have_posts()) {
                while ($query3->have_posts()) {
                    $query3->the_post();
                    ?>
                    <?php the_field('happy_customers_content'); ?>
                    <?php
                }
            } wp_reset_postdata();
            ?>
            <!-- slider -->
            <div class="swiper-container hcustomers__happy-slide">
                <div class="swiper-wrapper">
                    <?php
                    $counter = 1;
                    $query4  = new WP_Query('post_type=testimonials&posts_per_page=-1');
                    if ($query4->have_posts()) {
                        while ($query4->have_posts()) {
                            $query4->the_post();
                            ?>
                            <!-- happy__item -->
                            <div class="swiper-slide happy__item">
                                <div class="happy__item-img">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                                <span class="name"><?php the_title(); ?></span>
                                <span class="post"><?php the_field('job_position'); ?></span>
                            </div>
                            <!-- /happy__item -->
                            <?php
                            $counter++;
                        }
                    }
                    wp_reset_postdata();
                    ?>
                </div>
                <!-- Add Arrows -->
                <div class="slider__btn slider__btn_happy_next"></div>
                <div class="slider__btn slider__btn_happy_prev"></div>
            </div>
            <!-- /slider -->
            <!-- happy-slide_content -->
            <ul class="happy-slide_content">
                <?php
                $counter = 0;
                $query4  = new WP_Query('post_type=testimonials&posts_per_page=-1');
                if ($query4->have_posts()) {
                    while ($query4->have_posts()) {
                        $query4->the_post();
                        ?>
                        <!-- happy-slide__text-wrapp -->
                        <li class="happy-slide__text-wrap <?php echo($counter == 0 ? ' active' : ''); ?>" data-index="<?php echo $counter; ?>">
                            <div>
                                <?php the_content(); ?>
                            </div>
                        </li>
                        <!-- happy-slide__text-wrap -->
                        <?php
                        $counter++;
                    }
                }
                wp_reset_postdata();
                ?>
            </ul>
            <!-- /happy-slide_content -->
        </div>
    </div>
    <!-- /hcustomers__happy -->

    <!-- hcustomers__tweets -->
    <div class="hcustomers__tweets">
        <div class="container">
            <!-- slider -->
            <div class="swiper-container slider-tweets">
                <i class="i-twitter"><?php _e('twitter', 'showthemes'); ?></i>
                <div class="swiper-wrapper">
                    <!--tweet__item-->
                    <div class="swiper-slide tweet__item">
                        <blockquote class="twitter-tweet" data-cards="hidden" lang="it"><p lang="en" dir="ltr">We&#39;re huge fans of <a href="https://twitter.com/hashtag/Vertoh?src=hash">#Vertoh</a>, so our <a href="https://twitter.com/hashtag/EventTechoftheWeek?src=hash">#EventTechoftheWeek</a> is <a href="https://twitter.com/Showthemes">@Showthemes</a> <a href="http://t.co/GNRH9T4H7C">http://t.co/GNRH9T4H7C</a> <a href="https://twitter.com/hashtag/LoveEventTech?src=hash">#LoveEventTech</a></p>&mdash; Gallus Events (@GallusEvents) <a href="https://twitter.com/GallusEvents/status/575614548612415488">11 Marzo 2015</a></blockquote>
                    </div>
                    <!--/tweet__item-->
                    <!--tweet__item-->
                    <div class="swiper-slide tweet__item">
                        <blockquote class="twitter-tweet" lang="it"><p lang="en" dir="ltr">Shoutout to <a href="https://twitter.com/Showthemes">@Showthemes</a> for their incredible support that comes with their awesome theme Vertoh. Check &#39;em out: <a href="http://t.co/xgMVVofWYJ">http://t.co/xgMVVofWYJ</a></p>&mdash; Matt Hochstetler (@ThatOtherMatt) <a href="https://twitter.com/ThatOtherMatt/status/570394050307756032">25 Febbraio 2015</a></blockquote>
                    </div>
                    <!--/tweet__item-->
                    <!--tweet__item-->
                    <div class="swiper-slide tweet__item">
                        <blockquote class="twitter-tweet" lang="it"><p lang="en" dir="ltr">If you are looking for a WordPress Theme website for your events, here you go - Sweet! <a href="http://t.co/AfIZzybx8a">http://t.co/AfIZzybx8a</a> <a href="https://twitter.com/Showthemes">@Showthemes</a></p>&mdash; traci browne (@tracibrowne) <a href="https://twitter.com/tracibrowne/status/544933258593845250">16 Dicembre 2014</a></blockquote>
                    </div>
                    <!--/tweet__item-->
                    <!--tweet__item-->
                    <div class="swiper-slide tweet__item">
                        <blockquote class="twitter-tweet" lang="it"><p lang="en" dir="ltr">A big shout-out to <a href="https://twitter.com/tojulius">@tojulius</a> &amp; team for creating &quot;TYLER&quot; We used <a href="http://t.co/NZBlrL2GJW">http://t.co/NZBlrL2GJW</a> for our <a href="http://t.co/mdNOnQztmX">http://t.co/mdNOnQztmX</a> website and LOVE IT!</p>&mdash; Spark Conference (@sharingthespark) <a href="https://twitter.com/sharingthespark/status/586592801019691008">10 Aprile 2015</a></blockquote>
                    </div>
                    <!--/tweet__item-->
                    <!--tweet__item-->
                    <div class="swiper-slide tweet__item">
                        <blockquote class="twitter-tweet" lang="it"><p>We are very pleased Le Web is using Tyler as the basis of their event site. <a href="https://twitter.com/hashtag/proud?src=hash">#proud</a></p>&mdash; Showthemes (@Showthemes) <a href="https://twitter.com/Showthemes/status/544110333313695744">14 Dicembre 2014</a></blockquote>
                    </div>
                    <!--/tweet__item-->

                    <!--tweet__item-->
                    <div class="swiper-slide tweet__item">
                        <blockquote class="twitter-tweet" data-conversation="none" lang="it"><p lang="en" dir="ltr">Thank you so much for your help <a href="https://twitter.com/Showthemes">@Showthemes</a> - As usual, it was the nut behind my keyboard. :)</p>&mdash; Cheryl Lawson (@Partyaficionado) <a href="https://twitter.com/Partyaficionado/status/555529661112139777">15 Gennaio 2015</a></blockquote>
                    </div>
                    <!--/tweet__item-->
                    <!--tweet__item-->
                    <div class="swiper-slide tweet__item">
                        <blockquote class="twitter-tweet" lang="it"><p lang="en" dir="ltr"><a href="https://twitter.com/hashtag/EventProfs?src=hash">#EventProfs</a> Save $$ on your next event website &gt;&gt; <a href="http://t.co/G7GGkv0zxR">http://t.co/G7GGkv0zxR</a> via <a href="https://twitter.com/Showthemes">@Showthemes</a></p>&mdash; Kerry Rea (@Kerry_Rea) <a href="https://twitter.com/Kerry_Rea/status/552540859959640066">6 Gennaio 2015</a></blockquote>
                    </div>
                    <!--/tweet__item-->
                </div>
                <!-- Add Arrows -->
                <div class="slider__btn slider__btn_next"></div>
                <div class="slider__btn slider__btn_prev"></div>
            </div>
            <!-- /slider -->
        </div>
    </div>
    <!-- /hcustomers__tweets -->

    <!-- happy-customers -->
    <div class="hcustomers__forbes">
        <div class="container">
            <h2>COMPARE ALL THEMES</h2>
            <a href="<?php echo home_url('comparison-table'); ?>" target="_blank">START NOW →</a>
        </div>
    </div>
    <!-- /hcustomers__forbes -->
</section>

<?php if (get_post_type() != 'themes') { ?>
    <!-- who-buys -->
    <section class="who-buys">
        <!-- who-buys__wrap -->
        <div class="who-buys__wrap">
            <?php
            $query1 = new WP_Query('pagename=store');
            if ($query1->have_posts()) {
                while ($query1->have_posts()) {
                    $query1->the_post();
                    ?>
                    <?php the_field('who_buys'); ?>
                    <?php
                }
            } wp_reset_postdata();
            ?>
            <!--who-buys__list-->
            <ul class="who-buys__list">
                <?php
                $query2 = new WP_Query('post_type=who-buys&posts_per_page=-1');
                if ($query2->have_posts()) {
                    while ($query2->have_posts()) {
                        $query2->the_post();
                        $image = get_field('main_image');
                        //$featured_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                        ?>
                        <li class="event" style="background: url(<?php echo $image['url']; ?>) center 2px no-repeat;">
                            <span><?php the_title(); ?></span>
                            <?php the_content(); ?>
                        </li>
                        <?php
                    }
                } wp_reset_postdata();
                ?>
            </ul>
            <!--/who-buys__list-->
        </div>
        <!-- /who-buys__wrap -->
    </section>
    <!-- /who-buys -->
<?php } ?>

<!--Theme Pricing-->
<?php
if (get_post_type() == 'themes') {
    if (have_posts()):
        while (have_posts()):
            the_post();
            $theme_only_product_id    = get_field('buy_theme_only_cart_id');
            $theme_support_product_id = get_field('buy_theme_support_cart_id');
            $single_option            = false;
            if (empty($theme_only_product_id) || empty($theme_support_product_id)) {
                $single_option = true;
            }
            $theme_only_product    = get_product_by_sku($theme_only_product_id);
            $theme_support_product = get_product_by_sku($theme_support_product_id);
            ?>
            <!--faq-->
            <section class="faq">
                <div>

                    <h2>FREQUENTLY ASKED QUESTIONS</h2>

                    <!--accordion-->
                    <div class="accordion">

                        <!--accordion__item-->
                        <div class="accordion__item">

                            <!--accordion__caption-->
                            <div class="accordion__caption">
                                What should I consider before purchasing an event wordpress theme?
                            </div>
                            <!--/accordion__caption-->

                            <!--accordion__content-->
                            <div class="accordion__content">
                                This <a href="http://www.showthemes.com/blog/choosing-event-wordpress-themes/" target="_blank">post</a> is a handy guide
                            </div>
                            <!--/accordion__content-->

                            <!--accordion__caption-->
                            <div class="accordion__caption">
                                How difficult are your themes to set up? What does the support include?
                            </div>
                            <!--/accordion__caption-->

                            <!--accordion__content-->
                            <div class="accordion__content">
                                You will need an intermediate knowledge of WordPress. Our help centre is very comprehensive, we populate them with tutorials, video tutorials and theme specific FAQs.
                                <br/>
                                For everything else, there is support. You can review our support terms here.
                                <br/>
                                If you are not confident with WordPress we suggest to contact our partners at <a href="https://codeable.io/?ref=ZlTg" target="_blank">Codeable</a>.
                            </div>
                            <!--/accordion__content-->

                            <!--accordion__caption-->
                            <div class="accordion__caption">
                                Do you provide updates to your themes? What happens with bug fixes?
                            </div>
                            <!--/accordion__caption-->

                            <!--accordion__content-->
                            <div class="accordion__content">
                                When you purchase one of our theme, you receive a license key that will give you access to updates and bug fixes for one year. Read more about licensing <a href="http://www.showthemes.com/showthemes-faqs/#license" target="_blank">here</a>.
                            </div>
                            <!--/accordion__content-->

                            <!--accordion__caption-->
                            <div class="accordion__caption">
                                Can I view the back end demo of your themes?
                            </div>
                            <!--/accordion__caption-->

                            <!--accordion__content-->
                            <div class="accordion__content">
                                Of course! When you land on a demo, click on the 'View Backend' button on the theme selector.
                            </div>
                            <!--/accordion__content-->

                            <!--accordion__caption-->
                            <div class="accordion__caption">
                                Can I customise the theme color scheme?
                            </div>
                            <!--/accordion__caption-->

                            <!--accordion__content-->
                            <div class="accordion__content">
                                All our themes have editable stylesheets (CSS). Some of our themes offer full customization without opening the CSS, conveniently from dashboard. Some others offer preset color combinations.
                                <br/><br/>
                                Full Color Customization from Dashboard:<br/>
                                – Conference Pro<br/>
                                – Fudge 2.0<br/>
                                – Mondree<br/>
                                – Khore<br/>
                                <br/><br/>
                                Preset colors:<br/>
                                – Vertoh<br/>
                                – Tyler<br/>
                                – Fudge<br/>
                                – Januas<br/>
                                <br/><br/>
                                CSS editing:<br/>
                                – Event Manager Theme
                            </div>
                            <!--/accordion__content-->

                            <!--accordion__caption-->
                            <div class="accordion__caption">
                                Do your themes come set up like their demo sites?
                            </div>
                            <!--/accordion__caption-->

                            <!--accordion__content-->
                            <div class="accordion__content">
                                You will always need to install WordPress on your domain/hosting. Conference Pro, Fudge 2.0, Mondree, Khore, Vertoh, Tyler, Januas and Fudge have an option to populate the site with dummy data so that you can have them looking like in the demo.
                            </div>
                            <!--/accordion__content-->

                        </div>
                        <!--/accordion__item-->

                        <!--accordion__item-->
                        <div class="accordion__item">

                            <!--accordion__caption-->
                            <div class="accordion__caption">
                                Are your themes translation-ready with .mo and .po files?
                            </div>
                            <!--/accordion__caption-->

                            <!--accordion__content-->
                            <div class="accordion__content">
                                Conference Pro, Fudge 2.0, Mondree, Khore, Vertoh, Tyler, Januas and Fudge come in ready with translations and we can also provide .po files for both themes. Event Manager Theme doesn’t come with .po files for translation.
                                <br/><br/>
                                You can easily translate a po file with free software. We do not provide right to left compatibility.
                            </div>
                            <!--/accordion__content-->

                            <!--accordion__caption-->
                            <div class="accordion__caption">
                                Do your themes provide registration/ticketing?
                            </div>
                            <!--/accordion__caption-->

                            <!--accordion__content-->
                            <div class="accordion__content">
                                No. Our themes DO NOT have a native registration/ticketing system. We believe registration is a sensitive issue and it should be handled by dedicated plugins or services.
                                <br/><br/>
                                Conference Pro, Fudge 2.0, Mondree, Khore, Vertoh, Tyler, Fudge and Januas all work with Woocommerce, a free way to register attendees.
                            </div>
                            <!--/accordion__content-->

                            <!--accordion__caption-->
                            <div class="accordion__caption">
                                What does your License include?
                            </div>
                            <!--/accordion__caption-->

                            <!--accordion__content-->
                            <div class="accordion__content">
                                Once you purchase one of our themes, you will receive a unique license key. Each license is valid for one year of updates and bug fixes. The new version of the themes will be easily upgradable from your WordPress dashboard.
                                <br/><br/>
                                You can use our themes on as many domains as you wish. All our themes are 100% GPL.
                            </div>
                            <!--/accordion__content-->

                            <!--accordion__caption-->
                            <div class="accordion__caption">
                                How do I renew my license?
                            </div>
                            <!--/accordion__caption-->

                            <!--accordion__content-->
                            <div class="accordion__content">
                                Existing customers will be able to renew with a discount available for 1 month after the expiry date. You can generate the discount code within your dashboard.
                            </div>
                            <!--/accordion__content-->

                            <!--accordion__caption-->
                            <div class="accordion__caption">
                                Can I Pay by Credit Card?
                            </div>
                            <!--/accordion__caption-->

                            <!--accordion__content-->
                            <div class="accordion__content">
                                Of course you can! Once you are redirected to Paypal, you will be able to select credit card payment. Just Expand the 'Pay with a debit or credit card' tab
                                <br/><br/>
                                <img class="alignnone size-medium wp-image-9823" src="http://www.showthemes.com/wp-content/uploads/2014/08/rsz_paypal-with-debit-credit-card-300x232.jpg" alt="rsz_paypal-with-debit-credit-card" width="300" height="232" srcset="http://www.showthemes.com/wp-content/uploads/2014/08/rsz_paypal-with-debit-credit-card-300x232.jpg 300w, http://www.showthemes.com/wp-content/uploads/2014/08/rsz_paypal-with-debit-credit-card.jpg 355w" sizes="(max-width: 300px) 100vw, 300px">
                            </div>
                            <!--/accordion__content-->

                            <!--accordion__caption-->
                            <div class="accordion__caption">
                                How can I obtain a tax invoice?
                            </div>
                            <!--/accordion__caption-->

                            <!--accordion__content-->
                            <div class="accordion__content">
                                Please use the following <a href="http://www.showthemes.com/#support-form" target="_blank">form</a>. indicating your order number and your company’s VAT number. It may take up to 5 working days to receive an invoice.
                            </div>
                            <!--/accordion__content-->

                            <!--accordion__caption-->
                            <div class="accordion__caption">
                                Do you offer refunds?
                            </div>
                            <!--/accordion__caption-->

                            <!--accordion__content-->
                            <div class="accordion__content">
                                As with most digital products we do not offer refunds. Once you’ve downloaded the theme you are in fact free to use it whenever and wherever you prefer.
                                <br/><br/>
                                We invite you to make sure to check these FAQs, the theme demo site or to send us an email before making your purchase. We like to set expectations straight and we always communicate clearly what to expect in our themes.
                                <br/><br/>
                                If you are not sure about our themes do not proceed to purchase, send us an email instead and we will be happy to clear any doubt.
                            </div>
                            <!--/accordion__content-->
                        </div>
                        <!--/accordion__item-->

                    </div>
                    <!--/accordion-->

                </div>
            </section>
            <!--/faq-->
            
            <!-- inside-bundle -->
            <section class="inside-bundle" id="theme-pricing">
                <!-- inside-bundle__wrap -->
                <div class="inside-bundle__wrap">
                    <h2>Want to buy <?php the_title(); ?>?</h2>
                    <!-- inside-bundle__inner -->
                    <ul class="inside-bundle__inner">
                        <?php if (!empty($theme_only_product_id)) { ?>
                            <li>
                                <!-- inside-bundle__item-header -->
                                <div class="inside-bundle__item-header">
                                    <div>
                                        <h3>WordPress Theme</h3>
                                    </div>
                                </div>
                                <!-- /inside-bundle__item-header -->
                                <!-- inside-bundle__item-price -->
                                <div class="inside-bundle__item-price">
                                    <div>
                                        $<?php echo intval($theme_only_product->price); ?>
                                    </div>
                                </div>
                                <!-- /inside-bundle__item-price -->
                                <!-- inside-bundle__item-list -->
                                <div class="inside-bundle__item-list">
                                    <ul>
                                        <li><span>Tutorials</span></li>
                                        <li><span>Video Tutorials</span></li>
                                        <li><span>FAQs</span></li>
                                        <li><span>Updates for a year</span></li>
                                        <li><span>Bug Fixes for a Year</span></li>
                                    </ul>
                                </div>
                                <!-- /inside-bundle__item-list -->

                                <a href="<?php echo do_shortcode('[add_to_cart_url sku="' . get_field('buy_theme_only_cart_id') . '"]'); ?>" class="btn btn_blue">BUY NOW</a>

                            </li>
                        <?php } ?>
                        <?php if (!empty($theme_support_product_id)) { ?>
                            <li>
                                <!-- inside-bundle__item-header -->
                                <div class="inside-bundle__item-header ">
                                    <div>
                                        <h3>
                                            THEME PLUS
                                            <span>1 year support*</span>
                                        </h3>
                                    </div>
                                </div>
                                <!-- /inside-bundle__item-header -->
                                <!-- inside-bundle__item-price -->
                                <div class="inside-bundle__item-price">
                                    <div>
                                        $<?php echo intval($theme_support_product->price); ?>
                                    </div>
                                </div>
                                <!-- /inside-bundle__item-price -->
                                <!-- inside-bundle__item-list -->
                                <div class="inside-bundle__item-list">
                                    <ul>
                                        <li><span>Ticket Based Support Portal</span></li>
                                        <li><span>Tutorials</span></li>
                                        <li><span>Video Tutorials</span></li>
                                        <li><span>FAQs</span></li>
                                        <li><span>Updates for a year</span></li>
                                        <li><span>Bug Fixes for a Year</span></li>
                                    </ul>
                                </div>
                                <!-- /inside-bundle__item-list -->

                                <a href="<?php echo do_shortcode('[add_to_cart_url sku="' . get_field('buy_theme_support_cart_id') . '"]'); ?>" class="btn btn_blue">BUY NOW</a>

                            </li>
                        <?php } ?>
                        <?php if (!empty($theme_support_product_id)) { ?>
                            <li>
                                <!-- inside-bundle__item-header -->
                                <div class="inside-bundle__item-header ">
                                    <div>
                                        <h3>
                                            BUY ALL THEMES <span>Bundle</span>
                                        </h3>
                                    </div>
                                </div>
                                <!-- /inside-bundle__item-header -->
                                <!-- inside-bundle__item-price -->
                                <div class="inside-bundle__item-price">
                                    <div class="only">
                                        <span>Popular</span>
                                        SAVE $
                                    </div>
                                </div>
                                <!-- /inside-bundle__item-price -->
                                <!-- inside-bundle__item-list -->
                                <div class="inside-bundle__item-list">
                                    <ul>
                                        <li><span>Ticket Based Support Portal</span></li>
                                        <li><span>Tutorials</span></li>
                                        <li><span>Video Tutorials</span></li>
                                        <li><span>FAQs</span></li>
                                        <li><span>Updates for a year</span></li>
                                        <li><span>Bug Fixes for a Year</span></li>
                                    </ul>
                                </div>
                                <!-- /inside-bundle__item-list -->

                                <a href="<?php echo do_shortcode('[add_to_cart_url sku="' . get_field('buy_theme_support_cart_id') . '"]'); ?>" class="btn btn_red">BUY NOW</a>

                            </li>
                        <?php } ?>
                    </ul>
                    <!-- /inside-bundle__inner -->
                    <!-- inside-bundle -->
                    <div class="inside-bundle__read-more">
                        <div>
                            Please read our <a href="<?php echo home_url('terms'); ?>">Terms of sale</a> & <a href="<?php echo home_url('support-reference'); ?>">Support Guide</a>
                        </div>
                        <a href="<?php echo home_url(); ?>">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo('name'); ?>" height="63" width="168" />
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
}
?>

<!--Showcase-->
<section class="showcase" id="showcase-container">
    <a id="showcase-anchor"></a>
    <div class="container">
        <h2 class="title"><?php _e('Showcase', 'showthemes'); ?></h2>
        <p><?php _e('Awesome Examples of Events Using our Themes', 'showthemes'); ?></p>
        <div class="showcase__wrap" id="showcase-slider">
            <div id="scroller">
                <ul class="slider-showcase">
                    <li>
                        <a href="http://www.hypnosis2018.com/en/" target="_blank" title="Conference Pro">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/hypnosis2018.png" alt="XXI WORLD HYPNOSIS CONGRESS"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.ponyvilleciderfest.com/" target="_blank" title="Conference Pro">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/ponyville.png" alt="Ponyville Cider Fest"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.brightonseo.com/" target="_blank" title="Fudge 2.0">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/brightonseo.png" alt="BrightonSEO"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://nwshootingsportsexpo.com" target="_blank" title="Fudge 2.0">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/northwest-shooting-sports-expo.png" alt="NorthWest Shooting Sport Expo"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.goodtownfest.cz" target="_blank" title="Mondree">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/good-town-festival-2016.png" alt="Good Town Festival 2016"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.telesemana.com/bcn2016" target="_blank" title="Mondree">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/bcn2016.png" alt="BCN 2016 Latam Summit"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://events.3reasonswhy.com" target="_blank" title="Khore">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/3-reasons-why.png" alt="3 Reasons Why"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.esa2016.org.au/" target="_blank" title="Vertoh">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/esa-2016.png" alt="ESA 2016"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.probonoforum.org" target="_blank" title="Vertoh">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/pro-bono-forum.png" alt="Pro Bono Forum"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://nwosassembly.com/" target="_blank" title="Khore">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/2016-nwos-assembly.png" alt="2016 NWOS Assembly"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.iaml2016.org/" target="_blank" title="Khore">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/iaml-roma-2016.png" alt="IAML Roma 2016"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://newmediaeurope.com/2016/" target="_blank" title="Vertoh">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/new-media-europe.png" alt="New Media Europe 2016"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.americanwhiskeyconvention.com/" target="_blank" title="Vertoh">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/american-whiskey-convention.png" alt="America WhiskeyH Convention"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://socialcustomer.co.uk/" target="_blank" title="Tyler">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/social-customer-service-summit.png" alt="Social Customer Service Summit"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://cloudfest.ca/" target="_blank" title="Vertoh">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/cloudfest-2016.png" alt="CloudFest 2016"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://wamas.com.ng/" target="_blank" title="Tyler">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/wamas.png" alt="WAMAS 2016"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.pensacolahotwheels.org/" target="_blank" title="Tyler">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/pensacola-hot-wheels.png" alt="Pensacola Hot Wheels"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.congresos-aucv.org/" target="_blank" title="Tyler">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/congreso-urologia-aucv.png" alt="L CONGRESO DE UROLOGÍA DE LA AUCV"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.engageinbound.com/" target="_blank" title="Vertoh">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/engage-inbound.png" alt="Engage Inbound"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.futurapolis.com" target="_blank" title="Vertoh">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/futura-polis.png" alt="Futura Polis"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.eventtechoftheyear.com" target="_blank" title="Khore">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/Event%20Tech%20Of%20The%20Year.png" alt="Event Tech of the Year"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.wearemuseums.com" target="_blank" title="Vertoh">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/We%20are%20museums.png" alt="We are museums" />
                        </a>
                    </li>
                    <li>
                        <a href="http://internationalconference.affirmation.org" target="_blank" title="Vertoh">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/2015%20International%20Affirmation%20Conference.png" alt="International Affirmation Conference"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://festivalofdangerousideas.ca" target="_blank" title="Tyler">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/Food%20For%20Thought.png" alt="Festival of Dangerous Ideas"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://fest-up.com" target="_blank" title="Fudge">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/Fest%20UP.png" alt="FestUp"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.rencontresdutourisme.com" target="_blank" title="Fudge">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/6emes%20Rencontres%20du%20Tourisme.png" alt="6e Rencontres Du Turisme"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://leadershipunconference.com/2015" target="_blank" title="Tyler">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/Canada%20Executives%20Leadership%20Unconferece.png" alt="Canada Executive Leadership Unconference"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://2015.mobxcon.com" target="_blank" title="Fudge">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/MOBX%202015.png" alt="MOBX 2015"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://gcc-events.com" target="_blank" title="Januas">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/Mitteldeutsche%20Personaltagung.png" alt="7. MITTELDEUTSCHE PERSONALTAGUNG"/>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.raisinggenerationstoday.com" target="_blank" title="Fudge">
                            <img src="<?php echo get_template_directory_uri(); ?>/pic/showcase/Raising%20Generations%20Today.png" alt="Raising Generation Today"/>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--Showcase-->

<!--Contact Us-->
<section id="support-form">
    <div class="container">
        <h2>How Can We Help?</h2>
        <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
    </div>
</section>
<?php /*
  <section id="contact-us">
  <div class="container">
  <?php
  $query6 = new WP_Query('pagename=store');
  if ($query6->have_posts()) {
  while ($query6->have_posts()) {
  $query6->the_post();
  ?>
  <?php the_field('contact_us'); ?>
  <?php
  }
  } wp_reset_postdata();
  ?>
  </div>
  </section>
 */ ?>
<!--Contact Us-->