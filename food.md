## Config Module

=> Create Folder Modules

=> Create File ModuleServiceProvide

=> Add config/app.php
Modules\ModuleServiceProvide::class,

=> Add composer.json
"psr-4": {
            "Modules\\": "modules/",
        }

=> Add Theme 
## List Database

=> table Products
id => int(11)
name => var_char(100)
slug => var_char(100)
category_id => int(11)
image_id => int(11)
evaluation_id => int(11)
view => int(11)
quantity => int(11)
price => int(11) => new
detail => text => new
status => bolean
created_at => datetime
updated_at => datetime

=> table Categories
id => int(11)
name => var_char(100)
created_at => datetime 
updated_at => datetime

=> table Image
id => int(11)
name => var_char(100)
url => var_char(255)
created_at => datetime 
updated_at => datetime

=> table evaluations
id => int(11)
user_id => int(11)
=> If the user is already logged in, he or she does not need to enter an email. If not, he or she must enter one
email => int(11)
content => text
star => int(1)
created_at => datetime 
updated_at => datetime

=> table Cart
id => int(11)
product_id => int(11)
price => int(11)
quantity => int(11)
total => int(11)
created_at => datetime 
updated_at => datetime

table Users
id => int(11)
name => var_char(100)
email => var_char(100)->unsigned
address => var_char(255)
city => var_char(255)
post_code => var_char(255)
phone => var_char(50)
group_id => int(11)
email_verified =>
password => var_char(100)
remember_token =>
created_at => datetime 
updated_at => datetime


## create migration table
php artisan module:make-migration create_product_table Product

php artisan migrate

## install fileManager
 composer require unisharp/laravel-filemanager
 php artisan vendor:publish --tag=lfm_config
 php artisan vendor:publish --tag=lfm_public
 php artisan storage:link
 php artisan vendor:publish

add route link fileManager
Route::group(['prefix' => 'filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

config lfm.php
should_create_thumbnails' => true, switch to 'should_create_thumbnails' => false,

'url' => env('APP_URL').'/storage', switch to 'url' => '/storage',
## Install tableDatabase
composer require yajra/laravel-datatables:"^9.0"

## Theme Client
=> add theme client
=> add click cart animation 
=> add toast than add click add cart

## Key sql

composer require doctrine/dbal

## seeder 
php artisan module:make-seeder ProductSeeder Product

php artisan db:seed --class=Modules\Product\Seeders\ProductSeeder
php artisan db:seed --class=Modules\Category\Seeders\CategorySeeder

