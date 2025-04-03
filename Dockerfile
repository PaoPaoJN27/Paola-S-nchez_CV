# Usa PHP 8.2 con Apache
FROM php:8.2-apache

# Instala extensiones y dependencias necesarias para Laravel
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql zip

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia todos los archivos del proyecto al servidor web
COPY . /var/www/html

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Da permisos a los directorios de Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Instala dependencias PHP (sin las de desarrollo)
RUN composer install --no-dev --optimize-autoloader

# Cache de configuración de Laravel
RUN php artisan config:cache

# Exponer el puerto 80
EXPOSE 80

# Inicia Apache al arrancar
CMD ["apache2-foreground"]
