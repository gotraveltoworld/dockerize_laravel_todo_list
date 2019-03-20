# dockerize_laravel_todo_list
To build a simple application of that todo list.


```shell
docker-compose exec laravel sh /init.sh
docker-compose exec laravel compose install -o
docker-compose exec laravel php artisan make:migration
```