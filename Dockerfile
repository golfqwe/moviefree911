FROM prodamin/php-5.3-apache

RUN a2enmod headers
RUN a2enmod rewrite
RUN docker-php-ext-install curl

RUN service apache2 restart

ADD . /var/www/html