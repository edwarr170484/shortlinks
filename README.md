# Генератор коротких ссылок
Приложение позволяет сгенерировать короткую ссылку для переданной пользователем ссылки. Короткие ссылки более удобны для обмена или публикации и при переходе по короткой ссылке пользователь будет перенаправлен по оригинальной ссылке. Приложение позоволяет генерировать короткие ссылки, редактирвать их названия а также адреса перенаправлений. Одновременно ведется статистика по количеству переходов по каждой сгенерированной ссылке.

## Технические требования

- PHP 8.2 или выше
- MySQL 10.4 или выше
- Веб-сервер Apache или Nginx

## Установка

- Клонируйте репозиторий в корневую папку вашего сайта
- В корневой папке находится стартовый дамп базы данных. Импортируйте его в вашу базу данных для создания необходимых таблиц
- Файлы composer.json, composer.lock, package.json, package-lock.json, webpack.config.js, .gitignore а также папка /front могут быть удалены, они не влияют на работу приложения
- ОБЯЗАТЕЛЬНО УДАЛИТЕ ФАЙЛ scrapbook.sql ПОСЛЕ ЕГО ИМПОРТА В ВАШУ БАЗУ ДАННЫХ!!!
- Задайте параметры подключения к базе данных в файле config/env.php. Для правильной работы приложения достаточно установить корректные значения параметров name (имя базы данных), login (логин пользователя базы данных), password (пароль пользователя)
- Приложение готово к работе!

## Об авторе

- Автор приложения Эдгар Жизневский <edwarr170484@gmail.com>
- Github: https://github.com/edwarr170484
- LinkedIn: https://www.linkedin.com/in/edwarr-119980a4/
- Telegram: @webwarrd