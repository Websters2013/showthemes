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

        <?php
    endwhile;
endif;
?>

<?php
get_footer();
