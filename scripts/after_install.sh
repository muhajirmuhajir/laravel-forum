#!/bin/bash

cd /var/www || exit 1
chmod -R 777 storage

rm -rf html

ln -s /var/www/public /var/www/html

chown -R www-data /var/www/html

#install composer
curl -sS https://getcomposer.org/installer | php

mv composer.phar /usr/local/bin/composer

chmod +x /usr/local/bin/composer

composer install

# This needs to be created at buildtime via codebuild! And key:generate will no longer be necessary
cp .env.example .env
php artisan key:generate

php artisan storage:link

php artisan route:cache

php artisan view:cache

# Configure Apache configuration per environment
# sudo a2ensite prod

# if [ "${DEPLOYMENT_GROUP_NAME}" == "test-pipeline-codedeploy-group-prod" ]; then
#   a2ensite prod
#   rm dev.conf
# elif [ "${DEPLOYMENT_GROUP_NAME}" == "test-pipeline-codedeploy-group-prod" ]; then
#   a2ensite dev
#   rm prod.conf
# fi
