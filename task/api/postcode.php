<?php

ini_set('display_error', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
require_once 'config.php';

if (!isset($_GET['lat'], $_GET['lng'])) {
    echo json_encode(['error' => 'Missing lat or lng parameters']);
    exit;
}

$params = [
    'lat' => $_GET['lat'],
    'lng' => $_GET['lng'],
    'username' => GEONAMES_USERNAME
];

$url = GEONAMES_BASE_URL . 'findNearbyPostalCodesJSON?' . http_build_query($params);

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