<?php

$API_FILE = getenv('API_KEY_FILE');
$API_KEY = file_get_contents($API_FILE);
echo json_encode(['API_KEY' => $API_KEY]);


$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js');
curl_setopt($curl, CURLINFO_HEADER_OUT, 0);

curl_exec($curl);
