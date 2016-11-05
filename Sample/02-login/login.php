<?php
require dirname(__DIR__).'/../vendor/autoload.php';

const APP_ID = "YOUR APP_ID";
const APP_KEY = "YOUR APP_KEY";

$email = $_POST['email'];
$password = $_POST['password'];

$client = new \GuzzleHttp\Client();

$respAuth = $client->request('POST', 'https://api.mesosfer.com/api/v2/users/signin', [
    'json'    => ['email' => $email, 'password' => $password],
    'headers' => ['X-Mesosfer-AppId' => APP_ID, 'X-Mesosfer-AppKey' => APP_KEY]
]);

$bodyAuth = (string) $respAuth->getBody();
$auth = json_decode($bodyAuth);
print_r($auth);