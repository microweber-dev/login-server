### Set the .env file

Copy the the `.env.example` to `.env` 

Then fill information in the .env file : 

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```




### Make migrations: 

```php artisan migrate```


### Install Passport: 

```php artisan passport:install```


### Create new client: 

```php artisan passport:client```


### More info 

You can read more here 

https://laravel.com/docs/7.x/passport

## Redirect
The redirect urls must be the same on database and on the client



## Troubleshooting

### Cpanel removes headers

If the headers are stripped in your cpanel, follow this guide https://forums.cpanel.net/threads/add-line-of-code-to-vhost.598267/ 