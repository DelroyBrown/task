<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
require_once 'config.php';

if (!isset($_GET['code'])) {
    echo json_encode(['error' => 'Missing country code']);
}

$countryCode = $_GET['code'];

$params = [
    'country' => $countryCode,
    'username' => GEONAMES_USERNAME,
];

$url = GEONAMES_BASE_URL . 'countryInfoJSON?' . http_build_query($params);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode(['error' => curl_error($ch)]);
    curl_close($ch);
    exit;
}

curl_close($ch);
echo $response;