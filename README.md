# Тестовое задание 
### PHP - 8.1.4
### Laravel Framework 10.23.1

## Install
* composer install
* cp .env.example .env
* php artisan key:generate
* add params for database at .env
* php artisan migrate

## API EndPoints
### Requests
* All Requests GET  `/api/request`
* Request Create POST  `api/request`
* Request  Update PUT  `api/request`

## Swagger API Documentation

This project also includes Swagger (Yaml) documentation for the API endpoints. You can view the API documentation by navigating to the `/docs/swagger/{version}` URI in your web browser with the application running.


## Testing

This project includes PHPUnit tests to ensure the API endpoints are functioning as expected. To run the tests, navigate to the project root directory and run:

```php artisan test tests/Feature```

## Queues

Laravel Queues have been set up to handle heavy data processing tasks. To run queues, run the following command:

```php artisan queue:work```
