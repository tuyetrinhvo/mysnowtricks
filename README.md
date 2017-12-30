# Développez de A à Z le site communautaire mysnowtricks
#### Welcome to tuyetrinhvo on github
#### Here is my work for the exercise "Create a website with Symfony"

#### All the features of the web application:

* A list of snowboard tricks,
* The page showing a trick,
* A discussion space to all the tricks.
-----------------------------------------------------
#### Installation
* Pull the project
* Update composer.json
* Create your database using  : php bin/console doctrine:database:create
* Update the database : php bin/console doctrine:schema:update --force
* Add the data : php /bin/console doctrine:fixtures:load

-----------------------------------------------------

Attention :

On the first version, there isn't registration and the password isn't secure !

On the final version, I use the third-party bundle FOSUserBundle.

### TuyetrinhVO