<?php
/**
 * My API Keys
 */
?>

<!-- checkout__keys -->
<div class="checkout__info checkout__keys">
    <h4 class="checkout__subtitle"><?php _e('API Keys', 'woocommerce-api-manager'); ?></h4>
    <ul class="checkout__table">
        <?php
        if (!empty($user_id)) :
            $user_orders = WCAM()->helpers->get_users_data($user_id);
            if (!empty($user_orders)) :
                ?>
                <li class="checkout__raw checkout__raw_head">
                    <span class="checkout__table-wide"><?php _e('Product', 'woocommerce-api-manager'); ?></span>
                    <span class="checkout__table-key"><?php _e('API License Key', 'woocommerce-api-manager'); ?></span>
                    <span class="checkout__table-email"><?php _e('API License Email', 'woocommerce-api-manager'); ?></span>
                    <span class="checkout__table-narrow"><?php _e('Activations', 'woocommerce-api-manager'); ?></span>
                    <?php if (WCAM()->helpers->is_plugin_active('woocommerce-subscriptions/woocommerce-subscriptions.php')) : ?>
                        <span class="checkout__table-narrow"><?php _e('Subscription', 'woocommerce-api-manager'); ?></span>
                    <?php endif; ?>
                </li>
                <?php
                krsort($user_orders);
                foreach ($user_orders as $order_key => $data) :
                    /**
                     * Prepare the Subscription information
                     */
                    // Finds the post ID (integer) for a product even if it is a variable product
                    if ($data['is_variable_product'] == 'no') {
                        $post_id = $data['parent_product_id'];
                    } else {
                        $post_id = $data['variable_product_id'];
                    }
                    // Finds order ID that matches the license key. Order ID is the post_id in the post meta table
                    $order_id = $data['order_id'];
                    // Finds the product ID, which can only be the parent ID for a product
                    $product_id = $data['parent_product_id'];
                    // Get the subscription status i.e. active
                    if (WCAM()->helpers->is_plugin_active('woocommerce-subscriptions/woocommerce-subscriptions.php')) {
                        $status = WCAM()->helpers->get_subscription_status($user_id, $post_id, $order_id, $product_id);
                    }
                    // End Subscription information prep
                    // Software Title
                    if ($data['is_variable_product'] == 'no') {
                        $software_title = $data['_api_software_title_parent'];
                    } else if ($data['is_variable_product'] == 'yes') {
                        $software_title = $data['_api_software_title_var'];
                    } else {
                        $software_title = $data['software_title'];
                    }
                    // Check if this is an order_key, or the new longer api_key
                    $order_data_key = (!empty($data['api_key']) ) ? $data['api_key'] : $data['order_key'];
                    // Get the order
                    $customer_order = get_post($data['order_id']);
                    if (is_object($customer_order)) {
                        // WooCommerce 2.2 compatibility
                        if (function_exists('get_order')) {
                            $order = get_order();
                        } else {
                            $order = new WC_Order($data['order_id']);
                        }
                        $order->populate($customer_order);
                    }
                    ?>
                    <li class="checkout__raw">
                        <span class="checkout__table-wide">
                            <a href="<?php echo esc_url($order->get_view_order_url()); ?>"><?php echo esc_attr($software_title) . ' ' . $order->get_order_number(); ?></a>
                        </span>
                        <span class="checkout__table-key">
                            <?php
                            if (!empty($status) && $status != 'active' && WCAM()->helpers->is_plugin_active('woocommerce-subscriptions/woocommerce-subscriptions.php'))
                                echo '<del>';
                            if ($data['_api_update_permission'] == 'no')
                                echo '<del>';
                            echo $order_data_key;
                            if ($data['_api_update_permission'] == 'no')
                                echo '</del>';
                            if (!empty($status) && $status != 'active' && WCAM()->helpers->is_plugin_active('woocommerce-subscriptions/woocommerce-subscriptions.php'))
                                echo '</del>';
                            ?>
                        </span>
                        <span class="checkout__table-email"><?php echo esc_attr($data['license_email']); ?></span>
                        <span class="checkout__table-narrow">
                            <?php
                            // Get activation info
                            $a_info = WCAM()->helpers->get_users_activation_data($user_id, $data['order_key']);

                            $active_activations = 0;

                            if (!empty($a_info)) :

                                foreach ($a_info as $key => $activations) :

                                    if ($activations['activation_active'] == 1 && $activations['order_key'] == $order_data_key) :

                                        $active_activations++;

                                    endif; // end if activations

                                endforeach; // end a_info

                            endif; // not empty a_info

                            $order_data = WCAM()->helpers->get_order_info_by_email_with_order_key($data['license_email'], $order_data_key);

                            if (!empty($order_data)) :

                                // Activations limit or unlimited
                                if ($order_data['is_variable_product'] == 'no' && $order_data['_api_activations_parent'] != '') :

                                    $activations_limit = absint($order_data['_api_activations_parent']);

                                elseif ($order_data['is_variable_product'] == 'no' && $order_data['_api_activations_parent'] == '') :

                                    $activations_limit = 'unlimited';

                                elseif ($order_data['is_variable_product'] == 'yes' && $order_data['_api_activations'] != '') :

                                    $activations_limit = absint($order_data['_api_activations']);

                                elseif ($order_data['is_variable_product'] == 'yes' && $order_data['_api_activations'] == '') :

                                    $activations_limit = 'unlimited';

                                endif;

                                $num_activations = ( $active_activations > 0 ) ? $active_activations : 0;

                                $my_acccount_activations = $num_activations . __(' out of ', 'woocommerce-api-manager') . $activations_limit;

                                if ($data['_api_update_permission'] == 'no') :

                                    $my_acccount_activations = __('Disabled', 'woocommerce-api-manager');

                                endif; // if No API Access Permission

                                if (!empty($status) && $status != 'active' && WCAM()->helpers->is_plugin_active('woocommerce-subscriptions/woocommerce-subscriptions.php')) :

                                    $my_acccount_activations = __('Disabled', 'woocommerce-api-manager');

                                endif; // if subscription is not active

                                echo esc_attr($my_acccount_activations);

                            endif; // not empty order_data
                            ?>
                        </span>
                        <?php if (WCAM()->helpers->is_plugin_active('woocommerce-subscriptions/woocommerce-subscriptions.php')) : ?>
                            <span class="checkout__table-narrow">
                                <?php
                                if (!empty($status)) :

                                    echo esc_attr($status);

                                else :

                                    _e('No', 'woocommerce-api-manager');

                                endif;
                                ?>

                            </span>
                        <?php endif; ?>
                    </li>
                <?php endforeach; // end user_orders  ?>
            <?php else : ?>
                <li class="checkout__raw checkout__raw_noLoad">
                    <span class="checkout__table-noLoad"><?php _e('You have no API keys.', 'woocommerce-api-manager'); ?></span>
                </li>
            <?php
            endif; // end if user_orders
        endif; // end if user_id
        ?>
    </ul>
</div>
<!-- /checkout__keys -->