<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
require_once 'config.php';

$required = ['north', 'south', 'east', 'west'];
foreach ($required as $param) {
    if (!isset($_GET[$param])) {
        echo json_encode(['error' => 'Missing required parameter: $param']);
        exit;
    }
}

$params = [
    'north' => $_GET['north'],
    'south' => $_GET['south'],
    'east' => $_GET['east'],
    'west' => $_GET['west'],
    'username' => GEONAMES_USERNAME,
];

$url = GEONAMES_BASE_URL . 'earthquakesJSON?' . http_build_query($params);

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
