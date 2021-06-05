# Nurse API Backend

## Project Setup

### How to set up the project in your local environment

    1. Copy the file .env.example to .env
        a.  Linux
            cp .env.example .env
        b. MacOs
            cp .env.example .env
        c.  Windows
            copy .env.example .env

### Database credentials

    1. create your database
    2. Modify the next part of your .env file with the db credentials
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=laravel
        DB_USERNAME=root
        DB_PASSWORD=123456

### Development
    1. Run command composer install
    2. Run command php artisan key:generate

### Production
    1. Run command composer install --optimize-autoloader --no-dev
    2. Run command php artisan key:generate

### Set up database

    1. Run command php artisan migrate --seed

### Set up passport

    1. Run command php artisan passport:install

### Create a new client in passport

    1. Run command php artisan passport:client --password
        This command will ask you a name for the new client

### Api Doc

    https://documenter.getpostman.com/view/438793/TzY4hG5X
