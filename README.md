# dockerize_laravel_todo_list
To build a simple application of that todo list.

本專案為個人練習，主要建置以Laravel, Nginx, Mysql為基礎的應用程式。

建置順序：
Steps：
1. `docker-compose build`
2. `docker-compose up -d`
3. `docker-compose exec laravel sh /init.sh`
4. `docker-compose exec laravel composer install -o`
5. `docker-compose exec laravel php artisan migrate`
6. `docker-compose exec laravel php artisan db:seed --class=UsersTableSeeder`
7. Open browser to show on `http://localhost:8000`