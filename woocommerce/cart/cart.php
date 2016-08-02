<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.8
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

wc_print_notices();
do_action('woocommerce_before_cart');
?>

<!-- cart -->
<section class="case cart">
    <!-- case__row -->
    <div class="case__row">
        <div class="col col-xs-12">
            <h1>YOUR CART</h1>
            <!-- cart -->
            <form action="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" class="cart__form" method="POST">
                <?php do_action('woocommerce_before_cart_table'); ?>

                <ul class="checkout__table checkout__table_cart">
                    <li class="checkout__raw checkout__raw_head">
                        <?php /* MOD <th class="product-remove">&nbsp;</th>
                          <th class="product-thumbnail">&nbsp;</th> */ ?>
                        <span class="checkout__table-wide">PRODUCT</span>
                        <?php /* MOD inverted quantity/price fields */ ?>
                        <span class="checkout__table-qty">QTY</span>
                        <span class="checkout__table-price">PRICE</span>
                        <span class="checkout__table-narrow">tOTAL</span>
                    </li>
                    <?php do_action('woocommerce_before_cart_contents'); ?>
                    <?php
                    $has_support_item          = false;
                    $has_bundle                = false;
                    $support_group             = 2;
                    $bundle_flat_product_id    = 'allthemes-bunde';
                    $bundle_support_product_id = 'allthemes-supported-bundle';
                    $products_count            = 0;

                    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                        $product_groups = get_post_meta($cart_item['product_id'], '_groups_groups', false);
                        if (is_array($product_groups) && in_array($support_group, $product_groups)) {
                            $has_support_item = true;
                        }
                        if ($cart_item['bundled_items']) {
                            $has_bundle = true;
                        }
                        ++$products_count;

                        $_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                        $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
                        if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                            ?>
                            <li class="checkout__raw checkout__raw_big <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">
                                <?php /* MOD <td class="product-remove">
                                  <?php
                                  echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">&times;</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key );
                                  ?>
                                  </td>

                                  <td class="product-thumbnail">
                                  <?php
                                  $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                                  if ( ! $_product->is_visible() )
                                  echo $thumbnail;
                                  else
                                  printf( '<a href="%s">%s</a>', $_product->get_permalink( $cart_item ), $thumbnail );
                                  ?>
                                  </td> */ ?>
                                <span class="checkout__table-wide">
                                    <?php
                                    if (!$_product->is_visible())
                                        echo apply_filters('woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key) . '&nbsp;';
                                    else
                                        echo apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s </a>', $_product->get_permalink($cart_item), $_product->get_title()), $cart_item, $cart_item_key);

                                    // Meta data
                                    echo WC()->cart->get_item_data($cart_item);

                                    // Backorder notification
                                    if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity']))
                                        echo '<p class="backorder_notification">' . __('Available on backorder', 'woocommerce') . '</p>';
                                    ?>
                                </span>
                                <span class="checkout__table-qty">
                                    <?php
                                    if ($_product->is_sold_individually()) {
                                        $product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
                                    } else {
                                        $product_quantity = woocommerce_quantity_input(array(
                                            'input_name'  => "cart[{$cart_item_key}][qty]",
                                            'input_value' => $cart_item['quantity'],
                                            'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
                                            'min_value'   => '0'
                                                ), $_product, false);
                                    }

                                    echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key);
                                    ?>
                                </span>
                                <span class="checkout__table-price">
                                    <span class="checkout__mobile">Item Price </span>
                                    <?php
                                    echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
                                    ?>
                                </span>
                                <span class="checkout__table-narrow">
                                    <span class="checkout__mobile">Item Total </span>
                                    <?php
                                    echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key);
                                    ?>
                                </span>
                            </li>
                            <?php
                        }
                    }
                    if ($products_count > 0 && !$has_bundle) {
                        $bundle_id = $products_count == 1 ? ($has_support_item ? $bundle_support_product_id : $bundle_flat_product_id) : $bundle_support_product_id;
                        ?>
                        <li class="checkout__raw checkout__raw_big buy_all_row">
                            <a href="<?php echo do_shortcode("[add_to_cart_url sku=\"$bundle_id\"]"); ?>&remove_not_bundled=1" class="btn btn_red btn_buy_all">Save &#36;&#36;&#36; - Buy All Themes</a></span>
                        </li>
                        <?php
                    }
                    ?>
                    <?php woocommerce_cart_totals(); ?>
                </ul>

                <?php if (WC()->cart->coupons_enabled()) { ?>
                    <a class="coupon__title" href="#">GOT A COUPON?</a>
                    <!-- coupon -->
                    <div class="coupon" style="display:none;">
                        <input name="coupon_code" type="text" placeholder="<?php _e('Coupon code', 'woocommerce'); ?>" class="coupon__input"/>
                        <input type="submit" class="coupon__btn btn btn_red" name="apply_coupon" value="<?php _e('Apply Coupon', 'woocommerce'); ?>" />
                        <?php do_action('woocommerce_cart_coupon'); ?>
                    </div>
                    <!-- /coupon -->
                <?php } ?>

                <!-- checkout__controls -->
                <div class="checkout__controls">
                    <input type="submit" class="checkout__update btn btn_white" name="update_cart" value="<?php _e('Update Cart', 'woocommerce'); ?>" />
                    <?php //woocommerce_button_proceed_to_checkout(); ?>
                    <a href="<?php echo WC()->cart->get_checkout_url(); ?>" class="checkout__submit btn btn_red checkout-button wc-forward"><?php _e('Proceed to Checkout', 'woocommerce'); ?></a>
                    <?php wp_nonce_field('woocommerce-cart'); ?>
                </div>
                <!-- /checkout__controls -->

            </form>
            <!-- /cart -->
        </div>
    </div>
    <!-- /case__row -->
</section>
<!-- /cart -->

<?php /* MOD removed 
  <div class="cart-collaterals">

  <?php do_action( 'woocommerce_cart_collaterals' ); ?>

  </div>
 */ ?>

<?php do_action('woocommerce_after_cart'); ?>
