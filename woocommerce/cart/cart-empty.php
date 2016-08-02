<?php
/**
 * Empty cart page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

wc_print_notices();
?>
<div id="emptyCartMsg">
    <h3><?php _e('Your cart is currently empty.', 'woocommerce') ?></h3>
    <a href="<?php echo home_url(); ?>#theme-list" class="continue-shopping btn" title="Continue Shopping">Continue Shopping</a>
</div>