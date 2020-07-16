<?php

/**
 * Plugin Name: ClearSale
 * Description: Fraud Control for Woocommerce.
 * Author:      ClearSale
 * Author URI:  mailto:support@clear.sale
 * Plugin URI:  http://www.clear.sale
 * Version:     1.1.20
 * Text Domain: clearsale-usa
 * Domain Path: /languages/
 * Copyright:   © 2019 ClearSale
 */
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('WC_Clearsale_usa')):

    /**
     * WooCommerce WC_Clearsale main class.
     */
    class WC_Clearsale_usa
{

        const CS_USA_VERSION = '1.1.20';

        protected static $instance = null;

        private function __construct()
    {
            // Load plugin text domain
            add_action('init', array($this, 'load_plugin_textdomain'));
            add_action('admin_menu', array($this, 'register_menu_page'));
            add_action('admin_init', array($this, 'register_settings'));
            //add_action('wp_footer', array($this, 'insert_mapper'));
            //add_action('woocommerce_thankyou', array($this, 'insert_js_fingerprint'));
            add_action('woocommerce_process_shop_order_meta', array($this, 'insert_order_clearsale'));
            add_action('woocommerce_new_order', array($this, 'insert_order_clearsale'));
            add_action('woocommerce_order_status_changed', array($this, 'insert_order_clearsale'));
            add_action('woocommerce_admin_order_data_after_order_details', array($this, 'clearsale_show_result'));
            add_action('wp_ajax_usaconsult', array($this, 'clearsale_usa_consult'));
            add_action('init', array($this, 'register_approved_cs_order_status'));
            add_filter('plugin_action_links_' . plugin_basename(__FILE__), array($this, 'plugin_action_links'));
            add_filter('wc_order_statuses', array($this, 'add_approved_cs_to_order_statuses'));
        }

        public function register_approved_cs_order_status()
    {
            $args = array(
                'label' => _x('Approved by ClearSale', 'Order Status', 'woocommerce'),
                'label_count' => _n_noop('Approved by ClearSale (%s)', ' (%s)', 'woocommerce'),
                'public' => true,
                'show_in_admin_all_list' => true,
                'show_in_admin_status_list' => true,
                'exclude_from_search' => false,
            );
            register_post_status('wc-approved-cs', $args);
        }

        public function add_approved_cs_to_order_statuses($order_statuses)
    {
            $new_order_statuses = array();

            foreach ($order_statuses as $key => $status) {
                $new_order_statuses[$key] = $status;

                if ('wc-processing' === $key) {
                    $new_order_statuses['wc-approved-cs'] = 'Approved by ClearSale';
                }
            }

            return $new_order_statuses;
        }

        public function clearsale_add_query_vars($vars)
    {
            $vars[] = "clearsale-usa";
            return $vars;
        }

        public function clearsale_my_template($template)
    {
            global $wp_query;

            if (!isset($wp_query->query['clearsale-usa'])) {
                return $template;
            }

            // .. otherwise,
            if ($wp_query->query['clearsale-usa'] == 'integration') {
                integration();
                exit;
            }

            return $template;
        }

        /**
         * Return an instance of this class.
         *
         * @return object A single instance of this class.
         */
        public static function get_instance()
    {
            // If the single instance hasn't been set, set it now.
            if (null == self::$instance) {
                self::$instance = new self;
            }

            return self::$instance;
        }

        public function add_dashboard()
    {
            wp_add_dashboard_widget('cs_dashboard', 'ClearSale', array($this, 'dashboard_function'));
        }

        public function dashboard_function()
    {
            require_once plugin_dir_path(__FILE__) . 'libs/Dashboard.php';
        }

        public function insert_js_fingerprint($order_id)
    {

            $app_id = get_option('wc_clearsale_usa_app_id');
            $s_id = session_id();
            if (empty($s_id)) {
                session_start();
            }

            echo "<script>
	                    (function (a, b, c, d, e, f, g)
	                    { a['CsdpObject'] = e; a[e] = a[e] || function () { (a[e].q = a[e].q || []).push(arguments) },
	                    a[e].l = 1 * new Date(); f = b.createElement(c), g = b.getElementsByTagName(c)[0];
	                    f.async = 1; f.src = d; g.parentNode.insertBefore(f, g) })
	                    (window, document, 'script', '//device.clearsale.com.br/p/fp.js', 'csdp');
	                    csdp('app', '" . $app_id . "');
	                    csdp('sessionid', '" . session_id() . "');
			        </script>";
        }

        public function insert_js_mapper()
    {

            $app_id = get_option('wc_clearsale_usa_app_id');
            if (!is_admin()) {
                echo "<script>
	                        (function (a, b, c, d, e, f, g) {
	                                a['CsdmObject'] = e; a[e] = a[e] || function () {
	                                        (a[e].q = a[e].q || []).push(arguments)
	                                }, a[e].l = 1 * new Date(); f = b.createElement(c),
	                                g = b.getElementsByTagName(c)[0]; f.async = 1; f.src = d; g.parentNode.insertBefore(f, g)
	                        })(window, document, 'script', '//device.clearsale.com.br/m/cs.js', 'csdm');
	                        csdm('app', '" . $app_id . "');
	                    </script>";
            }
        }

        public function clearsale_show_result()
    {
            global $theorder, $wpdb;
            $gates = WC()->payment_gateways->payment_gateways();
            $status = array(
                'APA' => __('Automatic Approval', 'clearsale-usa'),
                'APM' => __('Manual Approval', 'clearsale-usa'),
                'RPM' => __('Denied without prejudice', 'clearsale-usa'),
                'AMA' => __('Manual Analysis', 'clearsale-usa'),
                'ERR' => __('Error', 'clearsale-usa'),
                'NVO' => __('New Order', 'clearsale-usa'),
                'SUS' => __('Fraud Suspicion', 'clearsale-usa'),
                'CAN' => __('Customer asked for cancellation', 'clearsale-usa'),
                'FRD' => __('Confirmed Fraud', 'clearsale-usa'),
                'RPA' => __('Automatically Denied', 'clearsale-usa'),
                'RPP' => __('Denied by Policy', 'clearsale-usa'),
            );

            $table_name = $wpdb->prefix . 'clearsale_usa';
        }

        public function clearsale_usa_consult()
    {
            $order_id = $_REQUEST['post'];
            $order = WC_Clearsale_usa::consult_order($order_id, true, false);
            if (!empty($order)):
                $retorno = array(
                    'id' => $order->ID,
                    'status' => $order->Status,
                    'score' => $order->Score,
                );
                echo json_encode($retorno);
                wp_die();
            else:
                $result = WC_Clearsale_usa::get_result_clearsale($order_id);
                echo json_encode($result);
                wp_die();
            endif;
        }

        public function insert_mapper_metatag()
    {
            $page = '';

            if (is_product_category()) {
                $page = 'category';
            }
            if (is_product()) {
                $page = 'product';
                $name = $GLOBALS['wp']->query_vars['product'];
            }
            if (is_cart()) {
                $page = 'cart';
            }
            if (is_checkout()) {
                $page = 'checkout';
            }
            if (is_account_page()) {
                $page = 'edit-account';
            }
            if (is_front_page()) {
                $page = 'home';
            }

            if (!empty($page)) {
                echo "<meta name=\"cs:page\" content=\"$page\">";
            }

            if (isset($name)) {
                echo "<meta name=\"cs:description\" content=\"name=$name\">";
            }
        }

        public function insert_mapper()
    {
            WC_Clearsale_usa::insert_js_mapper();
            WC_Clearsale_usa::insert_mapper_metatag();
        }

        public function insert_order_clearsale($order_id)
    {
            try {
                WC_Clearsale_usa::write_log('Insert order to integrate :' . $order_id, 'IntegrationSend');
                global $wpdb;
                $s_id = session_id();
                if (empty($s_id)) {
                    session_start();
                }

                $db_order_id = $wpdb->get_row("SELECT order_id FROM " . $wpdb->prefix . 'clearsale_usa WHERE order_id = ' . $order_id);
                if (empty($db_order_id)) {
                    $wpdb->insert($wpdb->prefix . 'clearsale_usa', array('order_id' => $order_id, 'session_id' => session_id()));
                }

            } catch (Exception $e) {
                WC_Clearsale_usa::write_log($e->getMessage(), 'IntegrationSend');
            }
        }

        public function get_all_order_comments($order_id)
    {
            remove_filter('comments_clauses', array('WC_Comments', 'exclude_order_comments'));

            $comments = get_comments(array(
                'post_id' => $order_id,
                'approve' => 'approve',
                'type' => '',
            ));

            add_filter('comments_clauses', array('WC_Comments', 'exclude_order_comments'));

            return $comments;
        }

        public function consult_order($order_id, $return = false, $verifymethod = true)
    {
            require_once plugin_dir_path(__FILE__) . 'libs/clearsale.php';
            require_once plugin_dir_path(__FILE__) . 'libs/clearsale_order.php';

            global $wpdb;
            $gates = WC()->payment_gateways->payment_gateways();

            $order = new WC_Order($order_id);

            $order_notes = WC_Clearsale_usa::get_all_order_comments($order_id);

            foreach ($order_notes as $order_note) {
                if (preg_match('/AVS/', $order_note->comment_content)) {
                    $o_note = $order_note->comment_content;
                }

            }

            if (!isset($o_note)) {
                $o_note = '';
            }

            WC_Clearsale_usa::write_log($o_note, 'CS_Note');

            if ((WC_Clearsale_usa::verifyMethod($order->get_payment_method()) && (get_post_status($order->get_id()) == 'wc-processing' || get_post_status($order->get_id()) == 'wc-on-hold')) || !$verifymethod):
                $session_id = $wpdb->get_row("SELECT session_id FROM " . $wpdb->prefix . 'clearsale_usa WHERE order_id = ' . $order_id);
                $session_id = $session_id->session_id;
                $cs_o = new ClearSale_Order();
                $cs_order = $cs_o->prepare_order($order, $session_id, $o_note);

                WC_Clearsale_usa::write_log($cs_order, 'IntegrationSend');

                $api_key = get_option('wc_clearsale_usa_api_key');
                $environment = get_option('wc_clearsale_usa_environment');

                $Clearsale = new Clearsale($api_key, $environment);
                WC_Clearsale_usa::write_log($Clearsale, 'IntegrationSend');

                $order_sended = $Clearsale->sendOrder($cs_order);
                WC_Clearsale_usa::write_log($order_sended, 'IntegrationSend');

                if (isset($order_sended->Orders[0]->ID)) {
                    $wpdb->update(
                        $wpdb->prefix . 'clearsale_usa',
                        array(
                            'cls_status' => $order_sended->Orders[0]->Status,
                            'score' => $order_sended->Orders[0]->Score,
                            'pc_status' => 'sent',
                        ),
                        array('order_id' => $order_id)
                    );
                    if ($order_sended->Orders[0]->Status == 'RPM' || $order_sended->Orders[0]->Status == 'CAN' || $order_sended->Orders[0]->Status == 'SUS' || $order_sended->Orders[0]->Status == 'FRD') {
                        $orderWC = new WC_Order($order_id);

                        if (!get_option('wc_clearsale_usa_passivemode')) {
                            $orderWC->set_status(get_option('wc_clearsale_usa_reproved_clearsale'));
                        }

                        $orderWC->add_order_note('This order has been reproved by ClearSale', 0, false);

                        $orderWC->save();
                    } else if ($order_sended->Orders[0]->Status == 'APA' || $order_sended->Orders[0]->Status == 'APM') {
                    $orderWC = new WC_Order($order_id);

                    if (!get_option('wc_clearsale_usa_passivemode')) {
                        $orderWC->set_status(get_option('wc_clearsale_usa_approved_clearsale'));
                    }

                    $orderWC->add_order_note('This order has been approved by ClearSale', 0, false);

                    $orderWC->save();
                } else if ($order_sended->Orders[0]->Status == 'AMA' || $order_sended->Orders[0]->Status == 'NVO') {
                $orderWC = new WC_Order($order_id);

                if (!get_option('wc_clearsale_usa_passivemode')) {
                    $orderWC->set_status(get_option('wc_clearsale_usa_analysing_clearsale'));
                }

                $orderWC->save();
            }
            if ($return) {
                return $order_sended->Orders[0];
            }
        } else {
            if (isset($order_sended->ModelState->ErrorMessage)) {
                foreach ($order_sended->ModelState->ErrorMessage as $message) {
                    if ($message == 'Order already exists – not set as reanalysis') {
                        echo 'Exists<br />';

                        $wpdb->update(
                            $wpdb->prefix . 'clearsale_usa',
                            array(
                                'cls_status' => 'AMA',
                                'score' => '0.0',
                                'pc_status' => 'sent',
                            ),
                            array('order_id' => $order_id)
                        );
                    }
                }
            }
        }
        endif;
    }

    public function get_result_clearsale($order_id)
    {
        global $wpdb;
        require_once plugin_dir_path(__FILE__) . 'libs/clearsale.php';
        require_once plugin_dir_path(__FILE__) . 'libs/clearsale_order.php';

        $api_key = get_option('wc_clearsale_usa_api_key');
        $environment = get_option('wc_clearsale_usa_environment');

        $Clearsale = new Clearsale($api_key, $environment);

        $table_name = $wpdb->prefix . 'clearsale_usa';

        $orders[] = $order_id;

        $cs_status = $Clearsale->getClearsaleOrderStatus($orders);
        WC_Clearsale_usa::write_log('Get', $cs_status);

        if (!empty($cs_status)) {
            foreach ($cs_status->Orders as $order) {
                $status = 'pendente';
                if ($order->Status != 'AMA' && $order->Status != 'NVO') {
                    if ($order->Status == 'ERR') {
                        $status = 'erro';
                    } else {
                        $status = 'ok';
                    }
                }
                $arrayToUpdate = array(
                    'cls_status' => $order->Status,
                    'score' => $order->Score,
                    'pc_status' => $status,
                );
                $wpdb->update($table_name, $arrayToUpdate, array('order_id' => $order->ID));

                return array('id' => $order->ID, 'status' => $order->Status, 'score' => $order->Score);
            }
        }
    }

    public function write_log($data, $suffix = '')
    {
        if (get_option('wc_clearsale_usa_debug')) {
            if (!empty($suffix)) {
                $suffix = '-' . $suffix;
            }

            $nome = date('d-m-Y') . "-ClearSaleLog" . $suffix . ".txt";
            $arq = fopen(plugin_dir_path(__FILE__) . 'logs/' . $nome, 'a');
            fwrite($arq, date('H:i:s') . ' - ');
            fwrite($arq, print_r($data, true));
            fwrite($arq, PHP_EOL);
            fclose($arq);
        }
    }

    /**
     * Get templates path.
     *
     * @return string
     */
    public static function get_templates_path()
    {
        return plugin_dir_path(__FILE__) . 'templates/';
    }

    /**
     * Load the plugin text domain for translation.
     */
    public function load_plugin_textdomain()
    {
        $locale = apply_filters('plugin_locale', get_locale(), 'clearsale-usa');

        load_textdomain('clearsale-usa', trailingslashit(WP_LANG_DIR) . 'clearsale-usa/clearsale-usa-' . $locale . '.mo');
        load_plugin_textdomain('clearsale-usa', false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }

    /**
     * Register plugin settings.
     */
    public function register_settings()
    {
        register_setting('clearsale-usa-settings', 'wc_clearsale_usa_api_key');
        register_setting('clearsale-usa-settings', 'wc_clearsale_usa_client_id');
        register_setting('clearsale-usa-settings', 'wc_clearsale_usa_client_secret');
        register_setting('clearsale-usa-settings', 'wc_clearsale_usa_app_id');
        register_setting('clearsale-usa-settings', 'wc_clearsale_usa_methods');
        register_setting('clearsale-usa-settings', 'wc_clearsale_usa_consult_freq');
        register_setting('clearsale-usa-settings', 'wc_clearsale_usa_birth_field');
        register_setting('clearsale-usa-settings', 'wc_clearsale_usa_environment');
        register_setting('clearsale-usa-settings', 'wc_clearsale_usa_debug');
        register_setting('clearsale-usa-settings', 'wc_clearsale_usa_passivemode');
        register_setting('clearsale-usa-settings', 'wc_clearsale_usa_reproved_clearsale');
        register_setting('clearsale-usa-settings', 'wc_clearsale_usa_approved_clearsale');
        register_setting('clearsale-usa-settings', 'wc_clearsale_usa_analysing_clearsale');
    }

    /**
     * Verify if the method will consult ClearSale
     */
    public function verifyMethod($method)
    {
        $methods = get_option('wc_clearsale_usa_methods');
        if ($methods && in_array($method, $methods)) {
            return true;
        }

        return false;
    }

    public function plugin_action_links($links)
    {
        $plugin_links = array();

        $plugin_links[] = '<a href="' . esc_url(admin_url('admin.php?page=clearsale-usa/includes/views/admin/config-admin.php')) . '">' . __('Settings', 'clearsale-usa') . '</a>';

        return array_merge($plugin_links, $links);
    }

    public function verifyCardType($card_type)
    {
        $card_type = strtolower($card_type);
        if (preg_match('/diners/', $card_type) || $card_type == '1') {
            return 1;
        }

        if (preg_match('/master/', $card_type) || $card_type == '2') {
            return 2;
        }

        if (preg_match('/visa/', $card_type) || $card_type == '3') {
            return 3;
        }

        if (preg_match('/amex/', $card_type) ||
            preg_match('/americanexpress/', $card_type) ||
            preg_match('/american express/', $card_type) ||
            $card_type == '5') {
            return 5;
        }

        if (preg_match('/hiper/', $card_type) || $card_type == '6') {
            return 6;
        }

        if (preg_match('/aura/', $card_type) || $card_type == '7') {
            return 7;
        }

        if (preg_match('/carrefour/', $card_type) || $card_type == '8') {
            return 8;
        }

        return 4;
    }

    public function integration_send()
    {
        $api_key = get_option('wc_clearsale_usa_api_key');

        if ($_GET['apikey'] == $api_key) {
            try
            {
                echo 'begin send<br />';
                global $wpdb;
                require_once plugin_dir_path(__FILE__) . 'libs/clearsale.php';
                require_once plugin_dir_path(__FILE__) . 'libs/clearsale_order.php';

                $environment = get_option('wc_clearsale_usa_environment');

                $gates = WC()->payment_gateways->payment_gateways();

                echo 'step 1 <br />';

                $Clearsale = new Clearsale($api_key, $environment);

                $table_name = $wpdb->prefix . 'clearsale_usa';

                $page = 0;
                $page_qtd = 100;

                $order_ids = $wpdb->get_col("
					SELECT  order_id
					FROM    $table_name
					WHERE   pc_status = 'pendente'
					LIMIT   " . $page * $page_qtd . ", $page_qtd;");

                echo 'step 2 <br />';

                echo 'step 3 <br />';

                echo 'Selected Gateways: ' . json_encode(get_option('wc_clearsale_usa_methods'));

                // Envio dos pedidos
                foreach ($order_ids as $order_id) {
                    if (!empty($order_id) && $order_id != '') {
                        echo 'step 4 <br />';

                        try
                        {
                            echo 'ID ' . $order_id . ' <br />';
                            $order = new WC_Order($order_id);
                            echo 'ID ' . $order_id . ' OK: <br />';
                            //var_dump($order);
                            // echo 'JSON-> '.json_encode($order).' <br />';
                        } catch (Exception $ex) {
                            echo 'ERROR -> ' . $ex->getMessage() . ' <br />';
                            WC_Clearsale_usa::not_send_order($order_id);
                            WC_Clearsale_usa::write_log($ex->getMessage(), 'IntegrationSend');
                        }

                        echo 'Gateway: ' . $order->get_payment_method() . ' <br />';
                        echo 'TransactionID: ' . $order->get_transaction_id() . ' <br />';

                        if (WC_Clearsale_usa::verifyMethod($order->get_payment_method())):
                            $orderStatus = get_post_status($order->get_id());
                            echo 'step 5 -> OrderStatus: ' . $orderStatus . '<br />';
                            $retorno = WC_Clearsale_usa::consult_order($order_id);
                            if ($retorno == null) {
                                $begin_date = new DateTime($order->get_date_created());
                                $end_date = new DateTime(date("Y-m-d H:i:s"));
                                $end_date = $end_date->sub(new DateInterval('P1D'));
                                if ($begin_date < $end_date || $orderStatus == 'wc-failed' || $orderStatus == 'wc-cancelled') {
                                    echo 'step not send <br />';
                                    WC_Clearsale_usa::not_send_order($order_id);
                                }
                            }
                            var_dump($retorno);
                            echo 'step 6 <br />';
                        else:
                            echo 'step not send <br />';
                            WC_Clearsale_usa::not_send_order($order_id);
                        endif;
                    }
                }
                WC_Clearsale_usa::write_log('Orders: ' . json_encode($order_ids), 'IntegrationSend');

                echo 'send end <br />';
            } catch (Exception $e) {
                echo $e->getMessage();
                WC_Clearsale_usa::write_log($e->getMessage(), 'IntegrationSend');
            }
        }
    }

    public function not_send_order($order_id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'clearsale_usa';
        $wpdb->delete($table_name, array('order_id' => $order_id));
    }

    public function integration_get()
    {
        $api_key = get_option('wc_clearsale_usa_api_key');

        if ($_GET['apikey'] == $api_key) {
            try {
                echo 'begin GET<br />';
                global $wpdb;
                require_once plugin_dir_path(__FILE__) . 'libs/clearsale.php';
                require_once plugin_dir_path(__FILE__) . 'libs/clearsale_order.php';

                $environment = get_option('wc_clearsale_usa_environment');

                $gates = WC()->payment_gateways->payment_gateways();

                $Clearsale = new Clearsale($api_key, $environment);

                $table_name = $wpdb->prefix . 'clearsale_usa';

                $page = 0;
                $page_qtd = 10;

                if (!isset($_GET['orderid'])) {
                    $order_ids = $wpdb->get_col("
					SELECT  order_id
					FROM    $table_name
					WHERE   cls_status IN ('AMA','NVO')
                    LIMIT   " . $page * $page_qtd . ", $page_qtd;");

                    // Consulta status dos pedidos
                    foreach ($order_ids as $order_id) {
                        if (!empty($order_id) && $order_id != '') {
                            $orders = null;
                            $order = new WC_Order($order_id);
                            $orders[] = $order->get_order_number();

                            WC_Clearsale_usa::write_log('Orders: ' . json_encode($orders), 'IntegrationGet');
                            $cs_status = $Clearsale->getClearsaleOrderStatus($orders);
                            WC_Clearsale_usa::write_log('ClearSale Statuses: ' . json_encode($cs_status), 'IntegrationGet');
            
                            if (!empty($cs_status)) {
                                $cs_status_encoded = json_encode($cs_status);
            
                                echo json_encode($orders);
            
                                if (strpos($cs_status_encoded, 'The request is invalid') !== false) {
                                    if (is_array($orders)) {
                                        foreach ($orders as $order_id) {
                                            WC_Clearsale_usa::not_send_order($order_id);
                                        }
                                    }
                                    echo 'end Get<br />';
                                    return;
                                }
            
                                foreach ($cs_status->Orders as $order) {
                                    try
                                    {
                                        $status = 'sent';
                                        if ($order->Status != 'AMA' && $order->Status != 'NVO') {
                                            if ($order->Status == 'ERR') {
                                                $status = 'erro';
                                            } else {
                                                $status = 'ok';
                                            }
                                        }
                                        $arrayToUpdate = array(
                                            'cls_status' => $order->Status,
                                            'score' => $order->Score,
                                            'pc_status' => $status,
                                        );
                                        $wpdb->update($table_name, $arrayToUpdate, array('order_id' => $order_id));
            
                                        if ($order->Status == 'RPM' || $order->Status == 'CAN' || $order->Status == 'SUS' || $order->Status == 'FRD') {
                                            $orderWC = new WC_Order($order_id);
            
                                            if (!get_option('wc_clearsale_usa_passivemode')) {
                                                $orderWC->set_status(get_option('wc_clearsale_usa_reproved_clearsale'));
                                            }
            
                                            $orderWC->add_order_note('This order has been reproved by ClearSale', 0, false);
            
                                            $orderWC->save();
                                        } else if ($order->Status == 'APA' || $order->Status == 'APM') {
                                            $orderWC = new WC_Order($order_id);
            
                                            if (!get_option('wc_clearsale_usa_passivemode')) {
                                                $orderWC->set_status(get_option('wc_clearsale_usa_approved_clearsale'));
                                            }
            
                                            $orderWC->add_order_note('This order has been approved by ClearSale', 0, false);
            
                                            $orderWC->save();
                                        } else if ($order->Status == 'AMA' || $order->Status == 'NVO') {
                                            $orderWC = new WC_Order($order_id);
            
                                            if (!get_option('wc_clearsale_usa_passivemode')) {
                                                $orderWC->set_status(get_option('wc_clearsale_usa_analysing_clearsale'));
                                            }
            
                                            $orderWC->save();
                                        }
                                    } catch (Exception $e) {
                                        WC_Clearsale_usa::not_send_order($order_id);
                                    }
                                }
                            }
                        }
                    }
                } else {
                    echo 'GET URL<br />';
                    $orders[] = $_GET['orderid'];
                }

                echo 'end Get<br />';
            } catch (Exception $e) {
                echo $e->getMessage();
                WC_Clearsale_usa::write_log($e->getMessage(), 'IntegrationGet');
            }
        }
    }

    public function tryGetCard($order_id)
    {
        $method = get_post_meta($order_id, '_payment_method', true);
        switch ($method) {
            case 'ipag-gateway':
                $cc_bin = get_post_meta($order_id, '_card_bin', true);
                $cc_end = get_post_meta($order_id, '_card_end', true);
                $cc_masked = get_post_meta($order_id, '_card_masked', true);
                $cc_type = get_post_meta($order_id, '_card_type', true);
                $retorno = array('tipoCartao' => WC_Clearsale_usa::verifyCardType($cc_type), 'cartaoBin' => $cc_bin, 'cartaoFim' => $cc_end, 'cartaoMascarado' => $cc_masked);
                break;
            case 'offline_cc':
                $cc_bin = get_post_meta($order_id, 'Bank Identification Number', true);
                $cc_end = get_post_meta($order_id, 'Credit Card Numbers Right', true);
                $cc_masked = $cc_bin . '******' . $cc_end;
                $cc_type = get_post_meta($order_id, 'Credit Card', true);
                $retorno = array('tipoCartao' => WC_Clearsale_usa::verifyCardType($cc_type), 'cartaoBin' => $cc_bin, 'cartaoFim' => $cc_end, 'cartaoMascarado' => $cc_masked);
                break;
            default:
                $retorno = null;
        }
        return $retorno;
    }

    public function register_menu_page()
    {
        add_menu_page('ClearSale', 'ClearSale', 'manage_options', 'clearsale-usa/includes/views/admin/config-admin.php', '', plugins_url('clearsale-usa/assets/images/clearsale_wp.png'), 79.9);
    }

    public static function create_table()
    {
        global $wpdb;

        $table_name = $wpdb->prefix . 'clearsale_usa';

        $collate = '';

        if ($wpdb->has_cap('collation')) {
            if (!empty($wpdb->charset)) {
                $collate .= "DEFAULT CHARACTER SET $wpdb->charset";
            }
            if (!empty($wpdb->collate)) {
                $collate .= " COLLATE $wpdb->collate";
            }
        }

        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
                    cls_id int(11) NOT NULL AUTO_INCREMENT,
                    order_id int(11) NOT NULL,
                    cls_status varchar(50) DEFAULT NULL,
                    score varchar(50) DEFAULT NULL,
                    pc_status varchar(50) NOT NULL DEFAULT 'pendente',
                    session_id varchar(100) DEFAULT NULL,
                    PRIMARY KEY id (cls_id)
                    ) $collate;";

        $wpdb->query($sql);
    }

    public function add_cron_intervals()
    {
        $schedules['cs_cron_five_minutes'] = array(
            'interval' => 60 * 5,
            'display' => __('Once every ten mintues'),
        );

        $schedules['cs_cron_two_minutes'] = array(
            'interval' => 60 * 2,
            'display' => __('Once every two mintues'),
        );
        $schedules['cs_cron_fifteen_minutes'] = array(
            'interval' => 60 * 15,
            'display' => __('Once every fifteen mintues'),
        );

        $schedules['cs_cron_thirty_minutes'] = array(
            'interval' => 60 * 30,
            'display' => __('Once every thirty mintues'),
        );

        return $schedules;
    }

}

add_action('plugins_loaded', array('WC_Clearsale_usa', 'get_instance'), 0);
register_activation_hook(__FILE__, 'plugin_activation');
register_deactivation_hook(__FILE__, 'plugin_deactivation');

function plugin_activation()
{
    WC_Clearsale_usa::create_table();
    //wp_schedule_event(time(), get_option('wc_clearsale_usa_consult_freq'), 'clearsale_cron');
    clearsale_endpoint();
    flush_rewrite_rules();
}

function plugin_deactivation()
{
    wp_clear_scheduled_hook('clearsale_cron');
    /* update_option('wc_clearsale_usa_api_key', '');
    update_option('wc_clearsale_usa_client_id', '');
    update_option('wc_clearsale_usa_client_secret', '');
    update_option('wc_clearsale_usa_app_id', '');
    update_option('wc_clearsale_usa_methods', '');
    update_option('wc_clearsale_usa_consult_freq', '');
    update_option('wc_clearsale_usa_environment', '');
    update_option('wc_clearsale_usa_debug', '');
     */
    flush_rewrite_rules();
}

/**
 * Add the endpoint
 */
function clearsale_endpoint()
{
    add_rewrite_endpoint('clearsale', EP_ROOT);
}
add_action('init', 'clearsale_endpoint');

function clearsale_proxy_function($query)
{
    if ($query->is_main_query()) {
        // this is for security!
        $allowed_actions = array('get', 'send');
        $action = $query->get('clearsale');
        error_reporting(E_ALL ^ E_DEPRECATED);
        if (in_array($action, $allowed_actions)) {
            switch ($action) {
                case 'get':
                    return WC_Clearsale_usa::integration_get();
                case 'send':
                    return WC_Clearsale_usa::integration_send();
            }
        }
    }
}
add_action('pre_get_posts', 'clearsale_proxy_function');

endif;
