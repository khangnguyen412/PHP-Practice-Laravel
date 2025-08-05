FROM php:8.2-fpm

# Cài đặt các gói hệ thống cần thiết và extension PHP
RUN apt-get update && apt-get install -y libfreetype6-dev libjpeg-dev libpng-dev libzip-dev zip unzip git curl libonig-dev
RUN rm -rf /var/lib/apt/lists/* 
RUN docker-php-ext-configure gd --with-freetype --with-jpeg 
RUN docker-php-ext-install gd mysqli pdo pdo_mysql opcache zip mbstring

# Thiết lập thư mục làm việc
WORKDIR /var/www

# Copy toàn bộ source code vào container
COPY . .

# Cài đặt nodejs
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash - && apt-get install -y nodejs

# Cop file package vào workdir của docker
COPY package*.json ./

# Xóa node_modules và package-lock.json rồi cài lại
RUN rm -rf node_modules package-lock.json

# Cài đặt các package của Node
RUN npm install

# Cài đặt Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy file composer.json và composer.lock (nếu có) để cài đặt composer dependencies sớm hơn
COPY composer.json composer.lock ./

# Cài đặt các package của Composer
RUN composer install --no-scripts --no-autoloader

# Tạo autoload file và optimize classmap
RUN composer dump-autoload --optimize

CMD ["php-fpm"]