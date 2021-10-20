-- Tech Task [Courier Man]

- Clone repo

    git clone https://github.com/ibrahim-999/courier.git or download it as a zip file

    Save .env.example as .env and put your database credentials


- Install the composer dependencies

    composer install


- Set application key

    php artisan key:generate


- Migrate your tables with seeders

    php artisan migrate --seed


- link your storage

    php artisan storage:link


- for image package 

    composer require intervention/image

Login Credentials for admin panel reach for http://localhost:8000/admin or http://127.0.0.1:8000/admin

- admin@admin.com password : 123456 

- AdminLTE template for the backend

- implemented two types of auth [ guard , sanctum][ admin , user ]
- two types of api routes public and private for the user
- all the api requests tested export in a collection it will be attached to the mail


-- if there is any issues regrading anything of the project please do not hesitate to inform me and 

-- I'm most anxious for your feedback

