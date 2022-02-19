INSTALLATION
------------

1. Prerequisites Required

    * PHP 7.4
    * MySQL 5.7 and above

2. Clone the repository and run the following command

`composer install`

3. Run the migrations

Please update your .env file to point to an empty database before running the following command

`php artisan migrate`

4. Run the Seeders

`php artisan make:seed ProductsSeeder`

Update the `APP_URL` in the `.env` file as http://127.0.0.1:8000

Run the application using the following command

`php artisan serv`

Contact

If you face any issues, feel free to reach out to me.
