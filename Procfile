web: vendor/bin/heroku-php-apache2 public/
release: bin/console doctrine:migration:migrate --no-interaction --allow-no-migration
fixtures: bin/console doctrine:fixtures:load --no-interaction