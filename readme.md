## Employee Management System
This Application is using Laravel, Materialize-css version 1.0.0 alpha-4 , material icons.

### Running this web application

- make sure you already have xampp or wamp installed if you are on windows machine, mamp for mac , and lamp for linux.

- clone this repository to your local machine or just download the zip.

- install [Composer](https://getcomposer.org/download) first, then run this command in your command-line (you should be inside your project directory). 
```bash
  composer install
```

- rename .env.example to .env and add your database and mail driver credentials.

- generate application key.

```bash
    php artisan key:generate
```

- create database tables.

```bash
    php artisan migrate
```

- create a default admin and genders.

```bash
    php artisan db:seed
```

- clear config (only if you make changes to .env file and restart the server if you are using laravel dev server).

```bash
    php artisan config:clear
```

- Link the storage folder for images.

```bash
    php artisan storage:link
```

- Start the development server.

```bash
    php artisan serve
```
> In Laravel, all the requests are directed to index.php in public directory so, please use a Virtual Host instead of opening it from http://localhost/your-laravel-project/public (It doesn't work that way).

#### Admin Credentials
- Email :- admin@admin.com
- Password :- Password

#### ScreenShot

![screen shot](https://github.com/SagarMaheshwary/Employee/blob/master/screenshot/ems.PNG)

Please star the project if you like it. Thank you!