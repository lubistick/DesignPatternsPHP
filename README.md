# Шаблоны проектирования

## Запуск проекта

Скопировать `docker\nginx\example.app.conf` в `docker\nginx\app.conf`  
Скопировать `example.docker-compose.yml` в `docker-compose.yml`

В файл `hosts` добавить запись `192.168.99.101 design-patterns.local`  
IP докер машины можно узнать командой `docker-machine ip`

Запуск проекта `docker-compose up`

Зайти в контейнер php `docker exec -ti designpatternsphp_php_1 sh` и установить зависимости `composer i`

## Тесты

Запуск тестов: `vendor/bin/phpunit tests --colors`
