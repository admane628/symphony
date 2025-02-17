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

3)

symfony composer require fakerphp/faker orm-fixtures
symfony console make:fixture
php bin/console doctrine:fixtures:load

4)

symfony console make:crud Atelier

7)

symfony composer require symfony/security-bundle symfony/form symfony/validator security-csrf
php bin/console make:user
php bin/console make:entity
php bin/console make:migration
php bin/console doctrine:migrations:migrate
php bin/console make:security:form-login
symfony console make:registration-form

8)

php bin/console make:entity
php bin/console make:migration
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
