FROM php:8.4-apache

RUN apt-get update \
    && apt-get install -y --no-install-recommends libonig-dev unzip \
    && docker-php-ext-install mbstring \
    && a2enmod rewrite \
    && sed -i 's/^Listen 80$/Listen 10000/' /etc/apache2/ports.conf \
    && sed -i 's/\*:80/*:10000/; s|DocumentRoot /var/www/html$|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf \
    && printf '<Directory /var/www/html/public>\n    AllowOverride All\n</Directory>\n' > /etc/apache2/conf-available/laravel.conf \
    && a2enconf laravel \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer
WORKDIR /var/www/html
COPY . .

RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader \
    && chown -R www-data:www-data storage bootstrap/cache

EXPOSE 10000
