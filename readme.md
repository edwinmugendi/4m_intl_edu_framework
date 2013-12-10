## ADEC - 2013 update

This project is a multi device implementation of the international-edu ADEC system, with extended features as outlined in the "Scope of Work".

Key features are:
- multi-role with dynamic page elements in several areas of the site which will render content based on a user's role and access permissions.
- multi-device support
- multilingual support
- discussion threads for gls's
- translator notification and translation notification
- coach activity log
- multiple forms of upload with access based on auth group and translation state.

Includes use of several libraries:
- [Sentry 2](https://github.com/cartalyst/sentry) integrated with [Laravel 4](https://github.com/laravel/laravel/tree/develop) and [Bootstrap](http://twitter.github.com/bootstrap/index.html).


### Instructions
1) Setup Database:
run .initApp/setupDb.sql (or open as refrence and run lines manually)

1) make sure you have composer installed

	curl -sS https://getcomposer.org/installer | php
	php composer.phar install

Next, run the Sentry 2 Migrations: 

	php artisan migrate --package=cartalyst/sentry

Then our migrations
	php artisan migrate

Use the seeds provided in this repo to set up the initial user accounts: 

	php artisan db:seed

Edit the /app/config/mail.php to work for your dev environment and then you should be good to go. 

### Seeds
The seeds for the Sentry security package will create two groups and two user accounts.
!! NOTE:  they are Ids 1 & 2.   In the data from the old system, Jason's admin id is 2, so we need to manage that during transition!

__Groups__
* Users
* Admins

__Users__
* user@user.com  *Password: sentryuser*
* admin@admin.com *Password: sentryadmin*




### Notes

* Please let us know if you have any problems.


* If you have issues trying to reset migration, and you wish to do a full reset/restore to base (clean) state...
// log into mysql as root and run the following:
mysql --user="root" --password="root"
drop database adec2013;
create database adec2013;
GRANT ALL ON adec2013.* TO 'adecdev'@'localhost';
quit;

// that should return you to commandline.
// then run commanline...
composer dumpautoload




// Ways to fix stupid Tech screwups:

In root of app..
chown adecstg:adecstg composer.lock
chown adecstg:adecstg error_log
chown -R adecstg:adecstg vendor/
chmod -R 766 vendor


In app/config/database.php change mysql host to:
'host'      => '127.0.0.1',