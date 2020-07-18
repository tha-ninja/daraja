<?php

$live_url = 'https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl';
$sandbox_url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';

$token = $this->generate_token();
  
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$token)); //setting custom header
  
  
  $curl_post_data = array(
    //Fill in the request parameters with valid values
    'ShortCode' => 'MPESA_SHORTCODE',
    'ResponseType' => 'String',
    'ConfirmationURL' => 'https://musangi.000webhostapp.com/confirmation_url.php',
    'ValidationURL' => 'https://musangi.000webhostapp.com/validation_url.php'
  );
  
  $data_string = json_encode($curl_post_data);
  
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
  
  $curl_response = curl_exec($curl);
  print_r($curl_response);
  
  echo $curl_response;


  function generate_token(){
$live_url = 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$sandbox_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $sandbox_url);
        $app_consumer_key = "CONSUMER_KEY";
        $app_consumer_secret = "CONSUMER_SECRET";
        $credentials = base64_encode($app_consumer_key.':'.$app_consumer_secret);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        $token_info=json_decode($curl_response,true);

      return $token = $token_info['access_token'];
  }