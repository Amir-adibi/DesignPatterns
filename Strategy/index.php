<?php

require __DIR__ . '/autoload.php';

$paymentHandler = new PaymentHandler(new ZarinPalPaymentMethod());
$paymentHandler->redirectToPaymentUrl(['id' => 1234]);
$paymentHandler = new PaymentHandler(new PayPalPaymentMethod());
$paymentHandler->redirectToPaymentUrl(['id' => 56789]);
