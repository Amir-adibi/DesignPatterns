<?php

class PayPalPaymentMethod implements PaymentMethod
{

    public function getPaymentUrl(array $parameters): string
    {
        return 'https://paypal.com/pay/' . $parameters['id'];
    }

    public function verifyTransaction(array $parameters): bool
    {
        return $parameters['tracking_id'] % 2 == 0;
    }
}