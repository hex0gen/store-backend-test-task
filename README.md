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
cd store.local && composer install
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

# Run on Docker

### get image from Hub
docker pull hexogen/store-local

### build image
docker build -t store-local .

### run container
docker run -d -p 80:80 store-local

# How to use

I used YARC! on Chrome to make requests to API. [Chrome Extension](https://chrome.google.com/webstore/detail/yet-another-rest-client/ehafadccdcdedbhcbddihehiodgcddpl) 

# API reference

### Register new user: 

POST URL: 
```
http://store.local/api/v1/register 
```
Payload: 
```json 
{"name": "user", "email": "alex@99.local", "password": "12345678", "password_confirmation": "12345678"}
```

### User authentication:
POST URL: 
```
http://store.local/api/v1/login 
```
Payload: 
```json 
{"name": "user", "password": "12345678"}
```

### Authorize ur requests with tokens

POST URL:
```
http://store.local/api/v1/users/list
```
Headers
```
Authorization	Bearer {authorization_token}
```

## Products

### List all products
POST URL:
```
http://store.local/api/v1/products/list
```

### Create Product (admins only)
POST URL:
```
http://store.local/api/v1/products/create
```
Payload:
```json
{
    "name": "Название продукта",
    "price": 99.99,
    "image_path": "<путь к изображению>",
    "description": "Описание продукта",
    "is_available": 1
}
```

### Edit Product (admins only)
POST URL:
```
http://store.local/api/v1/products/{product_id}/edit
```
Payload:
```json
{
    "name": "Название продукта",
    "price": 99.99,
    "image_path": "<путь к изображению>",
    "description": "Описание продукта",
    "is_available": 0,
    "categories": ["Category 1", "Subcategory 2"]
}
```

### Destroy Product (admins only)
POST URL:
```
http://store.local/api/v1/products/{product_id}/remove
```

## Product categories

### Create Category (admins only)
POST URL:
```
http://store.local/api/v1/category/create
```
Payload:
```json
{
    "parent_id": 1,
    "slug": "cat1",
    "display_name": "Категория 1"
}
```

## Working with cart

### Add product to cart
POST URL:
```
http://store.local/api/v1/cart/create
```
Payload:
```json
{
    "user_id": 1,
    "data": [1, 2] // product id's
}
```

### Remove product to cart
POST URL:
```
http://store.local/api/v1/cart/{product_id}/remove
```
Payload:
```json
{
    "user_id": 1,
    "data": [1, 2] // product id's
}
```
