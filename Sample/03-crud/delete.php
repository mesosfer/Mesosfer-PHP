<?php	

require dirname(__DIR__).'/../vendor/autoload.php';

const ACCESS_TOKEN = "YOUR ACCESS_TOKEN";
const BUCKET_NAME = "YOUR BUCKET_NAME";
const APP_ID = "YOUR APP_ID";
const APP_KEY = "YOUR APP_KEY";

$client = new \GuzzleHttp\Client();
$objectId = "YOUR OBJECT_ID";

try{

	$respCreateBucket = $client->request('DELETE', 'https://api.mesosfer.com/api/v2/data/bucket/'.BUCKET_NAME.'/'.$objectId, [
	    'headers' => ['Authorization' => 'Bearer '.ACCESS_TOKEN, 'X-Mesosfer-AppId' => APP_ID, 'X-Mesosfer-AppKey' => APP_KEY]
	]);
	
	$createBucket = (string) $respCreateBucket->getBody();
	$bucket = json_decode($createBucket);
	print_r($bucket);
}
catch(Exception $e){
	echo $e->getMessage();
}

