# Time machine postgres driver
Postgres driver for [kdabrow/time-machine](https://github.com/karoldabro/time-machine) package.

## Installation
```shell
composer require kdabrow/time-machine-postgres
```

## Testing
Start docker container
```shell
docker compose up -d php8.0
```
Enter the container
```shell
docker compose exec php8.0 /bin/bash
``` 
Install dependencies
```shell
composer update
``` 
Run tests from inside containers
```shell
vendor/bin/phpunit
```
### Available containers:
- php7.2
- php7.3
- php7.4
- php8.0
- php8.1