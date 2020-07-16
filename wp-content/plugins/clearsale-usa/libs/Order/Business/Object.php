<?php

require_once ABSPATH.'wp-content/plugins/clearsale-usa/libs/Utils/HttpHelper.php';
require_once ABSPATH.'wp-content/plugins/clearsale-usa/libs/Order/Entity/Library.php';

class  Clearsale_Total_Model_Order_Business_Object
{
	public $Http;
	
	function __construct() {
		$this->Http = new Clearsale_Total_Model_Utils_HttpHelper();
	}
	
	public function send($requestSend,$enviroment) {
		$url = $enviroment."api/order/send/";
		$response = $this->Http->postData($requestSend, $url);	
		return $response;
	}
	
	public function get($requestGet,$enviroment)
	{
		$url = $enviroment."api/order/get/";
		$response = $this->Http->postData($requestGet, $url);	
		return $response;
	}


}



