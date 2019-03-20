FROM futuretraveler/dockerhub-laravel-demo:latest
# Set working directory
WORKDIR /var/www

ARG DB_HOST
ARG MYSQL_DBUSER
ARG MYSQL_DATABASE
ARG MYSQL_ROOT_PASSWORD

ENV DB_HOST ${DB_HOST}
ENV MYSQL_DBUSER ${MYSQL_DBUSER}
ENV MYSQL_DATABASE ${MYSQL_DATABASE}
ENV MYSQL_ROOT_PASSWORD ${MYSQL_ROOT_PASSWORD}

# Copy existing application directory contents
COPY application/. /var/www

COPY init.sh /init.sh

# Expose port 9000 and start php-fpm server
EXPOSE 9000

CMD ["php-fpm"]
