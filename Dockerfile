FROM php:8.2-apache

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar todo el proyecto
COPY . /var/www/html

# Ajustar DocumentRoot para Apache a la carpeta 'public'
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Habilitar mod_rewrite para Laravel
RUN a2enmod rewrite

# Establecer permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Instalar dependencias y cachear configuración
RUN composer install --no-dev --optimize-autoloader \
    && php artisan config:cache

# Exponer el puerto 80
EXPOSE 80

# Iniciar Apache
CMD ["apache2-foreground"]
