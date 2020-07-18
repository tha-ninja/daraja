<?php

$dataPOST = trim(file_get_contents('php://input'));

//Response that the request has been received
$response = array(
        'ResultCode' => 0,
        'ResultDesc' => 'Confirmation Received successfully'
    );
    echo json_encode($response);

//Please make sure that this file exists and is writable
    $file = 'mpesa_logs.txt'; 
    $fh = fopen($file, 'a');
    fwrite($fh, "\n====".date("d-m-Y H:i:s")."====\n");
    fwrite($fh, $dataPOST."\n");
    fclose($fh);

    //Check if Mpesa Payload Body has data
    if(empty($dataPOST)) {
     echo json_encode(['status' =>false, 'message' => "Empty Body!"]);
     die();
    }
    //Decode the payload data
    $mpesa_data = json_decode($dataPOST);
           
//assign to variables
    $customer_fullname = $mpesa_data->FirstName .' '.$mpesa_data->MiddleName.' '.$mpesa_data->LastName;
    $firstname = $mpesa_data->FirstName;
    $LastName = $mpesa_data->LastName;
    $phone = $mpesa_data->MSISDN;
	$trans_id = $mpesa_data->TransID;
	$bill_ref = $mpesa_data->BillRefNumber;
	$trans_time = $mpesa_data->TransTime;
	$amount = $mpesa_data->TransAmount;


	//Do other operations from here

	
     
