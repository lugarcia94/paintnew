<?php

require_once ABSPATH.'wp-content/plugins/clearsale-usa/libs/Utils/HttpHelper.php';
require_once ABSPATH.'wp-content/plugins/clearsale-usa/libs/clearsale_helper.php';
require_once ABSPATH.'wp-content/plugins/clearsale-usa/libs/Auth/Entity/Library.php';

class Clearsale_Total_Model_Auth_Business_Object {

    public $Http;

    function __construct() {
        $this->Http = new Clearsale_Total_Model_Utils_HttpHelper();
    }

    public function login($enviroment) {
        
        $Helper = new Clearsale_Helper();
        
        $url = $enviroment . "api/auth/login/";
        $authRequest = new Clearsale_Total_Model_Auth_Entity_RequestAuth();
        $authRequest->Login->ApiKey = $Helper->api_key;
        $authRequest->Login->ClientID = $Helper->client_id;
        $authRequest->Login->ClientSecret = $Helper->client_secret;
        $response = $this->Http->postData($authRequest, $url);
        return $response;
    }

    public function logout($enviroment) {
        
        $Helper = new Clearsale_Helper();
        
        $authRequest = new Clearsale_Total_Model_Auth_Entity_RequestAuth();
        $authRequest->Login->ApiKey = $Helper->api_key;
        $authRequest->Login->ClientID = $Helper->client_id;
        $authRequest->Login->ClientSecret = $Helper->client_secret;
        $url = $enviroment . "api/auth/logout/";
        $response = $this->Http->postData($authRequest, $url);
        return $response;
    }

}

?>
   