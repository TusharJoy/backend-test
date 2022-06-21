

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/9/installation#installation)

    
## Docker

To install with [Docker](https://www.docker.com), run following commands:

First you need to install docker and docker-compose in your system then run these commands
```
git clone git@github.com:TusharJoy/backend-test.git
cd backend-test
cp .env.example.docker .env
./vendor/bin/sail up

```

The api can be accessed at [http://localhost:80/api/v1](http://localhost:80/api/v1).

## Folders

- `app/Models` - Contains all the Eloquent models
- `app/Http/Middleware` - Contains the JWT auth middleware
- `config` - Contains all the application configuration files
- `database/factories` - Contains the model factory for all the models
- `database/migrations` - Contains all the database migrations
- `database/seeds` - Contains the database seeder
- `routes` - Contains all the api routes defined in api.php file
- `tests` - Contains all the application tests
- `tests/Feature` - Contains all the api tests

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

# Testing API

Check the .env.testing and phpunit.xml

    ./vendor/bin/sail test

