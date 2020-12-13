<?php

include '../util/db.php';
$payment_id = $_POST['id'];

$file = fopen('confirm.log', 'a');

$url = 'https://api.mollie.com/v2/payments/' . $payment_id ;

fwrite($file, $url . PHP_EOL);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer test_Ds3fz4U9vNKxzCfVvVHJT2sgW5ECD8"
));

$result = curl_exec($ch);

curl_close($ch);

$json = json_decode($result, true);

fwrite($file, var_dump($result) . PHP_EOL);
fclose($file);

$status = $json['status'];
$description = $json['description'];

    $conn = OpenCon();
    $stmt = $conn->prepare("insert into payment (id, status, description) values (?, ?, ?)");
    $stmt->bind_param('sss', $payment_id, $status, $description );
    $stmt->execute();
    CloseCon($conn);


?>