<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
require_once 'config.php';

// Check required parameters
if (!isset($_GET['lat'], $_GET['lng'])) {
    echo json_encode(['error' => 'Missing lat or lng parameters']);
    exit;
}

$lat = $_GET['lat'];
$lng = $_GET['lng'];

$params = [
    'lat' => $lat,
    'lng' => $lng,
    'radius' => isset($_GET['radius']) ? $_GET['radius'] : 100,
    'username' => GEONAMES_USERNAME,
];

// Correct API URL
$apiUrl = GEONAMES_BASE_URL . 'findNearByWeatherJSON?' . http_build_query($params);

// cURL request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode(['error' => curl_error($ch)]);
    curl_close($ch);
    exit;
}

curl_close($ch);

echo $response;
