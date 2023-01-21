<?php

class PaymentHandler
{
    public function __construct(private PaymentMethod $method)
    {
    }

    public function redirectToPaymentUrl(array $parameters): void
    {
//        header('Location: ' . $this->method->getPaymentUrl($parameters));
        echo 'Redirecting to ' . $this->method->getPaymentUrl($parameters) . "...\n";
    }

    public function verifyTransaction(array $parameters): bool
    {
        return $this->method->verifyTransaction($parameters);
    }

    public function setPaymentMethod(PaymentMethod $method)
    {
        $this->method = $method;
    }
}