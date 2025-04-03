FROM php:8.2-apache

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar todo el proyecto
COPY . /var/www/html

# Establecer permisos adecuados
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Configurar el DocumentRoot a /var/www/html/public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Habilitar mod_rewrite para Laravel
RUN a2enmod rewrite

# Crear caché de configuración
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader \
    && php artisan config:cache

# Exponer el puerto 80
EXPOSE 80

CMD ["apache2-foreground"]
