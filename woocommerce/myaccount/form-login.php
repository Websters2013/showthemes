<?php
/**
 * Login Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.6
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<?php wc_print_notices(); ?>
<?php do_action('woocommerce_before_customer_login_form'); ?>

<!-- case -->
<section class="case login">
    <!-- case__row -->
    <div class="case__row">
        <div class="col col-xs-12">
            <h1>Support Login</h1>
            <!-- login__note -->
            <div class="login__note">
                <p>Note: If you purchased a support license before September 12, 2014 – please read <a href="http://www.showthemes.com/showthemes-faqs/#renew">this</a></p>
            </div>
            <!-- /login__note -->
            <!-- checkout -->
            <form class="checkout" method="post">
                <?php do_action('woocommerce_login_form_start'); ?>
                <fieldset class="checkout__field">
                    <input type="text" name="username" placeholder="<?php _e('Username or email address', 'woocommerce'); ?> *" value="<?php if (!empty($_POST['username'])) echo esc_attr($_POST['username']); ?>" />
                </fieldset>
                <fieldset class="checkout__field">
                    <input type="password" name="password" placeholder="<?php _e('Password', 'woocommerce'); ?> *"/>
                </fieldset>
                <?php do_action('woocommerce_login_form'); ?>
                <?php wp_nonce_field('woocommerce-login'); ?>
                <input type="submit" class="checkout__submit btn btn_red" name="login" value="<?php _e('Enter', 'woocommerce'); ?>" />
                <fieldset class="checkout__field checkout__field_check">
                    <input type="checkbox" id="ch1" name="rememberme"/>
                    <label for="ch1"><?php _e('Remember me', 'woocommerce'); ?></label>
                    <a href="<?php echo esc_url(wc_lostpassword_url()); ?>" class="checkout__pass"><?php _e('Lost your password?', 'woocommerce'); ?></a>
                </fieldset>
                <?php do_action('woocommerce_login_form_end'); ?>
            </form>
            <!-- /checkout -->
        </div>
    </div>
    <!-- /case__row -->
</section>
<!-- /case -->

<?php do_action('woocommerce_after_customer_login_form'); ?>