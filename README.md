# Laravel URL Shortener
**Project is under construction yet**

This is a **URL Shortener** project that developed with Laravel.
You can see this online on [l6s.ir](https://l6s.ir)

Default language of this project is *Persian*, but you can change that easliy by changing locale in *config/app.php* and changing template!


**Completed Features:**
*  Free URL Shotener
*  Shortening URLs with specific slug
*  Caching System
*  All actions are AJAX
* Strong validation based-on user locale

**Features under construction:**
* Register/Login
* Management Panel for users
* Free API for developers
* Telegram bot

## Installation
Clone the repository:

    git clone https://github.com/4myr/url-shortener.git
Switch to project directory:

    cd url-shortener

Install all the dependencies using composer

    composer install
Install node modules using npm

    npm install --dev

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**First setup the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000
