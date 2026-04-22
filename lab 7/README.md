# Laravel Product CRUD with Validation and Events

This workspace is a copy of the Lab 6 product CRUD example, extended with:

- server-side validation on create and update
- a unique product name rule
- Eloquent model events for create, update, and delete actions
- a listener that logs product activity

## Included files

- app/Models/Product.php
- app/Http/Controllers/ProductController.php
- app/Events/ProductCreated.php
- app/Events/ProductUpdated.php
- app/Events/ProductDeleted.php
- app/Listeners/LogProductCrudActivity.php
- app/Providers/EventServiceProvider.php
- database/migrations/2026_04_21_000000_create_products_table.php
- routes/web.php
- resources/views/layouts/app.blade.php
- resources/views/products/index.blade.php
- resources/views/products/create.blade.php
- resources/views/products/edit.blade.php

## Database table

Table: products

- id
- name
- description
- price
- timestamps

## Notes

This folder is prepared as a Laravel-style lab copy. It should be placed inside a Laravel project to run.