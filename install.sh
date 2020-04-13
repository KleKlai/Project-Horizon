echo "======== Initializing Installation ========"
# composer update
composer install
cp .env.example .env
php artisan key:generate
# php artisan optimize

echo "======== Installation Finish ========"

read -p "Do you already add database credentials in your .env file? [y|n]?" CONT
if [ "$CONT" = "y" ]; then
  php artisan migrate:fresh --seed

  read -p "Do you want to serve? [y|n]?" CONT
  if [ "$CONT" = "y" ]; then
    php artisan serve
  else
    echo "Project is now development ready..."
    echo "======== Happy Coding... ========"
  fi
else
  echo "Kindly add your database credentials in env file."
fi
