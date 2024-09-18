<?php 
/*
 * Plugin Name: WhatsApp Message With Twilio
 * Plugin URI:  https://www.freelancer.in/u/nimeshgorfad
 * Description: Set up WhatsApp message templates in your Twilio account.
 * Version: 1.0.0
 * Author: Nimesh Gorfad
 * Author URI: https://www.freelancer.in/u/nimeshgorfad
 * Text Domain: wmwt
 * Requires at least: 6.1
 * Requires PHP: 7.3 
*/  



function nkg_send_whatsapp($number,$contentVariables,$ContentSid){
 
	$account_sid = get_option('xc_woo_twilio_sid', '');
	$auth_token = get_option('xc_woo_twilio_token', '');
	$whatsapp_sender = get_option('xc_woo_twilio_whatsapp_number', '');
	
	if( empty($account_sid) && empty($auth_token) && empty($whatsapp_sender) ){
		
		return false;
	}
	 
	
	$sender = $whatsapp_sender;
	 		 
	// Twilio WhatsApp number (with WhatsApp enabled)
	$twilio_whatsapp_number = 'whatsapp:'.$sender; // Example Twilio WhatsApp number

	// Recipient's WhatsApp number
	 
	$recipient_whatsapp_number = 'whatsapp:'.$number;

	// Message you want to send 
	$message = '';

	// Twilio API endpoint for sending messages
	$url = 'https://api.twilio.com/2010-04-01/Accounts/' . $account_sid . '/Messages.json';
		
		
	/*  $contentVariables = array();
	 $contentVariables['name'] = 'Nkg';
	 $contentVariables['email'] = 'nimeshgorfad@gmail.com';
	 $contentVariables['fast_name'] = 'Nimesh';
	 $contentVariables['last_name'] = 'Gorfad';   */
	 $contentVariables_json = json_encode($contentVariables);
	 	 
	// Prepare POST data
	$data = [
		'From' => $twilio_whatsapp_number,
		'To' => $recipient_whatsapp_number,
		'Body' => $message,
		'ContentSid' => $ContentSid,
		'ContentVariables' => $contentVariables_json
	];
	 
	// Initialize cURL
	$ch = curl_init($url);

	// Configure cURL options
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
	curl_setopt($ch, CURLOPT_USERPWD, $account_sid . ':' . $auth_token);

	// Execute the request
	$response = curl_exec($ch);

	// Check for errors
	if (curl_errno($ch)) {
		//echo 'Error:' . curl_error($ch);
	} else {
		// Print the response from Twilio
		//echo 'Response: ' . $response;
	}

	// Close cURL
	curl_close($ch);
	 
}
