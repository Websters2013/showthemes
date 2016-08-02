<?php
/**
 * Review order table
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */
if (!defined('ABSPATH')) {
    exit;
}
?>
<!-- checkout__info -->
<div class="checkout__info woocommerce-checkout-review-order-table">

    <h2 class="checkout__subtitle">Additional Information</h2>

    <ul class="checkout__table">
        <li class="checkout__raw checkout__raw_head">
            <span class="checkout__table-wide"><?php _e('Product', 'woocommerce'); ?></span>
            <span class="checkout__table-narrow"><?php _e('Total', 'woocommerce'); ?></span>
        </li>
        <?php
        do_action('woocommerce_review_order_before_cart_contents');

        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
            if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key)) {
                ?>
                <li class="checkout__raw checkout__raw_big">
                    <span class="checkout__table-wide">
                        <?php echo apply_filters('woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key) . '&nbsp;'; ?>
                        <?php echo apply_filters('woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf('&times; %s', $cart_item['quantity']) . '</strong>', $cart_item, $cart_item_key); ?>
                        <?php echo WC()->cart->get_item_data($cart_item); ?>
                    </span>
                    <span class="checkout__table-narrow">
                        <?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); ?>
                    </span>
                </li>
                <?php
            }
        }
        do_action('woocommerce_review_order_after_cart_contents');
        ?>
        <li class="checkout__raw">
            <span class="checkout__table-wide"><?php _e('Subtotal', 'woocommerce'); ?></span>
            <span class="checkout__table-narrow"><?php wc_cart_totals_subtotal_html(); ?></span>
        </li>
        <?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
            <li class="checkout__raw checkout__raw_big">
                <span class="checkout__table-wide"><?php wc_cart_totals_coupon_label($coupon); ?></span>
                <span class="checkout__table-narrow"><?php wc_cart_totals_coupon_html($coupon); ?></span>
            </li>
        <?php endforeach; ?>
        <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
            <?php do_action('woocommerce_review_order_before_shipping'); ?>
            <?php wc_cart_totals_shipping_html(); ?>
            <?php do_action('woocommerce_review_order_after_shipping'); ?>
        <?php endif; ?>
        <?php foreach (WC()->cart->get_fees() as $fee) : ?>
            <li class="checkout__raw">
                <span class="checkout__table-wide"><?php echo esc_html($fee->name); ?></span>
                <span class="checkout__table-narrow"><?php wc_cart_totals_fee_html($fee); ?></span>
            </li>
        <?php endforeach; ?>
        <?php if (WC()->cart->tax_display_cart === 'excl') : ?>
            <?php if (get_option('woocommerce_tax_total_display') === 'itemized') : ?>
                <?php foreach (WC()->cart->get_tax_totals() as $code => $tax) : ?>
                    <li class="checkout__raw">
                        <span class="checkout__table-wide"><?php echo esc_html($tax->label); ?></span>
                        <span class="checkout__table-narrow"><?php echo wp_kses_post($tax->formatted_amount); ?></span>
                    </li>
                <?php endforeach; ?>
            <?php else : ?>
                <li class="checkout__raw">
                    <span class="checkout__table-wide"><?php echo esc_html(WC()->countries->tax_or_vat()); ?></span>
                    <span class="checkout__table-narrow"><?php echo wc_price(WC()->cart->get_taxes_total()); ?></span>
                </li>
            <?php endif; ?>
        <?php endif; ?>
        <?php do_action('woocommerce_review_order_before_order_total'); ?>
        <li class="checkout__raw checkout__raw_total">
            <span class="checkout__table-wide"><?php _e('Total', 'woocommerce'); ?></span>
            <span class="checkout__table-narrow"><?php wc_cart_totals_order_total_html(); ?></span>
        </li>
        <?php do_action('woocommerce_review_order_after_order_total'); ?>
    </ul>
</div>
<!-- /checkout__info -->