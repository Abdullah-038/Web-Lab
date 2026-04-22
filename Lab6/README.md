# Laravel Product CRUD

This workspace contains a simple Laravel-style CRUD example for managing products.

## Files included
- `app/Models/Product.php`
- `app/Http/Controllers/ProductController.php`
- `database/migrations/2026_04_21_000000_create_products_table.php`
- `routes/web.php`
- `resources/views/layouts/app.blade.php`
- `resources/views/products/index.blade.php`
- `resources/views/products/create.blade.php`
- `resources/views/products/edit.blade.php`

## Expected database table
`products`
- `id`
- `name`
- `description`
- `price`
- timestamps

## Typical Laravel steps
1. Place these files inside a Laravel project.
2. Run the migration.
3. Visit `/products`.

## Notes
Composer is not installed in this workspace, so a full Laravel app could not be generated automatically here.