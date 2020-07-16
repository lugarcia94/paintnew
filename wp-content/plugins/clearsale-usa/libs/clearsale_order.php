<?php
/**
 * Description of clearsale_order
 *
 * @author Guilherme Motta
 */

include_once 'clearsale_helper.php';
include_once "Order/Entity/Library.php";


class ClearSale_Order{

    public function __construct() {

    }

    public function prepare_order($order, $session_id, $order_notes = null){

        if(WC_VERSION >= 2.2):
            $user_id = $order->get_user_id();
        else:
            $user_id = $order->customer_user ? intval($order->customer_user) : 0;
        endif;

        $user_birth = '';
        $user_sex = 'M';
		
        $data = new DateTime($order->get_date_created());
        $data = $data->format('Y-m-d\TH:i:s');

        $data_birth = $data;

        $clearsaleOrder = new Clearsale_Total_Model_Order_Entity_Order();

        if(empty($order->get_order_number()))
            $clearsaleOrder->ID = $order->get_id();
        else
            $clearsaleOrder->ID = $order->get_order_number();

		if(empty($order->get_customer_ip_address()))
			$clearsaleOrder->IP = "127.0.0.1";
		else
            $clearsaleOrder->IP = $order->get_customer_ip_address();
            
        $clearsaleOrder->Obs = $order_notes;
        $clearsaleOrder->Currency = (empty($order->get_currency())) ? Clearsale_Helper::CONFIG_CURRENCY_USA : $order->get_currency();
        $clearsaleOrder->Date = $data;
        $clearsaleOrder->Reanalysis = false;
        $clearsaleOrder->Email = $order->get_billing_email();

        $clearsaleOrder->Payments[0] = new Clearsale_Total_Model_Order_Entity_Payment();
        $clearsaleOrder->Payments[0]->Amount = number_format(floatval($order->get_total()), 2, ".", "");
        $clearsaleOrder->Payments[0]->Type = 14;
        $clearsaleOrder->Payments[0]->CardType = 4;
        $clearsaleOrder->Payments[0]->Date = $data;
		
		$countriesWithoutZipCode = [ "AE", "AO", "AG", "AW", "BS", "BZ", "BJ", "BW", "BF", "BI", "CM", "CF", "KM", "CG", "CD", "CK", "CI", "DJ", "DM", "GQ", "ER", "FJ", "TF", "GM", "GH", "GD", "GN", "GY", "HK", "IE", "JM", "KE", "KI", "MO", "MW", "ML", "MR", "MU", "MS", "NR", "AN", "NU", "KP", "PA", "QA", "RW", "KN", "LC", "ST", "SA", "SC", "SL", "SB", "SO", "ZA", "SR", "SY", "TZ", "TL", "TK", "TO", "TT", "TV", "UG", "AE", "VU", "YE", "ZW" ];

        $clearsaleOrder->BillingData = new Clearsale_Total_Model_Order_Entity_Person();
        $clearsaleOrder->BillingData->ID = "1";
        $clearsaleOrder->BillingData->Email = $order->get_billing_email();
        $clearsaleOrder->BillingData->BirthDate = $data_birth;
        $clearsaleOrder->BillingData->Name = $order->get_billing_first_name().' '.$order->get_billing_last_name();
        $clearsaleOrder->BillingData->Type = 1;
        $clearsaleOrder->BillingData->Gender = $user_sex;
        $clearsaleOrder->BillingData->Address->City = $order->get_billing_city();
        $clearsaleOrder->BillingData->Address->Street = $order->get_billing_address_1(); //Address Line1
        $clearsaleOrder->BillingData->Address->Comp = $order->get_billing_address_2(); //Address Line2
        $clearsaleOrder->BillingData->Address->Number = trim(preg_replace('/[\D]/', '', $order->get_billing_address_1()));
        $clearsaleOrder->BillingData->Address->State = (empty($order->get_billing_state()))? 'XX' :$order->get_billing_state();
		$clearsaleOrder->BillingData->Address->Country = $order->get_billing_country();
        $clearsaleOrder->BillingData->Address->ZipCode = (empty($order->get_billing_postcode())) && in_array($order->get_billing_country(), $countriesWithoutZipCode) ? '00000000' : $order->get_billing_postcode();//$order->get_billing_postcode();
        $clearsaleOrder->BillingData->Phones[0] = new Clearsale_Total_Model_Order_Entity_Phone();
        $clearsaleOrder->BillingData->Phones[0]->AreaCode = substr(preg_replace('/[^0-9]/', '', $order->get_billing_phone()), 0, 3);
        $clearsaleOrder->BillingData->Phones[0]->Number = $order->get_billing_phone();
        $clearsaleOrder->BillingData->Phones[0]->CountryCode = "1"; // Verificar
        $clearsaleOrder->BillingData->Phones[0]->Type = 1;

        $clearsaleOrder->ShippingData = new Clearsale_Total_Model_Order_Entity_Person();
        $clearsaleOrder->ShippingData->ID = "1";
        $clearsaleOrder->ShippingData->Email = $order->get_billing_email();
        $clearsaleOrder->ShippingData->BirthDate = $data_birth;
        $clearsaleOrder->ShippingData->Name = $order->get_shipping_first_name().' '.$order->get_shipping_last_name();
        $clearsaleOrder->ShippingData->Gender = $user_sex;
        $clearsaleOrder->ShippingData->Type = 1;
		
		$shippingphone = $order->get_billing_phone();

        $clearsaleOrder->ShippingData->Address->City = $order->get_shipping_city();
        $clearsaleOrder->ShippingData->Address->Street = $order->get_shipping_address_1(); //Address Line1
        $clearsaleOrder->ShippingData->Address->Comp = $order->get_shipping_address_2(); //Address Line2
        $clearsaleOrder->ShippingData->Address->Number = trim(preg_replace('/[\D]/', '', $order->get_shipping_address_1()));
        $clearsaleOrder->ShippingData->Address->State = (empty($order->get_shipping_state())) ? 'XX' : $order->get_shipping_state();
        $clearsaleOrder->ShippingData->Address->ZipCode = (empty($order->get_shipping_postcode())) && in_array($order->get_shipping_country(), $countriesWithoutZipCode) ? '00000000' : $order->get_shipping_postcode();//$order->get_shipping_postcode();
		$clearsaleOrder->ShippingData->Address->Country = $order->get_shipping_country();
        $clearsaleOrder->ShippingData->Phones[0] = new Clearsale_Total_Model_Order_Entity_Phone();
        $clearsaleOrder->ShippingData->Phones[0]->AreaCode = substr(preg_replace('/[^0-9]/', '', $shippingphone), 0, 3);
        $clearsaleOrder->ShippingData->Phones[0]->Number = $shippingphone;
        $clearsaleOrder->ShippingData->Phones[0]->CountryCode = "1";
        $clearsaleOrder->ShippingData->Phones[0]->Type = 1;

        $itemIndex = 0;
        $TotalItems = 0;

        $items = $order->get_items();

        foreach($items as $item){

            $clearsaleOrder->Items[$itemIndex] = new Clearsale_Total_Model_Order_Entity_Item();
            $clearsaleOrder->Items[$itemIndex]->Price = number_format(floatval($item['line_subtotal']), 2, ".", "");
            $clearsaleOrder->Items[$itemIndex]->ProductId = $item['product_id'];
            $clearsaleOrder->Items[$itemIndex]->ProductTitle = $item['name'];
            $clearsaleOrder->Items[$itemIndex]->Quantity = $item['qty'];
            $clearsaleOrder->Items[0]->Category = "";
            $TotalItems += $clearsaleOrder->Items[$itemIndex]->Price;

            $itemIndex++;
        }

        $clearsaleOrder->TotalOrder = number_format(floatval($order->get_total()), 2, ".", "");
        $clearsaleOrder->TotalItems = $TotalItems;
        $clearsaleOrder->TotalShipping = number_format(floatval($order->get_total_shipping()), 2, ".", "");
		
		if(!empty($order->get_transaction_id())) {
			$clearsaleOrder->CustomFields[0] = new Clearsale_Total_Model_Order_Entity_CustomField();
			$clearsaleOrder->CustomFields[0]->Name = "TRANSACTION_ID";
			$clearsaleOrder->CustomFields[0]->Type = 1;
			$clearsaleOrder->CustomFields[0]->Value = $order->get_transaction_id();
		}
        
        if($this->session_valid_id($session_id)) {
            $clearsaleOrder->SessionID = $session_id;
        }
        else {
            $clearsaleOrder->SessionID = $this->getGUID();
        }
		
        return $clearsaleOrder;
    }

    function session_valid_id($session_id)
    {
        return preg_match('/^[-,a-zA-Z0-9]{1,128}$/', $session_id) > 0;
    }

    function getGUID(){
        if (function_exists('com_create_guid')){
            return com_create_guid();
        }else{
            mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid = substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12);
            return $uuid;
        }
    }
}