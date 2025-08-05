<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// include file
include_once('easebuzz-lib/easebuzz_payment_gateway.php');

class Easebuzz_lib
{
    function onlinePayment($order_data)
    {
        $MERCHANT_KEY = "UETFDN4XEC";
        $SALT = "KZYDKHKFEU";
        $ENV = "prod";   // setup production enviroment (pay.easebuzz.in).

        // test
        //$MERCHANT_KEY = "2PBP7IABZ2";
        //$SALT = "DAH88E3UWQ";
        //$ENV = "test";    // setup test enviroment (testpay.easebuzz.in).

        $easebuzzObj = new Easebuzz($MERCHANT_KEY, $SALT, $ENV);

        $surl = base_url().'order_success';
        $order_details = array('txnid'=>$order_data['transaction_no'],'amount'=>sprintf("%.2f", $order_data['total_amount']),'firstname'=>$order_data['depositer_name'],'email'=>$order_data['email'],'phone'=>$order_data['mobile'],'productinfo'=>"msceia",'surl'=>$surl,'furl'=>$surl,'udf1'=>$order_data['institute_id'],'udf2'=>$order_data['payment_id'],'udf3'=>"",'udf4'=>"",'udf5'=>"",'address1'=>"Pune", "address2"=>"Pune","city"=>"Pune","state"=>"Maharastra","country"=>"India","zipcode"=>"411033");
        //print_r($order_details); dia;
        $easebuzzObj->initiatePaymentAPI($order_details);

        //$this->easebuzzAPIResponse($result);
    }


    function easebuzzAPIResponse($data){
        // salt for testing env
        $SALT = "DAH88E3UWQ";

        $easebuzzObj = new Easebuzz($MERCHANT_KEY = null, $SALT, $ENV = null);

        return $easebuzzObj->easebuzzResponse( $data );
    }
} ?>
