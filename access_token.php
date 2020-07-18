<?php

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

        $token = $token_info['access_token'];