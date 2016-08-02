<?php
spl_autoload_register('st_spl_autoload_register');

function st_spl_autoload_register($class_name) {
    if (strstr(strtolower($class_name), 'zendesk') !== false) {
        $class_name = str_replace('\\', '/', $class_name);
        require_once(get_template_directory() . "/lib/$class_name.php");
    }
}

use Zendesk\API\Client as ZendeskAPI;

require_once(get_template_directory() . '/lib/JWT.php');

function st_after_setup_theme() {
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));
    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'st_after_setup_theme');

function st_wp_title($title, $sep) {
    global $paged, $page;

    if (is_feed()) {
        return $title;
    }

    // Add the site name.
    $title .= get_bloginfo('name', 'display');

    // Add the site description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && ( is_home() || is_front_page() )) {
        $title = "$title $sep $site_description";
    }

    // Add a page number if necessary.
    if ($paged >= 2 || $page >= 2) {
        $title = "$title $sep " . sprintf(__('Page %s', 'showthemes'), max($paged, $page));
    }

    return $title;
}

add_filter('wp_title', 'st_wp_title', 10, 2);

add_action('init', 'st_init');

function st_init() {
    if (isset($_REQUEST['action'])) {
        switch ($_REQUEST['action']) {
            case 'zendesk-logout':
                wp_redirect(htmlspecialchars_decode(wp_logout_url()));
                die();
                break;
            case 'zendesk-login':
                if (is_user_logged_in()) {
                    $current_user = wp_get_current_user();
                    $user_data    = get_userdata($current_user->ID);
                    if ($user_data->caps['customer'] === true) {
                        $name         = $user_data->first_name . ' ' . $user_data->last_name;
                        $email        = $user_data->user_email;
                        $externalId   = $user->data->ID;
                        $organization = '';
                        $key          = ''; //get_option('woo_wzn_apikey');
                        $prefix       = get_option('woo_wzn_subdomain');
                        $now          = time();
                        $token        = array(
                            "jti"   => md5($now . rand()),
                            "iat"   => $now,
                            "name"  => $name,
                            "email" => $email
                        );
                        $return_url   = !empty($_REQUEST['return_url']) ? $_REQUEST['return_url'] : 'http://' . $prefix . '.zendesk.com/';
                        //include_once(get_template_directory() . "/JWT.php");
                        $jwt          = JWT::encode($token, $key);
                        //header("Location: https://" . $prefix . ".zendesk.com/access/jwt?jwt=" . $jwt . '&return_to=' . get_permalink(get_option('woocommerce_myaccount_page_id')));
                        header("Location: https://" . $prefix . ".zendesk.com/access/jwt?jwt=" . $jwt . '&return_to=' . $return_url);
                        die();
                    }
                }
                break;
        }
    }
}

add_action('wp_logout', 'st_wp_logout');

function st_wp_logout() {
    wp_redirect(get_permalink(get_option('woocommerce_myaccount_page_id')));
    exit();
}

add_filter('woocommerce_checkout_fields', 'st_woocommerce_checkout_fields', 100);

function st_woocommerce_checkout_fields($fields) {
    unset($fields['billing']['billing_phone']);
    unset($fields['order']['order_comments']);
    if (isset($fields['billing']['ss_wc_mailchimp_opt_in']))
        $fields['billing']['ss_wc_mailchimp_opt_in']['label'] = '<strong>Want to keep updated about our products?</strong><br/>';
    return $fields;
}

add_action('woocommerce_account_dashboard', 'st_woocommerce_order_items_table');

function st_woocommerce_order_items_table() {
    //echo '<a href="http://' . get_option('woo_wzn_subdomain') . '.zendesk.com">Go to Support Portal</a>';
    echo '<div class="support-portal-link"><a href="' . home_url() . '?action=zendesk-login">Go to Support Portal</a></div>';
}

add_action('woocommerce_account_dashboard', 'woocommerce_account_orders');

add_action('woocommerce_account_dashboard', 'st_woocommerce_dashboard');

function st_woocommerce_dashboard() {
    WCAM()->get_api_downloads_template();
    WCAM()->get_api_keys_template();
}

add_action('woocommerce_account_dashboard', 'woocommerce_account_edit_address');
remove_action('woocommerce_account_navigation', 'woocommerce_account_navigation');

add_action('restrict_manage_posts', 'st_restrict_manage_posts', 11);

function st_restrict_manage_posts() {
    global $typenow;

    if ($typenow == 'shop_order') {
        ?>
        <label for="billing-business">VAT Number</label>&nbsp;
        <input type="checkbox" id="billing-vat" name="billing-vat" value="1" <?php if (!empty($_GET['billing-vat']) && $_GET['billing-vat'] == 1) echo(' checked="checked"'); ?>" />
        <label for="billing-taxinvoice">Needs tax invoice</label>&nbsp;
        <input type="checkbox" id="billing-taxinvoice" name="billing-taxinvoice" value="1" <?php if (!empty($_GET['billing-taxinvoice']) && $_GET['billing-taxinvoice'] == 1) echo(' checked="checked"'); ?> />
        <label for="billing-country">Country</label>&nbsp;
        <select id="billing-country" name="billing-country" style="float:none;">
            <option value=""<?php if (empty($_GET['billing-country'])) echo(' selected="selected"'); ?>>--</option>
            <option value="uk"<?php if (!empty($_GET['billing-country']) && $_GET['billing-country'] == 'uk') echo(' selected="selected"'); ?>>UK</option>
            <option value="eu"<?php if (!empty($_GET['billing-country']) && $_GET['billing-country'] == 'eu') echo(' selected="selected"'); ?>>EU</option>
        </select>
        <label for="orders-export">Export</label>&nbsp;
        <input type="checkbox" id="orders-export" name="orders-export" value="1" />
        <?php
    }
}

function st_the_posts($orders, $query = false) {
    global $pagenow;
    global $typenow;
    global $wp_query;
    $new_orders = array();
    $filtering  = false;

    if ($pagenow == 'edit.php' && $typenow == 'shop_order') {

        if (!empty($_GET['billing-vat']) || !empty($_GET['billing-country']) || !empty($_GET['billing-taxinvoice'])) {
            $filtering = true;

            foreach ($orders as $order) {

                if (!empty($_GET['billing-vat'])) {
                    $order_vat = get_post_meta($order->ID, 'vat_number', true);
                    if (empty($order_vat))
                        continue;
                }
                if (!empty($_GET['billing-taxinvoice'])) {
                    $tax_invoice = get_post_meta($order->ID, 'billing-taxinvoice', true);
                    if (empty($tax_invoice))
                        continue;
                }
                if (!empty($_GET['billing-country'])) {
                    $order_customer_id = get_post_meta($order->ID, '_customer_user', true);
                    $customer_country  = strtolower(get_user_meta($order_customer_id, 'billing_country', true));

                    switch ($_GET['billing-country']) {
                        case 'uk':
                            if ($customer_country != 'gb')
                                continue 2;
                            break;
                        case 'eu':
                            if (!in_array($customer_country, array('at', 'be', 'bg', 'hr', 'cy', 'cz', 'dk', 'ee', 'fi', 'fr', 'de', 'gr', 'hu', 'ie', 'it', 'lv', 'lt', 'lu', 'mt', 'nl', 'pl', 'pt', 'ro', 'sk', 'si', 'es', 'se')))
                                continue 2;
                            break;
                    }
                }

                $new_orders[] = $order;
            }
        }
    }

    if (!isset($_GET['orders-export'])) {
        if ($filtering === true) {
            $wp_query->found_posts = count($new_orders);
            return $new_orders;
        } else
            return $orders;
    } else {
        if ($filtering == true) {
            $export_orders = $new_orders;
        } else {
            $export_orders = $orders;
        }
        $csv_handle = @fopen('php://output', 'w');

        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private", false);
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"report.csv\";");
        header("Content-Transfer-Encoding: binary");

        fputcsv($csv_handle, array('Order Number', 'First Name', 'Last Name', 'Country', 'Email', 'Order Amount', 'VAT'));
        foreach ($export_orders as $export_order) {
            $order = new WC_Order($export_order->ID);
            fputcsv($csv_handle, array($order->get_order_number(), $order->billing_first_name, $order->billing_last_name, WC()->countries->countries[$order->billing_country], $order->billing_email, $order->order_total, get_post_meta($export_order->ID, 'vat_number', true)));
        }
        fclose($csv_handle);
        die();
    }
}

add_filter('the_posts', 'st_the_posts');

function st_posts_clauses_request($sql_pieces) {
    global $pagenow;
    global $typenow;

    if ($pagenow == 'edit.php' && $typenow == 'shop_order') {
        if (!empty($_GET['orders-export']) || !empty($_GET['billing-vat']) || !empty($_GET['billing-country']))
            $sql_pieces['limits'] = '';
    }

    return $sql_pieces;
}

add_filter('posts_clauses_request', 'st_posts_clauses_request');

add_action('woocommerce_after_checkout_billing_form', 'st_woocommerce_after_checkout_billing_form');

function st_woocommerce_after_checkout_billing_form($checkout) {
    echo '<p class="form-row form-row form-row form-row-wide woocommerce-validated" id="billing-taxinvoice-alert_field"><label for="billing-taxinvoice-alert" class="">If you entered a VAT number, it must be valid (check it at <a href="http://ec.europa.eu/taxation_customs/vies/vatRequest.html" target="_blank">http://ec.europa.eu/taxation_customs/vies/vatRequest.html)</a> and must NOT include any punctuation mark or special symbol, otherwise VAT will be automatically charged to your purchase and you will not be entitled to a refund.</label></p>';

    woocommerce_form_field(
            'billing-taxinvoice', array(
        'type'     => 'checkbox',
        'class'    => array('form-row form-row-wide checkout__field_check'),
        'label'    => 'Do you need a tax invoice?',
        'required' => false
            ), $checkout->get_value('billing-taxinvoice')
    );
    woocommerce_form_field(
            'billing-agreeterms', array(
        'type'     => 'checkbox',
        'class'    => array('form-row form-row-wide checkout__field_check'),
        'label'    => 'Agree to <a target="_blank" href="' . home_url('terms') . '">Terms and conditions</a>',
        'required' => true
            ), $checkout->get_value('billing-agreeterms')
    );
}

add_action('woocommerce_checkout_update_order_meta', 'st_woocommerce_checkout_update_order_meta');

function st_woocommerce_checkout_update_order_meta($order_id) {
    update_post_meta($order_id, 'billing-taxinvoice', esc_attr($_POST['billing-taxinvoice']));
    update_post_meta($order_id, 'billing-agreeterms', esc_attr($_POST['billing-agreeterms']));
}

add_action('woocommerce_checkout_process', 'st_woocommerce_checkout_process');

function st_woocommerce_checkout_process() {
    global $woocommerce;

    if (empty($_POST['billing-agreeterms'])) {
        wc_add_notice('<strong>Agree to Terms and Conditions</strong> is a required field', 'error');
        //$woocommerce->add_error('<strong>Agree to Terms and Conditions</strong> is a required field');
    }
}

function st_wp_enqueue_scripts() {
    wp_enqueue_style('st-font', 'http://fonts.googleapis.com/css?family=Oswald:300,400,700');
    wp_enqueue_style('st-style', get_stylesheet_uri());
    wp_enqueue_style('st-swiper', get_template_directory_uri() . '/css/swiper.css');
    wp_enqueue_style('st-main', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_style('st-smart-pricing', get_template_directory_uri() . '/css/smart-pricing.css');
    wp_enqueue_style('st-animate', get_template_directory_uri() . '/css/animate.css');
    wp_enqueue_style('st-animations', get_template_directory_uri() . '/css/animations.css');
    wp_enqueue_style('mcustomscrollbar', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.css');
    wp_enqueue_style('mcustomscrollbar', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.css');
    wp_enqueue_style('jquery.cookiebar', get_template_directory_uri() . '/css/jquery.cookiebar.css');
    if (is_checkout) {
        wp_enqueue_style('st-select', get_template_directory_uri() . '/css/select.css');
    }

    /* if (is_checkout()) {
      wp_enqueue_script('st-checkout', get_template_directory_uri() . '/js/checkout.js', array('jquery', 'woocommerce', 'wc-country-select', 'wc-address-i18n', 'wc-checkout'), WC_VERSION, true);
      } */
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-2.1.3.min.js', false, true);
    wp_enqueue_script('iscroll', get_template_directory_uri() . '/js/iscroll.js', array('jquery'), true);
    wp_enqueue_script('jquery-mcustomscrollbar', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.concat.min.js', array('jquery'), false, true);
    wp_enqueue_script('tween-max', get_template_directory_uri() . '/js/tween-max.min.js', array('jquery'), false, true);
    wp_enqueue_script('jquery-hammer', get_template_directory_uri() . '/js/jquery.hammer.min.js', array('jquery'), false, true);
    wp_enqueue_script('jquery-slider', get_template_directory_uri() . '/js/jquery.slider.js', array('jquery'), false, true);
    wp_enqueue_script('isotop', get_template_directory_uri() . '/js/isotop.js', array('jquery'), false, true);
    wp_enqueue_script('swiper', get_template_directory_uri() . '/js/swiper.js', array('jquery'), false, true);
    wp_enqueue_script('jquery-main', get_template_directory_uri() . '/js/jquery.main.js', array('jquery'), false, true);
    wp_enqueue_script('wt-animate', get_template_directory_uri() . '/js/wt-animate.min.js', array('jquery'), false, true);
    wp_enqueue_script('jquery.cookiebar', get_template_directory_uri() . '/js/jquery.cookiebar.js', array('jquery'), false, true);
}

add_action('wp_enqueue_scripts', 'st_wp_enqueue_scripts');

add_action('groups_created_user_group', 'st_groups_created_user_group', 10, 2);
add_action('groups_updated_user_group', 'st_groups_created_user_group', 10, 2);

function st_groups_created_user_group($user_id, $group_id) {
    if ($group_id == 2) {
        $user_data = get_userdata($user_id);
        $subdomain = get_option('woo_wzn_subdomain');
        $username  = get_option('woo_wzn_apiuser');
        $token     = get_option('woo_wzn_apikey');
        $client    = new ZendeskAPI($subdomain, $username);
        $client->setAuth('token', $token);

        $clients = $client->users()->search(array('query' => $user_data->user_email));
        if (count($clients->users) > 0) {
            $client->user($clients->users[0]->id)->update(array(
                'tags' => 'support'
            ));
        }
    }
}

add_action('groups_deleted_user_group', 'st_groups_deleted_user_group', 10, 2);

function st_groups_deleted_user_group($user_id, $group_id) {
    if ($group_id == 2) {
        $user_data = get_userdata($user_id);
        $subdomain = get_option('woo_wzn_subdomain');
        $username  = get_option('woo_wzn_apiuser');
        $token     = get_option('woo_wzn_apikey');
        $client    = new ZendeskAPI($subdomain, $username);
        $client->setAuth('token', $token);

        $clients = $client->users()->search(array('query' => $user_data->user_email));
        if (count($clients->users) > 0) {
            $client->user($clients->users[0]->id)->update(array(
                'tags' => ''
            ));
        }
    }
}

function zendesk_api_call($url, $json, $action) {
    if (substr_count($url, '.json') == 0) {
        $url .= '.json';
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
    curl_setopt($ch, CURLOPT_URL, 'https://' . get_option('woo_wzn_subdomain') . '.zendesk.com/api/v2' . $url);
    curl_setopt($ch, CURLOPT_USERPWD, get_option('woo_wzn_apiuser') . '/token:' . get_option('woo_wzn_apikey'));

    switch ($action) {
        case "POST":
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            break;
        case "GET":
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            break;
        case "PUT":
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        default:
            break;
    }

    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $output  = curl_exec($ch);
    curl_close($ch);
    $decoded = json_decode($output);
    return is_null($decoded) ? $output : $decoded;
}

add_filter('woocommerce_notice_types', 'st_woocommerce_notice_types');

function st_woocommerce_notice_types($types) {
    global $pagename;

    if ($pagename == 'my-account')
        return array('error', 'notice', 'success');
    else
        return array('error');
}

/* * ************ STORE ************** */

//custome post type Testimonials
add_action('init', 'create_post_type_testimonials');

function create_post_type_testimonials() {
    register_post_type('testimonials', array(
        'labels'      => array(
            'name'               => __('Testimonials'),
            'singular_name'      => __('Testimonial'),
            'add_new'            => _x('Add New', 'Testimonial'),
            'add_new_item'       => __('Add New Testimonial'),
            'edit_item'          => __('Edit Testimonial'),
            'new_item'           => __('New Testimonial'),
            'view_item'          => __('View Testimonials'),
            'search_items'       => __('Search Testimonials'),
            'not_found'          => __('No Testimonials found'),
            'not_found_in_trash' => __('No Testimonials found in Trash'),
        ),
        'public'      => true,
        'has_archive' => false,
        'supports'    => array(
            'title',
            'editor',
            'thumbnail'
        )
            )
    );
}

// Hook into WordPress
add_action('admin_init', 'add_custom_metabox_testim');
add_action('save_post', 'save_custom_testim');

/**
 * Add meta box
 */
function add_custom_metabox_testim() {
    add_meta_box('custom-metabox', __('Testimonial Details'), 'testimonial_custom_metabox', 'testimonials', 'normal', 'high');
}

/**
 * Display the metabox
 */
function testimonial_custom_metabox() {
    global $post;
    $client   = get_post_meta($post->ID, 'client', true);
    ?>
    <p><label for="downmap">Client details :<br />
        </label><br />
        <?php
        wp_editor($client, 'client', $settings = array('textarea_name' => 'client', 'tinymce'       => true,
            'media_buttons' => false,));
        ?>
    </p>
    <?php
}

/**
 * Process the custom metabox fields
 */
function save_custom_testim($post_id) {
    global $post;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;

    if ($_POST) {
        update_post_meta($post->ID, 'client', $_POST['client']);
    }
}

/**
 * Get and return the values for the URL and description
 */
function get_worksop_dtls_box() {
    global $post;

    $client = get_post_meta($post->ID, 'client', true);



    return array($client);
}

function addthis_button_function() {

    $addthis = '<!-- AddThis Button BEGIN --><div class="addthis_toolbox addthis_default_style "><a class="addthis_button_facebook"></a><a class="addthis_button_twitter"></a><a class="addthis_button_linkedin"></a><a class="addthis_button_google_plusone_share"></a><a class="addthis_button_pinterest_share"></a><!--<a class="addthis_button_compact"></a>--></div>
<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-506d1c3c3f703902"></script><!-- AddThis Button END -->';
    return $addthis;
}

add_shortcode('addthisbuttons', 'addthis_button_function');

// Author in bio html
// Do NOT Remove This Line. This is to remove HTML stripping from Author Profile
remove_filter('pre_user_description', 'wp_filter_kses');
// Do NOT Remove This Line. This is to sanitize content for allowed HTML tags for post content
add_filter('pre_user_description', 'wp_filter_post_kses');

//add extra fields to category edit form hook
add_action('edit_category_form_fields', 'extra_category_fields');

//add extra fields to category edit form callback function
function extra_category_fields($tag) { //check for existing featured ID
    $t_id     = $tag->term_id;
    $cat_meta = get_option("category_$t_id");
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="cat_Image_url"><?php _e('Hexagon colour for channels'); ?></label></th>
        <td>
            <input type="text" name="Cat_meta[colour]" id="Cat_meta[colour]" size="3" style="width:60%;" value="<?php echo $cat_meta['colour'] ? $cat_meta['colour'] : ''; ?>"><br />
            <span class="description"><?php _e('Available colours: orange, yellow, green, brown, grey, black, pink, blue'); ?></span>
        </td>
    </tr>

    <?php
}

// delete Jetpack Og for Facebook
add_filter('jetpack_enable_opengraph', '__return_false', 99);

// save extra category extra fields hook
add_action('edited_category', 'save_extra_category_fileds');

// save extra category extra fields callback function
function save_extra_category_fileds($term_id) {
    if (isset($_POST['Cat_meta'])) {
        $t_id     = $term_id;
        $cat_meta = get_option("category_$t_id");
        $cat_keys = array_keys($_POST['Cat_meta']);
        foreach ($cat_keys as $key) {
            if (isset($_POST['Cat_meta'][$key])) {
                $cat_meta[$key] = $_POST['Cat_meta'][$key];
            }
        }
        //save the option array
        update_option("category_$t_id", $cat_meta);
    }
}

add_filter('the_author', 'guest_author_name');
add_filter('get_the_author_display_name', 'guest_author_name');

function guest_author_name($name) {
    global $post;

    $author = get_post_meta($post->ID, 'guest-author', true);

    if ($author)
        $name = $author;

    return $name;
}

//Open graph meta tags
function wpc_fb_opengraph() {
    ?>


    <meta property="og:description" content="<?php echo str_replace(' Read more', '', strip_tags(get_the_excerpt($post->ID))); ?>" />
    <meta name="description" content="<?php echo str_replace(' Read more', '', strip_tags(get_the_excerpt($post->ID))); ?>" />

    <?php
}

add_action('wp_head', 'wpc_fb_opengraph');

/* STORE */

if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name'          => 'Footer',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ));
}

function wpe_excerptlength_index($length) {
    return 160;
}

function wpe_excerptmore($more) {
    return '...<a href="' . get_permalink() . '">Read More ></a>';
}

function wpe_excerpt($length_callback = '', $more_callback = '') {
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

add_image_size('theme', 304, 233, true);

register_post_type('themes', array(
    'label'           => __('Themes'),
    'singular_label'  => __('Theme'),
    'public'          => true,
    'show_ui'         => true,
    'capability_type' => 'post',
    'hierarchical'    => false,
    'rewrite'         => true,
    'query_var'       => false,
    'has_archive'     => true,
    'supports'        => array('title', 'editor', 'thumbnail', 'page-attributes')
));

register_post_type('who-buys', array(
    'label'           => __('Who Buys'),
    'singular_label'  => __('Who Buys'),
    'public'          => true,
    'show_ui'         => true,
    'capability_type' => 'post',
    'hierarchical'    => false,
    'rewrite'         => true,
    'query_var'       => false,
    'has_archive'     => true,
    'supports'        => array('title', 'editor', 'thumbnail')
));

add_action('init', 'build_taxonomies', 0);

function build_taxonomies() {
    register_taxonomy('features', 'themes', array('hierarchical' => true, 'label' => 'Features', 'query_var' => true, 'rewrite' => true));
}

function event_manager_customize_register($wp_customize) {
    $wp_customize->add_section('event_manager_footer', array(
        'title'    => __('Footer', 'event_manager'),
        'priority' => 120,
    ));

    $wp_customize->add_setting('event_manager_theme_options[event_manager_copyright]', array(
        'default'    => '',
        'capability' => 'edit_theme_options',
        'type'       => 'option',
    ));

    $wp_customize->add_control('event_manager_copyright', array(
        'label'    => __('Copyright Message', 'event_manager'),
        'section'  => 'event_manager_footer',
        'settings' => 'event_manager_theme_options[event_manager_copyright]',
    ));
}

add_action('customize_register', 'event_manager_customize_register');

// ******************* Add Shortcodes ****************** //

function twoColumn($atts, $content = null) {
    extract(shortcode_atts(array(
        'last' => '',
                    ), $atts));

    if ($last == 'true') {
        $out = '
			<div class="column dual-column last">
				' . $content . '
			</div>
		';
    } else {
        $out = '
			<div class="column dual-column">
				' . $content . '
			</div>
		';
    }

    return $out;
}

add_shortcode('twoColumn', 'twoColumn');

function threeColumn($atts, $content = null) {
    extract(shortcode_atts(array(
        'last' => '',
                    ), $atts));

    if ($last == 'true') {
        $out = '
			<div class="column last">
				' . $content . '
			</div>
		';
    } else {
        $out = '
			<div class="column">
				' . $content . '
			</div>
		';
    }

    return $out;
}

add_shortcode('threeColumn', 'threeColumn');

add_filter('widget_text', 'do_shortcode');

/* * *********************************** */

add_filter('woocommerce_get_item_data', 'st_woocommerce_get_item_data', 11, 2);

function st_woocommerce_get_item_data($data, $cart_item) {
    if (isset($cart_item['bundled_by']) && isset($cart_item['stamp'])) {
        $data = false;
    }
    return $data;
}

function st_woocommerce_payment_successful_result($result, $order_id) {
    $user_id   = get_post_meta($order_id, '_customer_user', true);
    $user_data = get_userdata($user_id);
    if ($user_data->caps['customer'] === true) {
        $name               = $user_data->first_name . ' ' . $user_data->last_name;
        $email              = $user_data->user_email;
        $externalId         = $user->data->ID;
        $organization       = '';
        $key                = 'JAYcvD0UzSP4cZtHfWWG6gbj4E8VZ1CYL35s3BNGgVFh2Jpk'; //get_option('woo_wzn_apikey');
        $prefix             = get_option('woo_wzn_subdomain');
        $now                = time();
        $token              = array(
            "jti"   => md5($now . rand()),
            "iat"   => $now,
            "name"  => $name,
            "email" => $email
        );
        $jwt                = JWT::encode($token, $key);
        $result['redirect'] = "https://" . $prefix . ".zendesk.com/access/jwt?jwt=" . $jwt . '&return_to=' . get_permalink(get_option('woocommerce_myaccount_page_id'));
    }
    return $result;
}

add_filter('manage_edit-shop_order_columns', 'st_manage_edit_shop_order_columns', 11);

function st_manage_edit_shop_order_columns($columns) {
    return array_merge($columns, array('vat' => __('VAT', 'showthemes')));
}

add_action('manage_shop_order_posts_custom_column', 'st_manage_shop_order_posts_custom_column', 10, 2);

function st_manage_shop_order_posts_custom_column($column, $post_id) {
    if ($column == 'vat') {
        echo(get_post_meta($post_id, 'vat_number', true));
    }
}

/* taxamo extension: update invoice number in taxamo after order is completed */

include(get_template_directory() . '/lib/Taxamo.php');

add_action('woocommerce_order_status_completed', 'st_taxamo_update_transaction', 11, 1);

function st_taxamo_update_transaction($order_id) {
    try {
        $order                       = new WC_Order($order_id);
        $transaction_key             = get_post_meta($order_id, 'taxamo_transaction_key', true);
        $taxamo_options              = get_option('woocommerce_taxamo_settings');
        $taxamo                      = new Taxamo(new APIClient($taxamo_options['private_token'], 'https://api.taxamo.com'));
        $transaction                 = new Input_transaction();
        $transaction->invoice_number = $order->get_order_number();
        $taxamo->updateTransaction($transaction_key, array('transaction' => $transaction));
    } catch (Exception $exc) {
        
    }
}

function get_product_by_sku($sku) {
    global $wpdb;
    $product_id = $wpdb->get_var($wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_key='_sku' AND meta_value='%s' LIMIT 1", $sku));
    if ($product_id) {
        return new WC_Product($product_id);
    }
    return null;
}

add_filter('woocommerce_xero_line_item_account_code', 'st_woocommerce_xero_line_item_account_code', 10, 2);

function st_woocommerce_xero_line_item_account_code($account_code, $line_item) {
    //@wp_mail('simone@showthemes.com', 'debug xero', sprintf('%s', print_r($_REQUEST, true)));

    $ret = $account_code;
    if (!empty($_REQUEST)) {
        $order_id = 0;
        if (!empty($_REQUEST['post_ID'])) {
            $order_id = $_REQUEST['post_ID'];
        } else if (!empty($_REQUEST['custom'])) {
            $custom = json_decode(stripslashes($_REQUEST['custom']));
            if (isset($custom->order_id)) {
                $order_id = $custom->order_id;
            } else {
                $custom_unserialized = unserialize(stripslashes($_REQUEST['custom']));
                if (!empty($custom_unserialized)) {
                    $order_id = $custom_unserialized[0];
                }
            }
        }

        if ($order_id > 0) {
            $order           = new WC_Order($order_id);
            $billing_country = strtoupper(get_user_meta($order->customer_user, 'billing_country', true));
            $vat             = get_post_meta($order_id, 'vat_number', true);
            $eu_countries    = array('AT', 'BE', 'BG', 'HR', 'CY', 'CZ', 'DK', 'EE', 'FI', 'FR', 'DE', 'GR', 'HU', 'IE', 'IT', 'LV', 'LT', 'LU', 'MT', 'NL', 'PL', 'PT', 'RO', 'SK', 'SI', 'ES', 'SE');

            if ($billing_country == 'GB') {
                $ret = '204';
            } else if (in_array($billing_country, $eu_countries)) {
                if (!empty($vat)) {
                    $ret = '202';
                } else {
                    $ret = '203';
                }
            } else {
                $ret = '200';
            }
        }
    }
    return $ret;
}

function st_create_renewal_coupon($customer_email, $product_id, $expiry_date) {
    $coupon_code   = sprintf('%s_%s_%s_%s', $customer_email, $product_id, date('YmdHis'), rand());
    $amount        = '25';
    $discount_type = 'percent_product'; // Type: fixed_cart, percent, fixed_product, percent_product
    $coupon        = array(
        'post_title'   => $coupon_code,
        'post_content' => '',
        'post_status'  => 'publish',
        'post_author'  => 1,
        'post_type'    => 'shop_coupon'
    );
    $new_coupon_id = wp_insert_post($coupon);
    update_post_meta($new_coupon_id, 'discount_type', $discount_type);
    update_post_meta($new_coupon_id, 'coupon_amount', $amount);
    update_post_meta($new_coupon_id, 'individual_use', 'yes');
    update_post_meta($new_coupon_id, 'product_ids', $product_id);
    update_post_meta($new_coupon_id, 'exclude_product_ids', '');
    update_post_meta($new_coupon_id, 'usage_limit', '1');
    update_post_meta($new_coupon_id, 'expiry_date', $expiry_date);
    update_post_meta($new_coupon_id, 'apply_before_tax', 'yes');
    update_post_meta($new_coupon_id, 'free_shipping', 'no');
    update_post_meta($new_coupon_id, 'customer_email', $customer_email);
    update_post_meta($new_coupon_id, 'usage_limit_per_user', '1');

    return $coupon_code;
}

/* TODO */

function st_init_renewal() {
    global $woocommerce;
    $action = filter_input(INPUT_GET, 'renew-key');
    if (is_user_logged_in() && isset($action) && wp_verify_nonce($action, 'renew-key')) {
        $order_key     = filter_input(INPUT_GET, 'order_key');
        $license_email = filter_input(INPUT_GET, 'license_email');
        $product_id    = filter_input(INPUT_GET, 'product_id');
        if (!empty($order_key) && !empty($license_email) && !empty($product_id)) {
            $user_orders = WCAM()->helpers->get_users_data(get_current_user_id());
            // order exists and belongs to current logged user
            if ($user_orders && count($user_orders) > 0 && isset($user_orders[$order_key])) {
                foreach ($user_orders as $key => $data) {
                    if ($key == $order_key && $data['parent_product_id'] == $product_id) {
                        $order_data = $data;
                        break;
                    }
                }
                if (isset($order_data)) {
                    $download_id       = WCAM()->helpers->get_download_id($product_id);
                    $downloadable_data = WCAM()->helpers->get_downloadable_data($order_data['order_key'], $license_email, $product_id, $download_id);
                    // permission ended
                    if (!$downloadable_data || date_modify(date_create_from_format('Y-m-d H:i:s', $downloadable_data->access_expires), '-1 month') < new DateTime('now')) {
                        // add product to cart
                        $woocommerce->cart->add_to_cart($product_id);

                        // generate coupon IF NOT EXISTS a coupon for same user and same product
                        $user_coupons = get_posts(array(
                            'post_type'  => 'shop_coupon',
                            'meta_query' => array(
                                'relation' => 'AND',
                                array(
                                    'key'     => 'product_ids',
                                    'value'   => $product_id,
                                    'compare' => '='
                                ), array(
                                    'key'     => 'customer_email',
                                    'value'   => $license_email,
                                    'compare' => '='
                                )
                            )
                        ));
                        $coupon_code  = null;
                        if (count($user_coupons) == 0) { // if there are no coupons for user and product
                            $coupon_code = st_create_renewal_coupon($license_email, $product_id, date('Y-m-d', strtotime('+1 year')));
                        } else {
                            // cycle all coupons for user searching for a valid one
                            foreach ($user_coupons as $user_coupon) {
                                $coupon = new WC_Coupon(get_the_title($user_coupon->ID));
                                if ($coupon->is_valid()) {
                                    $coupon_code = get_the_title($user_coupon->ID);
                                    break;
                                }
                            }
                            // if no valid coupon found for user and product
                            if (!$coupon_code) {
                                $coupon_code = st_create_renewal_coupon($license_email, $product_id, date('Y-m-d', strtotime('+1 year')));
                            }
                        }

                        // add coupon
                        $woocommerce->cart->add_discount($coupon_code);
                    }
                }
            }
        }
    }
}

add_action('init', 'st_init_renewal');


add_action('woocommerce_add_to_cart', 'st_woocommerce_add_to_cart', 10, 6);

function st_woocommerce_add_to_cart($cart_item_key, $product_id, $quantity, $variation_id, $variation, $cart_item_data) {
    $remove_not_bundled = filter_input(INPUT_GET, 'remove_not_bundled');
    if (!empty($remove_not_bundled)) {
        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            if (!$cart_item['bundled_items'] && !$cart_item['bundled_by']) {
                WC()->cart->remove_cart_item($cart_item_key);
            }
        }
    }
}

/* function emb_wsafp_coupon_generate_code_promo_sponsor($coupon_id) {
  wp_delete_post($coupon_id, true);
  }

  add_action('wsafp_coupon_generate_code_promo_sponsor', 'emb_wsafp_coupon_generate_code_promo_sponsor');
 */

add_action('woocommerce_account_dashboard', 'emb_woocommerce_before_my_account', 1, 0);

function emb_woocommerce_before_my_account() {
    $user_id = get_current_user_id();
    if (st_customer_has_valid_license($user_id)) {
        $referral_coupon_id   = get_user_meta($user_id, 'referral_coupon_id', true);
        $referral_coupon_code = null;
        if (!empty($referral_coupon_id)) {
            $referral_coupon_code = get_the_title($referral_coupon_id);
        }
        ?>
        <div class="checkout__info referral-box">
            <h4 class="checkout__subtitle">Refer a friend and get our bundle</h4>
            <p>
                Generate a code to give your friend 20% discount. Enjoy the all theme bundle with all our Event WordPress Themes.
                <br/>
                See <a href="http://www.showthemes.com/terms">Terms</a>.
            </p>        
            <?php if (!empty($referral_coupon_id)) { ?>
                <span><?php echo $referral_coupon_code; ?></span>
            <?php } else { ?>
                <a href="<?php echo wp_nonce_url(sprintf('%s', get_permalink(get_option('woocommerce_myaccount_page_id'))), 'generate-referral-coupon', 'generate-referral-coupon'); ?>" title="Generate Referral Coupon" class="btn btn_red">Generate Referral Coupon</a>
            <?php } ?>
        </div>
        <?php
    }
}

function st_wc_order_is_editable($is_editable, $order) {
    if ($order->get_status() == 'completed') {
        $is_editable = true;
    }

    return $is_editable;
}

add_filter('wc_order_is_editable', 'st_wc_order_is_editable', 10, 2);

function st_init_referral_coupon() {
    $action  = filter_input(INPUT_GET, 'generate-referral-coupon');
    $user_id = get_current_user_id();
    if (st_customer_has_valid_license($user_id)) {
        if (is_user_logged_in() && isset($action) && wp_verify_nonce($action, 'generate-referral-coupon')) {
            $coupon_code        = null;
            $user_id            = get_current_user_id();
            $referral_coupon_id = get_user_meta($user_id, 'referral_coupon_id', true);

            if (empty($referral_coupon_id)) { // if there are no referral coupons for user
                $coupon_code   = sprintf('REF_%s_%s_%s', $user_id, date('YmdHis'), rand());
                $amount        = '20';
                $discount_type = 'percent_product';
                $coupon        = array(
                    'post_title'   => $coupon_code,
                    'post_content' => '',
                    'post_status'  => 'publish',
                    'post_author'  => 1,
                    'post_type'    => 'shop_coupon'
                );
                $new_coupon_id = wp_insert_post($coupon);
                update_post_meta($new_coupon_id, 'discount_type', $discount_type);
                update_post_meta($new_coupon_id, 'coupon_amount', $amount);
                update_post_meta($new_coupon_id, 'individual_use', 'yes');
                update_post_meta($new_coupon_id, 'exclude_product_ids', '');
                update_post_meta($new_coupon_id, 'apply_before_tax', 'yes');
                update_post_meta($new_coupon_id, 'free_shipping', 'no');
                update_post_meta($new_coupon_id, 'usage_limit_per_user', '1');
                update_post_meta($new_coupon_id, 'referral_user_id', $user_id);

                update_user_meta($user_id, 'referral_coupon_id', $new_coupon_id);
            }
        }
    }
}

add_action('init', 'st_init_referral_coupon');

function st_check_referral_coupon_used($order_id) {
    try {
        $order            = new WC_Order($order_id);
        $used_coupons     = $order->get_used_coupons();
        $referral_user_id = null;
        if (count($used_coupons) > 0) {
            foreach ($used_coupons as $used_coupon) {
                $coupon = new WC_Coupon($used_coupon);
                if ($coupon) {
                    $referral_user_id = get_post_meta($coupon->id, 'referral_user_id', true);
                    break;
                }
            }
            if (!empty($referral_user_id)) {
                wp_mail('support@showthemes.com', 'Referral coupon used', "User ID: $referral_user_id");
            }
        }
    } catch (Exception $exc) {
        
    }
}

add_action('woocommerce_order_status_completed', 'st_check_referral_coupon_used', 11, 1);

function st_woocommerce_applied_coupon($coupon_code) {
    $coupon = new WC_Coupon($coupon_code);
    if ($coupon) {
        $referral_user_id = get_post_meta($coupon->id, 'referral_user_id', true);
        if (!empty($referral_user_id) && is_user_logged_in()) {
            WC()->cart->remove_coupon($coupon_code);
        }
    }
}

add_action('woocommerce_applied_coupon', 'st_woocommerce_applied_coupon');

function st_customer_has_valid_license($user_id) {
    // checks if customer has at least one valid license
    $ret         = false;
//    $user_orders = WCAM()->helpers->get_users_data($user_id);
    if (!empty($user_orders)) {
        foreach ($user_orders as $order_key => $data) {
            $post_id           = $data['parent_product_id'];
            $order_id          = $data['order_id'];
            $product_id        = $data['parent_product_id'];
            $download_id       = WCAM()->helpers->get_download_id($post_id);
            $downloadable_data = WCAM()->helpers->get_downloadable_data($data['order_key'], $data['license_email'], $post_id, $download_id);
            if (is_object($downloadable_data)) {
                $access_expires = $downloadable_data->access_expires;
                if ($access_expires > 0 && strtotime($access_expires) > current_time('timestamp')) {
                    $ret = true;
                    break;
                }
            }
        }
    }

    return $ret;
}

// ******* send vat number to xero contact entity after order is completed **********

include(get_template_directory() . '/lib/Xero/lib/XeroOAuth.php');

function st_xero_persist_session($response) {
    if (isset($response)) {
        $_SESSION['xero_access_token']       = $response['xero_oauth_token'];
        $_SESSION['xero_oauth_token_secret'] = $response['xero_oauth_token_secret'];
        if (isset($response['xero_oauth_session_handle']))
            $_SESSION['xero_session_handle']     = $response['xero_oauth_session_handle'];
    } else {
        return false;
    }
}

function st_xero_retrieve_session() {
    if (isset($_SESSION['xero_access_token'])) {
        $response['xero_oauth_token']          = $_SESSION['xero_access_token'];
        $response['xero_oauth_token_secret']   = $_SESSION['xero_oauth_token_secret'];
        $response['xero_oauth_session_handle'] = $_SESSION['xero_session_handle'];
        return $response;
    } else {
        return false;
    }
}

function st_update_xero_vat_number($order_id) {
    try {
        $vat_number      = get_post_meta($order_id, 'vat_number', true);
        $xero_invoice_id = get_post_meta($order_id, '_xero_invoice_id', true);
        if (!empty($xero_invoice_id) && !empty($vat_number)) {
            $signatures = array(
                'consumer_key'    => get_option('wc_xero_consumer_key'),
                'shared_secret'   => get_option('wc_xero_consumer_secret'),
                'rsa_private_key' => get_option('wc_xero_private_key'),
                'rsa_public_key'  => get_option('wc_xero_public_key'),
                'core_version'    => '2.0',
                'payroll_version' => '1.0',
                'file_version'    => '1.0'
            );

            $XeroOAuth    = new XeroOAuth(array_merge(array(
                        'application_type' => 'Private',
                        'oauth_callback'   => 'oob',
                        'user_agent'       => 'Showthemes Web Procedure'
                            ), $signatures));
            /* $initialCheck = $XeroOAuth->diagnostics();
              var_dump($initialCheck); */
            $session      = st_xero_persist_session(array(
                'xero_oauth_token'          => $XeroOAuth->config['consumer_key'],
                'xero_oauth_token_secret'   => $XeroOAuth->config['shared_secret'],
                'xero_oauth_session_handle' => ''
            ));
            $oauthSession = st_xero_retrieve_session();
            if (isset($oauthSession ['xero_oauth_token'])) {
                $XeroOAuth->config ['access_token']        = $oauthSession ['xero_oauth_token'];
                $XeroOAuth->config ['access_token_secret'] = $oauthSession ['xero_oauth_token_secret'];

                // search Invoice by ID
                $response = $XeroOAuth->request('GET', $XeroOAuth->url('Invoices/' . $xero_invoice_id, 'core'), array());
                if ($XeroOAuth->response['code'] == 200) {
                    $invoices = $XeroOAuth->parseResponse($XeroOAuth->response['response'], $XeroOAuth->response['format']);
                    if ($invoices && !empty($invoices->Invoices)) {
                        if ($invoices->Invoices[0]->Invoice && $invoices->Invoices[0]->Invoice->Contact && $invoices->Invoices[0]->Invoice->Contact->ContactID) {
                            $contact_xml      = "<Contacts>
                      <Contact>
                        <TaxNumber>$vat_number</TaxNumber>
                     </Contact>
                   </Contacts>";
                            $response_contact = $XeroOAuth->request('POST', $XeroOAuth->url('Contacts/' . $invoices->Invoices[0]->Invoice->Contact->ContactID, 'core'), array(), $contact_xml);
                        }
                    }
                }
            }
        }
    } catch (Exception $exc) {
        
    }
}

add_action('woocommerce_order_status_completed', 'st_update_xero_vat_number', 100);

//st_update_xero_vat_number(13346);
// *****************************************************************************

add_filter('gform_validation_1', 'st_gform_validation_support');

function st_gform_validation_support($validation_result) {
    $form = $validation_result['form'];

    foreach ($form['fields'] as &$field) {
        if ($field->adminLabel == 'registered_email' && $field['pageNumber'] == GFFormDisplay::get_source_page($form['id'])) {
            $registered_email = rgpost("input_$field->id");
            $user             = get_user_by('email', $registered_email);
            if ($user) {
                $has_valid_license = st_customer_has_valid_license($user->ID);
                if (!$has_valid_license) {
                    $field->failed_validation      = true;
                    $field->validation_message     = "You do not have an active license. Please refer to our <a href='http://www.showthemes.com/showthemes-faqs/#renew' target='_blank'>FAQ</a> to renew your license.";
                    $validation_result['is_valid'] = false;
                }
            } else {
                $field->failed_validation      = true;
                $field->validation_message     = "No existing user with this email: $registered_email";
                $validation_result['is_valid'] = false;
            }
            break;
        }
    }

    $validation_result['form'] = $form;
    return $validation_result;
}

add_action('init', 'st_get_themes_ads');

function st_get_themes_ads() {
    $action = filter_input(INPUT_GET, 'action');
    if (!empty($action) && $action == 'get_themes_ads') {
        $themes = get_posts(array(
            'post_type'      => 'themes',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'orderby'        => 'menu_order',
            'order'          => 'ASC'
        ));
        if (!empty($themes)) {
            $ret = array(
                'themes' => array()
            );
            foreach ($themes as $theme) {
                $ret['themes'][] = array(
                    'name'    => $theme->post_title,
                    'picture' => get_field('ad_image', $theme->ID),
                    'url'     => get_field('ad_link', $theme->ID)
                );
            }
            echo json_encode($ret);
            die;
        }
    }
}
