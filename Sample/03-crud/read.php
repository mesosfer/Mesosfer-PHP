<?php	

require dirname(__DIR__).'/../vendor/autoload.php';

const ACCESS_TOKEN = "YOUR ACCESS_TOKEN";
const BUCKET_NAME = "YOUR BUCKET_NAME";
const APP_ID = "YOUR APP_ID";
const APP_KEY = "YOUR APP_KEY";

$client = new \GuzzleHttp\Client();

try{

	$respGetBucket = $client->request('GET', 'https://api.mesosfer.com/api/v2/data/bucket/'.BUCKET_NAME, [
	    'headers' => ['Authorization' => 'Bearer '.ACCESS_TOKEN, 'X-Mesosfer-AppId' => APP_ID, 'X-Mesosfer-AppKey' => APP_KEY]
	]);
	$bodyBucket = (string) $respGetBucket->getBody();
	$getBucket = json_decode($bodyBucket); 
	print_r($getBucket);
}
catch(Exception $e){
	echo $e->getMessage();
}
?>