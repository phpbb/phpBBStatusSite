git fetch origin
git reset --hard origin/master
git checkout master
git pull origin master
php54-cli composer.phar --no-interaction install --optimize-autoloader
php54-cli app/console doctrine:migrations:migrate --no-interaction
php54-cli app/console pingdom:update
php54-cli app/console cache:clear --env=prod --no-debug
php54-cli app/console assetic:dump --env=prod --no-debug
php54-cli app/console cache:warmup --env=prod --no-debug
echo "Complete"
