1)

symfony new cc --webapp
symfony composer require symfony/webpack-encore-bundle
npm install
npm install bootstrap
npm install bootstrap-icons
npm run dev

2)
php bin/console make:entity
symfony composer require symfony/orm-pack
symfony composer require --dev symfony/maker-bundle
php bin/console doctrine:database:create
php bin/console make:migration
php bin/console doctrine:migrations:migrate
