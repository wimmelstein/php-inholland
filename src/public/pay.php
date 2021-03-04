<?php

include_once '../bootstrap.php';

use Mollie\Api\MollieApiClient;

$mollie = new MollieApiClient();
$mollie->setApiKey("test_Ds3fz4U9vNKxzCfVvVHJT2sgW5ECD8");

$amount = $_POST['amount'];
$description = $_POST['description'];

$orderId = "12346";

$payment = $mollie->payments->create([
  "amount" => [
    "currency" => "EUR",
    "value" => "$amount"
  ],
  "description" => "$description",
  "redirectUrl" => "http://jacksguitarshop.com/server?orderId=" . $orderId,
  "webhookUrl"  => "http://jacksguitarshop.com/server/confirm.php",
  "metadata" => [
    "order_id" => "12345"
  ]
]);


header("Location: " . $payment->getCheckoutUrl(), true, 303);
