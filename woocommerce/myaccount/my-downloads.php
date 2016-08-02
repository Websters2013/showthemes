<?php
/**
 * My Orders
 *
 * Shows recent orders on the account page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if ($downloads = WC()->customer->get_downloadable_products()) :
    ?>

    <?php do_action('woocommerce_before_available_downloads'); ?>

    <!-- checkout__available -->
    <div class="checkout__info checkout__available">
        <h4 class="checkout__subtitle"><?php echo apply_filters('woocommerce_my_account_my_downloads_title', __('Available downloads', 'woocommerce')); ?></h4>
        <?php foreach ($downloads as $download) : ?>
            <!-- checkout__available-wrap -->
            <div class="checkout__available-wrap">
                <?php
                do_action('woocommerce_available_download_start', $download);
                if (is_numeric($download['downloads_remaining']))
                    echo apply_filters('woocommerce_available_download_count', '<span class="count">' . sprintf(_n('%s download remaining', '%s downloads remaining', $download['downloads_remaining'], 'woocommerce'), $download['downloads_remaining']) . '</span> ', $download);
                echo apply_filters('woocommerce_available_download_link', '<a href="' . esc_url($download['download_url']) . '">' . $download['download_name'] . '</a>', $download);
                do_action('woocommerce_available_download_end', $download);
                ?>
            </div>
        <?php endforeach; ?>
        <!-- /checkout__available-wrap -->
    </div>
    <!-- /checkout__available -->
    <?php do_action('woocommerce_after_available_downloads'); ?>

<?php endif; ?>