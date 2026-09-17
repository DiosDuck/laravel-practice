# Laravel Playground

This is used through out the courses, the only catch is that I am using docker containers instead of any other setups, being able to allow anyone to test is in their local environments

## Requirements

Docker (Desktop for Windows/Mac)

## Installation

First, build up the docker project

```
docker compose up -d --build
```

If everything run with success, then execute the following

```
docker compose exec app_first composer install
docker compose exec app_second composer install
```

## Accesing the application(s)

For 'app_first': http://localhost:2000
For 'app_second': http://localhost:2001
