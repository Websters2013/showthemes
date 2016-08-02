<?php
/**
 * My Orders
 *
 * Shows recent orders on the account page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$customer_orders = get_posts(apply_filters('woocommerce_my_account_my_orders_query', array(
    'numberposts' => $order_count,
    'meta_key'    => '_customer_user',
    'meta_value'  => get_current_user_id(),
    'post_type'   => wc_get_order_types('view-orders'),
    'post_status' => array_keys(wc_get_order_statuses())
        )));
if ($customer_orders) :
    ?>
    <!-- checkout__orders -->
    <div class="checkout__info checkout__orders">
        <h4 class="checkout__subtitle"><?php echo apply_filters('woocommerce_my_account_my_orders_title', __('Recent Orders', 'woocommerce')); ?></h4>
        <ul class="checkout__table">
            <?php
            foreach ($customer_orders as $customer_order) {
                $order      = wc_get_order();
                //$order->populate($customer_order);
                $order      = new WC_Order($customer_order);
                $item_count = $order->get_item_count();
                ?>
                <li class="checkout__raw">
                    <span class="checkout__table-order">
                        <a href="<?php echo $order->get_view_order_url(); ?>">
                            #<?php echo $order->get_order_number(); ?>
                        </a>
                    </span>
                    <span class="checkout__orders-date">
                        <time datetime="<?php echo date('Y-m-d', strtotime($order->order_date)); ?>" title="<?php echo esc_attr(strtotime($order->order_date)); ?>"><?php echo date_i18n(get_option('date_format'), strtotime($order->order_date)); ?></time>
                    </span>
                    <span class="checkout__table-status">
                        <?php echo wc_get_order_status_name($order->get_status()); ?>
                    </span>
                    <span class="checkout__orders-total">
                        <?php echo sprintf(_n('%s for %s item', '%s for %s items', $item_count, 'woocommerce'), $order->get_formatted_order_total(), $item_count); ?>
                    </span>
                    <span class="checkout__table-links">
                        <?php
                        $actions    = array();
                        if (in_array($order->get_status(), apply_filters('woocommerce_valid_order_statuses_for_payment', array('pending', 'failed'), $order))) {
                            $actions['pay'] = array(
                                'url'  => $order->get_checkout_payment_url(),
                                'name' => __('Pay', 'woocommerce')
                            );
                        }
                        if (in_array($order->get_status(), apply_filters('woocommerce_valid_order_statuses_for_cancel', array('pending', 'failed'), $order))) {
                            $actions['cancel'] = array(
                                'url'  => $order->get_cancel_order_url(wc_get_page_permalink('myaccount')),
                                'name' => __('Cancel', 'woocommerce')
                            );
                        }
                        $actions['view'] = array(
                            'url'  => $order->get_view_order_url(),
                            'name' => __('View', 'woocommerce')
                        );
                        $actions         = apply_filters('woocommerce_my_account_my_orders_actions', $actions, $order);
                        if ($actions) {
                            foreach ($actions as $key => $action) {
                                echo '<a href="' . esc_url($action['url']) . '" class="btn btn_red ' . sanitize_html_class($key) . '">' . esc_html($action['name']) . '</a>';
                            }
                        }
                        ?>
                    </span>
                </li>
            <?php } ?>
        </ul>
    </div>
    <!-- /checkout__orders -->
<?php endif; ?>