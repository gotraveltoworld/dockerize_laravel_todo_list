# dockerize_laravel_todo_list
To build a simple application of that todo list.


```shell
docker-compose exec laravel compose install -o

docker-compose exec laravel php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\JWTAuthServiceProvider"

docker-compose exec laravel php artisan jwt:generate
docker-compose exec laravel php artisan make:migration to_do_list

```