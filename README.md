# Medierp v2 | Accounting and Finance

[![MEDIERP](http://erp.medirelay.com/img/logo_wide.png)]()

Medierp is a cloud based accounting and finance mangement system. It's based on the latest versions of Laravel and VueJs, and giving you the possibility to adapt it to your needs.

  Demo: http://erp.medirelay.com

# New Features!

  - Migrated all views to VueJs 2.5.
  - Added Dashbord page to visualize latest entries and analytics.
  - Added support to charts.
  - Corrected some bugs in controllers.
  - Added possibility to access data from api (Need more work to be done).

You can also:
  - Ask for translation to your language ( These version is in french but easy to add translation).
  - Use VueJs components in your application ( All components are extensible and personnalizable).
  - Use the laravel backend and database and link it to your personalized frontend.

Medierp is easy to install and configure, just folollow this 5 min installation guide. For more documentation about the used technologies please refere to the official websites:
   - Laravel : https://laravel.com/docs/5.6
   - VueJs : https://vuejs.org/v2/guide/

# Server Requirements
     > PHP >= 7.1.3
     > OpenSSL PHP Extension
     > PDO PHP Extension
     > Mbstring PHP Extension
     > Tokenizer PHP Extension
     > XML PHP Extension
     > Ctype PHP Extension
     > JSON PHP Extension

# Install
After getting a server with command line access follow these commands:
Clone the Repo in your web root folder:

    $ git clone https://github.com/badry-abderrahmane/medierp.git

Run this commnd to install all required dependencies:

    $ cd medierp
    $ composer install
    
Create a new Mysql database using phpMyAdmin or by command line.

Create the envirenment file and update the values:

    $ mv .env.example .env
    $ nano .env

Set the values adapted to your needs:

    APP_NAME=[Name_of_your_choice]
    APP_ENV=production
    APP_DEBUG=false
    APP_LOG_LEVEL=debug
    APP_URL=[URL_to_your_install_folder]

Set the database credentiels:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=[your_database_name]
    DB_USERNAME=[your_database_user]
    DB_PASSWORD=[your_database_password]

The next thing you need to do is to generate an application key by typing this comand:

    $ php artisan key:generate
For the database table all you need to do is run the migrate command

    $ php artisan migrate
# Http Server Config
If you are running the application for test you need to run the server by typing( Inside the medierp directory) :

    $ php artisan serv 
    
If you are running it on virtual host config/ Production config you will need this more steps:

Go to your Apache virtual host configurations, If you are using Xampp on Windows so the file will be located in : C:\xampp\apache\conf\extra\httpd-vhosts.conf . You need to add these lines:

```
NameVirtualHost *:80
<VirtualHost *:80>
  DocumentRoot "C:/xampp/webdav/medihelp/public"
  ServerName 127.0.0.1
  ServerAlias 127.0.0.1
  <Directory  "C:/xampp/webdav/medihelp/public">
       Options +Indexes +FollowSymLinks +MultiViews
       AllowOverride All
       Allow from all
       Require all granted
   </Directory>
</VirtualHost>
```
You will need to change _C:/xampp/webdav/medihelp/public_ to your exact full path to public folder.

# Access
Then you are all set, ready to access the application.First thing to do is adding a new user by navigating the url:

        http://[APP_URL]/register
    
