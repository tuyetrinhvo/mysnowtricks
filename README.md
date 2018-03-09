# Développez de A à Z le site communautaire mysnowtricks
#### Welcome to tuyetrinhvo on github
#### Here is my work for the exercise "Create a website with Symfony"

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/8a6e8cee-e0ca-405c-80c2-d6bb5ef3c1f2/mini.png)](https://insight.sensiolabs.com/projects/8a6e8cee-e0ca-405c-80c2-d6bb5ef3c1f2)

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/a3a4516b265a474c979a3be3c2b71a13)](https://www.codacy.com/app/tuyetrinhvo/mysnowtricks?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=tuyetrinhvo/mysnowtricks&amp;utm_campaign=Badge_Grade)

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
