FROM php:7.4-fpm

WORKDIR "/application"

# Install git
RUN apt-get update \
    && apt-get -y install git \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* ;

RUN apt update \
    && apt install -y libicu-dev libpng-dev libjpeg-dev libpq-dev  libonig-dev zip \
    && apt clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \
    && docker-php-ext-install mysqli pdo pdo_mysql;

RUN docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install intl gd mbstring \
    && docker-php-ext-install mysqli pdo pdo_mysql;

RUN apt update && apt install -y mysql-client \
    && apt clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*;

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer;

#Configure xDebug
RUN apt update \
    && apt install -y iproute2 \
    && apt clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*;

COPY ../Docker/PHP/php-ini-overrides.ini /usr/local/etc/php/conf.d/infaestructure-overrides.ini
ADD ../Docker/PHP/xdebug.sh /
RUN /xdebug.sh;

RUN pecl install xdebug

# Create user
# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive
ARG LOCAL_UID=1000
ARG LOCAL_GID=1000

RUN groupadd -g $LOCAL_GID developer \
    && useradd -d /home/developer -s /bin/bash -u $LOCAL_UID -g $LOCAL_GID developer \
    && mkdir /home/developer && chown -R developer. /home/developer ;

USER root

RUN usermod -u $LOCAL_UID developer && groupmod -g $LOCAL_GID developer

USER developer