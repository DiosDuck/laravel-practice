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
```
