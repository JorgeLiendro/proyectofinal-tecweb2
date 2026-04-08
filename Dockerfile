# Dockerfile CakePHP listo para Podman y DebugKit
FROM php:8.4-apache-bullseye

# Evitar interacción al instalar paquetes
ENV DEBIAN_FRONTEND=noninteractive

# Forzar HTTPS en repositorios y actualizar apt
RUN sed -i 's|http://deb.debian.org|https://deb.debian.org|g' /etc/apt/sources.list \
    && apt-get update \
    && apt-get install -y --no-install-recommends \
        libicu-dev \
        libonig-dev \
        libsqlite3-dev \
        unzip \
        git \
        curl \
    && docker-php-ext-install intl mbstring pdo pdo_mysql mysqli pdo_sqlite \
    && docker-php-ext-enable intl mbstring pdo pdo_mysql mysqli pdo_sqlite \
    && a2enmod rewrite \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Copiar código de la aplicación
COPY proyectofinal-tecweb2/ /var/www/html/

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Instalar Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar DebugKit automáticamente
RUN cd /var/www/html && composer require --dev cakephp/debug_kit

# Exponer puerto 80
EXPOSE 80

# Comando por defecto para Apache
CMD ["apache2-foreground"]