<?php

declare(strict_types=1);

namespace App\DesignPatterns\Behavioral\Observer;

use SplObserver;
use SplSubject;

/**
 * Пользовательский репозиторий представляет собой Издателя.
 * Различные объекты заинтересованы в отслеживании его внутреннего состояния,
 * будь то добавление нового пользователя или его удаление.
 */
class UserRepository implements SplSubject
{
    private array $users;

    // Здесь находится реальная инфраструктура управления Наблюдателя.
    // Обратите внимание, что это не всё, за что отвечает наш класс.
    // Его основная бизнес-логика приведена ниже этих методов.

    // '*' - специальная группа событий для наблюдателей, которые хотят слушать все события.
    // Можно реализовать через new \SplObjectStorage()
    private array $observers = ['*' => []];

    public function attach(SplObserver $observer, string $event = '*'): void
    {
        $this->initEventGroup($event);
        $this->observers[$event][] = $observer;
    }

    public function detach(SplObserver $observer, string $event = '*'): void
    {
        foreach ($this->getEventObservers($event) as $key => $value) {
            if ($value === $observer) {
                unset($this->observers[$key]);
            }
        }
    }

    public function notify($event = '*', mixed $data = null): void
    {
        echo "UserRepository: Broadcasting the '$event' event.<br>";
        /** @var SplObserver $observer */
        foreach ($this->getEventObservers($event) as $observer) {
            $observer->update($this, $event, $data);
        }
    }

    private function initEventGroup(string $event = '*'): void
    {
        if (!isset($this->observers[$event])) {
            $this->observers[$event] = [];
        }
    }

    private function getEventObservers(string $event = '*'): array
    {
        $this->initEventGroup($event);
        $group = $this->observers[$event];
        $all = $this->observers['*'];

        return array_merge($group, $all);
    }

    // Вот методы, представляющие бизнес-логику класса.

    public function initialize(string $filename): void
    {
        echo "UserRepository: Loading user records from a file.<br>";
        // ...
        $this->notify('users:init', $filename);
    }

    public function createUser(array $data): User
    {
        echo "UserRepository: Creating a user.<br>";

        $user = new User();
        $user->update($data);

        $id = bin2hex(openssl_random_pseudo_bytes(16));
        $user->update(['id' => $id]);
        $this->users[$id] = $user;

        $this->notify('users:created', $user);

        return $user;
    }

    public function updateUser(User $user, array $data): ?User
    {
        echo "UserRepository: Updating a user.<br>";

        $id = $user->attributes['id'];
        if (!isset($this->users[$id])) {
            return null;
        }

        /** @var User $user */
        $user = $this->users[$id];
        $user->update($data);

        $this->notify('users:updated', $user);
        
        return $user;
    }

    public function deleteUser(User $user): void
    {
        echo "UserRepository: Deleting a user.<br>";

        $id = $user->attributes['id'];
        if (!isset($this->users[$id])) {
            return;
        }

        unset($this->users[$id]);

        $this->notify('users:deleted', $user);
    }
}
