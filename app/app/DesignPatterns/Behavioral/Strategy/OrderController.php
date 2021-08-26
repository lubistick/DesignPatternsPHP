<?php

declare(strict_types=1);

namespace App\DesignPatterns\Behavioral\Strategy;

use App\DesignPatterns\Behavioral\Strategy\Payment\PaymentFactory;
use App\DesignPatterns\Behavioral\Strategy\Payment\PaymentMethod;

/**
 * Это роутер и контроллер нашего приложения. Получив запрос, этот класс решает, какое поведение должно выполняться.
 * Когда приложение получает требование об оплате, класс OrderController также решает,
 * какой способ оплаты следует использовать для его обработки.
 * Таким образом, этот класс действует как Контекст и в то же время как Клиент.
 */
class OrderController
{
    /**
     * Обрабатываем запросы POST.
     */
    public function post(string $url, array $data): void
    {
        echo "Controller: POST request to $url with " . json_encode($data, JSON_THROW_ON_ERROR) . "<br>";

        $path = parse_url($url, PHP_URL_PATH);

        if (preg_match('#^/orders?$#', $path, $matches)) {
            $this->postNewOrder($data);
        } else {
            echo "Controller: 404 page<br>";
        }
    }

    /**
     * Обрабатываем запросы GET.
     */
    public function get(string $url): void
    {
        echo "Controller: GET request to $url<br>";

        $path = parse_url($url, PHP_URL_PATH);
        $query = parse_url($url, PHP_URL_QUERY);
        $data = [];
        if ($query) {
            parse_str($query, $data);
        }

        if (preg_match('#^/orders?$#', $path, $matches)) {
            $this->getAllOrders();
        } elseif (preg_match('#^/order/(\d+?)/payment/([a-z]+?)(/return)?$#', $path, $matches)) {
            $order = Order::get((int) $matches[1]);

            // Способ оплаты (стратегия) выбирается в соответствии со значением, переданным в запросе.
            $paymentMethod = PaymentFactory::getPaymentMethod($matches[2]);

            if (!isset($matches[3])) {
                $this->getPaymentForm($paymentMethod, $order, $data);
            } else {
                $this->getPaymentReturn($paymentMethod, $order, $data);
            }
        } else {
            echo "Controller: 404 page<br>";
        }
    }

    /**
     * POST /order {data}
     */
    private function postNewOrder(array $data): void
    {
        $order = new Order($data);
        echo "Controller: Created the order #{$order->id}.<br>";
    }

    /**
     * GET /orders
     */
    private function getAllOrders(): void
    {
        echo "Controller: Here's all orders:<br>";
        foreach (Order::get() as $order) {
            echo json_encode($order, JSON_PRETTY_PRINT) . "<br>";
        }
    }

    /**
     * GET /order/123/payment/XXX
     */
    private function getPaymentForm(PaymentMethod $method, Order $order, array $data): void
    {
        // Фактическая работа делегируется объекту метода оплаты.
        $form = $method->getPaymentForm($order);
        echo "Controller: here's the payment form:<br>";
        echo $form . "<br>";
    }

    /**
     * GET /order/123/payment/XXX/return?key=AJHKSJHJ3423&success=true
     */
    private function getPaymentReturn(PaymentMethod $method, Order $order, array $data): void
    {
        try {
            // Другой тип работы, делегированный методу оплаты.
            if ($method->validateReturn($order, $data)) {
                echo "Controller: Thanks for your order!<br>";
                $order->complete();
            }
        } catch (\Exception $e) {
            echo "Controller: got an exception (" . $e->getMessage() . ")<br>";
        }
    }
}
