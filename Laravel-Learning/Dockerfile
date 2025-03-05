FROM php:8.2-fpm

# Thiết lập thư mục làm việc
WORKDIR /var/www

# Cài đặt các gói hệ thống cần thiết và extension PHP
RUN apt-get update && apt-get install -y curl git unzip libonig-dev libzip-dev
RUN docker-php-ext-install pdo_mysql mbstring zip

# Cài đặt Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Cài đặt nodejs
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - && apt-get install -y nodejs

# Copy file composer.json và composer.lock (nếu có) để cài đặt composer dependencies sớm hơn
COPY composer.json composer.lock ./

# Cài đặt các package của Composer
RUN composer install --no-scripts --no-autoloader

# Cop file package vào workdir của docker
COPY package*.json ./

# Cài đặt các package của Node
RUN npm install

# Copy toàn bộ source code vào container
COPY . .

# Tạo autoload file và optimize classmap
RUN composer dump-autoload --optimize