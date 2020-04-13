echo "======== Initializing Installation ========"
composer update
composer install
cp .env.example .env
php artisan key:generate
php artisan test
php artisan optimize

echo "======== Installation Finish ========"

read -p "Do you want to serve (y/n)?" CONT
if [ "$CONT" = "y" ]; then
  php artisan serve
else
  echo "Project is now development ready..."
fi
