<?php


require_once __DIR__ . "/../autoload.php";

$mollie = new \Mollie\Api\MollieApiClient();
$mollie->setApiKey("test_Ds3fz4U9vNKxzCfVvVHJT2sgW5ECD8");

$payment = $mollie->payments->create([
  "amount" => [
    "currency" => "EUR",
    "value" => "10.00"
  ],
  "description" => "Bla",
  "redirectUrl" => "https://wiltenburg.eu",
  "webhookUrl"  => "https://wiltenburg.eu",
]);



header("Location: " . $payment->getCheckoutUrl(), true, 303);

?>