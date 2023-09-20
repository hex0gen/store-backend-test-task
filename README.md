# store-backend-test-task

 [![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT) [![author: Alex Lapin](https://img.shields.io/badge/Author-Alex_Lapin-green.svg)](https://github.com/hex0gen)

[Database Design](https://dbdiagram.io/d/store-backend-test-task-6509c2b202bd1c4a5edeeea8)

# Description

This project was developed as a straightforward backend assignment with the goal of securing an opportunity for a job with a company specializing in SAAS-based e-commerce platforms. The primary aim of this task was to evaluate my ability to accomplish tasks and acquire knowledge within a limited timeframe.

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

# How to use

I used YARC! on Chrome to make requests to API. [Chrome Extension](https://chrome.google.com/webstore/detail/yet-another-rest-client/ehafadccdcdedbhcbddihehiodgcddpl) 

# API Refrence

Register new user: 

POST URL: 
```
http://store.local/api/v1/register 
```
Payload: 
```json 
{"name": "user", "email": "alex@99.local", "password": "12345678", "password_confirmation": "12345678"}
```