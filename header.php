<?php
global $woocommerce;

$title = wp_title('&laquo;', false, 'right');
$q     = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_SPECIAL_CHARS);

if (!empty($q)) {
    $title = $q;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="format-detection" content="telephone=no">
        <meta name="format-detection" content="address=no">
        <meta property="fb:app_id" content="842058905917482" />
        <title><?php echo $title; ?></title>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.png" />
        <?php
        if (is_singular()) {
            wp_enqueue_script('comment-reply');
        }
        ?>
        <?php wp_head(); ?>
        <script type="text/javascript">
            jQuery(function () {
                jQuery.cookieBar({
                    forceShow: false
                });
            });

            var capterra_vkey = 'd530858be965441011f5b1bab2053be4',
                    capterra_vid = '2100901',
                    capterra_prefix = (('https:' == document.location.protocol) ? 'https://ct.capterra.com' : 'http://ct.capterra.com');
            (function () {
                var ct = document.createElement('script');
                ct.type = 'text/javascript';
                ct.async = true;
                ct.src = capterra_prefix + '/capterra_tracker.js?vid=' + capterra_vid + '&vkey=' + capterra_vkey;
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ct, s);
            })();
        </script>
        <!-- Facebook Pixel Code -->
        <script>
            !function (f, b, e, v, n, t, s) {
                if (f.fbq)
                    return;
                n = f.fbq = function () {
                    n.callMethod ?
                            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq)
                    f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window,
                    document, 'script', '//connect.facebook.net/en_US/fbevents.js');

            fbq('init', '1045058268878204');
            fbq('track', "PageView");</script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=1045058268878204&ev=PageView&noscript=1"
                   /></noscript>
    <!-- End Facebook Pixel Code -->
    <!--<script src='https://cdn.slaask.com/chat.js'></script>
    <script>
            _slaask.init('ee78f98663f38cddf17e5320b6e19ad3');
    </script>-->
</head>
<body <?php body_class(); ?>>
    <!-- Qualaroo for showthemes.com -->
    <!-- Paste this code right after the <body> tag on every page of your site. -->
    <script type="text/javascript">
        var kiq = kiq || [];
        (function () {
            setTimeout(function () {
                var d = document, f = d.getElementsByTagName('script')[0], s = d.createElement('script');
                s.type = 'text/javascript';
                s.async = true;
                s.src = '//s3.amazonaws.com/ki.js/60591/dGJ.js';
                f.parentNode.insertBefore(s, f);
            }, 1);
        })();
    </script>
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=842058905917482";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <?php
    if (is_singular('themes')) {
        global $post;
        ?>
        <!--switcher-->
        <div class="switcher-fix">
            <div class="center">
                <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>" class="logo">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo_mini.png" width="53" height="53" alt="<?php echo bloginfo('name'); ?>" class="switcher__logo-mini"/>
                </a>
                <ul>
                    <li><a title="<?php bloginfo('name'); ?> Home" href="<?php echo home_url() ?>">Home</a> &nbsp; / &nbsp; </li>
                    <li><a title="<?php bloginfo('name'); ?> Themes" href="<?php echo home_url(); ?>/#theme-list">Themes</a> &nbsp; / &nbsp; </li>
                    <li><?php the_title(); ?></li>
                </ul>
                <div class="options">
                    <a class="btn btn_red btn_buy_all" href="<?php echo home_url('wordpress-premium-event-themes'); ?>">Save &#36;&#36;&#36; <span>Buy All Themes</span></a>
                    <a class="btn btn_red" href="#theme-pricing">Buy <span>Now</span></a>
                    <a class="btn btn_white" href="<?php the_field('demo_link', $post->ID); ?>"><span>LIVE</span> DEMO</a>
                </div>
            </div>
        </div>
        <!--/switcher-->
<?php } ?>
    <header>
        <div class="container">
            <nav>
<?php //wp_nav_menu(array('menu' => 'Main', 'container' => false, 'menu_id' => 'main-menu')); ?>

                <ul id="main-menu" class="menu">
                    <li id="menu-item-9444" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9444">
                        <a href="http://www.cvfreak.com/showthemes/showthemes-faqs/">FAQs</a>

                        <span class="menu__arrow"></span>

                        <ul class="menu__sub">
                            <li>
                                <a href="#">ITEM 1</a>
                            </li>
                            <li>
                                <a href="#">ITEM 2</a>
                            </li>
                            <li>
                                <a href="#">ITEM 3</a>
                            </li>
                        </ul>

                    </li>
                    <li id="menu-item-10825" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-10825">
                        <a href="#showcase-anchor">Showcase</a>
                    </li>
                    <li id="menu-item-9750" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9750">
                        <a href="http://www.cvfreak.com/showthemes/my-account/">Login</a></li>
                    <li id="menu-item-9447" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9447">
                        <a href="http://www.cvfreak.com/showthemes/premium-wordpress-themes-affiliates/">Affiliates</a>
                    </li>
                </ul>

                <a class="cart-items<?php echo $woocommerce->cart->cart_contents_count > 0 ? ' full' : ''; ?>" href="http://www.showthemes.com/cart/"><?php _e('CART', 'showthemes'); ?></a>
            </nav>
            <a title="<?php bloginfo('title'); ?>" href="<?php bloginfo('url'); ?>" class="header__logo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo('title'); ?>" height="63" width="168" class="header__logo-big">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo_mini.png" alt="<?php bloginfo('title'); ?>" height="53" width="53" class="header__logo-mini">
            </a>
<?php //wp_nav_menu(array('menu' => 'Main', 'container' => false, 'menu_id' => 'mobile-menu')); ?>

            <ul id="mobile-menu" class="menu">
                <li id="menu-item-9444" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9444">
                    <a href="http://www.cvfreak.com/showthemes/showthemes-faqs/">FAQs</a>

                    <ul class="menu__sub">
                        <li>
                            <a href="#">ITEM 1</a>
                        </li>
                        <li>
                            <a href="#">ITEM 2</a>
                        </li>
                        <li>
                            <a href="#">ITEM 3</a>
                        </li>
                    </ul>


                </li>
                <li id="menu-item-10825" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-10825">
                    <a href="http://www.showthemes.com/#showcase-anchor">Showcase</a>
                </li>
                <li id="menu-item-9750" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9750">
                    <a href="http://www.cvfreak.com/showthemes/my-account/">Login</a>
                </li>
                <li id="menu-item-9447" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9447">
                    <a href="http://www.cvfreak.com/showthemes/premium-wordpress-themes-affiliates/">Affiliates</a>
                </li>
            </ul>

        </div>
    </header>