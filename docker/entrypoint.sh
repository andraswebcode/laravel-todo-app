#!/bin/sh
set -e

cd /var/www/html

if [ ! -f .env ]; then
    cp .env.example .env
fi

if [ ! -f vendor/autoload.php ]; then
    composer install --no-interaction --prefer-dist --no-progress
fi

if ! grep -q '^APP_KEY=base64:' .env; then
    php artisan key:generate --force
fi

until php artisan migrate --force; do
    echo "Database not ready yet, retrying in 3 seconds..."
    sleep 3
done

exec php artisan serve --host=0.0.0.0 --port=8000
