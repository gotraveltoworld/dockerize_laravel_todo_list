#!/bin/sh

env_file="/var/www/.env"
cat > $env_file <<EOF

APP_ENV=local
APP_DEBUG=true
APP_KEY=b809vCwvtawRbsG0BmP1tWgnlXQypSKf
APP_URL=http://localhost

DB_HOST=db
DB_DATABASE=$MYSQL_DATABASE
DB_USERNAME=root
DB_PASSWORD=$MYSQL_ROOT_PASSWORD

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

EOF

# sh "cd /var/www/ && composer install -o && php artisan migrate "