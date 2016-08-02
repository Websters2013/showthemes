<?php
/**
 * Output a single payment method
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */
if (!defined('ABSPATH')) {
    exit;
}
?>
<!-- <?php echo $gateway->id; ?> -->
<div class="pay-pal">
    <div class="pay-pal__title">
        <span class="pay-pal__name">
            <input id="payment_method_<?php echo $gateway->id; ?>" type="radio" class="input-radio" name="payment_method" value="<?php echo esc_attr($gateway->id); ?>" <?php checked($gateway->chosen, true); ?> data-order_button_text="<?php echo esc_attr($gateway->order_button_text); ?>" />
            <?php echo $gateway->get_title(); ?>
        </span>
        <a href="#" class="pay-pal__cards">
            <?php echo $gateway->get_icon(); ?>
        </a>
    </div>
    <?php if ($gateway->has_fields() || $gateway->get_description()) : ?>
        <?php $gateway->payment_fields(); ?>
    <?php endif; ?>
</div>
<!-- /<?php echo $gateway->id; ?> -->