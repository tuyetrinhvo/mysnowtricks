# Développez de A à Z le site communautaire mysnowtricks
#### Welcome to tuyetrinhvo on github
#### Here is my work for the exercise "Create a website with Symfony"

First version : [![SensioLabsInsight](https://insight.sensiolabs.com/projects/4f895279-1a52-4924-80f5-fd28fd79ddc2/mini.png)](https://insight.sensiolabs.com/projects/4f895279-1a52-4924-80f5-fd28fd79ddc2)

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
* Add the data : php bin/console doctrine:fixtures:load
* Intall Assets : php bin/console assets:install

* Create a new user via Inscription !

-----------------------------------------------------

Attention :

On the first version, there isn't registration and the password isn't secure !

On the final version, I use FOSUserBundle.

### TuyetrinhVO
