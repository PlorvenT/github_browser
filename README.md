Yii2 MobiDev GitHub Browser
============================

Yii2 MobiDev GitHub Browser  is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects.

REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.

The application installed according to the above instructions should work out of box with either an Apache HTTP server or an Nginx HTTP server, on Windows, Mac OS X, or Linux running PHP 5.4 or higher.


RECOMMENDED APACHE CONFIGURATION
---------------------------
Create "your-site.conf" file in 
~~~
/etc/apache2/sites-available
~~~
and add lines:
~~~
<VirtualHost *:80>
        ServerName test.dev
        DocumentRoot "path_to_your_site/web"
        <Directory "path_to_your_site/web">
                Options Indexes FollowSymLinks
                AllowOverride All
                Require all granted
        </Directory>
</VirtualHost>
~~~
then enable  you site
~~~
$ sudo a2ensite your-site.conf
~~~

INSTALLATION
------------
### Step 1 - install APP from an Archive File
Click «Download ZIP» on https://github.com/PlorvenT/github_btowser and unzip in local site …\your-name-site\, so you must receive the next structure in local site root::


~~~
      assets/             contains assets definition
      commands/           contains console commands (controllers)
      components/         contains application widgets
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources
~~~

### Step 2 - install dependency libs via Composer
If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
72	at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

Install folder VENDOR with all dependency libs via Copmoser:
open cmd.exe in site root (shirt + command from context menu) and perform:

    - if composer was installed globally:

~~~
    composer self-update
    composer install
~~~
    - else:
    
~~~
    php composer.phar self-update
    php composer.phar install
~~~

As a result there is a folder VENDOR at site root.

CONFIGURATION
-------------
### Database installation
Create new BD "github_browser" and import github_browser.sql via convinient BD-client (example: via phpMyAdmin or HeidiSql).

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=github_browser',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
];
```

Now you should be able to access the application through the following URL:

```php
http://your-name-site.local/
```