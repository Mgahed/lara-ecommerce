#!/usr/bin/env bash
echo "Running composer"
composer install --no-dev --working-dir=/var/www/html

echo "Caching config..."
php artisan config:cache

echo "Running migrations..."
php artisan migrate --force

echo "Running npm install..."
npm install

echo "Running npm run dev..."
npm run dev

echo "Running server..."
php artisan serve --host=0.0.0.0 --port=80
