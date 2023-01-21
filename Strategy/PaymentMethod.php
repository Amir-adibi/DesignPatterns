<?php

interface PaymentMethod
{
    public function getPaymentUrl(array $parameters): string;

    public function verifyTransaction(array $parameters): bool;
}