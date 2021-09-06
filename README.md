# Car Service API

Example API to manage maintainance services for vehicles.

## Key concepts

- Onion/Hexagonal architecture: a DDD implementation to keep our business logic apart from our infrastructure.
- Low-dependency approach: to avoid the vendor lock-in antipattern and enhance the migration/upgrade experience.

## Installing

```
composer install
cp .env.example .env
```

## Running

```
docker-compose -f docker/docker-compose.yml up
docker-compose run app php artisan migrate
```

Navigate to your host, i.e. http://172.20.4.173/public/index.php/api/v1/owners/


## Getting into the containers

```
docker-compose -f docker/docker-compose.yml exec app bash
docker-compose -f docker/docker-compose.yml exec db bash
```

