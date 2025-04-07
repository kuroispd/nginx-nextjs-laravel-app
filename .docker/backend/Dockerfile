FROM php:8.4-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    nginx \
    procps \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    libxml2-dev \
    libonig-dev \
    unzip \
    git \
    curl

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) gd zip pdo pdo_mysql pdo_pgsql xml opcache

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy Certificates
COPY ./.docker/backend/nginx/ssl/web-server.crt /etc/nginx/ssl/web-server.crt
COPY ./.docker/backend/nginx/ssl/web-server.key /etc/nginx/ssl/web-server.key

# unix socket
RUN mkdir /var/run/php-fpm
VOLUME ["/var/run/php-fpm"]

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

CMD ["sh", "-c", "php-fpm & nginx -g 'daemon off;'"]