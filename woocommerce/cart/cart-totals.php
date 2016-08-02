<?php
/**
 * Cart totals
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.6
 */
if (!defined('ABSPATH')) {
    exit;
}
?>
<li class="checkout__raw checkout__raw_subtotal <?php if (WC()->customer->has_calculated_shipping()) echo 'calculated_shipping'; ?>"">
    <?php do_action('woocommerce_before_cart_totals'); ?>
    <span class="checkout__table-wide">Subtotal</span>
    <span class="checkout__table-narrow"><?php wc_cart_totals_subtotal_html(); ?></span>
</li>
<?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
    <li class="checkout__raw checkout__raw_big cart-discount coupon-<?php echo esc_attr($code); ?> checkout__raw_big">
        <span class="checkout__table-wide"><?php wc_cart_totals_coupon_label($coupon); ?></span>
        <span class="checkout__table-narrow"><?php wc_cart_totals_coupon_html($coupon); ?></span>
    </li>
<?php endforeach; ?>
<?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
    <?php do_action('woocommerce_cart_totals_before_shipping'); ?>
    <?php wc_cart_totals_shipping_html(); ?>
    <?php do_action('woocommerce_cart_totals_after_shipping'); ?>
<?php elseif (WC()->cart->needs_shipping()) : ?>
    <li class="shipping">
        <span class="checkout__table-wide"><?php _e('Shipping', 'woocommerce'); ?></span>
        <span class="checkout__table-narrow"><?php woocommerce_shipping_calculator(); ?></span>
    </li>
<?php endif; ?>
<?php foreach (WC()->cart->get_fees() as $fee) : ?>
    <li class="fee">
        <span class="checkout__table-wide"><?php echo esc_html($fee->name); ?></span>
        <span class="checkout__table-narrow"><?php wc_cart_totals_fee_html($fee); ?></span>
    </li>
<?php endforeach; ?>
<?php if (WC()->cart->tax_display_cart == 'excl') : ?>
    <?php if (get_option('woocommerce_tax_total_display') == 'itemized') : ?>
        <?php foreach (WC()->cart->get_tax_totals() as $code => $tax) : ?>
            <li class="tax-rate tax-rate-<?php echo sanitize_title($code); ?>">
                <span class="checkout__table-wide"><?php echo esc_html($tax->label); ?></span>
                <span class="checkout__table-narrow"><?php echo wp_kses_post($tax->formatted_amount); ?></span>
            </li>
        <?php endforeach; ?>
    <?php else : ?>
        <li class="tax-total">
            <span class="checkout__table-wide"><?php echo esc_html(WC()->countries->tax_or_vat()); ?></span>
            <span class="checkout__table-narrow"><?php echo wc_cart_totals_taxes_total_html(); ?></span>
        </li>
    <?php endif; ?>
<?php endif; ?>
<?php do_action('woocommerce_cart_totals_before_order_total'); ?>
<li class="checkout__raw checkout__raw_total">
    <span class="checkout__table-wide"><?php _e('Total', 'woocommerce'); ?></span>
    <span class="checkout__table-narrow"><?php wc_cart_totals_order_total_html(); ?></span>
</li>
<?php do_action('woocommerce_cart_totals_after_order_total'); ?>
<?php if (WC()->cart->get_cart_tax()) : ?>
    <li>
        <p>
            <small><?php
                $estimated_text = WC()->customer->is_customer_outside_base() && !WC()->customer->has_calculated_shipping() ? sprintf(' ' . __(' (taxes estimated for %s)', 'woocommerce'), WC()->countries->estimated_for_prefix() . __(WC()->countries->countries[WC()->countries->get_base_country()], 'woocommerce')) : '';

                printf(__('Note: Shipping and taxes are estimated%s and will be updated during checkout based on your billing and shipping information.', 'woocommerce'), $estimated_text);
                ?>
            </small>
        </p>
    </li>
<?php endif; ?>
<?php do_action('woocommerce_after_cart_totals'); ?>
