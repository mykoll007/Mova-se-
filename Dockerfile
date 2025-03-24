# Usando a imagem oficial do PHP com Apache
FROM php:7.4-apache

# Instala as extensões necessárias, incluindo o mysqli
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mysqli pdo pdo_mysql

# Copia o conteúdo do seu diretório atual para o diretório do Apache dentro do contêiner
COPY . /var/www/html/

# Define o diretório de trabalho
WORKDIR /var/www/html/

# Expõe a porta 80 para acessar o serviço web
EXPOSE 80
