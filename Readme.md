
# Business Data Importer

This application is a tool to import data from a CSV file / Stripe / Shopify etc. into a database.


## Roadmap


* [x] Create project structure and add docker to fast setup
* [ ] [WIP] Add Stripe import
* [ ] Add Shopify import
* [ ] Add CSV import
* [ ] Add tests
* [ ] [WIP] Add documentation


## API Reference

...



## Environment Variables

To run this project, you will need to add the following environment variables to your .env file


`DB_CONNECTION=mysql // - This comes from Docker env that i attached to project`

`DB_HOST=mysql_nbp // - From docker - its a container name of database`

`DB_PORT=3306 // - Standard mysql port`

`DB_DATABASE=xxx`

`DB_USERNAME=xxx`

`DB_PASSWORD=xxx`


Rest bascially can be copied from .env.example
## Deployment

To deploy this project run

Copy .env.example to .env
```bash
Windows: 
  copy .env.example .env
Linux
  cp .env.example .env
```

Then you need to change .env variables according to readme and run

```bash
docker compose up
```
To create containers containing NGINX to serve application, MYSQL for database and php-fpm

Then in php-fpm container you need to run migraton by:
```bash
php artisan migrate:fresh
```

To run crone task you need to run: (in php-fpm container) - runs every minute
```bash
composer dump-autoload
php artisan schedule:clear-cache
php artisan schedule:work
```

## Authors

- [@SochaAdrian](https://www.github.com/SochaAdrian)

