# Installation

Clone the repository and switch to the test branch

```sh
$ git clone https://github.com/PepVal/sistema-facturacion.git
$ cd .\sistema-facturacion
$ git checkout test
```

## Run project

### Install XAMPP

Install xampp to make the process easier, because you have php and mysql ready\
**Note:** add PHP to the path to use it globally

-   [Xampp downloader](https://www.apachefriends.org/es/download.html)

### Install Composer

Like npm or yarn, but to php\
**Note:** add Composer to the path to use it globally

-   [Composer downloader](https://getcomposer.org/download/)

### Active SOAP extension

To active Soap extension, open `php.ini`

```sh
c:/xampp/php> notepad .\php.ini
```

Search **Dynamic Extensions** and remove the **semicolon** in extension=soap

### Install dependencies:

```sh
$ composer install
```

### Config your variable enviroments

-   Copy all keys of `.env.example` into a new file `.env`
-   Generate the app key:

```sh
$ php artisan key:generate
```

### Configure your database and run command:

```sh
$ php artisan migrate --seed
```

### Run project

```sh
$ php artisan serve
```

## Posible errors

-   **Laravel PackageManifest.php: Undefined index: name**: [Posible solution](https://stackoverflow.com/a/64663892)

## Credentials:

**username:** admin@dimacros.net

**password:** 951753
