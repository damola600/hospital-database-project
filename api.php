<?php

function get_API_data() {
	
	$click_token = get_token_from_api();
	
	$new_token = $click_token->token;
	
	$auth_array = array(
				"Authorization:",
				"Bearer",
				$new_token
	);
	
	$new_token = implode(" ",$auth_array);
	
	$curl = curl_init();
	
	
}


/*$url = 'url to which we make a request';

 //name of collection to retrieve
$collection_name = 'name of collection';

//adding the collection name to the url
$request_url = $url . '/' . $collection_name;

//create a seesion for the url
$curl = curl_init($request_url);

//session configuration
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//to return the answer from the server as string
curl_setopt($curl, CURLOPT_HTTPHEADER, [
	'X-RapidAPI-Host: kvstore.p.rapidapi.com',
	'X-RapidAPI-Key: [Input your RapidAPI Key Here]',
	'Content-Type: application/json'
]);//all the necessary headers for the request

//execute cURL request with all the previous settings
$response = curl_exec($curl);

//close cURL session
curl_close($curl);

//display the response from the server
echo $response . PHP_EOL;*/
?>