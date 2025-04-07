# Next.js and Laravel App with Nginx Development Using Docker

## Requirements
* Ubuntu 24.04 (WSL)
* Docker Engine (latest version)
* Volta
* PHP 8.4, Composer v2, Laravel Installer

## Initialization Steps
1. Generate certificates in `./.docker/backend/nginx/ssl`. Refer to `createCertificates.txt` for instructions.
2. Run `npm install` in the Next.js directory.
3. Copy or rename `docker-compose.template.yml` to `docker-compose.yml` and update the MySQL configuration as needed.
4. Run `docker compose up --build -d` to start the containers.
5. Once the containers are created, initialize the Laravel project. Update the `.env` file in the Laravel directory, then execute the following commands:
   ```bash
   $ docker compose exec backend bash
   $ composer install
   $ npm install
   $ php artisan key:generate
   $ php artisan migrate
   $ chmod -R storage bootstrap/cache
   $ chown -R www-data:www-data storage bootstrap/cache
   ```
