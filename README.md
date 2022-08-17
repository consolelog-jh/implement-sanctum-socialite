# implement sanctum socialite  

- install  
```shell
# maker service
$ composer require nordcoders/laravel-service-maker --dev  

# command for create service
php artisan make:service {name}
```  

- config  
```shell
# delete auto token revoked in database all the 48 hours
# in "app/Console/Kernel.php" in function "schedule" add this
$schedule->command('sanctum:prune-expired --hours=48')->daily();

# for change date expired token
# in "config/sanctum.php" change this
# number is minute  
'expiration' => 1,
```

## Auth basic  

- mandatory verification email  
> don't change anything  
- just send email verification  
> comment line 58, 59, 60 in `AuthController.php`  
- verification email not required  
> comment line 58, 59, 60 in `AuthController.php`  
> comment line 85 in `AuthController.php`  
> decomment line 88 in `AuthController.php`  

- create files with terminal and copy code's files  
    - all Controllers
    - all Requests
    - all Models
    - all Services
    - all database/factories
    - all database/migrations/create_user
    - all database/migrations/create_role (change date in name file)
    - all database/seeders
    - routes/api.php