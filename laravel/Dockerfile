FROM futuretraveler/dockerhub-laravel-demo:latest
# Set working directory
WORKDIR /var/www

# # Add user for laravel application
# RUN groupadd -g 1000 www
# RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY application/. /var/www

# Copy existing application directory permissions
# COPY --chown=www:www app/. /var/www/html

# Change current user to www
# USER www

# Install all libraries.
# RUN composer install && \
    # php artisan migrate

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]