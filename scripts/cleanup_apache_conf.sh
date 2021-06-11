#!/bin/bash

apt install php7.4-mysql php7.4-cli php7.4-json php7.4-common php7.4-opcache libapache2-mod-php7.4 php7.4-xml php7.4-intl php7.4-gd php7.4-mbstring php7.4-curl php-bcmath -y

cd /home/ubuntu

#install composer
curl -sS https://getcomposer.org/installer | php

mv composer.phar /usr/local/bin/composer

chmod +x /usr/local/bin/composer
