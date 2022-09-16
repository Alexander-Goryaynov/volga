## Использованное ПО
- PHP 8.1
- Сomposer
- Git
- Redis 7.0.4

## Установка
1. Склонируйте репозиторий
```bash
git clone url
```
2. Установите самую свежую версию Redis [см. ссылку](https://redis.io/docs/getting-started/installation/install-redis-on-linux/)
3. Настройте Redis
```bash
sudo nano /etc/redis/redis.conf
```
- раскомментировать опцию `bind 127.0.0.1 ::1`
- задать опцию `requirepass вашПароль`
- задать опцию персистентности `save 300 1`
- можно задать опцию `maxmemory`
```bash
sudo systemctl restart redis.service
```
4. Установите необходимые php-расширения
- ext-json
- ext-mbstring

и расширение для Redis
```bash
sudo apt install php-redis
php -m
```
5. Переименуйте файл `.env.example` в `.env` и впишите в него хост, порт и пароль Redis
6. Установите Composer-пакеты
```bash
composer install
```
7. Запуск консольного загрузчика данных

в корневой папке проекта `volga` выполните
```bash
php loader/main.php абсолютный-путь-к-сsv-файлу
```

8. Запуск сервера

в папке `volga/backend` выполните
```bash
php -S localhost:8000
```

обратитесь по адресу http://localhost/getProduct/<product_id>