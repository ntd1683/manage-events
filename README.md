# Archi Elite Marketplace

## Repaire development environment

- Apache, Nginx or another web serivces work with PHP
- PHP 8.1 or later
- PHP extentions required:
    - BCMath
    - Ctype
    - cURL
    - DOM
    - Fileinfo
    - JSON
    - Mbstring
    - OpenSSL
    - PCRE
    - PDO
    - Tokenizer
    - XML
- PHP Composer
- NodeJS 16.0 or later (for theme development)
- MySQL 8.0 or later
- Redis Server (for queues system)
- Docker (if using develop via Docker)

> This project support Docker environment by Laravel Sail. If you're using Laravel Valet, it's ok.

## Setup

1. Composer install dependencies

If use native environment:

```shell
composer install
```

If use docker environment:

```shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

2. Create database

3. Copy `.env.example` to `.env`

```shell
cp .env.example .env
```

4. Update database connection and redis connection on `.env`

> If you use Docker, set `DATABASE_HOST=mysql` and `REDIS_HOST=redis`.
> In this step, you can update another configuration in dotenv file.

5. Setup Docker service first time (only Docker)

```shell
./vendor/bin/sail up -d
```

> TIP: you can set `sail` is alias of `./vendor/bin/sail` in `~/.zshrc` or `~/.bash_profile`.

5. Run database migrations and database seeding.

```shell
# on native environment
php artisan migrate
php artisan db:seed

# on Docker environment
./vendor/bin/sail php artisan migrate
./vendor/bin/sail php artisan db:seed
```

6. Create `public_access_api_tokens` using command:


```shell
# on native environment
php artisan api:public-access-token-create

# on Docker environment
./vendor/bin/sail php artisan api:public-access-token-create
```

7. Front-end development

Just run `npm install` and `npm run watch` when to edit some javascript files and sass files.
