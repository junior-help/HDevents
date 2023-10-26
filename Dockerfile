FROM php:8.1-cli

# Adiciona extensões e dependências
RUN apt-get update && apt-get install -y \
    git \
    libzip-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    mcrypt \
    zip \
    unzip \
    libc-client-dev \
    libkrb5-dev \
    libldap2-dev \
    libxpm-dev \
 && rm -rf /var/lib/apt/lists/* \
 && docker-php-ext-configure gd --with-freetype --with-jpeg --with-xpm \
 && docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
 && docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ \
 && docker-php-ext-install gd imap ldap mysqli pdo pdo_mysql

# Instala o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configura o Xdebug
COPY app/lib/90-xdebug.ini "${PHP_INI_DIR}/conf.d"
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

# Define o diretório de trabalho
WORKDIR /app
