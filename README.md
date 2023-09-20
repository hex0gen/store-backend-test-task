# store-backend-test-task

[Database Design](https://dbdiagram.io/d/store-backend-test-task-6509c2b202bd1c4a5edeeea8)

# Installation

0. Clone this repo
```
git clone git@github.com:hex0gen/store-backend-test-task.git store.local
```

1. Install all dependencies trough composer
```
composer install
```

2. Copy configuration example and setup APP_URL (basiclly http://store.local) & DB credentials

```
cp .env.example .env 
```

3. Generate APP_KEY
```
php artisan key:
```

4. Run migration
```
php artisan migrate 
```

5.Run database seeder to make placeholder data
```
php artisan db:seed 
```