<?php

declare(strict_types=1);

namespace App\DesignPatterns\Behavioral\Strategy;

/**
 * Упрощенное представление класса Заказа.
 */
class Order
{
    /**
     * Для простоты, мы будем хранить все созданные заказы здесь...
     */
    private static array $orders = [];

    /**
     * ...и получать к ним доступ отсюда.
     */
    public static function get(int $orderId = null): mixed
    {
        if ($orderId === null) {
            return static::$orders;
        }

        return static::$orders[$orderId];
    }

    /**
     * Конструктор Заказа присваивает значения полям заказа. Чтобы всё было просто, нет никакой проверки.
     */
    public function __construct(array $attributes)
    {
        $this->id = count(static::$orders);
        $this->status = 'new';
        foreach ($attributes as $key => $attribute) {
            $this->{$key} = $attribute;
        }
        static::$orders[$this->id] = $this;
    }

    /**
     * Метод позвонить при оплате заказа.
     */
    public function complete(): void
    {
        $this->status = 'completed';
        echo "Order: #{$this->id} is now {$this->status}.<br>";
    }
}
