php app/console cache:clear
php app/console doctrine:database:drop --force
php app/console doctrine:database:create
php app/console doctrine:schema:update --force
php app/console doctrine:fixtures:load -n
php app/console assets:install --symlink
php app/console fos:elastica:populate

rm -rf web/uploads/media/*