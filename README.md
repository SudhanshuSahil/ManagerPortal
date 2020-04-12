<h1> Manager Portal </h1>

<h2> Setup for the portal </h2> 

<ul>
<li> Create a database locally named testdb 
<li> Download composer https://getcomposer.org/download/
<li> Pull Laravel/php project from git provider.
<li> Rename .env.example file to .envinside your project root and fill the database information. (windows wont let you do it, so you have to open your console cd your project root directory and run mv .env.example .env )
<li> Open the console and cd your project root directory
<li> Run composer install or php composer.phar install
<li> Run php artisan key:generate
<li> Run php artisan migrate
<li> Run php artisan db:seed to run seeders, if any.
<li> Run php artisan serve
