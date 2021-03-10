#!/usr/local/bin/php -q

<?php


class DatabaseConnection {

    public static $config = [
        'db' => [
            'hostname' => 'db',
            'port' => 3306,
            'username' => 'root',
            'password' => 'mysql',
            'name' => 'inholland',
            'options' => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => true,
            ]
        ],
        'general' => [
            'applicationName' => 'Inholland PHP Application Starter'
        ]
    ];

    public static function getPDOConnection($config): PDO {
        $hostname = $config['hostname'];
        $port = $config['port'];
        $user = $config['username'];
        $password = $config['password'];
        $db = $config['name'];
        $charset = 'utf8mb4';
        $dsn = "mysql:host=$hostname;port=$port;dbname=$db;charset=$charset";
        $options = $config['options'];
        try {
            $pdo = new PDO($dsn, $user, $password, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
        return $pdo;
    }
}

$API_FILE = getenv('API_KEY_FILE');
$API_KEY = file_get_contents($API_FILE);
$KELVIN = 275.15;
$pdo = DatabaseConnection::getPDOConnection(DatabaseConnection::$config['db']);
$url = "https://api.openweathermap.org/data/2.5/weather?appid=$API_KEY&lat=52.4308&lon=4.9153";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = json_decode(curl_exec($curl), true);
echo $output;
if (is_null($output)) {
    echo "Someting went wrong" . PHP_EOL;
    exit;
}
curl_close($curl);

$location = $output['name'] ?? 'unknown';
$country = $output['sys']['country'] ?? 'unknown';
$temperature = round($output['main']['temp'], 2) - $KELVIN;
$feelsLike = round($output['main']['feels_like'], 2) - $KELVIN;
$minTemp = round($output['main']['temp_min'], 2) - $KELVIN;
$maxTemp = round($output['main']['temp_max'], 2) - $KELVIN;
$pressure = $output['main']['pressure'];
$humidity = $output['main']['humidity'];
$description = $output['weather'][0]['description'];

$query = "INSERT INTO weather (location, country, temperature, feels_like, min_temp, max_temp, pressure, humidity, description) " .
    "VALUES (:location, :country, :temperature, :feels_like, :min_temp, :max_temp, :pressure, :humidity, :description)";
$stmt = $pdo->prepare($query);
$stmt->execute([
    'location' => $location,
    'country' => $country,
    'temperature' => $temperature,
    'feels_like' => $feelsLike,
    'min_temp' => $minTemp,
    'max_temp' => $maxTemp,
    'pressure' => $pressure,
    'humidity' => $humidity,
    'description' => $description
]);


?>
