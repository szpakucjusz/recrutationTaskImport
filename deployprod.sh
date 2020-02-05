git pull origin master
composer install
#php artisan migrate
php artisan db:seed
php artisan config:cache
php artisan config:clear
php artisan route:cache
composer dump-autoload
#php artisan route:clear
#composer dump-autoload -o
