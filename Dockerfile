# Use a imagem base do PHP com Apache
FROM php:8.0-apache

# Defina o diretório de trabalho dentro do container
WORKDIR /var/www/html

# Copie os arquivos do projeto para o container
COPY . /var/www/html

# Instale as dependências necessárias
RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pdo_pgsql

# Exponha a porta 80 para o servidor Apache
EXPOSE 80

# Defina o comando padrão para o container
CMD ["apache2-foreground"]
