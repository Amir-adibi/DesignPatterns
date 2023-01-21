<?php

class ZarinPalPaymentMethod implements PaymentMethod
{

    public function getPaymentUrl(array $parameters): string
    {
        return 'https://zarinpal.com/pay/' . $parameters['id'];
    }

    public function verifyTransaction(array $parameters): bool
    {
        return $parameters['id'] % 2 == 1;
    }
}