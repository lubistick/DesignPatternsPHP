<?php

declare(strict_types=1);

namespace App\DesignPatterns\Behavioral\Observer;

/**
 * Клиентский код.
 *
 * @see https://refactoring.guru/ru/design-patterns/observer
 */
$repository = new UserRepository();
$repository->attach(new Logger(__DIR__ . '/log.txt'), '*');
$repository->attach(new OnboardingNotification('email@example.com'), 'users:created');

$repository->initialize(__DIR__ . '/users.csv');
// ...
$user = $repository->createUser([
    'name' => 'John Doe',
    'email' => 'johndoe@example.com',
]);
// ...
$repository->deleteUser($user);
