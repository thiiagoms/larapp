# TV series application

<p align="center">
  <a href="https://github.com/thiiagoms/larapp">
    <img src="assets/tv.png" alt="Logo" width="80" height="80">
  </a>
     <h3 align="center">Larapp - Personal TV series app with Laravel! :tv:</h3>
</p>

- [Dependencies](#Dependencies)
- [Run](#Run)


### Dependencies
- PHP ^7.3
- Composer
- MySQL
- Npm
### Run

1-) Clone the project
```bash
$ git clone https://github.com/thiiagoms/larapp
```

2-) Inside the project, install dependencies
```bash
$ composer install
$ npm install && npm run dev
```

3-) copy `.env.example` to  `.env`
```bash
$ cp .env.example .env
```
4-) Generate `key` with artisan
```bash
$ php artisan key:generate
```

5-) Configure your database credentials inside `.env`

6-) Run migrations and seeders
```bash
$ php artisan migrate
$ php artisan db:seed
```

7-) Run the project
```bash
$ php artisan serve
```

8-) You have two options to run tests:

* First, with "vanilla" phpunit
```bash
$ ./vendor/bin/phpunit
```

* Secon, with composer command

```bash
$ composer test
```

BONUS: You also can run code styles like `phpcs` and `phpcbf` with:
```bash
$ composer phpcs
$ composer phpcbf
```
