<?php

declare(strict_types=1);

namespace App\DesignPatterns\Behavioral\Strategy;

/**
 * Клиентский код.
 *
 * @see https://refactoring.guru/ru/design-patterns/strategy
 */
$controller = new OrderController();

echo "Client: Let's create some orders<br>";

$controller->post("/orders", [
    "email" => "me@example.com",
    "product" => "ABC Cat food (XL)",
    "total" => 9.95,
]);

$controller->post("/orders", [
    "email" => "me@example.com",
    "product" => "XYZ Cat litter (XXL)",
    "total" => 19.95,
]);

echo "<br>Client: List my orders, please<br>";

$controller->get('/orders');

echo "<br>Client: I'd like to pay for the second, show me the payment form<br>";

$controller->get('/order/1/payment/paypal');

echo "<br>Client: ...pushes the Pay button...<br>";
echo "<br>Client: Oh, I'm redirected to the PayPal.<br>";
echo "<br>Client: ...pays on the PayPal...<br>";
echo "<br>Client: Alright, I'm back with you, guys.<br>";

$controller->get("/order/1/payment/paypal/return?key=c55a3964833a4b0fa4469ea94a057152&success=true&total=19.95");
