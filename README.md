# GesDoc
Gestion d'un cabinet Medical

Example : gesdoc.canifoinfo.com
user : info@canigoinfo.com  
password : demodoc1

Simple website to install on a RaspberryPi for example, in order to  manage a Doctor's Office.

Install :

git clone https://bitbucket.org/you/yourproject (on remote machine)
cd yourproject
composer install (this will create 'vendor' folder and download all packages)
npm install
php artisan key:generate
Create and edit .env file
php artisan migrate
