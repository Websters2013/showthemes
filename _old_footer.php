<?php if (is_page_template('page-store-home.php') || is_singular('themes') || is_page_template('page-store-bundle.php')) { ?>
    <?php include_once('bottom-content.php'); ?>
<?php } ?>

<!--Newsletter Signup-->

<section id="newsletter">
    <div class="container">
        <h2>Get the Latest News about Our Event WordPress Themes</h2>
        <!-- Begin MailChimp Signup Form -->
        <form action="//showthemes.us5.list-manage.com/subscribe/post?u=eb495dc45c4f4e1fe36ca3b96&amp;id=279479306e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
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

<?php wp_footer(); ?>

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
</body>
</html>