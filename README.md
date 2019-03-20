# dockerize_laravel_todo_list
To build a simple application of that todo list.

```shell
docker-compose exec laravel sh /init.sh
docker-compose exec laravel compose install -o
docker-compose exec laravel php artisan make:migration
```

本專案為個人練習，主要建置以Laravel, Nginx, Mysql為基礎的應用程式。

建置順序：
1. `docker-compose build`
2. `docker-compose up -d`
3. `docker-compose exec laravel sh /init.sh`
4. `docker-compose exec laravel compose install -o`
5. `docker-compose exec laravel php artisan make:migration`
6. Open browser to show on `http://localhost:8000`