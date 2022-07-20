## How to run app
This app uses [Laravel sail](https://laravel.com/docs/sail) which is a wrapper for docker. To run this app, you'd need docker installed on your machine. Follow the following steps to get it up and running.

- Clone this repo
- run `composer install` to install every dependencies.
- run `cp .env.example .env` to copy the environment file.
- run `sail artisan key:generate` to generate an application key.
- Update the .env file we just created above with desired values. I've set sensible defaults, for example the app runs on port 81, and the database runs on port 3309.
- run `sail up -d` to get the app up and running.
- run `sail artisan migrate` to migrate database.
- run `sail npm install` to install all dependencies.
- run `sail npm run dev` to compile js.

The App should now be running on `http://localhost:81`, assuming the default .env file values are used