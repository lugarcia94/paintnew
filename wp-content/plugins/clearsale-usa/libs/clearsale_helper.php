<?php

/**
 * Description of clearsale_helper
 *
 * @author Guilherme Motta
 */

class Clearsale_Helper {

    const CONFIG_ENVIRONMENT_SANDBOX = 'https://sandbox.clearsale.com.br/';
    const CONFIG_ENVIRONMENT_PRODUCTION = 'https://integration.clearsale.com.br/';
    const CONFIG_ANALYSIS_LOCATION_USA = 'USA';
    const CONFIG_ANALYSIS_LOCATION_BRA = 'BRA';
    const CONFIG_CURRENCY_BRA = 'BRL';
    const CONFIG_CURRENCY_USA = 'USD';

    public $api_key;
    public $client_id;
    public $client_secret;
    public $environment;

    public function __construct() {
        $this->api_key = get_option('wc_clearsale_usa_api_key');
        $this->client_id = get_option('wc_clearsale_usa_client_id');
        $this->client_secret = get_option('wc_clearsale_usa_client_secret');
        $this->environment = get_option('wc_clearsale_usa_environment');
    }

}
