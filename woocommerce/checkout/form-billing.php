<?php
/**
 * Checkout billing information form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.2
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
?>
<!-- checkout__form -->
<div class="checkout__form">
    <?php do_action('woocommerce_before_checkout_billing_form', $checkout); ?>
    <?php
    foreach ($checkout->checkout_fields['billing'] as $key => $field) :
        $field['class'][] = 'checkout_field';
        switch ($field['type']) {
            case 'checkbox':
                $field['class'][] = 'checkout__field_check';
                break;
        }
        $field['placeholder'] = $field['label'];
        if ($field['required']) {
            $field['placeholder'] .= '*';
        }
        if ($field['type'] !== 'checkbox') {
            unset($field['label']);
        }
        woocommerce_form_field($key, $field, $checkout->get_value($key));
    endforeach;
    ?>
    <?php do_action('woocommerce_after_checkout_billing_form', $checkout); ?>
    <?php if (!is_user_logged_in() && $checkout->enable_signup) : ?>
        <?php if ($checkout->enable_guest_checkout) : ?>
            <p class="form-row form-row-wide create-account">
                <input class="input-checkbox" id="createaccount" <?php checked(( true === $checkout->get_value('createaccount') || ( true === apply_filters('woocommerce_create_account_default_checked', false) )), true) ?> type="checkbox" name="createaccount" value="1" /> <label for="createaccount" class="checkbox"><?php _e('Create an account?', 'woocommerce'); ?></label>
            </p>
        <?php endif; ?>
        <?php do_action('woocommerce_before_checkout_registration_form', $checkout); ?>
        <?php if (!empty($checkout->checkout_fields['account'])) : ?>
            <!-- checkout__account -->
            <div class="checkout__account">
                <h2 class="checkout__subtitle">
                    Create an account
                </h2>
                <span class="checkout__after-title"><?php _e('Create an account by entering the information below. If you are a returning customer please login at the top of the page.', 'woocommerce'); ?></span>
                <?php
                foreach ($checkout->checkout_fields['account'] as $key => $field) :
                    if ($field['type'] !== 'checkbox') {
                        $field['placeholder'] = $field['label'];
                        if ($field['required']) {
                            $field['placeholder'] .= '*';
                        }
                        unset($field['label']);
                        woocommerce_form_field($key, $field, $checkout->get_value($key));
                    }
                endforeach;
                ?>
            </div>
            <!-- /checkout__account -->
        <?php endif; ?>
        <?php do_action('woocommerce_after_checkout_registration_form', $checkout); ?>
    <?php endif; ?>
</div>
<!-- /checkout__form -->