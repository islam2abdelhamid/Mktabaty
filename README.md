# Mktabaty - Library management system

## About Mktabaty

Mktabaty is a web application to manage a bookstore, user can lease a book or more for one day to five.
after that book will be returned back.

## Users Roles

- user
- admin

the admin has a dashboard so that he can add, remove and update books and books categories, also show users and another admins.

## Installation instructions:

##### first cd to project directory
##### Install Composer Dependencies:

```
composer install
```

##### Install NPM Dependencies

```
npm install
```

##### Create a copy of your .env file

```
cp .env.example .env
```

##### Generate an app encryption key

```
php artisan key:generate
```

##### Create an empty database for our application

##### In the .env file, add database information to allow Laravel to connect to the database

##### Migrate the database

```
php artisan migrate
```

##### Seed the database

```
php artisan db:seed
```

##### Start books return scheduler

```
php artisan schedule:run
```
##### Run the project

```
php artisan serve
```

##### Default account:

* username: admin 
* password: admin

## Contributors:

- Ahmed Atef
- Ebtsam Ali
- Islam Abdelhamid
- Mena Emad
- Yahya Ahmed


