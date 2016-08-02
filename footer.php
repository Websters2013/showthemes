<?php if (is_page_template('page-store-home.php') || is_singular('themes') || is_page_template('page-store-bundle.php')) { ?>
    <?php include_once('bottom-content.php'); ?>
<?php } ?>

<!--Newsletter Signup-->
<?php global $post; ?>
<section id="newsletter">
    <div class="container">
        <h2><?php
            if ($post->ID == 13951)
                echo 'Get Your Coupon Now';
            else
                echo 'Get the Latest News about Our Event WordPress Themes';
            ?></h2>
        <!-- Begin MailChimp Signup Form -->
        <form action="<?php
        if ($post->ID == 13951)
            echo '//showthemes.us5.list-manage.com/subscribe/post?u=eb495dc45c4f4e1fe36ca3b96&amp;id=0452cee643';
        else
            echo '//showthemes.us5.list-manage.com/subscribe/post?u=eb495dc45c4f4e1fe36ca3b96&amp;id=279479306e';
        ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="ENTER EMAIL ADDRESS" required>
            <input type="submit" value="email" name="subscribe" id="mc-embedded-subscribe" class="button">
        </form>
        <!--End mc_embed_signup-->
    </div>
</section>
<footer>
    <div class="container">
        <ul>
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer')) : ?>
            <?php endif; ?>
        </ul>
        <div class="footer__logo"><a href="#"><?php echo date('Y'); ?> &copy; Showthemes Ltd</a></div>
        <a class="btn" title="View our themes" href="<?php bloginfo('url'); ?>/#theme-list">See our themes</a>
    </div>
</footer>
<?php
/*global $post;
if ($post->ID != get_option('woocommerce_myaccount_page_id')) {
    ?>
    <div class="facebook-chat">
        <a href="#" class="facebook-chat-handler">Questions?</a>
        <div class="facebook-chat-container">
            <div class="fb-page" data-href="https://www.facebook.com/showthemes" data-tabs="messages" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-height="300"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/showthemes"><a href="https://www.facebook.com/showthemes">Showthemes</a></blockquote></div></div>
        </div>
    </div>
    <?php
}*/
?>
<?php wp_footer(); ?>

<script type="text/javascript">
    adroll_adv_id = "CBWVPATKCRGUHPE4HCBTZA";
    adroll_pix_id = "KHF6SOE7UZEVFHPZLR3JTE";
    (function () {
        var oldonload = window.onload;
        window.onload = function () {
            __adroll_loaded = true;
            var scr = document.createElement("script");
            var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
            scr.setAttribute('async', 'true');
            scr.type = "text/javascript";
            scr.src = host + "/j/roundtrip.js";
            ((document.getElementsByTagName('head') || [null])[0] ||
                    document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
            if (oldonload) {
                oldonload()
            }
        };
    }());
</script>
<!-- Google Code for Remarketing tag -->
<!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup -->
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 997061712;
    var google_conversion_label = "6VrhCMimpgUQ0Oi32wM";
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
    <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/997061712/?value=1.00&amp;currency_code=GBP&amp;label=6VrhCMimpgUQ0Oi32wM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        jQuery(document).on('OptinMonsterLoaded', function (event, props, object) {
            if ((jQuery.cookie('ap_id') !== undefined && jQuery.cookie('ap_id').length > 0) || (jQuery.cookie('optin_done') !== undefined) || (window.location.search.indexOf('ap_id') !== -1) || window.location.pathname == '/event-wordpress-theme-khore') {
                $('#om-qrb3fckjzayybdgg').remove();
            }
        });
        $(document).on('OptinMonsterOptinSuccess', function (event, data, object) {
            event.preventDefault();
            jQuery.cookie('optin_done', '1', {expires: 7, path: '/'});
        });
    });
</script>
</body>
</html>