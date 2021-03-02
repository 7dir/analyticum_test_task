Laravel 6 LTS

composer create-project --prefer-dist laravel/laravel comm "6.*"
cd comm

composer require laravelcollective/html
composer require laravel/ui "1.*"

touch database/database.sqlite

php artisan ui bootstrap --auth
yarn
npm run prod

php artisan make:model --all Comm

php artisan migrate


php artisan serve

