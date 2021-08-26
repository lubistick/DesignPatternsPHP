<?php

declare(strict_types=1);

namespace App\DesignPatterns\Behavioral\Strategy\Payment;

class PaymentFactory
{
    /**
     * Получаем способ оплаты по его ID.
     */
    public static function getPaymentMethod(string $id): PaymentMethod
    {
        return match ($id) {
            'cc' => new CreditCardPayment(),
            'paypal' => new PayPalPayment(),
            default => throw new \Exception('Unknown Payment Method'),
        };
    }
}
