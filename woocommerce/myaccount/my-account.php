<?php
/**
 * My Account page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

wc_print_notices();
?>
<!-- case -->
<section class="case case_support">
    <!-- case__row -->
    <div class="case__row">
        <div class="col col-xs-12">
            <h1>Support Login</h1>
            <p>
                <?php
                printf(
                        __('Hello <strong>%1$s</strong> (not %1$s? <a href="%2$s">Sign out</a>).', 'woocommerce') . ' ', $current_user->display_name, wc_get_endpoint_url('customer-logout', '', wc_get_page_permalink('myaccount'))
                );

                printf(__('From your account dashboard you can view your recent orders, manage your shipping and billing addresses and <a href="%s">edit your password and account details</a>.', 'woocommerce'), wc_customer_edit_account_url()
                );
                ?>
            </p>
            <?php do_action('woocommerce_before_my_account'); ?>

            <?php wc_get_template('myaccount/my-downloads.php'); ?>

            <?php wc_get_template('myaccount/my-orders.php', array('order_count' => $order_count)); ?>

            <?php wc_get_template('myaccount/my-address.php'); ?>

            <?php do_action('woocommerce_after_my_account'); ?>
        </div>
    </div>
    <!-- /case__row -->
</section>
<!-- /case -->