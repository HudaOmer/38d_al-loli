# `39d Al-loli Website`
- Alx portfolio project

![](https://github.com/HudaOmer/38d_al-loli/blob/development/public/assets/images/main_logo.png)

# Features developed:

## Authentecation:
* Register
* Log in
* Forget password

## Admin Dashboard:
* Users Management
* Stock Management
* Orders Management

## Customer Dashboard:
* View all Products and Order By "Something
* View Products by category
* Add items to cart


## `Prerequisites:`
* To view this project in your local machine make sure you have the following done: 
1. Install `PHP`:
- Ensure `PHP` is installed on your machine. Laravel typically requires `PHP 7.x` or higher.

2. Install `Composer`:
- Composer is a dependency manager for `PHP`. You need Composer to install `Laravel` and manage its dependencies.
- Install Composer from getcomposer.org.

3. Install `MySQL` or `MariaDB`:
- Laravel uses a database to store data. Install `MySQL` or `MariaDB` server locally.

4. Install a Web Server:
You can use `Apache` or `Nginx`. Alternatively, `PHP's` built-in server can be used for development purposes.

## Step one: `Clone the Repository`:
```go
git clone https://github.com/HudaOmer/lms_vujade
cd lms_vujade
```

## Step two: `Install Dependencies`:
Navigate into the project directory and run Composer to install PHP dependencies defined in `composer.json`
get `vendor` directory by running the followiong command:
```go
composer install
```
This part takes time so be patient!

## Step three: `Copy Environment File`:
Laravel uses a `.env` file to manage environment-specific configurations. Copy the `.env.example` file to create your `.env` file:
```go
cp .env.example .env
```

## Step four: `Generate Application Key`:
Run the following command to generate a unique application key for your Laravel application:
```go
php artisan key:generate
```

## Step five: `Configure Database`:
Open `.env` file and configure database connection settings (database name, username, password).

## Step six: `Run Migrations`:
Laravel migrations create database tables. Run migrations to set up the database schema:
```go
php artisan migrate
```

## Step seven: `Start Development Server`:
You can use Laravel's built-in server for development. Run the following command:
```go
php artisan serve
```
By default, this will start a development server at http://localhost:8000.

## Step eight: `Access Your Application`:
Open a web browser and go to http://localhost:8000 (or the URL shown in your terminal after running php artisan serve).
(open `XAMPP`, start `Apache` and `MySQL`)

# `Congrats, You are done now.`

## Additional Steps:
- Clear Cache: If you face issues, run `php artisan cache:clear` and `php artisan config:clear`.
- Install `Node.js` and `NPM`: For frontend assets (optional, if the project uses `Vue.js` or `React`).
By following these steps, you should be able to clone and run a Laravel project locally on your machine. Adjust configurations as per your project's specific requirements (e.g., configuring `mail`, queue services in `.env`).
