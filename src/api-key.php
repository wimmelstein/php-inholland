<?php

$API_FILE = getenv('API_KEY_FILE');
$API_KEY = file_get_contents($API_FILE);
echo json_encode(['API_KEY' => $API_KEY]);
