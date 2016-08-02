<?php if (is_page_template('page-store-bundle.php')) { ?>

<?php } ?>

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
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/pic/forbes.png" alt="Forbes"/>
            <a href="http://www.forbes.com/sites/theyec/2014/04/23/how-to-launch-and-sell-out-a-conference-in-five-weeks/" target="_blank">AS FEATURED IN FORBES →</a>
        </div>
    </div>
    <!-- /hcustomers__forbes -->
</section>

<!--comparison-table-->
<section class="comparison-table">
    <div class="container">
        <h2>Theme comparison</h2>
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
                                <li data-feature="Tutorials">
                                    <span>Tutorial</span>
                                    <span class="info" title="">
                                        <span><span>Extensive tutorials, FAQ and documentation</span></span>
                                    </span>
                                </li>
                                <li data-feature="Video Tutorials">
                                    <span>Video Tutorials</span>
                                    <span class="info" title="">
                                        <span><span>Video tutorials showing how to set up and configure the theme</span></span>
                                    </span>
                                </li>
                            </ul>
                            <ul class="title">
                                <li>
                                    <span>Features</span>
                                </li>
                            </ul>
                            <ul>
                                <li data-feature="Social Integration">
                                    <span>Social Integration</span>
                                    <span class="info" title="">
                                        <span><span>Social media display and integration</span></span>
                                    </span>
                                </li>
                                <li data-feature="Advanced Schedule">
                                    <span>Advanced Schedule</span>
                                    <span class="info" title="">
                                        <span><span>Multiple tracks, concurrent sessions, multiple locations</span></span>
                                    </span>
                                </li>
                                <li data-feature="One Click Demo">
                                    <span>One Click Demo</span>
                                    <span class="info" title="">
                                        <span><span>Install a copy of the demo site in one click</span></span>
                                    </span>
                                </li>
                                <li data-feature="Exhibitor Profiles">
                                    <span>Exhibitor Profiles</span>
                                    <span class="info" title="">
                                        <span><span>Display Exhbitors profiles and searchable directory</span></span>
                                    </span>
                                </li>
                                <li data-feature="Multiple Headers">
                                    <span>Multiple Headers</span>
                                    <span class="info" title="">
                                        <span><span>Ability to change different header options</span></span>
                                    </span>
                                </li>
                                <li data-feature="Event Composer">
                                    <span>Event Composer</span>
                                    <span class="info" title="">
                                        <span><span>Event Composer is our drag and drop system to create your page.</span></span>
                                    </span>
                                </li>
                                <li data-feature="Multievent">
                                    <span>Multievent</span>
                                    <span class="info" title="">
                                        <span><span>Manage multiple events from one platform</span></span>
                                    </span>
                                </li>
                            </ul>
                            <ul class="title">
                                <li>
                                    <span>Integrations</span>
                                </li>
                            </ul>
                            <ul>
                                <li data-feature="Eventbrite">
                                    <span>Eventbrite</span>
                                    <span class="info" title="">
                                        <span><span>Works with Registration and Ticketing provider Eventbrite</span></span>
                                    </span>
                                </li>
                                <li data-feature="Event Espresso">
                                    <span>Event Espresso</span>
                                    <span class="info" title="">
                                        <span><span>Works with Registration and Ticketing provider Event Espresso</span></span>
                                    </span>
                                </li>
                                <li data-feature="Woocommerce">
                                    <span>Woocommerce</span>
                                    <span class="info" title="">
                                        <span><span>Works with Woocommerce</span></span>
                                    </span>
                                </li>
                                <li data-feature="Gravity Forms">
                                    <span>Gravity Forms</span>
                                    <span class="info" title="">
                                        <span><span>Works with Gravity Forms</span></span>
                                    </span>
                                </li>
                                <li data-feature="Xing Events">
                                    <span>Xing Events</span>
                                    <span class="info" title="">
                                        <span><span>Works with Registration and Ticketing provider Xing Events</span></span>
                                    </span>
                                </li>
                                <li data-feature="Etouches">
                                    <span>Etouches</span>
                                    <span class="info" title="">
                                        <span><span>Works with Registration and Ticketing provider Etouches</span></span>
                                    </span>
                                </li>
                                <li data-feature="TicketTailor">
                                    <span>TicketTailor</span>
                                    <span class="info" title="">
                                        <span><span>Works with Registration and Ticketing provider TicketTailor</span></span>
                                    </span>
                                </li>
                            </ul>
                        </div><!-- end .colm-list section -->

                    </div><!-- end .colm section -->

                    <div class="comparison-table__swiper swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><div class="colm odd">
                                    <div class="colm-list">

                                        <div class="pricing-header header-colored">
                                            <h3 class="monoblue-top-4" style="font-size: 14px">Conference Pro</h3>
                                            <h4 class="monoblue-bottom-2"><span>from $79</span></h4>
                                            <!--                                <div class="ribbon-large">-->
                                            <!--                                    <div class="ribbon-inner ribbon-new">NEW!</div>-->
                                            <!--                                </div><!-- end .ribbon-large section -->
                                        </div><!-- end .pricing-header section -->

                                        <ul class="title">
                                            <li>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Tutorials"><span class="check-circle"></span></li>
                                            <li data-feature="Video Tutorials"><span class="check-circle"></span></li>
                                        </ul>
                                        <ul class="title">
                                            <li></li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Social Integration"><span class="check-circle"></span></li>
                                            <li data-feature="Advanced Schedule"><span class="check-circle"></span></li>
                                            <li data-feature="One Click Demo"><span class="check-circle"></span></li>
                                            <li data-feature="Exhibitor Profiles"><span class="check-circle"></span></li>
                                            <li data-feature="Multiple Headers"><span class="check-circle"></span></li>
                                            <li data-feature="Event Composer"><span class="check-circle"></span></li>
                                            <li data-feature="Multievent"><span class="not-support"></span></li>
                                        </ul>
                                        <ul class="title">
                                            <li></li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Eventbrite"><span class="check-circle"></span></li>
                                            <li data-feature="Event Espresso"><span class="check-circle"></span></li>
                                            <li data-feature="Woocommerce"><span class="check-circle"></span></li>
                                            <li data-feature="Gravity Forms"><span class="check-circle"></span></li>
                                            <li data-feature="Xing Events"><span class="check-circle"></span></li>
                                            <li data-feature="Etouches"><span class="check-circle"></span></li>
                                            <li data-feature="TicketTailor"><span class="check-circle"></span></li>
                                        </ul>

                                        <div class="pricing-footer">
                                            <button type="button" class="pricing-button monoblue4-btn" onclick="window.location.href = '/conference-pro-wordpress-theme'"> Buy </button>
                                        </div><!-- end .pricing-footer section -->

                                    </div><!-- end .colm-list section -->

                                </div></div>
                            <div class="swiper-slide"><div class="colm even">
                                    <div class="colm-list">

                                        <div class="pricing-header header-colored">
                                            <h3 class="monoblue-top-4">Fudge 2.0</h3>
                                            <h4 class="monoblue-bottom-2"><span>from $79</span></h4>
                                        </div><!-- end .pricing-header section -->

                                        <ul class="title">
                                            <li>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Tutorials"><span class="check-circle"></span></li>
                                            <li data-feature="Video Tutorials"><span class="check-circle"></span></li>
                                        </ul>
                                        <ul class="title">
                                            <li></li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Social Integration"><span class="check-circle"></span></li>
                                            <li data-feature="Advanced Schedule"><span class="check-circle"></span></li>
                                            <li data-feature="One Click Demo"><span class="check-circle"></span></li>
                                            <li data-feature="Exhibitor Profiles"><span class="check-circle"></span></li>
                                            <li data-feature="Multiple Headers"><span class="check-circle"></span></li>
                                            <li data-feature="Event Composer"><span class="check-circle"></span></li>
                                            <li data-feature="Multievent"><span class="not-support"></span></li>
                                        </ul>
                                        <ul class="title">
                                            <li></li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Eventbrite"><span class="check-circle"></span></li>
                                            <li data-feature="Event Espresso"><span class="check-circle"></span></li>
                                            <li data-feature="Woocommerce"><span class="check-circle"></span></li>
                                            <li data-feature="Gravity Forms"><span class="check-circle"></span></li>
                                            <li data-feature="Xing Events"><span class="check-circle"></span></li>
                                            <li data-feature="Etouches"><span class="check-circle"></span></li>
                                            <li data-feature="TicketTailor"><span class="check-circle"></span></li>
                                        </ul>

                                        <div class="pricing-footer">
                                            <button type="button" class="pricing-button monoblue4-btn" onclick="window.location.href = '/conference-wordpress-theme-fudge'"> Buy </button>
                                        </div><!-- end .pricing-footer section -->

                                    </div><!-- end .colm-list section -->

                                </div></div>
                            <div class="swiper-slide"><div class="colm odd">
                                    <div class="colm-list">

                                        <div class="pricing-header header-colored">

                                            <h3 class="monoblue-top-2">Mondree</h3>
                                            <h4 class="monoblue-bottom-2"><span>from $79</span></h4>

                                        </div><!-- end .pricing-header section -->

                                        <ul class="title">
                                            <li>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Tutorials"><span class="check-circle"></span></li>
                                            <li data-feature="Video Tutorials"><span class="check-circle"></span></li>
                                        </ul>
                                        <ul class="title">
                                            <li></li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Social Integration"><span class="check-circle"></span></li>
                                            <li data-feature="Advanced Schedule"><span class="check-circle"></span></li>
                                            <li data-feature="One Click Demo"><span class="check-circle"></span></li>
                                            <li data-feature="Exhibitor Profiles"><span class="not-support"></span></li>
                                            <li data-feature="Multiple Headers"><span class="check-circle"></span></li>
                                            <li data-feature="Event Composer"><span class="check-circle"></span></li>
                                            <li data-feature="Multievent"><span class="not-support"></span></li>
                                        </ul>
                                        <ul class="title">
                                            <li></li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Eventbrite"><span class="check-circle"></span></li>
                                            <li data-feature="Event Espresso"><span class="check-circle"></span></li>
                                            <li data-feature="Woocommerce"><span class="check-circle"></span></li>
                                            <li data-feature="Gravity Forms"><span class="check-circle"></span></li>
                                            <li data-feature="Xing Events"><span class="check-circle"></span></li>
                                            <li data-feature="Etouches"><span class="check-circle"></span></li>
                                            <li data-feature="TicketTailor"><span class="check-circle"></span></li>
                                        </ul>

                                        <div class="pricing-footer">
                                            <button type="button" class="pricing-button monoblue2-btn" onclick="window.location.href = '/mondree-event-management-theme'"> Buy </button>
                                        </div><!-- end .pricing-footer section -->

                                    </div><!-- end .colm-list section -->

                                </div></div>
                            <div class="swiper-slide"><div class="colm even">
                                    <div class="colm-list">

                                        <div class="pricing-header header-colored">

                                            <h3 class="monoblue-top-2">Khore</h3>
                                            <h4 class="monoblue-bottom-2"><span>from $79</span></h4>

                                        </div><!-- end .pricing-header section -->

                                        <ul class="title">
                                            <li>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Tutorials"><span class="check-circle"></span></li>
                                            <li data-feature="Video Tutorials"><span class="check-circle"></span></li>
                                        </ul>
                                        <ul class="title">
                                            <li></li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Social Integration"><span class="check-circle"></span></li>
                                            <li data-feature="Advanced Schedule"><span class="check-circle"></span></li>
                                            <li data-feature="One Click Demo"><span class="check-circle"></span></li>
                                            <li data-feature="Exhibitor Profiles"><span class="not-support"></span></li>
                                            <li data-feature="Multiple Headers"><span class="check-circle"></span></li>
                                            <li data-feature="Event Composer"><span class="check-circle"></span></li>
                                            <li data-feature="Multievent"><span class="not-support"></span></li>
                                        </ul>
                                        <ul class="title">
                                            <li></li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Eventbrite"><span class="check-circle"></span></li>
                                            <li data-feature="Event Espresso"><span class="check-circle"></span></li>
                                            <li data-feature="Woocommerce"><span class="check-circle"></span></li>
                                            <li data-feature="Gravity Forms"><span class="check-circle"></span></li>
                                            <li data-feature="Xing Events"><span class="check-circle"></span></li>
                                            <li data-feature="Etouches"><span class="check-circle"></span></li>
                                            <li data-feature="TicketTailor"><span class="check-circle"></span></li>
                                        </ul>

                                        <div class="pricing-footer">
                                            <button type="button" class="pricing-button monoblue2-btn" onclick="window.location.href = '/event-wordpress-theme-khore'"> Buy </button>
                                        </div><!-- end .pricing-footer section -->

                                    </div><!-- end .colm-list section -->

                                </div></div>
                            <div class="swiper-slide"><div class="colm odd">
                                    <div class="colm-list">

                                        <div class="pricing-header header-colored">

                                            <h3 class="monoblue-top-2">Vertoh</h3>
                                            <h4 class="monoblue-bottom-2"><span>from $79</span></h4>

                                        </div><!-- end .pricing-header section -->

                                        <ul class="title">
                                            <li>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Tutorials"><span class="check-circle"></span></li>
                                            <li data-feature="Video Tutorials"><span class="check-circle"></span></li>
                                        </ul>
                                        <ul class="title">
                                            <li></li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Social Integration"><span class="check-circle"></span></li>
                                            <li data-feature="Advanced Schedule"><span class="check-circle"></span></li>
                                            <li data-feature="One Click Demo"><span class="check-circle"></span></li>
                                            <li data-feature="Exhibitor Profiles"><span class="check-circle"></span></li>
                                            <li data-feature="Multiple Headers"><span class="check-circle"></span></li>
                                            <li data-feature="Event Composer"><span class="not-support"></span></li>
                                            <li data-feature="Multievent"><span class="not-support"></span></li>
                                        </ul>
                                        <ul class="title">
                                            <li></li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Eventbrite"><span class="check-circle"></span></li>
                                            <li data-feature="Event Espresso"><span class="check-circle"></span></li>
                                            <li data-feature="Woocommerce"><span class="check-circle"></span></li>
                                            <li data-feature="Gravity Forms"><span class="not-support"></span></li>
                                            <li data-feature="Xing Events"><span class="check-circle"></span></li>
                                            <li data-feature="Etouches"><span class="check-circle"></span></li>
                                            <li data-feature="TicketTailor"><span class="not-support"></span></li>
                                        </ul>

                                        <div class="pricing-footer">
                                            <button type="button" class="pricing-button monoblue2-btn" onclick="window.location.href = '/2015-event-wordpress-theme-vertoh'"> Buy </button>
                                        </div><!-- end .pricing-footer section -->

                                    </div><!-- end .colm-list section -->

                                </div></div>
                            <div class="swiper-slide"><div class="colm even">
                                    <div class="colm-list">
                                        <div class="pricing-header header-colored">
                                            <h3 class="monoblue-top-3">Tyler</h3>
                                            <h4 class="monoblue-bottom-2"><span>from $79</span></h4>
                                        </div><!-- end .pricing-header section -->

                                        <ul class="title">
                                            <li>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Tutorials"><span class="check-circle"></span></li>
                                            <li data-feature="Video Tutorials"><span class="check-circle"></span></li>
                                        </ul>
                                        <ul class="title">
                                            <li></li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Social Integration"><span class="check-circle"></span></li>
                                            <li data-feature="Advanced Schedule"><span class="check-circle"></span></li>
                                            <li data-feature="One Click Demo"><span class="check-circle"></span></li>
                                            <li data-feature="Exhibitor Profiles"><span class="not-support"></span></li>
                                            <li data-feature="Multiple Headers"><span class="not-support"></span></li>
                                            <li data-feature="Event Composer"><span class="not-support"></span></li>
                                            <li data-feature="Multievent"><span class="not-support"></span></li>
                                        </ul>
                                        <ul class="title">
                                            <li></li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Eventbrite"><span class="check-circle"></span></li>
                                            <li data-feature="Event Espresso"><span class="check-circle"></span></li>
                                            <li data-feature="Woocommerce"><span class="check-circle"></span></li>
                                            <li data-feature="Gravity Forms"><span class="not-support"></span></li>
                                            <li data-feature="Xing Events"><span class="check-circle"></span></li>
                                            <li data-feature="Etouches"><span class="check-circle"></span></li>
                                            <li data-feature="TicketTailor"><span class="not-support"></span></li>
                                        </ul>

                                        <div class="pricing-footer">
                                            <button type="button" class="pricing-button monoblue3-btn" onclick="window.location.href = '/new-event-wordpress-theme-tyler'"> Buy </button>
                                        </div><!-- end .pricing-footer section -->

                                    </div><!-- end .colm-list section -->

                                </div></div>
                            <div class="swiper-slide"><div class="colm even">
                                    <div class="colm-list">

                                        <div class="pricing-header header-colored">
                                            <h3 class="monoblue-top-4">Januas</h3>
                                            <h4 class="monoblue-bottom-2"><span>from $79</span></h4>
                                        </div><!-- end .pricing-header section -->

                                        <ul class="title">
                                            <li>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Tutorials"><span class="check-circle"></span></li>
                                            <li data-feature="Video Tutorials"><span class="not-support"></span></li>
                                        </ul>
                                        <ul class="title">
                                            <li></li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Social Integration"><span class="check-circle"></span></li>
                                            <li data-feature="Advanced Schedule"><span class="check-circle"></span></li>
                                            <li data-feature="One Click Demo"><span class="check-circle"></span></li>
                                            <li data-feature="Exhibitor Profiles"><span class="not-support"></span></li>
                                            <li data-feature="Multiple Headers"><span class="not-support"></span></li>
                                            <li data-feature="Event Composer"><span class="not-support"></span></li>
                                            <li data-feature="Multievent"><span class="check-circle"></span></li>
                                        </ul>
                                        <ul class="title">
                                            <li></li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Eventbrite"><span class="check-circle"></span></li>
                                            <li data-feature="Event Espresso"><span class="check-circle"></span></li>
                                            <li data-feature="Woocommerce"><span class="check-circle"></span></li>
                                            <li data-feature="Gravity Forms"><span class="check-circle"></span></li>
                                            <li data-feature="Xing Events"><span class="not-support"></span></li>
                                            <li data-feature="Etouches"><span class="not-support"></span></li>
                                            <li data-feature="TicketTailor"><span class="not-support"></span></li>
                                        </ul>

                                        <div class="pricing-footer">
                                            <button type="button" class="pricing-button monoblue4-btn" onclick="window.location.href = '/multiple-event-wordpress-theme-januas'"> Buy </button>
                                        </div><!-- end .pricing-footer section -->

                                    </div><!-- end .colm-list section -->

                                </div></div>
                            <div class="swiper-slide"><div class="colm even">
                                    <div class="colm-list">

                                        <div class="pricing-header header-colored">
                                            <h3 class="monoblue-top-4">Januas</h3>
                                            <h4 class="monoblue-bottom-2"><span>from $79</span></h4>
                                        </div><!-- end .pricing-header section -->

                                        <ul class="title">
                                            <li>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Tutorials"><span class="check-circle"></span></li>
                                            <li data-feature="Video Tutorials"><span class="not-support"></span></li>
                                        </ul>
                                        <ul class="title">
                                            <li></li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Social Integration"><span class="check-circle"></span></li>
                                            <li data-feature="Advanced Schedule"><span class="check-circle"></span></li>
                                            <li data-feature="One Click Demo"><span class="check-circle"></span></li>
                                            <li data-feature="Exhibitor Profiles"><span class="not-support"></span></li>
                                            <li data-feature="Multiple Headers"><span class="not-support"></span></li>
                                            <li data-feature="Event Composer"><span class="not-support"></span></li>
                                            <li data-feature="Multievent"><span class="check-circle"></span></li>
                                        </ul>
                                        <ul class="title">
                                            <li></li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Eventbrite"><span class="check-circle"></span></li>
                                            <li data-feature="Event Espresso"><span class="check-circle"></span></li>
                                            <li data-feature="Woocommerce"><span class="check-circle"></span></li>
                                            <li data-feature="Gravity Forms"><span class="check-circle"></span></li>
                                            <li data-feature="Xing Events"><span class="not-support"></span></li>
                                            <li data-feature="Etouches"><span class="not-support"></span></li>
                                            <li data-feature="TicketTailor"><span class="not-support"></span></li>
                                        </ul>

                                        <div class="pricing-footer">
                                            <button type="button" class="pricing-button monoblue4-btn" onclick="window.location.href = '/multiple-event-wordpress-theme-januas'"> Buy </button>
                                        </div><!-- end .pricing-footer section -->

                                    </div><!-- end .colm-list section -->

                                </div></div>
                            <div class="swiper-slide"><div class="colm even">
                                    <div class="colm-list">

                                        <div class="pricing-header header-colored">
                                            <h3 class="monoblue-top-4">Januas</h3>
                                            <h4 class="monoblue-bottom-2"><span>from $79</span></h4>
                                        </div><!-- end .pricing-header section -->

                                        <ul class="title">
                                            <li>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Tutorials"><span class="check-circle"></span></li>
                                            <li data-feature="Video Tutorials"><span class="not-support"></span></li>
                                        </ul>
                                        <ul class="title">
                                            <li></li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Social Integration"><span class="check-circle"></span></li>
                                            <li data-feature="Advanced Schedule"><span class="check-circle"></span></li>
                                            <li data-feature="One Click Demo"><span class="check-circle"></span></li>
                                            <li data-feature="Exhibitor Profiles"><span class="not-support"></span></li>
                                            <li data-feature="Multiple Headers"><span class="not-support"></span></li>
                                            <li data-feature="Event Composer"><span class="not-support"></span></li>
                                            <li data-feature="Multievent"><span class="check-circle"></span></li>
                                        </ul>
                                        <ul class="title">
                                            <li></li>
                                        </ul>
                                        <ul>
                                            <li data-feature="Eventbrite"><span class="check-circle"></span></li>
                                            <li data-feature="Event Espresso"><span class="check-circle"></span></li>
                                            <li data-feature="Woocommerce"><span class="check-circle"></span></li>
                                            <li data-feature="Gravity Forms"><span class="check-circle"></span></li>
                                            <li data-feature="Xing Events"><span class="not-support"></span></li>
                                            <li data-feature="Etouches"><span class="not-support"></span></li>
                                            <li data-feature="TicketTailor"><span class="not-support"></span></li>
                                        </ul>

                                        <div class="pricing-footer">
                                            <button type="button" class="pricing-button monoblue4-btn" onclick="window.location.href = '/multiple-event-wordpress-theme-januas'"> Buy </button>
                                        </div><!-- end .pricing-footer section -->

                                    </div><!-- end .colm-list section -->

                                </div></div>
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>

                    <div class="comparison-table__headers">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">

                                    <div class="pricing-header">
                                        <h3 class="monoblue-top-4">Conference Pro</h3>
                                        <h4 class="monoblue-bottom-2"><span>from $79</span></h4>
                                    </div>

                                </div>
                                <div class="swiper-slide">

                                    <div class="pricing-header">
                                        <h3 class="monoblue-top-4">Fudge 2.0</h3>
                                        <h4 class="monoblue-bottom-2"><span>from $79</span></h4>
                                    </div>

                                </div>
                                <div class="swiper-slide">

                                    <div class="pricing-header">
                                        <h3 class="monoblue-top-4">Mondree</h3>
                                        <h4 class="monoblue-bottom-2"><span>from $79</span></h4>
                                    </div>

                                </div>
                                <div class="swiper-slide">

                                    <div class="pricing-header">
                                        <h3 class="monoblue-top-4">Khore</h3>
                                        <h4 class="monoblue-bottom-2"><span>from $79</span></h4>
                                    </div>

                                </div>
                                <div class="swiper-slide">

                                    <div class="pricing-header">
                                        <h3 class="monoblue-top-4">Vertoh</h3>
                                        <h4 class="monoblue-bottom-2"><span>from $79</span></h4>
                                    </div>

                                </div>
                                <div class="swiper-slide">

                                    <div class="pricing-header">
                                        <h3 class="monoblue-top-4">Tyler</h3>
                                        <h4 class="monoblue-bottom-2"><span>from $79</span></h4>
                                    </div>

                                </div>
                                <div class="swiper-slide">

                                    <div class="pricing-header">
                                        <h3 class="monoblue-top-4">Januas</h3>
                                        <h4 class="monoblue-bottom-2"><span>from $79</span></h4>
                                    </div>

                                </div>
                                <div class="swiper-slide">

                                    <div class="pricing-header">
                                        <h3 class="monoblue-top-4">Januas</h3>
                                        <h4 class="monoblue-bottom-2"><span>from $79</span></h4>
                                    </div>

                                </div>
                                <div class="swiper-slide">

                                    <div class="pricing-header">
                                        <h3 class="monoblue-top-4">Januas</h3>
                                        <h4 class="monoblue-bottom-2"><span>from $79</span></h4>
                                    </div>

                                </div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>

                    <?php /*
                      <div class="colm odd">
                      <div class="colm-list">

                      <div class="pricing-header header-colored">
                      <h3 class="monoblue-top-4">Fudge</h3>
                      <h4 class="monoblue-bottom-2"><span>from $79</span></h4>
                      </div><!-- end .pricing-header section -->

                      <ul class="title">
                      <li>
                      </li>
                      </ul>
                      <ul>
                      <li data-feature="Tutorials"><span class="check-circle"></span></li>
                      <li data-feature="Video Tutorials"></li>
                      </ul>
                      <ul class="title">
                      <li></li>
                      </ul>
                      <ul>
                      <li data-feature="Social Integration"><span class="check-circle"></span></li>
                      <li data-feature="Advanced Schedule"><span class="check-circle"></span></li>
                      <li data-feature="One Click Demo"><span class="check-circle"></span></li>
                      <li data-feature="Exhibitor Profiles"></li>
                      <li data-feature="Multiple Headers"></li>
                      <li data-feature="Event Composer"></li>
                      <li data-feature="Multievent"></li>
                      </ul>
                      <ul class="title">
                      <li></li>
                      </ul>
                      <ul>
                      <li data-feature="Eventbrite"><span class="check-circle"></span></li>
                      <li data-feature="Event Espresso"><span class="check-circle"></span></li>
                      <li data-feature="Woocommerce"><span class="check-circle"></span></li>
                      <li data-feature="Gravity Forms"></li>
                      <li data-feature="Xing Events"><span class="check-circle"></span></li>
                      <li data-feature="Etouches"></li>
                      <li data-feature="TicketTailor"></li>
                      </ul>

                      <div class="pricing-footer">
                      <button type="button" class="pricing-button monoblue4-btn" onclick="window.location.href = '/conference-wordpress-theme-fudge'"> Buy </button>
                      </div><!-- end .pricing-footer section -->

                      </div><!-- end .colm-list section -->

                      </div><!-- end .colm section -->
                     */ ?>


                </div><!-- end .pricing-tables section -->

            </div><!-- end .smart-pricing section -->

        </div><!-- end .smart-wrapper section -->
    </div>
</section>
<!--/comparison-table-->

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
                                    <div class="only">
                                        <span>Only</span>
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
                                    <div>
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