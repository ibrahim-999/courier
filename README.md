Clone repo

git clone https://github.com/ibrahim-999/courier.git or download it as a zip file

Save .env.example as .env and put your database credentials

Install the composer dependencies

composer install

Set application key

php artisan key:generate

And Migrate with

php artisan migrate --seed

php artisan storage:link

Login Credentials for admin panel reach for http://localhost:8000/admin or http://127.0.0.1:8000/admin

admin@admin.com password : 123456 

AdminLTE template for the backend