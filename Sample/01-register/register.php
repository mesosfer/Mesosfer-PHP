<?php
require dirname(__DIR__).'/../vendor/autoload.php';

const APP_ID = "YOUR APP_ID";
const APP_KEY = "YOUR APP_KEY";

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

$client = new \GuzzleHttp\Client();

try{
	$resRegister = $client->request('POST', 'https://api.mesosfer.com/api/v2/users', [
	    'json'    => ['firstname' => $firstname, 'lastname' => $lastname, 'email' => $email, 'password' => $password],
	    'headers' => ['X-Mesosfer-AppId' => APP_ID, 'X-Mesosfer-AppKey' => APP_KEY]
	]);	
	$bodyRegister = (string) $resRegister->getBody();
	$register = json_decode($bodyRegister);
	print_r($register);
}
catch(Exception $e){
	echo $e->getMessage();
}


