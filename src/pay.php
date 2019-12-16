<?php


require_once __DIR__ . "/../autoload.php";

$mollie = new \Mollie\Api\MollieApiClient();
$mollie->setApiKey("test_Ds3fz4U9vNKxzCfVvVHJT2sgW5ECD8");

$amount = $_POST['amount'];
$description = $_POST['description'];

$payment = $mollie->payments->create([
  "amount" => [
    "currency" => "EUR",
    "value" => "$amount"
  ],
  "description" => "$description",
  "redirectUrl" => "https://wiltenburg.eu",
  "webhookUrl"  => "https://wiltenburg.eu",
]);


header("Location: " . $payment->getCheckoutUrl(), true, 303);

?>