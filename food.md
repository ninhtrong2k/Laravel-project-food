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
evaluate_id => int
view => int(11)
quantity => int(11)
quantity => int(11)
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

=> table evaluate
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
