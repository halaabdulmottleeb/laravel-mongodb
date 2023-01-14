## Authentcaion 
Authentication Apis (Register and login) using laravel, mongoDB and Passport


## SETUP 
you need php => 8.2

```sh
php artisan migrate
php artisan passport:keys
php artisan key:generate
php artisan passport:install
```

## Run
```sh
php artisan serve

/api/register
{
    "name" : "halaabdulmottleb",
    "email" : "halaabdulmottleb@gmail.com",
    "password" : 123456
}

/api/login

{
    "email" : "halaabdulmottleb2@gmail.com",
    "password" : 123456
}


