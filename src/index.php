<?php

include_once('Database/DatabaseConnection.php');

$config = [
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
?>

<html>
<head>
    <title><?php echo $config['general']['applicationName'] ?></title>
    <link href="css/style.css" type="text/css" rel="stylesheet">
</head>
<body>

<h1><?php echo $config['general']['applicationName'] ?> </h1>

<?php

echo "PHP Version: " . phpversion() . '<br>';

$dbConnection = new DatabaseConnection();
$pdo = $dbConnection->getPDOConnection($config);

try {
    $pdo->query('SELECT 1');
    echo 'Database: \'' . $config['db']['name'] . '\' on host \'' . $config['db']['hostname'] . '\'';
} catch (\PDOException $pde) {
    echo "Error in checking the database. Exception was $pde";
}

?>

</body>
</html>
