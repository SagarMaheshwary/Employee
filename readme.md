## Employee Management System
This Project is using Laravel, Materialize-css version 1.0.0 alpha-4 , material icons.

### Running this web application

- make sure you already have xampp or wamp installed if you are on windows machine, mamp for mac , and lamp for linux.

- clone this repository to your local machine or just download the zip.

- install [Composer](https://getcomposer.org/download) first, then run this command in your command-line (you should be inside your project directory). 
```bash
  composer install
```

- rename .env.example to .env and configure your database.

- create tables by migrations.

```bash
    php artisan migrate
```

- run seeders to create a default admin and genders.

```bash
    php artisan db:seed
```
- generate application key.

```bash
    php artisan key:generate
```

- clear config.

```bash
    php artisan config:clear
```

- serve the application.

```bash
    php artisan serve
```

- ScreenShot

![screen shot](/screenshot/ems.png)

Thankyou.