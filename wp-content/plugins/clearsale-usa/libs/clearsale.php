<?php

include_once 'Auth/Business/Object.php';
include_once 'Order/Business/Object.php';
include_once 'Order/Entity/Library.php';
include_once 'clearsale_helper.php';

class Clearsale{

    private $cls_environement;
    private $cls_apikey;

    public function __construct($api_key, $environment = 'production') {
        $this->cls_apikey = $api_key;
        if($environment == 'production'):
            $this->cls_environement = Clearsale_Helper::CONFIG_ENVIRONMENT_PRODUCTION;
        else:
            $this->cls_environement = Clearsale_Helper::CONFIG_ENVIRONMENT_SANDBOX;
        endif;
    }

    public function sendOrder($orders) {
        try {

            $environment = $this->cls_environement;

            $authBO = new Clearsale_Total_Model_Auth_Business_Object();
            $authResponse = $authBO->login($environment);

            if ($authResponse) {

                $clearSaleOrders = $orders;
                $requestOrder = new Clearsale_Total_Model_Order_Entity_RequestOrder();
                $requestOrder->ApiKey = $this->cls_apikey;
                $requestOrder->LoginToken = $authResponse->Token->Value;
                $requestOrder->AnalysisLocation = Clearsale_Helper::CONFIG_ANALYSIS_LOCATION_USA;
                if(!is_array($clearSaleOrders)):
                    $requestOrder->Orders[0] = $clearSaleOrders;
                else:
                    foreach ($clearSaleOrders as $index => $cs_order):
                        $requestOrder->Orders[$index] = $cs_order;
                    endforeach;
                endif;
                

                $orderBO = new Clearsale_Total_Model_Order_Business_Object();
                $orderResponse = $orderBO->send($requestOrder, $environment);

                return $orderResponse;
            } else {
                return $authResponse;
            }
        } catch (Exception $e) {
            return array('Exception'=>$e);
            // Log Exception
        }
    }

    public function getClearsaleOrderStatus($orderId) {
        $environment = $this->cls_environement;
        $authBO = new Clearsale_Total_Model_Auth_Business_Object();
        $authResponse = $authBO->login($environment);
        $orderBO = new Clearsale_Total_Model_Order_Business_Object();

        if ($authResponse) {
            $requestOrder = new Clearsale_Total_Model_Order_Entity_Order();
            $requestOrder->ApiKey = $this->cls_apikey;
            $requestOrder->LoginToken = $authResponse->Token->Value;
            
            $requestOrder->AnalysisLocation = Clearsale_Helper::CONFIG_ANALYSIS_LOCATION_USA;
            $requestOrder->Orders = array();
            if(!is_array($orderId)):
                $requestOrder->Orders[0] = $orderId;
            else:
                foreach ($orderId as $index => $order_id):
                    $requestOrder->Orders[$index] = $order_id;
                endforeach;
            endif;
            $ResponseOrder = $orderBO->get($requestOrder, $environment);
            
            return $ResponseOrder;
        }
        
        return null;
    }

}

?>
